@extends('admin.homeMG')
@section('title')
    Danh Sách Đơn Bảo Hành
@endsection

@section('content')

    <div style="margin-top:-4%">
        <div class="card card-nav-tabs card-plain ">
            <ul class="nav nav-pills nav-pills-icons border-bottom border-dark" role="tablist">
                <li class="nav-item">
                    <a class="nav-link  active btn-outline-danger " aria-controls="nav-home" aria-selected="true"
                        data-toggle="tab" href="#link1" role="tablist" aria-expanded="true">
                        Danh Sách Đơn Bảo Hành
                    </a>
                </li>
                @can('Thêm Đơn Bảo Hành')
                <li class="nav-item">
                    <a class="nav-link btn-outline-danger" data-toggle="tab" href="#link2" role="tablist"
                        aria-expanded="false">
                        Tạo Đơn Bảo Hành
                    </a>
                </li>
                @endcan
                <li class="nav-item">
                    <a class="nav-link btn-outline-danger" data-toggle="tab" href="#link3" role="tablist"
                        aria-expanded="false">
                        Đang Kiểm Tra
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn-outline-danger" data-toggle="tab" href="#link7" role="tablist"
                        aria-expanded="false">
                        Đơn đợi linh kiện
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link btn-outline-danger" data-toggle="tab" href="#link4" role="tablist"
                        aria-expanded="false">
                        Đã Sửa Xong
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn-outline-danger" data-toggle="tab" href="#link5" role="tablist"
                        aria-expanded="false">
                        Đơn Đã Hoàn Thành
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn-outline-danger" data-toggle="tab" href="#link6" role="tablist"
                        aria-expanded="false">
                        Đơn Không sửa được
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link btn-outline-danger" data-toggle="tab" href="#link8" role="tablist"
                        aria-expanded="false">
                        Đã Hoàn
                        trả cho khách hàng
                    </a>
                </li>
            </ul>
        </div>
        <div class="tab-content text-center tab-space">
            <div class="tab-pane active" id="link1" aria-expanded="true">
                <div class="card ">
                    <div class="card-header text-left card-header-social card-header-text">
                        <div class="card-text">
                            <h6 class="card-title" id="demo">Danh Sách Đơn Bảo Hành</h6>
                        </div>
                        >
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class=" table table-bordered table-striped table-hover datatable datatable-HoaDon">
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
                                            Số điện Thoại
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
                                                {{ $HoaDon->kh_dienThoai }}
                                            </td>
                                            <td>
                                                @if ($HoaDon->lhd_ma = 1) Bảo Hành
                                                @else Sửa chữa
                                                @endif

                                            </td>
                                            <td>
                                                {{ $HoaDon->hd_nhan }}
                                            </td>
                                            <td>
                                                {{ date('H:i/d-m', strtotime($HoaDon->hd_taoMoi)) }}
                                            </td>
                                            <td>
                                                {{ $HoaDon->nv_hoTen }}
                                            </td>
                                            <td>
                                                @if ($HoaDon->hd_trangThai == 1) <a
                                                        data-toggle="modal" data-target="#tt" type="button"
                                                        onclick="myFunction5({{ $HoaDon->hd_ma }})"
                                                        title="{{ $HoaDon->hd_ma }}" style="color: #f0e9e9"
                                                        class="btn btn-primary">Đang Kiểm tra</a>
                                                @elseif ($HoaDon->hd_trangThai == 2) <a data-toggle="modal"
                                                        onclick="myFunction5({{ $HoaDon->hd_ma }})" data-target="#tt"
                                                        style="color: rgba(255, 255, 255, 255)" class="btn  btn-info"> Đã
                                                        sửa xong</a>
                                                @elseif ($HoaDon->hd_trangThai == 3) <a title="{{ $HoaDon->hd_ma }}"
                                                        onclick="myFunction5({{ $HoaDon->hd_ma }})"
                                                        style="color: rgba(255, 255, 255, 255)" class="btn btn-success">Hoàn
                                                        thành đơn</a>
                                                @elseif ($HoaDon->hd_trangThai == 4) <a title="{{ $HoaDon->hd_ma }}"
                                                        onclick="myFunction5({{ $HoaDon->hd_ma }})" data-toggle="modal"
                                                        data-target="#tt" style="color: rgba(255, 255, 255, 255)"
                                                        class="btn btn-social btn-fill btn-reddit">Đơn Không sửa được</a>
                                                @elseif ($HoaDon->hd_trangThai == 5) <a title="{{ $HoaDon->hd_ma }}"
                                                        onclick="myFunction5({{ $HoaDon->hd_ma }})" data-toggle="modal"
                                                        data-target="#tt" style="color: rgba(255, 255, 255, 255)"
                                                        class="btn btn-warning">Đơn đợi linh kiện</a>
                                                @else <a title="{{ $HoaDon->hd_ma }}" onclick="myFunction5()"
                                                        style="color: rgba(255, 255, 255, 255)"
                                                        class="btn btn-social btn-fill btn-google">Đã Hoàn trả cho khách</a>

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
                                                    Xem đơn
                                                </a>
                                                @endcan
                                                @can('Xóa Đơn Bảo Hành')
                                                <form action="{{ route('manager.HoaDon.destroy', $HoaDon->hd_ma) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                    style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="Xóa">
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


                                    <textarea type="hidden" class="d-none" name="id" id="cntt"></textarea>
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
            <div class="tab-pane text-left" id="link2" aria-expanded="false">
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
                                <div class="card-header text-left card-header-social card-header-text">
                                    <div class="card-text">
                                        <h6 class="card-title">Tạo Đơn Bảo Hành</h6>
                                    </div>
                                </div>
                                <div class="card-body ">
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
                                                <div class="form-group row">
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
                                                </div>
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
                                                    <input required type="text" class="form-control" id="kh_dienThoai"
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
                                                    <input type="text" class="form-control" id="hd_gia" name="hd_gia"
                                                        value="{{ old('hd_gia') }}">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="hd_thoiGianXuLy">Thời Giang Hẹn Trả</label>
                                                    <input required type="datetime-local" class="form-control   datepicker"
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

                                        <button class="btn btn-rose btn-block " type="submit">Lưu</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="link3" aria-expanded="false">
                <div class="card ">
                    <div class="card-header text-left card-header-social card-header-text">
                        <div class="card-text">
                            <h6 class="card-title">Danh Sách Đang Sửa</h6>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class=" table table-bordered table-striped table-hover datatable datatable-HoaDon">
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
                                            Số điện Thoại
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
                                    @foreach ($dskt as $key => $HoaDon)
                                        <tr data-entry-id="{{ $HoaDon->hd_ma }}">
                                            <td>

                                            </td>
                                            <td>
                                                {{ $loop->index + 1 }}
                                            </td>
                                            <td>
                                                {{ $HoaDon->kh_hoTen }}
                                            </td>
                                            <td>
                                                {{ $HoaDon->kh_dienThoai }}
                                            </td>
                                            <td>
                                                @if ($HoaDon->lhd_ma = 1) Bảo Hành
                                                @else Sửa chữa
                                                @endif

                                            </td>
                                            <td>
                                                {{ $HoaDon->hd_nhan }}
                                            </td>
                                            <td>
                                                {{ date('H:i/d-m', strtotime($HoaDon->hd_taoMoi)) }}
                                            </td>
                                            <td>
                                                {{ $HoaDon->nv_hoTen }}
                                            </td>
                                            <td>
                                                @if ($HoaDon->hd_trangThai == 1) <a
                                                        data-toggle="modal" data-target="#tt2" type="button"
                                                        onclick="myFunction5({{ $HoaDon->hd_ma }})"
                                                        title="{{ $HoaDon->hd_ma }}" style="color: #f0e9e9"
                                                        class="btn btn-primary">Đang Kiểm tra</a>
                                                @elseif ($HoaDon->hd_trangThai == 2) <a data-toggle="modal"
                                                        onclick="myFunction5({{ $HoaDon->hd_ma }})" data-target="#tt2"
                                                        style="color: rgba(255, 255, 255, 255)" class="btn  btn-info"> Đã
                                                        sửa xong</a>
                                                @elseif ($HoaDon->hd_trangThai == 3) <a title="{{ $HoaDon->hd_ma }}"
                                                        onclick="myFunction5({{ $HoaDon->hd_ma }})"
                                                        style="color: rgba(255, 255, 255, 255)"
                                                        class="btn btn-success">Hoàn thành đơn</a>
                                                @elseif ($HoaDon->hd_trangThai == 4) <a title="{{ $HoaDon->hd_ma }}"
                                                        onclick="myFunction5({{ $HoaDon->hd_ma }})" data-toggle="modal"
                                                        data-target="#tt2" style="color: rgba(255, 255, 255, 255)"
                                                        class="btn btn-social btn-fill btn-reddit">Đơn Không sửa được</a>
                                                @elseif ($HoaDon->hd_trangThai == 5) <a title="{{ $HoaDon->hd_ma }}"
                                                        onclick="myFunction5({{ $HoaDon->hd_ma }})" data-toggle="modal"
                                                        data-target="#tt2" style="color: rgba(255, 255, 255, 255)"
                                                        class="btn btn-warning">Đơn đợi linh kiện</a>
                                                @else <a title="{{ $HoaDon->hd_ma }}"
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
                                                    Xem đơn
                                                </a>
                                                @endcan
                                                @can('Xóa Đơn Bảo Hành')
                                                <form action="{{ route('manager.HoaDon.destroy', $HoaDon->hd_ma) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                    style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="Xóa">
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
                <div class="modal fade bd-example-modal-sm" id="tt2" tabindex="-1" role="dialog"
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


                                    <textarea type="hidden" class="d-none" name="id" id="cntt2"></textarea>
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
            <div class="tab-pane" id="link4" aria-expanded="false">
                <div class="card ">
                    <div class="card-header text-left card-header-social card-header-text">
                        <div class="card-text">
                            <h6 class="card-title">Danh Sách Đơn Sửa Xong</h6>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class=" table table-bordered table-striped table-hover datatable datatable-HoaDon">
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
                                            Số điện Thoại
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
                                    @foreach ($dssc as $key => $HoaDon)
                                        <tr data-entry-id="{{ $HoaDon->hd_ma }}">
                                            <td>

                                            </td>
                                            <td>
                                                {{ $loop->index + 1 }}
                                            </td>
                                            <td>
                                                {{ $HoaDon->kh_hoTen }}
                                            </td>
                                            <td>
                                                {{ $HoaDon->kh_dienThoai }}
                                            </td>
                                            <td>
                                                @if ($HoaDon->lhd_ma = 1) Bảo Hành
                                                @else Sửa chữa
                                                @endif

                                            </td>
                                            <td>
                                                {{ $HoaDon->hd_nhan }}
                                            </td>
                                            <td>
                                                {{ date('H:i/d-m', strtotime($HoaDon->hd_taoMoi)) }}
                                            </td>
                                            <td>
                                                {{ $HoaDon->nv_hoTen }}
                                            </td>
                                            <td>
                                                @if ($HoaDon->hd_trangThai == 1) <a
                                                        data-toggle="modal" data-target="#tt3" type="button"
                                                        onclick="myFunction5({{ $HoaDon->hd_ma }})"
                                                        title="{{ $HoaDon->hd_ma }}" style="color: #f0e9e9"
                                                        class="btn btn-primary">Đang Kiểm tra</a>
                                                @elseif ($HoaDon->hd_trangThai == 2) <a data-toggle="modal"
                                                        onclick="myFunction5({{ $HoaDon->hd_ma }})" data-target="#tt3"
                                                        style="color: rgba(255, 255, 255, 255)" class="btn  btn-info"> Đã
                                                        sửa xong</a>
                                                @elseif ($HoaDon->hd_trangThai == 3) <a title="{{ $HoaDon->hd_ma }}"
                                                        onclick="myFunction5({{ $HoaDon->hd_ma }})"
                                                        style="color: rgba(255, 255, 255, 255)"
                                                        class="btn btn-success">Hoàn thành đơn</a>
                                                @elseif ($HoaDon->hd_trangThai == 4) <a title="{{ $HoaDon->hd_ma }}"
                                                        onclick="myFunction5({{ $HoaDon->hd_ma }})" data-toggle="modal"
                                                        data-target="#tt3" style="color: rgba(255, 255, 255, 255)"
                                                        class="btn btn-social btn-fill btn-reddit">Đơn Không sửa được</a>
                                                @elseif ($HoaDon->hd_trangThai == 5) <a title="{{ $HoaDon->hd_ma }}"
                                                        onclick="myFunction5({{ $HoaDon->hd_ma }})" data-toggle="modal"
                                                        data-target="#tt3" style="color: rgba(255, 255, 255, 255)"
                                                        class="btn btn-warning">Đơn đợi linh kiện</a>
                                                @else <a title="{{ $HoaDon->hd_ma }}"
                                                        style="color: rgba(255, 255, 255, 255)"
                                                        class="btn btn-social btn-fill btn-google">Đã Hoàn trả cho
                                                        khách</a>

                                                @endif
                                                <div class="modal fade bd-example-modal-sm" id="tt3" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Linh Kiện
                                                                    Yêu Cầu </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <form method="POST"
                                                                    action="{{ route('manager.HoaDon.update1', $HoaDon->hd_ma) }}"
                                                                    enctype="multipart/form-data">
                                                                    <input type="hidden" class="d-none"
                                                                        name="_method" value="PUT" />
                                                                    {{ csrf_field() }}


                                                                    <textarea type="hidden" class="d-none"
                                                                        name="id" id="cntt3"></textarea>
                                                                    <div class="form-group">

                                                                        <select name="hd_trangThai"
                                                                            class="form-control selectpicker "
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

                                                                    <button class=" btn-sm btn  btn-rose  col-lg-6"
                                                                        type="submit">Cập Nhật</button>

                                                                </form>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>


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
                                                    Xem đơn
                                                </a>
                                                @endcan
                                                @can('Xóa Đơn Bảo Hành')
                                                <form action="{{ route('manager.HoaDon.destroy', $HoaDon->hd_ma) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                    style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="Xóa">
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
            </div>
            <div class="tab-pane" id="link5" aria-expanded="false">
                <div class="card ">
                    <div class="card-header text-left card-header-social card-header-text">
                        <div class="card-text">
                            <h6 class="card-title">Danh Sách Đơn Hoàn Thành</h6>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class=" table table-bordered table-striped table-hover datatable datatable-HoaDon">
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
                                            Số điện Thoại
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
                                    @foreach ($dsht as $key => $HoaDon)
                                        <tr data-entry-id="{{ $HoaDon->hd_ma }}">
                                            <td>

                                            </td>
                                            <td>
                                                {{ $loop->index + 1 }}
                                            </td>
                                            <td>
                                                {{ $HoaDon->kh_hoTen }}
                                            </td>
                                            <td>
                                                {{ $HoaDon->kh_dienThoai }}
                                            </td>
                                            <td>
                                                @if ($HoaDon->lhd_ma = 1) Bảo Hành
                                                @else Sửa chữa
                                                @endif

                                            </td>
                                            <td>
                                                {{ $HoaDon->hd_nhan }}
                                            </td>
                                            <td>
                                                {{ date('H:i/d-m', strtotime($HoaDon->hd_taoMoi)) }}
                                            </td>
                                            <td>
                                                {{ $HoaDon->nv_hoTen }}
                                            </td>
                                            <td>
                                                @if ($HoaDon->hd_trangThai == 1) <a
                                                        data-toggle="modal" data-target="#tt4" type="button"
                                                        style="color: #f0e9e9" class="btn btn-primary">Đang Kiểm tra</a>
                                                @elseif ($HoaDon->hd_trangThai == 2) <a data-toggle="modal"
                                                        data-target="#tt4" style="color: rgba(255, 255, 255, 255)"
                                                        class="btn  btn-info"> Đã sửa xong</a>
                                                @elseif ($HoaDon->hd_trangThai == 3) <a
                                                        style="color: rgba(255, 255, 255, 255)"
                                                        class="btn btn-success">Hoàn
                                                        thành đơn</a>
                                                @elseif ($HoaDon->hd_trangThai == 4) <a data-toggle="modal"
                                                        data-target="#tt4" style="color: rgba(255, 255, 255, 255)"
                                                        class="btn btn-social btn-fill btn-reddit">Đơn Không sửa được</a>
                                                @elseif ($HoaDon->hd_trangThai == 5) <a style="" data-toggle="modal"
                                                        data-target="#tt4" class="btn btn-warning">Đơn đợi linh kiện</a>
                                                @else <a style="color: rgba(255, 255, 255, 255)"
                                                        class="btn  btn-danger">Đã Hoàn
                                                        trả cho khách</a>

                                                @endif
                                                <div class="modal fade bd-example-modal-lg" id="tt4" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Linh Kiện
                                                                    Yêu Cầu </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST"
                                                                    action="{{ route('manager.HoaDon.update', $HoaDon->hd_ma) }}"
                                                                    enctype="multipart/form-data">
                                                                    <input type="hidden" name="_method" value="PUT" />
                                                                    {{ csrf_field() }}

                                                                    <input type="hidden" name="id"
                                                                        value="{{ $HoaDon->kh_ma }}" />
                                                                    <div class="form-group">

                                                                        <select name="hd_trangThai"
                                                                            class="form-control selectpicker "
                                                                            data-style="btn btn-primary ">

                                                                            <option value="1"
                                                                                {{ old('hd_trangThai', $HoaDon->hd_trangThai) == 1 ? 'selected' : '' }}>
                                                                                Đang
                                                                                Kiểm tra</option>
                                                                            <option value="2"
                                                                                {{ old('hd_trangThai', $HoaDon->hd_trangThai) == 2 ? 'selected' : '' }}>
                                                                                Đã sửa
                                                                                xong</option>
                                                                            <option value="3"
                                                                                {{ old('hd_trangThai', $HoaDon->hd_trangThai) == 3 ? 'selected' : '' }}>
                                                                                Hoàn
                                                                                thành đơn</option>
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

                                                                    <button class=" btn-sm btn btn-rose btn-block col-lg-2"
                                                                        type="submit">Cập Nhật</button>

                                                                </form>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>


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
                                                    Xem đơn
                                                </a>
                                                @endcan
                                                @can('Xóa Đơn Bảo Hành')
                                                <form action="{{ route('manager.HoaDon.destroy', $HoaDon->hd_ma) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                    style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="Xóa">
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
            </div>
            <div class="tab-pane" id="link6" aria-expanded="false">
                <div class="card ">
                    <div class="card-header text-left card-header-social card-header-text">
                        <div class="card-text">
                            <h6 class="card-title">Danh Sách Đơn Không Sửa Được</h6>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class=" table table-bordered table-striped table-hover datatable datatable-HoaDon">
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
                                            Số điện Thoại
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
                                    @foreach ($dsksd as $key => $HoaDon)
                                        <tr data-entry-id="{{ $HoaDon->hd_ma }}">
                                            <td>

                                            </td>
                                            <td>
                                                {{ $loop->index + 1 }}
                                            </td>
                                            <td>
                                                {{ $HoaDon->kh_hoTen }}
                                            </td>
                                            <td>
                                                {{ $HoaDon->kh_dienThoai }}
                                            </td>
                                            <td>
                                                @if ($HoaDon->lhd_ma = 1) Bảo Hành
                                                @else Sửa chữa
                                                @endif

                                            </td>
                                            <td>
                                                {{ $HoaDon->hd_nhan }}
                                            </td>
                                            <td>
                                                {{ date('H:i/d-m', strtotime($HoaDon->hd_taoMoi)) }}
                                            </td>
                                            <td>
                                                {{ $HoaDon->nv_hoTen }}
                                            </td>
                                            <td>
                                                 @if ($HoaDon->hd_trangThai == 1) <a
                                                        data-toggle="modal" data-target="#tt6" type="button"
                                                        onclick="myFunction5({{ $HoaDon->hd_ma }})"
                                                        title="{{ $HoaDon->hd_ma }}" style="color: #f0e9e9"
                                                        class="btn btn-primary">Đang Kiểm tra</a>
                                                @elseif ($HoaDon->hd_trangThai == 2) <a data-toggle="modal"
                                                        onclick="myFunction5({{ $HoaDon->hd_ma }})" data-target="#tt6"
                                                        style="color: rgba(255, 255, 255, 255)" class="btn  btn-info"> Đã
                                                        sửa xong</a>
                                                @elseif ($HoaDon->hd_trangThai == 3) <a title="{{ $HoaDon->hd_ma }}"
                                                        onclick="myFunction5({{ $HoaDon->hd_ma }})"
                                                        style="color: rgba(255, 255, 255, 255)"
                                                        class="btn btn-success">Hoàn thành đơn</a>
                                                @elseif ($HoaDon->hd_trangThai == 4) <a title="{{ $HoaDon->hd_ma }}"
                                                        onclick="myFunction5({{ $HoaDon->hd_ma }})" data-toggle="modal"
                                                        data-target="#tt6" style="color: rgba(255, 255, 255, 255)"
                                                        class="btn btn-social btn-fill btn-reddit">Đơn Không sửa được</a>
                                                @elseif ($HoaDon->hd_trangThai == 5) <a title="{{ $HoaDon->hd_ma }}"
                                                        onclick="myFunction5({{ $HoaDon->hd_ma }})" data-toggle="modal"
                                                        data-target="#tt6" style="color: rgba(255, 255, 255, 255)"
                                                        class="btn btn-warning">Đơn đợi linh kiện</a>
                                                @else <a title="{{ $HoaDon->hd_ma }}"
                                                        style="color: rgba(255, 255, 255, 255)"
                                                        class="btn btn-social btn-fill btn-google">Đã Hoàn trả cho
                                                        khách</a>

                                                @endif
                                                <div class="modal fade bd-example-modal-sm" id="tt6" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Linh Kiện
                                                                    Yêu Cầu </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <form method="POST"
                                                                    action="{{ route('manager.HoaDon.update1', $HoaDon->hd_ma) }}"
                                                                    enctype="multipart/form-data">
                                                                    <input type="hidden" class="d-none"
                                                                        name="_method" value="PUT" />
                                                                    {{ csrf_field() }}


                                                                    <textarea type="hidden" class="d-none"
                                                                        name="id" id="cntt6"></textarea>
                                                                    <div class="form-group">

                                                                        <select name="hd_trangThai"
                                                                            class="form-control selectpicker "
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

                                                                    <button class=" btn-sm btn  btn-rose  col-lg-6"
                                                                        type="submit">Cập Nhật</button>

                                                                </form>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

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
                                                    Xem đơn
                                                </a>
                                                @endcan
                                                @can('Xóa Đơn Bảo Hành')
                                                <form action="{{ route('manager.HoaDon.destroy', $HoaDon->hd_ma) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                    style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="Xóa">
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
            </div>
            <div class="tab-pane" id="link7" aria-expanded="false">
                <div class="card ">
                    <div class="card-header text-left card-header-social card-header-text">
                        <div class="card-text">
                            <h6 class="card-title">Danh Sách Đang Đợi Linh Kiện</h6>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class=" table table-bordered table-striped table-hover datatable datatable-HoaDon">
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
                                            Số điện Thoại
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
                                    @foreach ($dsdlk as $key => $HoaDon)
                                        <tr data-entry-id="{{ $HoaDon->hd_ma }}">
                                            <td>

                                            </td>
                                            <td>
                                                {{ $loop->index + 1 }}
                                            </td>
                                            <td>
                                                {{ $HoaDon->kh_hoTen }}
                                            </td>
                                            <td>
                                                {{ $HoaDon->kh_dienThoai }}
                                            </td>
                                            <td>
                                                @if ($HoaDon->lhd_ma = 1) Bảo Hành
                                                @else Sửa chữa
                                                @endif

                                            </td>
                                            <td>
                                                {{ $HoaDon->hd_nhan }}
                                            </td>
                                            <td>
                                                {{ date('H:i/d-m', strtotime($HoaDon->hd_taoMoi)) }}
                                            </td>
                                            <td>
                                                {{ $HoaDon->nv_hoTen }}
                                            </td>
                                            <td>
                                                @if ($HoaDon->hd_trangThai == 1) <a
                                                        data-toggle="modal" data-target="#tt7" type="button"
                                                        onclick="myFunction5({{ $HoaDon->hd_ma }})"
                                                        title="{{ $HoaDon->hd_ma }}" style="color: #f0e9e9"
                                                        class="btn btn-primary">Đang Kiểm tra</a>
                                                @elseif ($HoaDon->hd_trangThai == 2) <a data-toggle="modal"
                                                        onclick="myFunction5({{ $HoaDon->hd_ma }})" data-target="#tt7"
                                                        style="color: rgba(255, 255, 255, 255)" class="btn  btn-info"> Đã
                                                        sửa xong</a>
                                                @elseif ($HoaDon->hd_trangThai == 3) <a title="{{ $HoaDon->hd_ma }}"
                                                        onclick="myFunction5({{ $HoaDon->hd_ma }})"
                                                        style="color: rgba(255, 255, 255, 255)"
                                                        class="btn btn-success">Hoàn thành đơn</a>
                                                @elseif ($HoaDon->hd_trangThai == 4) <a title="{{ $HoaDon->hd_ma }}"
                                                        onclick="myFunction5({{ $HoaDon->hd_ma }})" data-toggle="modal"
                                                        data-target="#tt7" style="color: rgba(255, 255, 255, 255)"
                                                        class="btn btn-social btn-fill btn-reddit">Đơn Không sửa được</a>
                                                @elseif ($HoaDon->hd_trangThai == 5) <a title="{{ $HoaDon->hd_ma }}"
                                                        onclick="myFunction5({{ $HoaDon->hd_ma }})" data-toggle="modal"
                                                        data-target="#tt7" style="color: rgba(255, 255, 255, 255)"
                                                        class="btn btn-warning">Đơn đợi linh kiện</a>
                                                @else <a title="{{ $HoaDon->hd_ma }}"
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
                                                    Xem đơn
                                                </a>
                                                @endcan
                                                @can('Xóa Đơn Bảo Hành')
                                                <form action="{{ route('manager.HoaDon.destroy', $HoaDon->hd_ma) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                    style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="Xóa">
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
                <div class="modal fade bd-example-modal-sm" id="tt7" tabindex="-1" role="dialog"
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


                                    <textarea type="hidden" class="d-none" name="id" id="cntt7"></textarea>
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
            <div class="tab-pane" id="link8" aria-expanded="false">
                <div class="card ">
                    <div class="card-header text-left card-header-social card-header-text">
                        <div class="card-text">
                            <h6 class="card-title">Danh Sách Đơn Trả Lại Cho Khách Hàng Xong</h6>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class=" table table-bordered table-striped table-hover datatable datatable-HoaDon">
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
                                            Số điện Thoại
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
                                    @foreach ($dshtkh as $key => $HoaDon)
                                        <tr data-entry-id="{{ $HoaDon->hd_ma }}">
                                            <td>

                                            </td>
                                            <td>
                                                {{ $loop->index + 1 }}
                                            </td>
                                            <td>
                                                {{ $HoaDon->kh_hoTen }}
                                            </td>
                                            <td>
                                                {{ $HoaDon->kh_dienThoai }}
                                            </td>
                                            <td>
                                                @if ($HoaDon->lhd_ma = 1) Bảo Hành
                                                @else Sửa chữa
                                                @endif

                                            </td>
                                            <td>
                                                {{ $HoaDon->hd_nhan }}
                                            </td>
                                            <td>
                                                {{ date('H:i/d-m', strtotime($HoaDon->hd_taoMoi)) }}
                                            </td>
                                            <td>
                                                {{ $HoaDon->nv_hoTen }}
                                            </td>
                                            <td>
                                                @if ($HoaDon->hd_trangThai == 1) <a
                                                        data-toggle="modal" data-target="#tt6" type="button"
                                                        style="color: #f0e9e9" class="btn btn-primary">Đang Kiểm tra</a>
                                                @elseif ($HoaDon->hd_trangThai == 2) <a data-toggle="modal"
                                                        data-target="#tt6" style="color: rgba(255, 255, 255, 255)"
                                                        class="btn  btn-info"> Đã sửa xong</a>
                                                @elseif ($HoaDon->hd_trangThai == 3) <a
                                                        style="color: rgba(255, 255, 255, 255)"
                                                        class="btn btn-success">Hoàn
                                                        thành đơn</a>
                                                @elseif ($HoaDon->hd_trangThai == 4) <a data-toggle="modal"
                                                        data-target="#tt6" style="color: rgba(255, 255, 255, 255)"
                                                        class="btn btn-social btn-fill btn-reddit">Đơn Không sửa được</a>
                                                @elseif ($HoaDon->hd_trangThai == 5) <a style="" data-toggle="modal"
                                                        data-target="#tt6" class="btn btn-warning">Đơn đợi linh kiện</a>
                                                @else<a title="{{ $HoaDon->hd_ma }}"
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
                                                    Xem đơn
                                                </a>
                                                @endcan
                                                @can('Xóa Đơn Bảo Hành')
                                                <form action="{{ route('manager.HoaDon.destroy', $HoaDon->hd_ma) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                    style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="Xóa">
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
            document.getElementById("cntt2").innerHTML = c;
            document.getElementById("cntt3").innerHTML = c;
            document.getElementById("cntt4").innerHTML = c;
            document.getElementById("cntt5").innerHTML = c;
            document.getElementById("cntt6").innerHTML = c;
            document.getElementById("cntt7").innerHTML = c;

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
            $('.datatable-dskt:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })
    </script>
@endsection
