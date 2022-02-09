@extends('admin.homeMG')
@section('title')
    Danh Sách Nhân Viên
@endsection


@section('content')

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
                            <h6 class="card-title">Thêm Mới Linh Kiện</h6>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="card-body">
                            <form method="POST" action="{{ route('manager.users.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="required" for="name">Họ Và Tên</label>
                                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                                        name="name" id="name" value="{{ old('name', '') }}" required>
                                    @if ($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
                                </div>
                                <div class="form-group">
                                    <label class="required" for="nv_email">Gmail</label>
                                    <input class="form-control {{ $errors->has('nv_email') ? 'is-invalid' : '' }}"
                                        type="text" name="nv_email" id="nv_email" value="{{ old('nv_email') }}" required>
                                    @if ($errors->has('nv_email'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('nv_email') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
                                </div>
                                <div class="form-group">
                                    <label class="required" for="sdt">Số Điên Thoại</label>
                                    <input class="form-control {{ $errors->has('sdt') ? 'is-invalid' : '' }}"
                                        type="number" name="sdt" id="sdt" value="{{ old('sdt') }}" required>
                                    @if ($errors->has('sdt'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('sdt') }}
                                        </div>
                                    @endif
                                    <span class="help-block"></span>
                                </div>
                                <div class="form-group">
                                    <label class="required" for="nv_diaChi">Địa Chỉ</label>
                                    <input class="form-control {{ $errors->has('nv_diaChi') ? 'is-invalid' : '' }}"
                                        type="text" name="nv_diaChi" id="nv_diaChi" value="{{ old('nv_diaChi') }}"
                                        required>
                                    @if ($errors->has('nv_diaChi'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('nv_diaChi') }}
                                        </div>
                                    @endif
                                    <span class="help-block"></span>
                                </div>
                                <div class="form-group">
                                    <label  for="nv_gioiTinh">Giới tính</label>
                                    <select name="nv_gioiTinh" class="form-control selectpicker" data-style="btn btn-link btn-round">
                                        <option value="1" {{ old('kh_gioiTinh') == 1 ? 'selected' : '' }}>Nam</option>
                                        <option value="0" {{ old('kh_gioiTinh') == 0 ?: '' }}>Nữ</option>

                                    </select>
                                    @if ($errors->has('nv_gioiTinh'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('nv_gioiTinh') }}
                                        </div>
                                    @endif

                                </div>
                                <div class="form-group">
                                    <label class="required" for="email">Tên đăng nhâp</label>
                                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                        type="text" name="email" id="email" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                    <span class="help-block"></span>
                                </div>
                                <div class="form-group">
                                    <label class="required" for="password">Mật Khẩu</label>
                                    <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                        type="password" name="password" id="password" required>
                                    @if ($errors->has('password'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('password') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
                                </div>
                                <div class="form-group">
                                    <label class="required"
                                        for="roles">Vai trò</label>

                                    {{-- <select name="q_ma" class="form-control selectpicker" data-style="btn btn-link btn-round">
                                        @foreach ($roles as $roles)
                                            @if (old('q_ma') == $roles->q_ma)
                                                <option value="{{ $roles->q_ma }}" selected>{{ $roles->q_ten }}
                                                </option>
                                            @else
                                                <option value="{{ $roles->q_ma }}" selected>{{ $roles->q_ten }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select> --}}
                                    <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">

                                        <select name="roles[]" id="roles" class="form-control select2 selectpicker" data-style="btn btn-link btn-round" multiple="multiple" required>
                                            @foreach($roles as $id => $roles)
                                                <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($user) && $user->roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('roles'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('roles') }}
                                            </em>
                                        @endif
                                        <p class="helper-block">
                                            {{ trans('cruds.user.fields.roles_helper') }}
                                        </p>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <button class="btn btn-danger" type="submit">
                                        {{ trans('global.save') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
{{--  --}}
{{--  --}}
        <div style="margin-top: -5%" class="card">
           <div class="card-header text-left ">
                        <div class="btn btn-social btn-fill btn-facebook">
                            <h6 >Danh sách Nhân Viên</h6>
                </div>
            </div>

            <div style="margin-left: 85%" class="row">
               @can('Thêm Nhân Viên')
                <div class="col-lg-12">
                    <a class="btn btn-success" data-toggle="collapse" href="#collapseExample" aria-expanded="false"
                        aria-controls="collapseExample">
                        Nhân Viên Mới
                    </a>
                </div>
                @endcan
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="text-center table table-bordered table-striped table-hover datatable datatable-User">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th width="50">
                                    ID
                                </th>
                                <th>
                                    Họ Tên Nhân Viên
                                </th>
                                <th>
                                    Vai trò
                                </th>
                                <th>
                                    Số Điện Thoại
                                </th>
                                <th>
                                    Địa Chỉ
                                </th>
                                <th>
                                    Trạng Thái
                                </th>
                                <th>

                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stt = 1;
                            ?>
                            @foreach ($users as $key => $user)
                                <tr data-entry-id="{{ $user->id }}">
                                    <td>

                                    </td>
                                    <td width="10">
                                        {{ $loop->index + 1 }}
                                    </td>
                                    <td>
                                        {{ $user->nv_hoTen ?? '' }}
                                    </td>
                                    <td> <?php $stt=0;
                                        ?>
                                        @foreach($user->roles()->pluck('name') as $role)
                                        <span class="badge badge-info">{{ $role }}</span>
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
                                        {{ $user->nv_dienThoai ?? '' }}
                                    </td>
                                    <td>
                                        {{ $user->nv_diaChi ?? '' }}
                                    </td>
                                    <td>

                                        <span class="label label-info">
                                            @if ($user->nv_trangThai == 1) Khóa
                                            @else Khả Dụng
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        @can('Xem Nhân Viên')
                                        <a class="btn btn-xs btn-primary"
                                            href="{{ route('manager.users.show', $user->id) }}">
                                              <span class="material-icons">
                                                            search
                                                         </span>
                                        </a>
                                        @endcan
                                        @can('Cập Nhật Nhân Viên')
                                        <a class="btn btn-xs btn-info"
                                            href="{{ route('manager.users.edit', [$user->id]) }}">
                                            <span class="material-icons">
                                              edit
                                             </span>
                                        </a>
                                        @endcan
                                        @can('Xóa Nhân Viên')
                                        <form action="{{ route('manager.users.destroy', $user->id) }}" method="POST"
                                            onsubmit="return confirm('{{ 'Bạn có chắc' }}');"
                                            style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            {{-- <input type="submit" class="btn btn-xs btn-danger"
                                                value="Xóa"> --}}

                                                <button class="btn btn-xs btn-danger"type="submit"  >
                                                <span class="material-icons">
                                                  delete
                                                 </span>
                                            </button>
                                        </form>
                                        @endcan



                                    </td>

                                </tr>
                                <?php
                                $stt++;
                                ?>
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
