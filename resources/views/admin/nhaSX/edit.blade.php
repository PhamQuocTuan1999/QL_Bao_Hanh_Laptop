@extends('admin.CSSKid')
@section('title')
Sửa Thông Tin Nhà Sản Xuất
@endsection
@section('styles')
<!-- Các css dành cho thư viện bootstrap-fileinput -->
<link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="form-group">
    <a class="btn btn-default" href="{{ route('manager.Nha_San_Xuat.index') }}">
        <span class="material-icons">
            keyboard_backspace
        </span>  Về Menu chính
    </a>
</div>
<div class="card">
    <div class="card-header text-left card-header-social card-header-text">
        <div class="card-text">
          <h6 class="card-title"> Thông Tin Nhà Sản Xuất</h6>
        </div>
      </div>
    <div class="card-body">
        <form method="POST" action="{{ route("manager.Nha_San_Xuat.update", $NSX->nsx_ma) }}" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT" />
                {{ csrf_field() }}

              <div class="form-group">
                <label class="required" for="nsx_ten">Tên Loại Nhà Sản Xuất</label>
                <input type="text" class="form-control" id="nsx_ten" name="nsx_ten" value="{{ old('nsx_ten', $NSX->nsx_ten) }}">
              </div>


              <div class="form-group">
                <label for="nsx_thongTin">Thông tin</label>
                <input type="text" class="form-control" id="nsx_thongTin" name="nsx_thongTin" value="{{ old('nsx_thongTin',$NSX->nsx_thongTin) }}">
              </div>

              <div class="form-group">
                <label for="nsx_trangThai">Trạng thái</label>
                <select name="nsx_trangThai" class="form-control selectpicker col-lg-3" data-style="btn btn-link btn-round">
                     <option value="2" {{ old('nsx_trangThai') == 2 ? "selected" : "" }}>Khả dụng</option>
                  <option value="1" {{ old('nsx_trangThai') == 1 ? "selected" : "" }}>Khóa</option>

                </select>
              </div>
              <button type="submit" class="btn btn-primary">Lưu</button>
            </form>
    </div>
</div>



@endsection



