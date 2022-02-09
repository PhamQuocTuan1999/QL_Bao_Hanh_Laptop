@extends('user.khachhang.app')
@section('title')
    Danh Sách Đơn Bảo Hành
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


@error('title')
<div class="alert alert-danger">{{ $message }}</div>
@enderror


<div class="row gutters-sm">
    <div class="col-md-10">
        <div class="card mb-3">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Cập Nhật Thông Tin Cá nhân</h4>

            </div>
            <div class="card-body">
                <form class="form-horizontal" method="POST" action="{{ route('user.update',[ Auth::user()->id] ) }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT"/>
                    <div class="row">

                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="bmd-label-floating">Tên đăng nhập</label>
                                <input  id="email" type="text" class="form-control" name="email" value="{{ old('email',Auth::user()->email) }}" required autofocus>

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">Mật Khẩu</label>
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="bmd-label-floating"> Nhập lại mật khẩu</label>
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="bmd-label-floating">Họ Và Tên</label>
                                <input id="kh_hoTen" type="text" class="form-control" name="kh_hoTen" value="{{ old('kh_hoTen',Auth::user()->kh_hoTen) }}" required autofocus>

                                @if ($errors->has('kh_hoTen'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('kh_hoTen') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="bmd-label-floating">Mã số Thuế</label>
                                <input id="kh_maSoThue" type="text" class="form-control" name="kh_maSoThue" value="{{ old('kh_maSoThue',Auth::user()->kh_maSoThue) }}" >

                                @if ($errors->has('kh_maSoThue'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('kh_maSoThue') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                    </div>


                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="bmd-label-floating">Email</label>
                                <input id="kh_email" type="email" class="form-control" name="kh_email" value="{{ old('kh_email',Auth::user()->kh_email) }}" required>

                                @if ($errors->has('kh_email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('kh_email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="bmd-label-floating">Địa Chỉ</label>
                                <input id="kh_diaChi" type="text" class="form-control" name="kh_diaChi" value="{{ old('kh_diaChi',Auth::user()->kh_diaChi) }}" required autofocus>

                                @if ($errors->has('kh_diaChi'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('kh_diaChi') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="bmd-label-floating">Số Điện Thoại</label>
                                <input id="kh_dienThoai" type="text" class="form-control" name="kh_dienThoai" value="{{ old('kh_dienThoai',Auth::user()->kh_dienThoai) }}" required autofocus>

                                @if ($errors->has('kh_dienThoai'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('kh_dienThoai') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">



                    </div>
                    <button type="submit" style="font-size: 13px" class="btn btn-primary pull-right">Cập Nhật</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

