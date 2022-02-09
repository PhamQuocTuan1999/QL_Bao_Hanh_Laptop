@extends('admin.CSSKid')
@section('title')
Chi tiết Loại Linh Kiện
@endsection
@section('content')


<div class="form-group">
    <a class="btn btn-default" href="{{ route('manager.Loai_Linh_Kien.index') }}">
        <span class="material-icons">
            keyboard_backspace
        </span>  Về Menu chính
    </a>
</div>
<div class="card">
    <div class="card-header text-left card-header-social card-header-text">
        <div class="card-text">
          <h6 class="card-title">  Thông Tin Loại Linh kiện</h6>
        </div>
      </div>

                    <table id="myTable" class="table table-bordered table-striped">
                        <tbody>
                            <?php $stt = 1; ?>

                            <tr>
                                <th>
                                    Mã Loại Linh Kiện
                                </th>
                                <td>
                                    {{ $Loai_Linh_Kien->llk_ma }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Tên Loại Linh Kiện
                                </th>
                                <td>{{ $Loai_Linh_Kien->llk_ten }}</td>
                            </tr>
                            <tr>
                                <th>
                                    Thông tin Loại Linh Kiện
                                </th>
                                <td>{{ $Loai_Linh_Kien->llk_thongTin }}</td>
                            </tr>
                            <tr>
                                <th>
                                    Trạng thái Loại Linh Kiện
                                </th>
                                <td>
                                    @if ($Loai_Linh_Kien->llk_trangThai == 1) Khóa
                                    @else Khả Dụng
                                    @endif
                                </td>
                            </tr>

                            <?php $stt++; ?>

                </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('manager.Loai_Linh_Kien.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="card">
        <div class="card-header">
            {{ trans('global.relatedData') }}
        </div>
        <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
            <li class="nav-item">
                <a class="nav-link" href="#room_type_rooms" role="tab" data-toggle="tab">
                    {{ trans('cruds.room.title') }}
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" role="tabpanel" id="room_type_rooms">
                @includeIf('admin.Loai_Linh_Kiens.relationships.Loai_Linh_KienRooms', ['rooms' => $Loai_Linh_Kien->llk_ma,'Loai_Linh_Kien',$Loai_Linh_Kien])
            </div>
        </div>
    </div> --}}

@endsection
