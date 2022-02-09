@extends('admin.layouts.partials.CSSKid')
@section('title')
Thêm Mới Loại Linh Kiện
@endsection
@section('styles')
<!-- Các css dành cho thư viện bootstrap-fileinput -->
<link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="form-group">
    <a class="btn btn-default" href="{{ route('manager.Loai_Linh_Kien.index') }}">
        Về Menu chính
    </a>
</div>
<div class="card">
    <div class="card-header">
        <label style="    font-size: 20 px; ">Thêm Mới Loại Linh Kiện</label>
    </div>

    <div class="card-body">
            <form method="post" action="{{ route("manager.Loai_Linh_Kien.store") }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                  <label for="llk_ten">Tên Loại Linh Kiện</label>
                  <input type="text" class="form-control" id="llk_ten" name="llk_ten" value="{{ old('llk_ten') }}">
                </div>


                <div class="form-group">
                  <label for="llk_thongTin">Thông tin</label>
                  <input type="text" class="form-control" id="llk_thongTin" name="llk_thongTin" value="{{ old('llk_thongTin') }}">
                </div>

                {{-- <div class="form-group">
                    <label for="nsx_ma">Nhà Sản Xuất</label>
                    <select name="nsx_ma" class="form-control">
                        @foreach ($nsx as $nsx)
                            @if (old('nsx_ma') == $nsx->nsx_ma)
                                <option value="{{ $nsx->nsx_ma }}" selected>{{ $nsx->nsx_ten }}</option>
                            @else
                                <option value="{{ $nsx->nsx_ma }}" selected>{{ $nsx->nsx_ten }}</option>
                            @endif
                        @endforeach
                    </select>
                </div> --}}
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
