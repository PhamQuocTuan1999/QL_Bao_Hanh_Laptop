<?php
    $a= DB::select('SELECT DISTINCT  *,bk.hd_ma FROM hoa_don  as bk
       INNER JOIN khachhang as kh on kh.id   = bk.kh_ma
       INNER JOIN nhanvien as nv on nv.id = bk.nv_ma
       INNER JOIN loai_hoa_don as lhd on lhd.lhd_ma = bk.lhd_ma
      where bk.kh_ma='.Auth::user()->id.' ORDER BY hd_ma DESC');



?>
     <div class="card-header card-header-primary">
        <h4 class="card-title"></h4>
        <p class="card-category"> Your Reckoning</p>
      </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Room">
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
                            Thời gian hẹn
                        </th>
                        <th>
                            Nhân viên sử lý
                        </th>
                        <th>
                           SĐT Nhân Viên
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
                    @foreach ($a as $key => $HoaDon)
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
                                {{ $HoaDon->lhd_ten }}


                            </td>
                            <td>
                                {{ $HoaDon->hd_nhan }}
                            </td>
                            <td>
                                {{ date('H:i d/m', strtotime($HoaDon->hd_taoMoi)) }}
                            </td>
                            <td>
                                {{ date('d/m', strtotime($HoaDon->hd_thoiGianXuLy)) }}
                            </td>
                            <td>
                                {{ $HoaDon->nv_hoTen }}
                            </td>
                            <td>
                                {{ $HoaDon->nv_dienThoai }}
                            </td>
                            <td>
                                @if ($HoaDon->hd_trangThai == 1) <a
                                        data-toggle="modal" data-target="#tt8" type="button"
                                        style="color: #f0e9e9" class="btn btn-primary">Đang Kiểm tra</a>
                                @elseif ($HoaDon->hd_trangThai == 2) <a data-toggle="modal"
                                        data-target="#tt8" style="color: rgba(255, 255, 255, 255)"
                                        class="btn  btn-info"> Đã sửa xong</a>
                                @elseif ($HoaDon->hd_trangThai == 3) <a
                                        style="color: rgba(255, 255, 255, 255)"
                                        class="btn btn-success">Hoàn
                                        thành đơn</a>
                                @elseif ($HoaDon->hd_trangThai == 4) <a data-toggle="modal"
                                        data-target="#tt8" style="color: rgba(255, 255, 255, 255)"
                                        class="btn btn-social btn-fill btn-reddit">Đơn Không sửa được</a>
                                @elseif ($HoaDon->hd_trangThai == 5) <a style="" data-toggle="modal"
                                        data-target="#tt8" class="btn btn-warning">Đơn đợi linh kiện</a>
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
                                        <span class="material-icons">
                                            search
                                         </span>
                                    </a>
                                @endcan
                                @can('Xóa Đơn Bảo Hành')
                                    <form action="{{ route('manager.HoaDon.destroy', $HoaDon->hd_ma) }}"
                                        method="POST"
                                        onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
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
                </tbody>
            </table>
        </div>
    </div>
</div>


