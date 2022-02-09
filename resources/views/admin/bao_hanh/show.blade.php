@extends('admin.layouts.partials.CSSKid')
@section('title')
Chi tiết Thông Tin Bảo Hành
@endsection
@section('content')

<div class="form-group">
    <a class="btn btn-default" href="{{ route('manager.Bao_Hanh.index') }}">
        <span class="material-icons">
            keyboard_backspace
        </span>  Về Menu chính
    </a>
</div>
<div class="card">
    <div class="card-header text-left card-header-social card-header-text">
        <div class="card-text">
          <h6 class="card-title"> Sửa Thông Tin Bảo Hành</h6>
        </div>
      </div>

                    <table id="myTable" class="table table-bordered table-striped">
                        <tbody>


                            <tr>
                                <th>
                                    Mã Bảo Hành
                                </th>
                                <td>
                                    {{ $bh->bh_ma }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Tên Bảo Hành
                                </th>
                                <td>{{ $bh->bh_ten }}</td>
                            </tr>


                            <tr>
                                <th>
                                    Thông tin Bảo Hành
                                </th>
                                <td>{{ $bh->bh_thongTin }}</td>
                            </tr>
                            <tr>
                                <th>
                                    Trạng thái Loại Bảo Hành
                                </th>
                                <td>
                                    @if ($bh->bh_trangThai == 1) Khóa
                                    @else Khả Dụng
                                    @endif
                                </td>
                            </tr>



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
                @includeIf('admin.nhaSX.relationships.LoaiLK', ['bh' => $bh->bh_ma])
            </div>
        </div>
    </div> --}}

@endsection
