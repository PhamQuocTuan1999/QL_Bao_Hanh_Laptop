@extends('admin.layouts.partials.CSSKid')
@section('title')
Thêm Nhà Sản Xuất
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
        Về Menu chính
    </a>
</div>
<div class="card">
    <div class="card-header">
        <label style="    font-size: 20 px; ">Thêm Mới Nhà Sản Xuất</label>
    </div>

    <div class="card-body">
            <form method="post" action="{{ route("manager.Nha_San_Xuat.store") }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                  <label for="nsx_ten">Tên Nhà Sản Xuất</label>
                  <input type="text" class="form-control" id="nsx_ten" name="nsx_ten" value="{{ old('nsx_ten') }}">
                </div>
                <div class="form-group">
                  <label for="nsx_thongTin">Thông tin</label>
                  <input type="text" class="form-control" id="nsx_thongTin" name="nsx_thongTin" value="{{ old('nsx_thongTin') }}">
                </div>


                <button type="submit" class="btn btn-primary">Lưu</button>
              </form>
    </div>
</div>



@endsection
@section('scripts')
<!-- Các script dành cho thư viện bootstrap-fileinput -->
<script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/sortable.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/fileinput.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/locales/fr.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/fas/theme.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.js') }}" type="text/javascript"></script>





@endsection
