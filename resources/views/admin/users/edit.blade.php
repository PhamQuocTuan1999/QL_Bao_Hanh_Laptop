@extends('admin.CSSKid')
@section('title')
Edit Nhân Viên
@endsection
@section('content')

<div class="form-group">
    <a class="btn btn-default" href="{{ route('manager.users.index') }}">
        <span class="material-icons">
            keyboard_backspace
        </span> Về Menu chính
    </a>
</div>
<div class="card">
    <div class="card-header text-left card-header-social card-header-text">
        <div class="card-text">
          <h6 class="card-title">  Sửa Thông Tin Nhân Viên</h6>
        </div>
      </div>


    <div class="card-body">
        <form method="post" action="{{ route('manager.users.update', ['user' => $user->id]) }}" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT" />
            {{ csrf_field() }}
            <div class="form-group">
                <label class="required" for="name">Họ Và Tên</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $user->nv_hoTen) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nv_email">Email</label>
                <input class="form-control {{ $errors->has('nv_email') ? 'is-invalid' : '' }}" type="email" name="nv_email" id="nv_email" value="{{ old('nv_email', $user->nv_email) }}" required>
                @if($errors->has('nv_email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nv_email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sdt">Số Điên Thoại</label>
                <input class="form-control {{ $errors->has('sdt') ? 'is-invalid' : '' }}" type="number" name="sdt" id="sdt" value="{{ $user->nv_dienThoai}}" required>
                @if($errors->has('sdt'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sdt') }}
                    </div>
                @endif
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label class="required" for="nv_diaChi">Địa Chỉ</label>
                <input class="form-control {{ $errors->has('nv_diaChi') ? 'is-invalid' : '' }}" type="text" name="nv_diaChi" id="nv_diaChi" value="{{ old('nv_diaChi',$user->nv_diaChi) }}" required>
                @if($errors->has('nv_diaChi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nv_diaChi') }}
                    </div>
                @endif
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label class="required" for="nv_gioiTinh">Giới tính</label>
                <select name="nv_gioiTinh" class="form-control selectpicker " data-style="btn btn-link btn-round">
                    <option value="1" {{ old('kh_gioiTinh',$user->nv_gioiTinh) == 1 ? "selected" : "" }}>Nam</option>
                   <option value="0" {{ old('kh_gioiTinh',$user->nv_gioiTinh) == 0 ?  : "" }}>Nữ</option>

               </select>
                @if($errors->has('nv_gioiTinh'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nv_gioiTinh') }}
                    </div>
                @endif
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label for="email">Tên đăng nhâp</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email',$user->email) }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block"></span>
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password">{{ trans('cruds.user.fields.password') }}</label>
                <input type="password" id="password" name="password" id="password" class="form-control" >
                @if($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.password_helper') }}
                </p>
            </div>

            <div class="form-group">
                <label for="nv_trangThai">Trạng thái</label>
                <select name="nv_trangThai" class="form-control selectpicker col-lg-3" data-style="btn btn-link btn-round">
                   <option value="2" {{ old('nv_trangThai', $user->nv_trangThai) == 2 ? "selected" : "" }}>Khả dụng</option>
                    <option value="1" {{ old('nv_trangThai', $user->nv_trangThai) == 1 ? "selected" : "" }}>Khóa</option>

                </select>
              </div>
              <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
                <label for="roles">Vai trò
                    </label>
                <select name="roles[]" id="roles" class="form-control select2 selectpicker"data-style="btn btn-link btn-round" multiple="multiple" >
                    @foreach($roles as $id => $roles)
                        <option value="{{$id}}" {{ (in_array($id, old('roles', [])) || isset($user) && $user->roles()->pluck('name', 'id')->contains($id)) ? "selected" : '' }}>{{ $roles }}</option>
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
            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>

    </div>
</div>



@endsection
