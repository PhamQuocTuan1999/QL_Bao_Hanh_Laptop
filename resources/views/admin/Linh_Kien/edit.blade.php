@extends('admin.CSSKid')
@section('title')
    Chỉnh Sửa Thông Tin Linh Kiện
@endsection
@section('styles')
<!-- Các css dành cho thư viện bootstrap-fileinput -->
<link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css"/>
@endsection
@section('content')

<div class="form-group">
    <a class="btn btn-default" href="{{ route('manager.Linh_Kien.index') }}">
        <span class="material-icons">
            keyboard_backspace
        </span>  Về Menu chính
    </a>
</div>
<div class="card">
    <div class="card-header text-left card-header-social card-header-text">
        <div class="card-text">
          <h6 class="card-title"> Sửa Thông Tin Linh kiện</h6>
        </div>
      </div>
        <div class="card-body">
            <form method="POST" action="{{ route("manager.Linh_Kien.update", $lk->lk_ma) }}" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT" />
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="col">
                        <div class="form-group ">
                            <label class="required" for="llk_ma">Loại Linh Kiện</label>
                            <select class="form-control selectpicker " data-style="btn btn-link btn-round" name="llk_ma" >
                                @foreach ($llk as $loai)
                                    @if (old('llk_ma',$loai->llk_ma) == $loai->llk_ma)
                                        <option value="{{ $loai->llk_ma }}" selected>{{ $loai->llk_ten }}
                                        </option>
                                    @else
                                        <option value="{{ $loai->llk_ma }}" selected>{{ $loai->llk_ten }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group ">
                            <label class="required" for="nsx_ma">Nhà Sản Xuất</label>
                            <select name="nsx_ma" class="form-control selectpicker " data-style="btn btn-link btn-round">
                                @foreach ($nsx as $loai)
                                    @if (old('nsx_ma',$loai->nsx_ma) == $loai->nsx_ma)
                                        <option value="{{ $loai->nsx_ma }}" selected>{{ $loai->nsx_ten }}
                                        </option>
                                    @else
                                        <option value="{{ $loai->nsx_ma }}">{{ $loai->nsx_ten }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label  class="required" for="lk_ten">Tên Linh Kiện</label>
                    <input required type="text" class="form-control" id="lk_ten" name="lk_ten"
                        value="{{ old('nsx_thongTin', $lk->lk_ten) }}">
                </div>


                <div class="form-group">
                    <label for="lk_thongTin">Mô Tả</label>
                    <input type="text" class="form-control" id="lk_thongTin" name="lk_thongTin"
                        value="{{ old('lk_thongTin', $lk->lk_chiTiet) }}">
                </div>
                <div class="form-row">

                    <div class="col">
                        <div class="form-group ">
                            <label class="required" for="bh">Loại Bảo Hành</label>
                            <select name="bh_ma"class="form-control selectpicker  col-lg-3" data-style="btn btn-link btn-round">
                                @foreach ($bh as $loai)
                                    @if (old('bh_ma',$loai->bh_ma) == $loai->bh_ma)
                                        <option value="{{ $loai->bh_ma }}" selected>{{ $loai->bh_ten }}
                                        </option>
                                    @else
                                        <option value="{{ $loai->bh_ma }}">{{ $loai->bh_ten }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                    <div class="form-group">
                        <label class="required" for="lk_gia">Giá bán</label>
                        <input required type="text" class="form-control" id="lk_gia" name="lk_gia"
                            value="{{ old('lk_gia', $lk->lk_gia) }}">
                    </div>


                <div class="form-group">
                    <div class="file-loading">
                        <label>Hình đại diện</label>
                        <input id="lk_hinh" type="file" name="lk_hinh" value="{{ old('lk_hinh', $lk->lk_hinh) }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="lk_trangThai " > Trạng thái</label>
                    <select name="lk_trangThai"  class="form-control selectpicker col-lg-3 " data-style="btn btn-link btn-round">
                       <option value="2" {{ old('lk_trangThai',$lk->lk_trangThai) == 2 ? "selected" : "" }}>Khả dụng</option>
                        <option value="1" {{ old('lk_trangThai',$lk->lk_trangThai) == 1 ? "selected" : "" }}>Khóa</option>

                    </select>
                  </div>

                <button class="btn btn-primary btn-block" type="submit">Lưu</button>

            </form>
        </div>
    </div>



@endsection
@section('scripts')

<script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/sortable.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/fileinput.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/locales/fr.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/fas/theme.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.js') }}" type="text/javascript"></script>


    <script>
        $(document).ready(function() {
            $("#lk_hinh").fileinput({
                theme: 'fas',
                showUpload: false,
                showCaption: false,
                browseClass: "btn btn-primary btn-lg",
                fileType: "any",
                append: false,
                showRemove: false,
                autoReplace: true,
                previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
                overwriteInitial: false,
                initialPreviewShowDelete: false,
                initialPreviewAsData: true,
                initialPreview: [
                    "{{ asset('storage/photos/' . $lk->lk_hinh) }}"
                ],
                initialPreviewConfig: [{
                    caption: "{{ $lk->lk_hinh }}",
                    size: {{ Storage::exists('public/photos/' . $lk->lk_hinh) ? Storage::size('public/photos/' . $lk->lk_hinh) : 0 }},
                    width: "120px",
                    url: "{$url}",
                    key: 1
                }, ]
            });
        });
    </script>
@endsection
