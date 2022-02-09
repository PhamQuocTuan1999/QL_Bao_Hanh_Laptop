@extends('admin.CSSKid')
@section('title')
Sửa Thông Tin Bảo Hành
@endsection
@section('styles')
<!-- Các css dành cho thư viện bootstrap-fileinput -->
<link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="form-group">
    <a class="btn btn-default" href="{{ route('manager.Bao_Hanh.index') }}">
        <span class="material-icons">
            keyboard_backspace
        </span>  Về Menu chính
    </a>
</div>
<div class="card">
    <div class="card-header text-left card-header-social card-header-text">
        <div class="card-text">
          <h6 class="card-title"> Sửa Thông Tin Bảo Hành</h6>
        </div>
      </div>
    <div class="card-body">
        <form method="POST" action="{{ route("manager.Bao_Hanh.update", $bh->bh_ma) }}" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT" />
                {{ csrf_field() }}

              <div class="form-group">
                <label for="bh_ten">Tên Loại Bảo Hành</label>
                <input type="text" class="form-control" id="bh_ten" name="bh_ten" value="{{ old('bh_ten', $bh->bh_ten) }}">
              </div>


              <div class="form-group">
                <label for="bh_thongTin">Thông tin</label>
                <input type="text" class="form-control" id="bh_thongTin" name="bh_thongTin" value="{{ old('bh_thongTin',$bh->bh_thongTin) }}">
              </div>

              <div class="form-group">
                <label for="bh_trangThai">Trạng thái</label>
                <select name="bh_trangThai" class="form-control selectpicker  col-lg-3" data-style="btn btn-link btn-round">
                     <option value="2" {{ old('bh_trangThai') == 2 ? "selected" : "" }}>Khả dụng</option>
                  <option value="1" {{ old('bh_trangThai') == 1 ? "selected" : "" }}>Khóa</option>

                </select>
              </div>
              <button type="submit" class="btn btn-primary">Lưu</button>
            </form>
    </div>
</div>



@endsection



