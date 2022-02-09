@extends('admin.CSSKid')
@section('title')
Chi Tiết Linh Kiện
@endsection
@section('content')

<div class="card">
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
              <h6 class="card-title"> Thông Tin Linh kiện</h6>
            </div>
          </div>
            @foreach ($linhkien as $linhkien)
            <table id="myTable" class="table table-bordered table-striped">
                <tbody>
                    <?php $stt = 1; ?>

                    <tr>
                        <th>
                            Mã  Linh Kiện
                        </th>
                        <td>
                            {{ $linhkien->lk_ma }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Tên  Linh Kiện
                        </th>
                        <td>{{ $linhkien->lk_ten }}</td>
                    </tr>
                    <tr>
                        <th>
                            Tên Loại Linh Kiện
                        </th>
                        <td>{{ $linhkien->llk_ten }}</td>
                    </tr>
                    <tr>
                        <th>
                            Tên Nhà Sản Xuất
                        </th>
                        <td>{{ $linhkien->nsx_ten }}</td>
                    </tr>
                    <tr>
                        <th>
                            Tên Loại Bảo Hành
                        </th>
                        <td>{{ $linhkien->bh_ten }}</td>
                    </tr>
                    <tr>
                        <th>
                            Hình Linh Kiện
                        </th>
                        <td> <img src="{{ asset('/storage/photos/' . $linhkien->lk_hinh) }}" class="img-list"
                                height="100" width="100" /></td>
                    </tr>
                    <tr>
                        <th>
                            Giá Loại Linh Kiện
                        </th>
                        <td>{{ $linhkien->lk_gia }} VNĐ</td>
                    </tr>
                    <tr>
                        <th>
                            Thông tin Loại Linh Kiện
                        </th>
                        <td>{{ $linhkien->lk_chiTiet }}</td>
                    </tr>
                    <tr>
                        <th>
                            Trạng thái Linh Kiện
                        </th>
                        <td>
                            @if ($linhkien->lk_trangThai == 1) Khóa
                            @else Khả Dụng
                            @endif
                        </td>
                    </tr>

                    <?php $stt++; ?>
        @endforeach
        </tbody>
        </table>

        </div>
    </div>
</div>

{{-- <div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#linhkien_bookings" role="tab" data-toggle="tab">
                {{ trans('cruds.booking.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="linhkien_bookings">
            @includeIf('admin.Linh_Kien.relationships.linhkienBookings', ['linhkien' => $linhkien->lk_ma])
    </div>
</div> --}}

@endsection
