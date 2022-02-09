@extends('admin.layouts.partials.CSSKid')
@section('title')
Edit Khách hàng
@endsection
@section('content')
<a class="btn btn-default" href="{{ route('manager.khachhang.index') }}">
    {{ trans('global.back_to_list') }}
</a>

<div class="card">
    <div class="card-header">

    </div>

    <div class="card-body">
        <form method="post" action="{{ route('manager.khachhang.update', ['khachhang' =>$KhachHang->id]) }}" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT" />
            {{ csrf_field() }}
            <div class="form-group">
                <label class="required" for="kh_hoTen">Họ Và Tên</label>
                <input class="form-control {{ $errors->has('kh_hoTen') ? 'is-invalid' : '' }}" type="text" name="kh_hoTen" id="kh_hoTen" value="{{ old('kh_hoTen',$KhachHang->kh_hoTen) }}" required>
                @if($errors->has('kh_hoTen'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kh_hoTen') }}
                    </div>
                @endif
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label class="required" for="kh_maSoThue">Mã Số Thuế</label>
                <input class="form-control {{ $errors->has('kh_maSoThue') ? 'is-invalid' : '' }}" type="text" name="kh_maSoThue" id="kh_maSoThue" value="{{ old('kh_maSoThue',$KhachHang->kh_maSoThue) }}">
                @if($errors->has('kh_maSoThue'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kh_maSoThue') }}
                    </div>
                @endif
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label class="required" for="kh_email">Email</label>
                <input class="form-control {{ $errors->has('kh_email') ? 'is-invalid' : '' }}" type="text" name="kh_email" id="kh_email" value="{{ old('kh_email',$KhachHang->kh_email) }}" required>
                @if($errors->has('kh_email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kh_email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="kh_dienThoai">Số Điên Thoại</label>
                <input class="form-control {{ $errors->has('kh_dienThoai') ? 'is-invalid' : '' }}" type="number" name="kh_dienThoai" id="kh_dienThoai" value="{{$KhachHang->kh_dienThoai}}" required>
                @if($errors->has('kh_dienThoai'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kh_dienThoai') }}
                    </div>
                @endif
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label class="required" for="kh_diaChi">Địa Chỉ</label>
                <input class="form-control {{ $errors->has('kh_diaChi') ? 'is-invalid' : '' }}" type="text" name="kh_diaChi" id="kh_diaChi" value="{{ old('kh_diaChi',$KhachHang->kh_diaChi) }}" required>
                @if($errors->has('kh_diaChi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kh_diaChi') }}
                    </div>
                @endif
                <span class="help-block"></span>
            </div>

            <div class="form-group">
                <label for="kh_trangThai">Trạng thái</label>
                <select name="kh_trangThai" class="form-control">
                   <option value="2" {{ old('kh_trangThai',$KhachHang->kh_trangThai) == 2 ? "selected" : "" }}>Khả dụng</option>
                    <option value="1" {{ old('kh_trangThai',$KhachHang->kh_trangThai) == 1 ? "selected" : "" }}>Khóa</option>

                </select>
              </div>
                   <button type="submit" class="btn btn-primary">Lưu</button>
        </form>

    </div>
</div>



@endsection
