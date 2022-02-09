@extends('admin.homeMG')
@section('title')
    Danh Sách Đơn Bảo Hành
@endsection

@section('content')

    <div style="margin-top:-4%" width="200%">
        <div class="card card-nav-tabs card-plain ">
            <ul class="nav nav-pills nav-pills-icons border-bottom border-dark " role="tablist">
                <li class="nav-item">
                    <a class="nav-link  active  " aria-controls="nav-home" aria-selected="true"
                        data-toggle="tab" href="#link1" role="tablist" aria-expanded="true">
                        Danh Sách Đơn Bảo Hành
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link  " data-toggle="tab" href="#link9" role="tablist"
                        aria-expanded="false">
                        Đơn Quá Hạn
                        <samp style="color: red" id="quahan"></samp>
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

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">


            <div class="collapse" id="collapseExample">
                <div class="card">



                    <div class="card-header text-left ">
                        <div class="btn btn-social btn-fill btn-facebook">
                            <h6 >Thêm Mới Hóa Đơn</h6>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="post" action="{{ route('manager.HoaDon.store') }}"
                                        enctype="multipart/form-data">
                                        {{ csrf_field() }}

                                        <div class="form-row ">
                                            <div class="col">
                                                <div class="form-group row">
                                                    <label for="lhd_ma" class=" col-form-label">Loại Đơn Bảo Hành
                                                        :</label>
                                                    <div class="col-sm-3 ">
                                                        <select name="lhd_ma" data-style="btn btn-primary btn-round"
                                                            class="form-control selectpicker ">
                                                            <option value="1">Bảo Hành</option>
                                                            <option value="2">Sửa Chữa</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                {{-- <div class="form-group row">
                                                    <label for="nv_id" class="col-form-label">Nhân viên xử lý:
                                                    </label>
                                                    <div class="col-lg-5 col-md-6 col-sm-4 ">



                                                        <select class="form-control selectpicker  "
                                                            data-style="btn btn-default" name="nv_id">
                                                            @foreach ($nv as $loai)
                                                                @if (old('nv_id') == $loai->id)
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
                                                </div> --}}
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group align-middle">
                                                    <label class="bmd-label-floating" for="kh_hoTen">Khách Hàng</label>
                                                    <input required type="text" class="form-control " id="kh_hoTen"
                                                        name="kh_hoTen" value="{{ old('kh_hoTen') }}">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating" for="kh_maSoThue">Mã Số Thuế</label>
                                                    <input type="text" class="form-control" id="kh_maSoThue"
                                                        name="kh_maSoThue" value="{{ old('kh_maSoThue') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating" for="kh_dienThoai">Số Điện
                                                        Thoại</label>
                                                    <input required type="number" class="form-control" id="kh_dienThoai"
                                                        name="kh_dienThoai" value="{{ old('kh_dienThoai') }}">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating" for="kh_diaChi">Địa Chỉ</label>
                                                    <input required type="text" class="form-control" id="kh_diaChi"
                                                        name="kh_diaChi" value="{{ old('kh_diaChi') }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label class="bmd-label-floating" for="hd_nhan">Tên Thiết Bị</label>
                                            <input required type="text" class="form-control" id="hd_nhan" name="hd_nhan"
                                                value="{{ old('hd_nhan') }}">
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating" for="hd_gia">Báo Giá </label>
                                                    <input type="number" class="form-control" id="hd_gia" name="hd_gia"
                                                        value="{{ old('hd_gia') }}">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="hd_thoiGianXuLy">Thời Giang Hẹn Trả</label>
                                                    <input required type="date" class="form-control   datepicker"
                                                        id="hd_thoiGianXuLy" name="hd_thoiGianXuLy"
                                                        value="{{ old('hd_thoiGianXuLy'), date('Y-m-d H:i:s') }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="bmd-label-floating" for="hd_ghiChu">Ghi Chú</label>
                                            <textarea class="form-control" name="hd_ghiChu"
                                                id="exampleFormControlTextarea1"
                                                rows="2">{{ old('hd_ghiChu') }}</textarea>
                                        </div>

                                        <button class="btn btn-social btn-fill btn-behance btn-block "
                                            type="submit">Lưu</button>

                                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div  class=" tab-content text-center tab-space">
            <div class="tab-pane active" id="link1" aria-expanded="true">
                <div style="margin-top: -5%"class="card ">
                  <div class="card-header text-left ">
                        {{-- <div class="btn btn-social btn-fill btn-facebook">
                            <h6 >Danh Sách Đơn Bảo Hành</h6>
                        </div> --}}

                    </div>
                    @can('Thêm Đơn Bảo Hành')
                    <div style="margin-left: 80%" class="row">

                        <div class="col-lg-12">
                            <a class="btn btn-success" data-toggle="collapse" href="#collapseExample" aria-expanded="false"
                                aria-controls="collapseExample">
                                Thêm Mới Đơn Bảo Hành
                            </a>
                        </div>

                    </div>
                    @endcan
                    <div class="card-body">
                       
                        <div class="table-responsive">
                            <table id="myTableht"
                                class=" table table-bordered table-striped table-hover datatable datatable-HoaDon display">






                                <thead>
                                    <tr>
                                        <th width="8">

                                        </th>
                                        <th width="50">
                                            ID
                                        </th>
                                        <th>
                                            Khách Hàng
                                        </th>
                                        <th>
                                            Liên hệ
                                        </th>
                                        <th>
                                            Loại Đơn
                                        </th>
                                        <th>
                                            Thiết bị
                                        </th>
                                        <th>
                                            Thời gian nhận
                                        </th>
                                        <th>
                                            Thời gian hẹn
                                        </th>
                                        <th>
                                            Nhân viên nhận
                                        </th>
                                        <th>
                                            Nhân viên sử lý
                                        </th>
                                        <th>
                                            Trạng Thái
                                        </th>
                                        <th>
                                            In
                                        </th>

                                        <th>

                                        </th>
                                    </tr>


                                    <tr>
                                        <th width="10">

                                        </th>
                                        <th width="20">
                                            <input style="width: 100px;" type="
                                            text" id="myInput0" onkeyup="myFunction0()" placeholder="  "
                                            title="Type in a name">
                                        </th>
                                        <th>
                                            <input style="width: 100px;" type="
                                                text" id="myInput3" onkeyup="myFunction3()" placeholder="  "
                                                title="Type in a name">
                                        </th>
                                        <th>
                                            <input style="width: 100px;" type="
                                                text" id="myInput4" onkeyup="myFunction4()" placeholder="  "
                                                title="T điện thoại">
                                        </th>
                                        <th>
                                            <input style="width: 100px;" type="
                                                text" id="myInput10" onkeyup="myFunction10()" placeholder=" "
                                                title="Loại Đơn">
                                        </th>
                                        <th>
                                            <input style="width: 100px;" type="
                                                text" id="myInput5" class="col-13" onkeyup="myFunction5s()"
                                                placeholder="  " title="Thiết bị ">
                                        </th>
                                        <th>
                                            <input style="width: 100px;" type="
                                                text" id="myInput6" onkeyup="myFunction6()" placeholder="  " title="Nhận">
                                        </th>
                                        <th>
                                             <input style="width: 100px;" type="
                                                text" id="myInput7" onkeyup="myFunction7()" placeholder="  " title="Hẹn">
                                        </th>
                                        <th>
                                            <input style="width: 100px;" class="col-15" type="
                                                text" id="myInput8" onkeyup="myFunction8()" placeholder="  "
                                                title="Nhân viên nhận">
                                        </th>
                                        <th>
                                            <input style="width: 100px;" type="
                                                text" id="myInput9" onkeyup="myFunction9()" placeholder="  "
                                                title="Nhân viên sử lý">
                                        </th>
                                        <th>
                                          <select
                                          class=" bnt btn-default text-lg-center" type="button" id="myInput12" onchange="myFunction12()" >

                                                        <option value="Đang Kiểm tra" >
                                                            Đang Kiểm tra
                                                        </option>

                                                        <option value="Đã sửa xong">
                                                            Đã sửa xong
                                                        </option>

                                                        <option value="Hoàn thành đơn">
                                                            Hoàn thành đơn
                                                        </option>

                                                        <option value="Đơn Không sửa được" >
                                                            Đơn Không sửa được
                                                        </option>

                                                        <option value="Đơn đợi linh kiện">
                                                            Đơn đợi linh kiện
                                                        </option>

                                                        <option value="Đơn phân công">
                                                            Đơn phân công
                                                        </option>

                                                        <option value="" selected>
                                                        Mặc Định
                                                        </option>
                                            </select>


                                             {{-- <input style="width: 100px;" type="
                                            text" id="myInput12" onkeyup="myFunction12()"
                                            title="Trạng Thái"> --}}
                                        </th>
                                        <th>

                                        </th>

                                        <th>

                                        </th>
                                    </tr>
                                    <tr >
                                        <th width="8">

                                        </th>
                                        <th width="50">

                                        </th>
                                        <th>

                                        </th>
                                        <th>

                                        </th>
                                        <th>

                                        </th>
                                        <th>

                                        </th>
                                        <th>

                                        </th>
                                        <th>

                                        </th>
                                        <th>

                                        </th>
                                        <th>

                                        </th>
                                        <th>

                                        </th>
                                        <th>

                                        </th>

                                        <th>

                                        </th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <?php $stt = 1; ?>
                                    @foreach ($HoaDon as $key => $HoaDon)
                                        <tr data-entry-id="{{ $HoaDon->hd_ma }}">
                                            <td>

                                            </td>
                                            <td id="myInput{{ $loop->index + 1 }}" title="{{ $HoaDon->hd_ma }}">
                                                {{-- {{ $loop->index + 1 }} --}}{{ $HoaDon->hd_ma }}
                                            </td>
                                            <td>
                                                {{ $HoaDon->kh_hoTen }}
                                            </td>
                                            <td>

                                            <h6>SĐT : {{ $HoaDon->kh_dienThoai }}</h6>
                                              <samp>Địa Chỉ:  {{ $HoaDon->kh_diaChi }}</samp>
                                            </td>
                                            <td>
                                                {{ $HoaDon->lhd_ten }}



                                            </td>
                                            <td>
                                                {{ $HoaDon->hd_nhan }}
                                            </td>

                                            <td>
                                                {{ date('H:i  d/m', strtotime($HoaDon->hd_taoMoi)) }}
                                            </td>
                                            <td>
                                                {{ date('d/m', strtotime($HoaDon->hd_thoiGianXuLy)) }}
                                            </td>
                                            <td>

                                                {{ $HoaDon->nv_nhanTra }}
                                            </td>
                                            <td>

                                                @if ($HoaDon->nv_ma == null)
                                                    <a data-toggle="modal" data-target="#tt1" type="button"
                                                        onclick="myFunction5({{ $HoaDon->hd_ma }})"
                                                        title="{{ $HoaDon->hd_ma }}" style="color: #f0e9e9"
                                                        class="btn btn-facebook">Phân công</a>
                                                @else
                                                    <?php
                                                    $nvpc = DB::table('nhanvien')
                                                        ->where('id', $HoaDon->nv_ma)
                                                        ->first();

                                                    ?>
                                                    {{ $nvpc->nv_hoTen }}
                                                @endif

                                            </td>
                                            <td>
                                                @if ($HoaDon->hd_trangThai == 1)<a value="1"
                                                data-toggle="modal" data-target="#tt" type="button"
                                                onclick="myFunction5({{ $HoaDon->hd_ma }})"
                                                title="{{ $HoaDon->hd_ma }}" style="color: #f0e9e9"
                                                class="btn btn-primary">Đang Kiểm tra</a>
                                        @elseif ($HoaDon->hd_trangThai == 2) <a data-toggle="modal"
                                                onclick="myFunction5({{ $HoaDon->hd_ma }})" data-target="#tt"
                                                style="color: rgba(255, 255, 255, 255)" class="btn  btn-info">Đã sửa xong</a>
                                        @elseif ($HoaDon->hd_trangThai == 3) <a title="{{ $HoaDon->hd_ma }}"
                                                onclick="myFunction5({{ $HoaDon->hd_ma }})"
                                                style="color: rgba(255, 255, 255, 255)" class="btn btn-success">Hoàn thành đơn</a>
                                        @elseif ($HoaDon->hd_trangThai == 4) <a title="{{ $HoaDon->hd_ma }}"
                                                onclick="myFunction5({{ $HoaDon->hd_ma }})" data-toggle="modal"
                                                data-target="#tt" style="color: rgba(255, 255, 255, 255)"
                                                class="btn btn-social btn-fill btn-reddit">Đơn Không sửa được</a>
                                        @elseif ($HoaDon->hd_trangThai == 5) <a title="{{ $HoaDon->hd_ma }}"
                                                onclick="myFunction5({{ $HoaDon->hd_ma }})" data-toggle="modal"
                                                data-target="#tt" style="color: rgba(255, 255, 255, 255)"
                                                class="btn btn-warning">Đơn đợi linh kiện</a>
                                        @elseif ($HoaDon->hd_trangThai == 0) <a title="{{ $HoaDon->hd_ma }}"
                                                data-toggle="modal" data-target="#tt"
                                                style="color: rgba(255, 255, 255, 255)" class="btn btn-facebook">Đơn phân công</a>
                                         @elseif ($HoaDon->hd_trangThai == -1) <a title="{{ $HoaDon->hd_ma }}"
                                                    data-toggle="modal" data-target="#tt"
                                                    style="color: rgba(255, 255, 255, 255)" class="btn btn-facebook">Đang Vận Chuyển</a>
                                                    @elseif ($HoaDon->hd_trangThai == -2) <a title="{{ $HoaDon->hd_ma }}"
                                                        data-toggle="modal" data-target="#tt"
                                                        style="color: rgba(255, 255, 255, 255)" class="btn btn-facebook">Đang Vận Chuyển</a>


                                        @endif



                                            </td>
                                            <td>
                                                @can('In Đơn Bảo Hành')
                                                    <a target="_back" class="btn btn-xs "
                                                        href="{{ route('manager.HoaDon.print', $HoaDon->hd_ma) }}">
                                                        <span class="material-icons">
                                                            print
                                                        </span </a>
                                                    @endcan
                                            </td>
                                            <td>


                                                @can('Cập nhật Đơn Bảo Hành')

                                                    <a class="btn btn-xs btn-info"
                                                        href="{{ route('manager.HoaDon.edit', $HoaDon->hd_ma) }}">
                                                         <span class="material-icons">
                                                            search
                                                         </span>

                                                    </a>
                                                @endcan
                                                @can('Xóa Đơn Bảo Hành')
                                                    <form action="{{ route('manager.HoaDon.destroy', $HoaDon->hd_ma) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Bạn Có Chắc');"
                                                        style="display: inline-block;">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                         <button class="btn btn-xs btn-danger"type="submit"  >
                                                <span class="material-icons">
                                                  delete
                                                 </span>
                                            </button>
                                                    </form>
                                                @endcan
                                            </td>

                                        </tr>
                                        <?php $stt++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal fade bd-example-modal-sm" id="tt" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Trạng Thái Đơn </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <form method="POST" action="{{ route('manager.HoaDon.update1', $HoaDon->hd_ma) }}"
                                    enctype="multipart/form-data">
                                    <input type="hidden" class="d-none" name="_method" value="PUT" />
                                    {{ csrf_field() }}


                                    <textarea type="hidden" class="d-none" name="id" id="cntt"></textarea>
                                    <div class="form-group">
                                        <label class="text-xl-left" style="font-size: 18px;" for="hd_trangThai">Trạng thái đơn : </label>
                                        <select name="hd_trangThai" class="form-control selectpicker "
                                            data-style="btn btn-primary ">

                                            <option value="1"
                                                {{ old('hd_trangThai', $HoaDon->hd_trangThai) == 1 ? 'selected' : '' }}>
                                                Đang Kiểm tra</option>
                                            <option value="2"
                                                {{ old('hd_trangThai', $HoaDon->hd_trangThai) == 2 ? 'selected' : '' }}>
                                                Đã sửa xong</option>
                                            <option value="3"
                                                {{ old('hd_trangThai', $HoaDon->hd_trangThai) == 3 ? 'selected' : '' }}>
                                                Hoàn thành đơn</option>
                                            <option value="4"
                                                {{ old('hd_trangThai', $HoaDon->hd_trangThai) == 4 ? 'selected' : '' }}>
                                                Đơn Không sửa được</option>
                                            <option value="5"
                                                {{ old('hd_trangThai', $HoaDon->hd_trangThai) == 5 ? 'selected' : '' }}>
                                                Đơn đợi linh kiện</option>



                                        </select>

                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="hd_tinhtrang" class="text-center" style="font-size: 18px;">Biện pháp xử lý:</label>
                                        <br>
                                        <textarea required type="text" class="form-control" id="hd_tinhtrang" rows="3"
                                            name="hd_tinhtrang"> {{ old('hd_tinhtrang') }} </textarea>
                                    </div>
                                    <button class=" btn-sm btn  btn-rose  col-lg-6" type="submit">Cập Nhật</button>

                                </form>
                            </div>
                            {{-- phân công --}}

                        </div>

                    </div>
                </div>
                {{-- Phân Công --}}
                <div class="modal fade bd-example-modal-sm" id="tt1" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <form method="POST" action="{{ route('manager.HoaDon.update2', $HoaDon->hd_ma) }}"
                                    enctype="multipart/form-data">
                                    <input type="hidden" class="d-none" name="_method" value="PUT" />
                                    {{ csrf_field() }}


                                    <textarea type="hidden" class="d-none" name="id" id="cntt1"></textarea>
                                    <div class="form-group">

                                        {{-- <?php dd($nv); ?> --}}
                                        <label for="nv_id" class="col-form-label">Nhân viên xử lý:
                                        </label>




                                        <select class="form-control selectpicker  " data-style="btn btn-info" name="nv_id">
                                            @foreach ($nv as $loai)
                                                @if (old('nv_id') == $loai->id)
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

                                    <button class=" btn-sm btn  btn-rose  col-lg-6" type="submit">Cập Nhật</button>

                                </form>
                            </div>
                            {{-- phân công --}}

                        </div>

                    </div>
                </div>
            </div>

            <div class="tab-pane" id="link9" aria-expanded="false">
                <div style="margin-top: -5%" class="card ">
                    <div class="card-header text-left card-header-social card-header-text">
                        {{-- <div class="card-text">
                            <h6 class="card-title">Danh Sách Đơn Quá Hạn</h6>
                        </div> --}}

                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="myTable2"
                                class=" table table-bordered table-striped table-hover datatable datatable-HoaDon">
                                <thead>
                                    <tr>
                                        <th width="10">

                                        </th>
                                        <th width="50">
                                            ID
                                        </th>
                                        <th>
                                            Khách Hàng
                                        </th>
                                        <th>
                                            Liên hệ
                                        </th>
                                        <th>
                                            Loại Đơn
                                        </th>
                                        <th>
                                            Thiết bị
                                        </th>
                                        <th>
                                            Thời gian nhận
                                        </th>
                                        <th>
                                            Thời gian Hẹn
                                        </th>
                                        <th>
                                            Nhân viên sử lý
                                        </th>
                                        <th>
                                            Trạng Thái
                                        </th>
                                        <th>
                                            In
                                        </th>

                                        <th>

                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $stt = 1; ?>
                                    @foreach ($dsth as $key => $HoaDon)
                                        <tr data-entry-id="{{ $HoaDon->hd_ma }}">
                                            <td>

                                            </td>
                                            <td id="myInput{{ $loop->index + 1 }}" title="{{ $HoaDon->hd_ma }}">
                                                {{-- {{ $loop->index + 1 }} --}}{{ $HoaDon->hd_ma }}
                                            </td>
                                            <td>
                                                {{ $HoaDon->kh_hoTen }}
                                            </td>
                                            <td>

                                            <h6>SĐT : {{ $HoaDon->kh_dienThoai }}</h6>
                                              <samp>Địa Chỉ:  {{ $HoaDon->kh_diaChi }}</samp>
                                            </td>
                                            <td>
                                                {{ $HoaDon->lhd_ten }}



                                            </td>
                                            <td>
                                                {{ $HoaDon->hd_nhan }}
                                            </td>
                                            <td>
                                                {{ date('H:i d/m', strtotime($HoaDon->hd_taoMoi)) }}
                                            </td>
                                            <td>
                                                {{ date('d-m', strtotime($HoaDon->hd_thoiGianXuLy)) }}
                                            </td>
                                            <td>
                                                @if ($HoaDon->nv_ma == null)
                                                <a data-toggle="modal" data-target="#tt1" type="button"
                                                    onclick="myFunction5({{ $HoaDon->hd_ma }})"
                                                    title="{{ $HoaDon->hd_ma }}" style="color: #f0e9e9"
                                                    class="btn btn-facebook">Phân công</a>
                                            @else
                                                <?php
                                                $nvpc = DB::table('nhanvien')
                                                    ->where('id', $HoaDon->nv_ma)
                                                    ->first();

                                                ?>
                                                {{ $nvpc->nv_hoTen }}
                                            @endif
                                            </td>
                                            <td>
                                                @if ($HoaDon->hd_trangThai == 1) <a
                                                        data-toggle="modal" data-target="#tta" type="button"
                                                        onclick="myFunction5({{ $HoaDon->hd_ma }})"
                                                        title="{{ $HoaDon->hd_ma }}" style="color: #f0e9e9"
                                                        class="btn btn-primary">Đang Kiểm tra</a>
                                                @elseif ($HoaDon->hd_trangThai == 2) <a data-toggle="modal"
                                                        onclick="myFunction5({{ $HoaDon->hd_ma }})" data-target="#tta"
                                                        style="color: rgba(255, 255, 255, 255)" class="btn  btn-info"> Đã
                                                        sửa xong</a>
                                                @elseif ($HoaDon->hd_trangThai == 3) <a title="{{ $HoaDon->hd_ma }}"
                                                        onclick="myFunction5({{ $HoaDon->hd_ma }})"
                                                        style="color: rgba(255, 255, 255, 255)"
                                                        class="btn btn-success">Hoàn
                                                        thành đơn</a>
                                                @elseif ($HoaDon->hd_trangThai == 4) <a title="{{ $HoaDon->hd_ma }}"
                                                        onclick="myFunction5({{ $HoaDon->hd_ma }})" data-toggle="modal"
                                                        data-target="#tta" style="color: rgba(255, 255, 255, 255)"
                                                        class="btn btn-social btn-fill btn-reddit">Đơn Không sửa được</a>
                                                @elseif ($HoaDon->hd_trangThai == 5) <a title="{{ $HoaDon->hd_ma }}"
                                                        onclick="myFunction5({{ $HoaDon->hd_ma }})" data-toggle="modal"
                                                        data-target="#tta" style="color: rgba(255, 255, 255, 255)"
                                                        class="btn btn-warning">Đơn đợi linh kiện</a>
                                                        @elseif ($HoaDon->hd_trangThai == -1) <a title="{{ $HoaDon->hd_ma }}"
                                                            onclick="myFunction5({{ $HoaDon->hd_ma }})" data-toggle="modal"
                                                            data-target="#tta" style="color: rgba(255, 255, 255, 255)"
                                                            class="btn btn-warning">Đơn đợi linh kiện</a>
                                                @else <a title="{{ $HoaDon->hd_ma }}" onclick="myFunction5()"
                                                        style="color: rgba(255, 255, 255, 255)"
                                                        class="btn btn-social btn-fill btn-google">Đã Hoàn trả cho
                                                        khách</a>

                                                @endif



                                            </td>
                                            <td>
                                                @can('In Đơn Bảo Hành')
                                                    <a target="_back" class="btn btn-xs "
                                                        href="{{ route('manager.HoaDon.print', $HoaDon->hd_ma) }}">
                                                        <span class="material-icons">
                                                            print
                                                        </span </a>
                                                    @endcan
                                            </td>
                                            <td>


                                                @can('Cập nhật Đơn Bảo Hành')

                                                    <a class="btn btn-xs btn-info"
                                                        href="{{ route('manager.HoaDon.edit', $HoaDon->hd_ma) }}">
                                                        <span class="material-icons">
                                                            search
                                                         </span>
                                                    </a>
                                                @endcan
                                                @can('Xóa Đơn Bảo Hành')
                                                    <form action="{{ route('manager.HoaDon.destroy', $HoaDon->hd_ma) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Bạn có chắc muốn xóa ?');"
                                                        style="display: inline-block;">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                         <button class="btn btn-xs btn-danger"type="submit"  >
                                                <span class="material-icons">
                                                  delete
                                                 </span>
                                            </button>
                                                    </form>
                                                @endcan
                                            </td>

                                        </tr>
                                        <?php $stt++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal fade bd-example-modal-sm" id="tta" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Linh Kiện
                                    Yêu Cầu </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <form method="POST" action="{{ route('manager.HoaDon.update1', $HoaDon->hd_ma) }}"
                                    enctype="multipart/form-data">
                                    <input type="hidden" class="d-none" name="_method" value="PUT" />
                                    {{ csrf_field() }}


                                    <textarea type="hidden" class="d-none" name="id" id="ctta"></textarea>
                                    <div class="form-group">

                                        <select name="hd_trangThai" class="form-control selectpicker "
                                            data-style="btn btn-primary ">

                                            <option value="1"
                                                {{ old('hd_trangThai', $HoaDon->hd_trangThai) == 1 ? 'selected' : '' }}>
                                                Đang Kiểm tra</option>
                                            <option value="2"
                                                {{ old('hd_trangThai', $HoaDon->hd_trangThai) == 2 ? 'selected' : '' }}>
                                                Đã sửa xong</option>
                                            <option value="3"
                                                {{ old('hd_trangThai', $HoaDon->hd_trangThai) == 3 ? 'selected' : '' }}>
                                                Hoàn thành đơn</option>
                                            <option value="4"
                                                {{ old('hd_trangThai', $HoaDon->hd_trangThai) == 4 ? 'selected' : '' }}>
                                                Đơn Không sửa được</option>
                                            <option value="5"
                                                {{ old('hd_trangThai', $HoaDon->hd_trangThai) == 5 ? 'selected' : '' }}>
                                                Đơn đợi linh kiện</option>
                                            <option value="6"
                                                {{ old('hd_trangThai', $HoaDon->hd_trangThai) == 6 ? 'selected' : '' }}>
                                                Đã Hoàn
                                                trả cho khách hàng</option>


                                        </select>
                                    </div>

                                    <button class=" btn-sm btn  btn-rose  col-lg-6" type="submit">Cập Nhật</button>

                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>





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
                pageLength: 50,
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

    <script>
        document.getElementById("quahan").onload = myFunction2();

        function myFunction2() {

            table = document.getElementById("myTable2");
            tr = table.getElementsByTagName("tr");
            d = tr.length - 1;
            document.getElementById("quahan").innerHTML = d;
            filter = input.value.toUpperCase();

        }
    </script>
    <script>
        function myFunction3() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput3");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTableht");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
    <script>
        function myFunction4() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput4");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTableht");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[3];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
    <script>
        function myFunction5s() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput5");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTableht");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[5];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
    <script>
        function myFunction6() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput6");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTableht");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[6];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
    <script>
        function myFunction7() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput7");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTableht");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[7];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
    <script>
        function myFunction8() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput8");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTableht");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[8];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
    <script>
        function myFunction9() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput9");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTableht");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[9];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
    <script>
        function myFunction10() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput10");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTableht");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[4];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
    <script>
        function myFunction12() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput12");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTableht");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[10];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
  <script>
    function myFunction0() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput0");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTableht");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>

{{-- trang thai --}}
<script>
    function myFunction20() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput20");
        var x = document.getElementById("myInput20").value;
        document.getElementById("demo").innerHTML = x ;
        filter = input.value.toUpperCase();
        table = document.getElementById("myTableht");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[10];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

</script>
@endsection
