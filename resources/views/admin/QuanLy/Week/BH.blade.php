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

            </ul>
        </div>
        <div class="tab-content text-center tab-space">
            <div class="tab-pane active" id="link1" aria-expanded="true">
                <div class="card ">
                  <div class="card-header text-left ">
                        <div class="btn btn-social btn-fill btn-facebook">
                            <h6 >Danh Sách Đơn Bảo Hành</h6>
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
                                            Thời gian hẹn
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
                                                        onsubmit="return confirm(' Bạn có chắc xóa ?');"
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
            $('.datatable-dskt:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })
    </script>
    <script>

document.getElementById("quahan").onload =myFunction2();

        function myFunction2() {

            table = document.getElementById("myTable2");
            tr = table.getElementsByTagName("tr");
            d=tr.length-1;
            document.getElementById("quahan").innerHTML = d;
            filter = input.value.toUpperCase();

        }
    </script>
@endsection
