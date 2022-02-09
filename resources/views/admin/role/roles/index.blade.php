@extends('admin.homeMG')
@section('title')
Quản Lý Vai Trò
@endsection


@section('content')
    <div style="margin-top:-5%">
        <div class="card card-nav-tabs card-plain ">
            <ul class="nav nav-pills nav-pills-icons border-bottom border-dark" role="tablist">
                <li class="nav-item">
                    <a class=" btn btn-link " style="margin-left:-10%" aria-controls="nav-home" aria-selected="true"
                        data-toggle="tab" href="#link1" role="tablist" aria-expanded="true">
                        <samp style="font-size: 18px">Quản Lý Vai Trò
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
                            <h6 class="card-title">Thêm Mới Vai Trò</h6>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="card-body">
                            <form action="{{ route("admin.roles.store") }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label class="required" for="name"> Tên Vai Trò </label>
                                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($role) ? $role->name : '') }}" required>
                                    @if($errors->has('name'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </em>
                                    @endif
                                    <p class="helper-block">
                                        {{ trans('cruds.role.fields.title_helper') }}
                                    </p>
                                </div>


                                <div class="form-group {{ $errors->has('permissions') ? 'has-error' : '' }}">
                                    <label for="permission">Chức năng :

                                        </label>
                                    <select   name="permission[]" id="permission" class="form-control col-5  selectpicker mdb-select md-form"  data-style="btn btn-link" multiple="multiple" required>
                                        @foreach($permissions as $id => $permissions)
                                            <option value="{{ $id }}" {{ (in_array($id, old('permission', [])) || isset($role) && $role->permissions->contains($id)) ? 'selected' : '' }}>{{ $permissions }}</option>

                                         @endforeach

                                    </select>
                                    @if($errors->has('permission'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('permission') }}
                                        </em>
                                    @endif
                                    <p class="helper-block">
                                        {{ trans('cruds.role.fields.permissions_helper') }}
                                    </p>
                                </div>



                                <div>
                                    <input class="btn btn-danger" type="submit" value="Lưu">
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
                            <h6 >Danh sách Vai Trò</h6>
                </div>
            </div>

            <div style="margin-left: 85%" class="row">
                <div class="col-lg-12">
                    <a class="btn btn-success" data-toggle="collapse" href="#collapseExample" aria-expanded="false"
                        aria-controls="collapseExample">
                        Vai Trò Mới
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
                                    {{ trans('cruds.role.fields.id') }}
                                </th>
                                <th>
                                   Vai Trò
                                </th>
                                <th>
                                   Quyền
                                </th>
                                <th>
                                    &nbsp;
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $key => $role)
                                <tr data-entry-id="{{ $role->id }}">
                                    <td>

                                    </td>
                                    <td>
                                        {{ $role->id ?? '' }}
                                    </td>
                                    <td>
                                        {{ $role->name ?? '' }}
                                    </td>
                                    <td>
                                        <?php $stt=0;
                                        ?>
                                        @foreach($role->permissions()->pluck('name') as $permission)
                                            <span class="badge badge-info">{{ $permission }}</span>
                                           <?php $stt++;
                                           ?>
                                            @if ($stt==5)
                                            <span class="badge badge-info">......</span>
                                                @break;
                                            } 

                                           @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.roles.show', $role->id) }}">
                                            <span class="material-icons">
                                                search
                                             </span>

                                        <a class="btn btn-xs btn-info" href="{{ route('admin.roles.edit', $role->id) }}">
                                            <span class="material-icons">
                                               edit
                                             </span>
                                        </a>

                                        <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm(' Bạn có chắc xóa ?');" style="display: inline-block;">
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
