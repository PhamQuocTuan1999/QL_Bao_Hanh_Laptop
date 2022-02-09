@extends('admin.homeMG')
@section('title')
    Danh Sách Đơn Bảo Hành
@endsection

@section('content')

    <div>
        <div class="card card-nav-tabs card-plain ">
            <ul class="nav nav-pills nav-pills-icons border-bottom border-dark " role="tablist">
                <li class="nav-item">
                    <a class="nav-link active " aria-controls="nav-home" aria-selected="true"
                        data-toggle="tab" href="#link1" role="tablist" aria-expanded="true">
                        Danh Sách Đơn Từ Khách Hàng
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



        <div  class=" tab-content text-center tab-space">
            <div class="tab-pane active" id="link1" aria-expanded="true">
                <div style="margin-top: -4%"class="card ">
                  <div class="card-header text-left ">
                        {{-- <div class="btn btn-social btn-fill btn-facebook">
                            <h6 >Danh Sách Đơn Bảo Hành</h6>
                        </div> --}}

                    </div>

                    <div class="card-body">
                        {{-- <table class="table" style=" ">
                            <tfoot>
                                <tr>
                                    <th width="10">
                                    </th>
                                    <th width="50">
                                        Tìm Theo
                                    </th>
                                    <th> <span
                                            class="">Khách hàng</span><br>

                                    </th>
                                    <th><span
                                            class="">Số điện thoại</span><br>

                                    </th>

                                    <th><span
                                            class="">Thiết bị</span><br>

                                    </th>
                                    <th><span
                                            class="">Thời gian nhận</span><br>

                                    </th>
                                    <th><span
                                            class="">Thời  gian Hẹn</span><br>

                                    </th>
                                    <th><span
                                            class="">Nhân viên nhận</span><br>

                                    </th>
                                    <th>
                                        <span
                                            class="">Nhân viên xử lý</span><br>

                                    </th>
                                    <th>

                                    </th>

                                    <th>

                                    </th>
                                </tr>
                            </tfoot>
                        </table> --}}
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
                                            Đơn vị Vận Chuyển
                                        </th>

                                        <th>
                                           Xác Nhận
                                        </th>


                                        <th>

                                        </th>
                                    </tr>


                                    <tr>
                                        <th width="10">

                                        </th>
                                        <th width="20">
                                            <input style="width: 50px;" type="
                                            text" id="myInput7" onkeyup="myFunction7()" placeholder="  "
                                            >
                                        </th>
                                        <th>
                                            <input style="width: 100px;" type="
                                                text" id="myInput3" onkeyup="myFunction3()" placeholder="  "
                                                title="Type in a name">
                                        </th>
                                        <th>
                                            <input  type="
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
                                            {{-- <input style="width: 100px;" type="
                                            text" id="myInput12" onkeyup="myFunction12()" placeholder=" aa "
                                            title="Trạng Thái"> --}}
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
                                              <samp>Địa Chỉ:  {{ $HoaDon->ctvc_tu}}</samp>
                                            </td>
                                            <td>
                                                {{ $HoaDon->lhd_ten }}



                                            </td>
                                            <td>
                                                {{ $HoaDon->hd_nhan }}
                                            </td>

                                            <td>
                                                {{ $HoaDon->ctvc_dvvc }}
                                            </td>

                                            <td>
                                                @if ($HoaDon->hd_trangThai == -1) <a
                                                        data-toggle="modal" data-target="#tt" type="button"
                                                        onclick="myFunction5({{ $HoaDon->hd_ma }})"
                                                        title="{{ $HoaDon->hd_ma }}" style="color: #f0e9e9"
                                                        class="btn btn-primary">Đợi Xác Nhận </a>


                                                 @elseif ($HoaDon->hd_trangThai == 1) <a
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
                                         @elseif ($HoaDon->hd_trangThai == -1) <a title="{{ $HoaDon->hd_ma }}"
                                                 data-toggle="modal" data-target="#tt"
                                                 style="color: rgba(255, 255, 255, 255)" class="btn btn-facebook">Đang Vận chuyển Đến</a>
                                                 @elseif ($HoaDon->hd_trangThai == -2) <a title="{{ $HoaDon->hd_ma }}"
                                                    data-toggle="modal" data-target="#tt"
                                                    style="color: rgba(255, 255, 255, 255)" class="btn btn-facebook">Đang Vận chuyển Đi</a>
                                         @else <a title="{{ $HoaDon->hd_ma }}" onclick="myFunction5()"
                                                 style="color: rgba(255, 255, 255, 255)"
                                                 class="btn btn-social btn-fill btn-google">Đã Hoàn trả cho khách</a>

                                         @endif

                                            </td>

                                            <td>




                                                    <a class="btn btn-xs btn-info"
                                                        href="{{ route('manager.Van_Chuyen.show', $HoaDon->hd_ma) }}">
                                                        <span class="material-icons">
                                                            search
                                                         </span>
                                                    </a>


                                                    <form action="{{ route('user.destroy', $HoaDon->hd_ma) }}"
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
                                <h5 class="modal-title" id="exampleModalLabel">Xác Nhận Đã Nhận Đơn </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <form method="POST" action="{{ route('manager.Van_Chuyen.store') }}"
                                    enctype="multipart/form-data">

                                    {{ csrf_field() }}


                                    <textarea type="hidden" class="d-none" name="id" id="cntt"></textarea>


                                    <button class=" btn-sm btn  btn-rose  col-lg-6" type="submit">Duyệt</button>

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

@endsection
