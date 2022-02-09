@extends('admin.CSSKid')
@section('title')
Chi tiết Thông Tin Nhà Sản Xuất
@endsection
@section('content')

<div class="form-group">
    <a class="btn btn-default" href="{{ route('manager.Nha_San_Xuat.index') }}">
        <span class="material-icons">
            keyboard_backspace
        </span>  Về Menu chính
    </a>
</div>
<div class="card">
    <div class="card-header text-left ">
                        <div class="btn btn-social btn-fill btn-facebook">
                            <h6 > Thông Tin Nhà Sản Xuất</h6>
        </div>
      </div>
                    <table id="myTable" class="table table-bordered table-striped">
                        <tbody>
                            <?php $stt = 1; ?>

                            <tr>
                                <th>
                                    Mã Nhà Sản Xuất
                                </th>
                                <td>
                                    {{ $NSX->nsx_ma }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Tên Nhà Sản Xuất
                                </th>
                                <td>{{ $NSX->nsx_ten }}</td>
                            </tr>


                            <tr>
                                <th>
                                    Thông tin Nhà Sản Xuất
                                </th>
                                <td>{{ $NSX->nsx_thongTin }}</td>
                            </tr>
                            <tr>
                                <th>
                                    Trạng thái Loại Phòng
                                </th>
                                <td>
                                    @if ($NSX->nsx_trangThai == 1) Khóa
                                    @else Khả Dụng
                                    @endif
                                </td>
                            </tr>

                            <?php $stt++; ?>

                </tbody>
                </table>

            </div>
        </div>
    </div>

     {{-- <div class="card">
        <div class="card-header">
            Các Loại Linh Kiện Thuộc nhà sản suất
        </div>
        <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
            <li class="nav-item">
                <a class="nav-link btn" href="#room_type_rooms" role="tab" data-toggle="tab">
                   Hiện
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" role="tabpanel" id="room_type_rooms">
                @includeIf('admin.nhaSX.relationships.LoaiLK', ['NSX' => $NSX->nsx_ma])
            </div>
        </div>
    </div> --}}

@endsection
