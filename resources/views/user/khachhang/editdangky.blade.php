@extends('user.khachhang.app')
@section('title')
    Danh Sách Đơn Bảo Hành
@endsection
@section('styles')
<!-- Các css dành cho thư viện bootstrap-fileinput -->
<link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css"/>
@endsection
@section('content')

    <div>
        <div class="card card-nav-tabs card-plain ">
            <ul class="nav nav-pills nav-pills-icons border-bottom border-dark " role="tablist">
                <li class="nav-item">
                    <a class="nav-link active " aria-controls="nav-home" aria-selected="true"
                        data-toggle="tab" href="#link1" role="tablist" aria-expanded="true">
                        Danh Sách Đơn Gửi Từ Xa
                    </a>
                </li>
            </ul>
        </div>
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
    @foreach ($HoaDon as $HoaDon)
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">


            <div>
                <div class="card">
                    <div class="card-header text-left  ">

                        <div class="btn btn-social btn-fill btn-facebook">
                            <h6 class="">Đơn
                                {{ $HoaDon->lhd_ten }}
                            </h6>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('orders.update',  $HoaDon->hd_ma) }}"
                            enctype="multipart/form-data">
                            {{-- <input type="hidden" name="_method" value="PUT"/> --}}
                            {{ csrf_field() }}

                            <input type="hidden" name="id" value="{{  $HoaDon->kh_ma }}" />


                            <div class="form-row ">
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="lhd_ma" class=" col-form-label">Loại Dịch Vụ :</label>
                                        <div class="col-sm-3 ">
                                            <select name="lhd_ma" data-style="btn btn-info"
                                                class="form-control selectpicker  ">

                                                @foreach ($lhd as $loai)
                                                    @if (old('lhd_ma', $loai->lhd_ma) ==  $HoaDon->lhd_ma)
                                                        <option value="{{ $loai->lhd_ma }}" selected>
                                                            {{ $loai->lhd_ten }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $loai->lhd_ma }}">
                                                            {{ $loai->lhd_ten }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>





                            </div>

                {{--  --}}
                {{-- <input type="hidden" name="lhd_ma" value="{{ $db->lhd_ma }}" />
                <input type="hidden" name="nv_id" value="{{ $db->nv_ma }}" />
                        <fieldset disabled>
                            <div class="form-row ">
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="lhd_ma1" class=" col-form-label">Loại Hóa Đơn :</label>
                                        <div class="col-sm-3 ">

                                            <select name="lhd_ma1"  id="disabledSelect" data-style=" btn-info "
                                                class="form-control selectpicker  " value="{{ old('lhd_ma', $db->lhd_ma) }}">

                                                @foreach ($lhd as $loai)
                                                    @if (old('lhd_ma', $loai->lhd_ma) ==  $HoaDon->lhd_ma)
                                                        <option value="{{ $loai->lhd_ma }}" selected>
                                                            {{ $loai->lhd_ten }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $loai->lhd_ma }}">
                                                            {{ $loai->lhd_ten }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="nv_id" class="col-form-label">Nhân viên xử lý: </label>
                                        <div class="col-sm-5 ">



                                            <select class="form-control selectpicker  "  data-style="btn  btn-info"
                                                name="nv_id1">
                                                @foreach ($nv as $loai)
                                                    @if ( $loai->id ==  $HoaDon->nv_ma)
                                                        <option value="{{ $loai->id }}" selected>
                                                            {{ $loai->nv_hoTen }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $loai->id }}">
                                                            {{ $loai->nv_hoTen }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </fieldset> --}}


                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group align-middle">
                                        <label for="kh_hoTen">Khách Hàng</label>
                                        <input required type="text" class="form-control" id="kh_hoTen"
                                            name="kh_hoTen" value="{{ old('kh_hoTen', Auth::user()->kh_hoTen) }}">
                                    </div>
                                </div>
                                {{-- <div class="col">
                                    <div class="form-group">
                                        <label for="kh_maSoThue">Mã Số Thuế</label>
                                        <input type="text" class="form-control" id="kh_maSoThue"
                                            name="kh_maSoThue"
                                            value="{{ old('kh_maSoThue', Auth::user()->kh_maSoThue) }}">
                                    </div>
                                </div> --}}
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="kh_dienThoai">Số Điện Thoại</label>
                                        <input required type="text" class="form-control" id="kh_dienThoai"
                                            name="kh_dienThoai"
                                            value="{{ old('kh_dienThoai', Auth::user()->kh_dienThoai) }}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="kh_diaChi">Địa Chỉ</label>
                                        <input required type="text" class="form-control" id="kh_diaChi"
                                            name="kh_diaChi" value="{{ old('kh_diaChi', Auth::user()->kh_diaChi) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="hd_nhan">Tên Thiết Bị</label>
                                <input required type="text" class="form-control" id="hd_nhan" name="hd_nhan"
                                    value="{{ old('hd_nhan',  $HoaDon->hd_nhan) }}">
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="hd_gia"> Đơn Vị Vận Chuyển</label>
                                        <input type="text" class="form-control" id="dvvc" name="dvvc"
                                            value="{{ old('dvvc',  $HoaDon->ctvc_dvvc) }}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="ngay_gui">Ngày Gửi</label>
                                        <input required type="datetime"  data-date-format="DD MMMM YYYY"class="form-control" id="ngay_gui"
                                            name="ngay_gui"
                                            value="  {{ date('Y-m-d', strtotime( $HoaDon->ctvc_ngayGui)) }}">
                                            {{--  value="  {{ date('Y-m-d', strtotime( $HoaDon->ctvc_ngayGui)) }}"> --}}
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="hd_ghiChu">Ghi Chú</label>
                                <input required type="text" class="form-control" id="hd_ghiChu" name="hd_ghiChu"
                                    value="{{ old('hd_ghiChu',  $HoaDon->hd_ghiChu) }}">
                            </div>

                            <div class="form-group">
                                <div class="file-loading">
                                    <label>Hình đại diện</label>
                                    <input id="ctvc_hinh" type="file" name="ctvc_hinh" value="{{ old('lk_hinh', $HoaDon->ctvc_hinh) }}">
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <label for="hd_trangThai">Trạng thái đơn : </label>
                                <select name="hd_trangThai" class="form-control selectpicker col-lg-2"
                                    data-style="btn btn-social btn-fill btn-github ">

                                    <option value="1"
                                        {{ old('hd_trangThai', $db->hd_trangThai) == 1 ? 'selected' : '' }}>Đang
                                        Kiểm tra</option>
                                    <option value="2"
                                        {{ old('hd_trangThai', $db->hd_trangThai) == 2 ? 'selected' : '' }}>Đã
                                        sửa xong</option>
                                    <option value="3"
                                        {{ old('hd_trangThai', $db->hd_trangThai) == 3? 'selected' : '' }}>Hoàn
                                        thành đơn</option>
                                    <option value="4"
                                        {{ old('hd_trangThai', $db->hd_trangThai) == 4 ? 'selected' : '' }}> Đơn
                                        Không sửa được</option>
                                    <option value="5"
                                        {{ old('hd_trangThai', $db->hd_trangThai) == 5 ? 'selected' : '' }}>Đơn
                                        đợi linh kiện</option>
                                    <option value="6"
                                        {{ old('hd_trangThai', $db->hd_trangThai) == 6 ? 'selected' : '' }}> Đã
                                        Hoàn trả cho khách hàng</option>
                                        <option value="6"
                                        {{ old('hd_trangThai', $db->hd_trangThai) == 0 ? 'selected' : '' }}> Đã
                                        Đợi Phân Công</option>
                                </select>
                            </div> --}}

                            @if (( $HoaDon->hd_trangThai == -1))

                            <table>
                                <th width="100">
                                    <button class="btn btn-social btn-lg btn-behance btn-block " type="submit">Cập Nhật</button>
                                </th>
                                {{-- <th>
                                    <form action="{{ route('user.destroy', $HoaDon->hd_ma) }}"
                                        method="POST"
                                        onsubmit="return confirm('Bạn có chắc muốn xóa');"
                                        style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button class="btn btn-lg btn-danger"type="submit"  >
                                            <span class="material-icons">
                                              delete
                                             </span>
                                        </button>
                                    </form>
                                </th> --}}
                            </table>


                            @else


                            @endif

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endforeach

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
            $("#ctvc_hinh").fileinput({
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
                    "{{ asset('storage/photos/' . $HoaDon->ctvc_hinh) }}"
                ],
                initialPreviewConfig: [{
                    caption: "{{ $HoaDon->ctvc_hinh }}",
                    size: {{ Storage::exists('public/photos/' . $HoaDon->ctvc_hinh) ? Storage::size('public/photos/' . $HoaDon->ctvc_hinh) : 0 }},
                    width: "120px",
                    url: "{$url}",
                    key: 1
                }, ]
            });
        });
    </script>
    <script>
        window.onload = myFunction1()

        function myFunction1() {
            var element, name, arr;
            element = document.getElementById("id6");
            name = "active";
            arr = element.className.split(" ");
            if (arr.indexOf(name) == -1) {
                element.className += " " + name;
            }
        }
    </script>
    <script>
        function myFunction5(c) {
            var x = document.getElementsByTagName("td")[0].id;
            var x = document.getElementById("myInput2").innerText;

            document.getElementById("cntt").innerHTML = c;
            document.getElementById("cntt1").innerHTML = c;
            document.getElementById("cntt2").innerHTML = c;
            document.getElementById("cntt3").innerHTML = c;
            document.getElementById("cntt4").innerHTML = c;

            document.getElementById("cntt6").innerHTML = c;
            document.getElementById("cntt7").innerHTML = c;
            document.getElementById("cntt8").innerHTML = c;
            document.getElementById("ctta").innerHTML = c;

        }
    </script>
    <script>
        $(function() {

            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

            $.extend(true, $.fn.dataTable.defaults, {
                order: [
                    [1, 'desc']
                ],
                pageLength: 10,
            });
            $('.datatable-HoaDon:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })

            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })
    </script>



@endsection
