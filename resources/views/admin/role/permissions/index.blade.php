@extends('admin.homeMG')
@section('title')
Quyền
@endsection


@section('content')
    <div style="margin-top:-5%">
        <div class="card card-nav-tabs card-plain ">
            <ul class="nav nav-pills nav-pills-icons border-bottom border-dark" role="tablist">
                <li class="nav-item">
                    <a class=" btn btn-link " style="margin-left:-10%" aria-controls="nav-home" aria-selected="true"
                        data-toggle="tab" href="#link1" role="tablist" aria-expanded="true">
                        <samp style="font-size: 18px"> Quyền
                                @can('users_manage')

                            @endcan
                        </samp>

                    </a>
                </li>

            </ul>
        </div>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">


            <div class="collapse" id="collapseExample">
                <div class="card">

                    <div class="card-header card-header-social card-header-text">
                        <div class="card-text">
                            <h6 class="card-title">Thêm Mới Quyền</h6>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="card-body">
                            <form action="{{ route('admin.permissions.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="name">{{ trans('cruds.permission.fields.title') }}*</label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        value="{{ old('name', isset($permission) ? $permission->name : '') }}" required>
                                    @if ($errors->has('name'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </em>
                                    @endif
                                    <p class="helper-block">
                                        {{ trans('cruds.permission.fields.title_helper') }}
                                    </p>
                                </div>
                                <div>
                                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
{{--  --}}
{{--  --}}
        <div class="card">
           <div class="card-header text-left ">
                        <div class="btn btn-social btn-fill btn-facebook">
                            <h6 >Danh sách Permissions</h6>
                </div>
            </div>

            <div style="margin-left: 85%" class="row">
                <div class="col-lg-12">
                    <a class="btn btn-success" data-toggle="collapse" href="#collapseExample" aria-expanded="false"
                        aria-controls="collapseExample">
                        Permissions Mới
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="text-center table table-bordered table-striped table-hover datatable datatable-User">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.permission.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.permission.fields.title') }}
                                </th>
                                <th>
                                    &nbsp;
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $key => $permission)
                                <tr data-entry-id="{{ $permission->id }}">
                                    <td>

                                    </td>
                                    <td>
                                        {{ $permission->id ?? '' }}
                                    </td>
                                    <td>
                                        {{ $permission->name ?? '' }}
                                    </td>
                                    <td>

                                        <a class="btn btn-xs btn-info"
                                            href="{{ route('admin.permissions.edit', $permission->id) }}">
                                            <span class="material-icons">
                                                edit
                                              </span>
                                        </a>
                                        <form action="{{ route('admin.permissions.destroy', $permission->id) }}"
                                            method="POST" onsubmit="return confirm(' Bạn có chắc xóa ?');"
                                            style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button class="btn btn-xs btn-danger"type="submit"  >
                                                <span class="material-icons">
                                                  delete
                                                 </span>
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



    @endsection
    @section('scripts')
        <script>
            window.onload = myFunction1()

            function myFunction1() {
                var element, name, arr;
                element = document.getElementById("id2");
                name = "active";
                arr = element.className.split(" ");
                if (arr.indexOf(name) == -1) {
                    element.className += " " + name;
                }
            }
        </script>
        <script>
            $(function() {
                let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)


                $.extend(true, $.fn.dataTable.defaults, {
                    order: [
                        [1, 'desc']
                    ],
                    pageLength: 10,
                });
                $('.datatable-User:not(.ajaxTable)').DataTable({
                    buttons: dtButtons
                })
                $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                    $($.fn.dataTable.tables(true)).DataTable()
                        .columns.adjust();
                });
            })
        </script>


    @endsection
