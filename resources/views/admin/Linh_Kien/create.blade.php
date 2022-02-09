@extends('admin.layouts.partials.CSSKid')
@section('title')
    Danh Sách Loại Linh Kiện
@endsection
@section('styles')
    <style>
        .img-list {
            width: 100px;
            height: 100px;
        }

    </style>
@endsection
@section('content')
    <a class="btn btn-default" href="{{ route('manager.Linh_Kien.index') }}">
        {{ trans('global.back_to_list') }}
    </a>


    <div class="card">
        <div class="card-header">

        </div>

        <div class="card-body">
            <form method="post" action="{{ route('manager.Linh_Kien.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="col">
                        <div class="form-group ">
                            <label for="llk_ma">Loại Linh Kiện</label>
                            <select class="form-control" data-style="btn btn-link" name="llk_ma" class="form-control">
                                @foreach ($loailinhkien as $loai)
                                    @if (old('llk_ma') == $loai->llk_ma)
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
                            <label for="nsx_ma">Nhà Sản Xuất</label>
                            <select name="nsx_ma" class="form-control ">
                                @foreach ($nsx as $loai)
                                    @if (old('nsx_ma') == $loai->nsx_ma)
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
                    <label for="lk_ten">Tên Linh Kiện</label>
                    <input type="text" class="form-control" id="lk_ten" name="lk_ten" value="{{ old('lk_ten') }}">
                </div>


                <div class="form-group">
                    <label for="lk_thongTin">Mô Tả</label>
                    <input type="text" class="form-control" id="lk_thongTin" name="lk_thongTin"
                        value="{{ old('lk_thongTin') }}">
                </div>
                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label for="lk_gia">Giá bán</label>
                            <input type="text" class="form-control" id="lk_gia" name="lk_gia"
                                value="{{ old('lk_gia') }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group ">
                            <label for="bh">Loại Bảo Hành</label>
                            <select data-style="btn btn-link" name="bh_ma" class="form-control selectpicker ">
                                @foreach ($bh as $loai)
                                    @if (old('bh_ma') == $loai->bh_ma)
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

                {{-- <div class="fileinput fileinput-new text-center" data-provides="fileinput">

                            <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
                            <div>
                                <span class="btn btn-raised btn-round btn-default btn-file">
                                    <span class="fileinput-new">Select image</span>
                                    <span class="fileinput-exists">Change</span>
                                    <input type="file" name="lk_hinh" value="{{ old('lk_hinh') }}>
                                </span>
                                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists"
                                    data-dismiss="fileinput"><i class="fa fa-times"></i> Xóa</a>
                            </div>
                        </div> --}}

                <div class="form-group">
                    <div class="file-loading">
                        <label>Hình đại diện</label>
                        <input id="lk_hinh" type="file" name="lk_hinh">
                    </div>
                </div>
                 <button class="btn btn-primary btn-block" type="submit">Submit</button>

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
            $("#lk_hinh").fileinput({
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
    <script src="{{ asset('vendor/Input-mask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('vendor/input-mask/bindings/inputmask.binding.js') }}"></script>

    <script>
        $(document).ready(function() {


            // Gắn mặt nạ nhập liệu cho các ô nhập liệu Giá bán
            $('#lk_gia').inputmask({
                alias: 'currency',

                numericInput: true,
                groupSeparator: ",",
                suffix: ' vnđ',
                min: 0, // 0 ngàn
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

        });
    </script>

@endsection
