@extends('admin.layouts.partials.CSSKid')
@section('title')
Chi Tiết Khách Hàng
@endsection
@section('content')

<div class="card">
    <div class="card-header">
        Chi Tiết Khách Hàng
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('manager.khachhang.index') }}">
                    Về Menu chính
                </a>
            </div>
            <table id="myTable" class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <td>
                            {{ $KhachHang->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                           Họ Và Tên
                        </th>
                        <td>
                            {{ $KhachHang->kh_hoTen }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Mã số Thuế
                        </th>
                        <td>
                            {{ $KhachHang->kh_maSoThue }}

                        </td>
                    </tr>
                    <tr>
                        <th>
                            Email
                        </th>
                        <td>
                            {{ $KhachHang->kh_email }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                           Số điện Thoại
                        </th>
                        <td>
                                   <span>{{ $KhachHang->kh_dienThoai }}</span>

                        </td>
                    </tr>
                    <tr>
                        <th>
                          Địa Chỉ
                        </th>
                        <td>

                            <span >
                                {{ $KhachHang->kh_diaChi }}

                            </span>
                        </td>
                    </tr>
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
            <a class="nav-link" href="#bookings" role="tab" data-toggle="tab">
                {{ trans('cruds.booking.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="bookings">
            @includeIf('admin.khachhang.relationships.Bookings', ['kh' => $KhachHang->id])
    </div>
</div> --}}


@endsection
