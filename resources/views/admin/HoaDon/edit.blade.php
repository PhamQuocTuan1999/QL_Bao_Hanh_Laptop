@extends('admin.CSSKid')
@section('title')
    Đơn Bảo Hành/Sửa Chữa
@endsection

@section('content')
    @foreach ($dbs as $db)


        <div style="margin-top:-5%">
            <div class="card card-nav-tabs card-plain ">
                <ul class="nav nav-pills nav-pills-icons border-bottom border-dark" role="tablist">
                    <li style="margin-left: 30%">


                    <a class="btn btn-default" href="{{ route('manager.HoaDon.index') }}">
                        <span class="material-icons">
                            keyboard_backspace
                        </span> Về Menu chính
                    </a>

                        @can('Xóa Đơn Bảo Hành')


                        <form action="{{ route('manager.HoaDon.destroy', $hd->hd_ma) }}" method="POST"
                            onsubmit="return confirm('Bạn có chắc muốn xóa đơn');" style="display: inline-block;">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="btn btn-danger" value="Xóa Đơn">

                        </form>
                        @endcan
                        @can('In Đơn Bảo Hành')


                        <a target="_back" class="btn btn-primary" href="{{ route('manager.HoaDon.print', $hd->hd_ma) }}">
                            <span class="material-icons">
                                print
                            </span> In Đơn
                        </a>
                        @endcan
                        @can('Thêm Linh Kiện Hóa Đơn')
                        @if (($db->hd_trangThai == 3)or($db->hd_trangThai == 6))

                        @else


                        <a class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
                            <span style="color: white" class="material-icons">
                                loupe
                            </span> <samp style="color: white"> Yêu Cầu Linh Kiện</samp>
                        </a>
                        <a class="btn btn-success" data-toggle="modal" data-target="#exampleModal1">
                            <span style="color: white" class="material-icons">
                                loupe
                            </span> <samp style="color: white">Linh Kiện Của Đơn</samp>
                        </a>
                        @endif
                        @endcan


                        @can('Giảm Giá')
                        @if ($db->lhd_ma == 2)
                            <a class="btn btn-warning" data-toggle="modal" data-target="#exampleModal2">
                                <span style="color: white" class="material-icons">
                                    money_off_csred
                                </span> <samp style="color: white">Giảm giá</samp>
                            </a>
                        @else

                        @endif
                        @endcan
                    </li>


                </ul>
            </div>

            {{--  --}}
            <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" id="exampleModal2"
                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Giảm Giá theo % </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="POST" action="{{ route('manager.HoaDon.sale', $hd->hd_ma) }}"
                            enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT" />
                            {{ csrf_field() }}

                            <input type="hidden" name="hd_ma" value="{{ $hd->hd_ma }}" />



                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group align-middle">

                                        <input required type="number" class="form-control text-center" min="0"
                                            id="cthd_soLuong" name="giamgia" value="{{ old('giamgia') }}">

                                    </div>
                                </div>

                            </div>







                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>

                                <button class="btn btn-social btn-fill btn-behance btn-block " type="submit">Lưu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{--  --}}
            <div class="modal fade bd-example-modal-lg" id="exampleModal1" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Linh Kiện Yêu Cần </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table class=" table table-bordered table-striped table-hover datatable datatable-HoaDon">
                                <thead>
                                    <tr class="text-center">
                                        <th width="10">

                                        </th>
                                        <th width="50">
                                            ID
                                        </th>
                                        <th>
                                            Tên Linh Kiên
                                        </th>
                                        <th>
                                            Số Lượng
                                        </th>


                                        <th>

                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $stt = 1; ?>
                                    @foreach ($linhkienhd as $key => $cthd)
                                        <tr data-entry-id="{{ $cthd->cthd_ma }}">
                                            <td>

                                            </td>
                                            <td class="text-center">
                                                {{ $loop->index + 1 }}
                                            </td>
                                            <td>
                                                {{ $cthd->lk_ten }}
                                            </td>
                                            <td class="text-center">
                                                {{ $cthd->cthd_soLuong }}
                                            </td>

                                            <td>


                                                {{-- <a class="btn btn-xs btn-info"
                                                href="{{ route('manager.HoaDon.edit', $cthd->cthd_ma) }}">
                                                Cập nhật
                                            </a> --}}
                                                <form action="{{ route('manager.LinhKienHD.destroy', $cthd->cthd_ma) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Bạn có chắc muốn xóa linh kiện');"
                                                    style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                    <button class="btn btn-sm btn-danger"type="submit"  >
                                                        <span class="material-icons">
                                                          delete
                                                         </span>
                                                    </button>
                                                </form>
                                            </td>

                                        </tr>
                                        <?php $stt++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Linh Kiện Yêu Cầu </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body"  >
                            <form method="post" action="{{ route('manager.LinhKienHD.store') }}"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}


                                <input type="hidden" name="hd_ma" value="{{ $hd->hd_ma }}" />

                                <div class="form-row ">
                                    <div class="col">
                                        <div class="form-group right-0  " >
                                            <label for="lk_ma"> Linh Kiện : </label>
                                            <select class="form-control selectpicker " id="lk"
                                                data-style="btn btn-link btn-round" name="lk_ma">
                                                @foreach ($lk as $loai)
                                                    @if (old('lk_ma') == $loai->lk_ma)
                                                        <option value="{{ $loai->lk_ma }}" selected>
                                                            {{ $loai->lk_ten }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $loai->lk_ma }}">{{ $loai->lk_ten }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>




                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group align-middle " >
                                            <label class="bmd-label-floating " for="cthd_soLuong">Số lượng </label>
                                            <input min="0" required type="number" class="form-control  text-lg-right" id="cthd_soLuong"
                                                name="cthd_soLuong" value="{{ old('cthd_soLuong') }}">
                                        </div>
                                    </div>

                                </div>






                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>

                                    <button class="btn btn-social btn-fill btn-behance btn-block " type="submit">Lưu</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            {{--  --}}
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
            <div style="margin-bottom: 10px;" class="row">
                <div class="col-lg-12">


                    <div>
                        <div class="card">
                            <div class="card-header text-left  ">

                                <div class="btn btn-social btn-fill btn-facebook">
                                    <h6 class="">Đơn
                                        {{ $db->lhd_ten }}
                                    </h6>
                                </div>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('manager.HoaDon.update', $hd->hd_ma) }}"
                                    enctype="multipart/form-data">
                                    <input type="hidden" name="_method" value="PUT" />
                                    {{ csrf_field() }}

                                    <input type="hidden" name="id" value="{{ $hd->kh_ma }}" />

                                    @unlessrole('Kỹ Thuật Viên')
                                    <div class="form-row ">
                                        <div class="col">
                                            <div class="form-group row">
                                                <label for="lhd_ma" class=" col-form-label">Loại Hóa Đơn :</label>
                                                <div class="col-sm-3 ">
                                                    <select name="lhd_ma" data-style="btn btn-info"
                                                        class="form-control selectpicker  ">

                                                        @foreach ($lhd as $loai)
                                                            @if (old('lhd_ma', $loai->lhd_ma) == $hd->lhd_ma)
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
                                        @can('Phân Công Nhân Viên Sử Lý')


                                        <div class="col">
                                            <div class="form-group row">
                                                <label for="nv_id" class="col-form-label">Nhân viên xử lý: </label>
                                                <div class="col-sm-5 ">



                                                    <select class="form-control selectpicker  " data-style="btn  btn-info"
                                                        name="nv_id">
                                                        @foreach ($nv as $loai)
                                                            @if ( $loai->id == $hd->nv_ma)
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
                                        @endcan
                                    </div>
                        @else
                        {{--  --}}
                        <input type="hidden" name="lhd_ma" value="{{ $db->lhd_ma }}" />
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
                                                            @if (old('lhd_ma', $loai->lhd_ma) == $hd->lhd_ma)
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
                                                            @if ( $loai->id == $hd->nv_ma)
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
                                </fieldset>

                                    @endhasrole
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group align-middle">
                                                <label for="kh_hoTen">Khách Hàng</label>
                                                <input required type="text" class="form-control" id="kh_hoTen"
                                                    name="kh_hoTen" value="{{ old('kh_hoTen', $db->kh_hoTen) }}">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="kh_maSoThue">Mã Số Thuế</label>
                                                <input type="text" class="form-control" id="kh_maSoThue"
                                                    name="kh_maSoThue"
                                                    value="{{ old('kh_maSoThue', $db->kh_maSoThue) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="kh_dienThoai">Số Điện Thoại</label>
                                                <input required type="text" class="form-control" id="kh_dienThoai"
                                                    name="kh_dienThoai"
                                                    value="{{ old('kh_dienThoai', $db->kh_dienThoai) }}">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="kh_diaChi">Địa Chỉ</label>
                                                <input required type="text" class="form-control" id="kh_diaChi"
                                                    name="kh_diaChi" value="{{ old('kh_diaChi', $db->kh_diaChi) }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="hd_nhan">Tên Thiết Bị</label>
                                        <input required type="text" class="form-control" id="hd_nhan" name="hd_nhan"
                                            value="{{ old('hd_nhan', $db->hd_nhan) }}">
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="hd_gia">Báo Giá</label>
                                                <input type="number" class="form-control" id="hd_gia" name="hd_gia"
                                                    value="{{ old('hd_gia', $db->hd_gia) }}">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="hd_thoiGianXuLy">Thời Giang Hẹn Trả</label>
                                                <input required type="text" class="form-control" id="hd_thoiGianXuLy"
                                                    name="hd_thoiGianXuLy"
                                                    value="  {{ date('Y-m-d', strtotime($db->hd_thoiGianXuLy)) }}">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="hd_ghiChu">Ghi Chú</label>
                                        <input required type="text" class="form-control" id="hd_ghiChu" name="hd_ghiChu"
                                            value="{{ old('hd_ghiChu', $db->hd_ghiChu) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="hd_tinhtrang">Biện pháp xử lý</label>
                                        <textarea required type="text" class="form-control" id="hd_tinhtrang" rows="3"
                                            name="hd_tinhtrang"> {{ old('hd_tinhtrang', $db->hd_tinhtrang) }} </textarea>
                                    </div>

                                    <div class="form-group">
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
                                                {{ old('hd_trangThai', $db->hd_trangThai) == 0 ? 'selected' : '' }}> Đã
                                                Đợi Phân Công</option>
                                        </select>
                                    </div>

                                    @if (($db->hd_trangThai == 3))

                                    @else
                                    <button class="btn btn-social btn-fill btn-behance btn-block col-lg-2" type="submit">Cập Nhật</button>

                                    @endif

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--  --}}
    @endforeach

@endsection

@section('scripts')
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
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)




            $.extend(true, $.fn.dataTable.defaults, {
                order: [
                    [1, 'desc']
                ],
                pageLength: 50,
            });
            $('.datatable-Room:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })
    </script>

    <script>

    </script>

@endsection
