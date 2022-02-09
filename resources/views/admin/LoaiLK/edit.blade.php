@extends('admin.CSSKid')
@section('title')
Sửa Loại Linh kiện
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
        <span class="material-icons">
            keyboard_backspace
        </span>  Về Menu chính
    </a>
</div>
<div class="card">
    <div class="card-header text-left card-header-social card-header-text">
        <div class="card-text">
          <h6 class="card-title"> Sửa Thông Tin Loại Linh kiện</h6>
        </div>
      </div>
    <div class="card-body">
        <form method="POST" action="{{ route("manager.Loai_Linh_Kien.update", $loailinhkien->llk_ma) }}" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT" />
                {{ csrf_field() }}

              <div class="form-group">
                <label class="required" for="llk_ten">Tên Loại Linh kiện</label>
                <input type="text" class="form-control" id="llk_ten" name="llk_ten" value="{{ old('llk_ten', $loailinhkien->llk_ten) }}">
              </div>


              <div class="form-group">
                <label for="llk_thongTin">Thông tin</label>
                <input type="text" class="form-control" id="llk_thongTin" name="llk_thongTin" value="{{ old('llk_thongTin',$loailinhkien->llk_thongTin) }}">
              </div>
              {{-- <div class="form-group">
                <label for="nsx_ma">Nhà Sản Xuất</label>
                <select name="nsx_ma" class="form-control" >
                    @foreach ($nsx as $nsx)
                        @if (old('nsx_ma') == $nsx->nsx_ma)
                            <option value="{{ $nsx->nsx_ma }}" selected>{{ $nsx->nsx_ten }}</option>
                        @else
                            <option value="{{ $nsx->nsx_ma }}" >{{ $nsx->nsx_ten }}</option>
                        @endif
                    @endforeach
                </select>
            </div> --}}

              <div class="form-group">
                <label for="llk_trangThai">Trạng thái</label>
                <select name="llk_trangThai"class="form-control selectpicker col-lg-3" data-style="btn btn-link btn-round" >
                     <option value="2" {{ old('llk_trangThai') == 2 ? "selected" : "" }}>Khả dụng</option>
                  <option value="1" {{ old('llk_trangThai') == 1 ? "selected" : "" }}>Khóa</option>

                </select>
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

<script>
  $(document).ready(function() {
    $("#llk_hinh").fileinput({
      theme: 'fas',
      showUpload: false,
      showCaption: false,
      browseClass: "btn btn-primary btn-lg",
      fileType: "any",
      previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
      overwriteInitial: false
    });
  });
</script>

<!-- Các script dành cho thư viện Mặt nạ nhập liệu InputMask -->
<script src="{{ asset('vendor/input-mask/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('vendor/input-mask/bindings/inputmask.binding.js') }}"></script>

<script>
  $(document).ready(function() {
    // Gắn mặt nạ nhập liệu cho các ô nhập liệu Giá gốc


    // Gắn mặt nạ nhập liệu cho các ô nhập liệu Giá bán
    $('#llk_giaBan').inputmask({
      alias: 'currency',
      positionCaretOnClick: "radixFocus",
      radixPoint: ".",
      _radixDance: true,
      numericInput: true,
      groupSeparator: ",",
      suffix: ' vnđ',
      min: 0,         // 0 ngàn
      max: 100000000, // 1 trăm triệu
      autoUnmask: true,
      removeMaskOnSubmit: true,
      unmaskAsNumber: true,
      inputtype: 'text',
      placeholder: "0",
      definitions: {
        "0": {
          validator: "[0-9\uFF11-\uFF19]"
        }
      }
    });

    // Gắn mặt nạ nhập liệu cho các ô nhập liệu Ngày tạo mới


    // Gắn mặt nạ nhập liệu cho các ô nhập liệu Ngày cập nhật
  });
</script>

@endsection
