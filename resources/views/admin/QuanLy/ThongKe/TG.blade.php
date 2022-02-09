@extends('admin.homeMG')
@section('title')
    Danh Sách Đơn Bảo Hành
@endsection

@section('content')

    <div style="margin-top:-4%" width="200%" >
        <div class="flash-message">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            {{-- <?php

            echo "<script type='text/javascript'>
                                                                            alert('$error');

                                                                        </script>";
            ?> --}}
        @endif



        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <form method="POST" action="{{ route('manager.tk_tg_show') }}"
            enctype="multipart/form-data">
            <input type="hidden" class="d-none" name="_method" value="PUT" />
            {{ csrf_field() }}
            <div class="container-fluid form-group">
                <div class="row">
                    <div class="col-md-5" style="margin-left: 7%">
                        <div class="card ">
                            <div class="card-header card-header-info card-header-text" >
                                <div class="card-icon">
                                    <i class="material-icons">today</i>
                                </div>
                                <h4 class="card-title">Từ Ngày</h4>
                            </div>
                            <div class="card-body ">
                                <div class="form-group">
                                    <div class='input-group date' >
                                    <input name="tungay" type="date" class="form-control datepicker"  value="{{ old('tungay') }}"required>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card ">
                            <div class="card-header card-header-danger card-header-text">
                                <div class="card-icon">
                                    <i class="material-icons">today</i>
                                </div>
                                <h4 class="card-title"> Đến Ngày</h4>
                            </div>
                            <div class="card-body ">
                                <div class="form-group">
                                    <input name="denngay" type="date" value="{{ old('denngay') }}" class="form-control datepicker" required>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <button type="submit" style="margin-left: 60%" class="btn btn-info w3-center col-3">Gửi</button>
        </form>

        <div class=" tab-content text-center tab-space">
            <div class="tab-pane active" id="link1" aria-expanded="true">
                <div class="card ">
                  <div class="card-header text-left ">
                        <div class="btn btn-social btn-fill btn-facebook">
                            <h6 >Danh Sách Đơn Bảo Hành</h6>
                        </div>

                    </div>

                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="myTableht"
                                class=" table table-bordered table-striped table-hover datatable datatable-HoaDon display">

                                <thead>
                                    <tr>
                                        <th width="8">

                                        </th>
                                        <th width="50">
                                            <h5> ID</h5>
                                        </th>
                                        <th>
                                           <h5>Khách Hàng</h5>
                                        </th>
                                        <th>
                                            <h5> Số điện Thoại</h5>
                                        </th>
                                        <th>
                                            <h5>  Loại Đơn</h5>
                                        </th>
                                        <th>
                                            <h5>Thiết Bị</h5>
                                        </th>
                                        <th>
                                            <h5>TG Nhận</h5>
                                        </th>
                                        <th>
                                            <h5>TG Hẹn</h5>
                                        </th>
                                        <th>
                                            <h5>NV Nhận</h5>
                                        </th>
                                        <th>
                                            <h5>NV Xử Lý</h5>
                                        </th>
                                        <th>
                                            <h5>  Trạng Thái</h5>
                                        </th>
                                        <th>
                                            <h5>  In</h5>
                                        </th>

                                        <th>

                                        </th>
                                    </tr>

                                    <tr>
                                        <th width="10">

                                        </th>
                                        <th width="20">
                                            <input style="width: 50px;" class="col-15" type="
                                            text" id="myInput11" onkeyup="myFunction11()" placeholder="  "
                                   >
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
                                            class="btn-default text-lg-center" id="myInput12" onchange="myFunction12()" >

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
                                                       >
                                                          <option value="Đang Vạn Chuyển">
                                                           Đang Vận Chuyển
                                                        </option>
                                                          <option value="" selected>
                                                          Mặc Định
                                                          </option>
                                              </select>
                                            {{-- <input style="width: 100px;" type="
                                            text" id="myInput12" onkeyup="myFunction12()" placeholder=" aa "
                                            title="Trạng Thái"> --}}
                                        </th>
                                        <th>

                                        </th>

                                        <th>

                                        </th>
                                    </tr>
                                    <tr>
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
                                        @elseif ($HoaDon->hd_trangThai == 0) <a title="{{ $HoaDon->hd_ma }}"
                                                data-toggle="modal" data-target="#tt"
                                                style="color: rgba(255, 255, 255, 255)" class="btn btn-facebook">Đơn
                                                phân công</a>
                                         @elseif ($HoaDon->hd_trangThai == -1) <a title="{{ $HoaDon->hd_ma }}"
                                                    data-toggle="modal" data-target="#tt"
                                                    style="color: rgba(255, 255, 255, 255)" class="tn btn-social btn-fill btn-youtube">Đang Vận Chuyển Đến </a>
                                                    @elseif ($HoaDon->hd_trangThai == -2) <a title="{{ $HoaDon->hd_ma }}"
                                                        data-toggle="modal" data-target="#tt"
                                                        style="color: rgba(255, 255, 255, 255)" class="btn btn-social btn-fill btn-twitter">Đang Vận Chuyển Đi</a>
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
                                                        <span class="material-icons">
                                                            search
                                                         </span>
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
            function myFunction11() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("myInput11");
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
 $('.datetimepicker').datetimepicker({
    icons: {
        time: "fa fa-clock-o",
        date: "fa fa-calendar",
        up: "fa fa-chevron-up",
        down: "fa fa-chevron-down",
        previous: 'fa fa-chevron-left',
        next: 'fa fa-chevron-right',
        today: 'fa fa-screenshot',
        clear: 'fa fa-trash',
        close: 'fa fa-remove'
    }
});
</script>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker();
    });

 </script>
@endsection
