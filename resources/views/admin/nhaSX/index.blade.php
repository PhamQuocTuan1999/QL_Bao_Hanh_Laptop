@extends('admin.homeMG')
@section('title')
Quản Lý Nhà Sản Xuất
@endsection
@section('content')
    <div style="margin-top:-5%">
        <div class="card card-nav-tabs card-plain ">
            <ul class="nav nav-pills nav-pills-icons border-bottom border-dark" role="tablist">
                <li class="nav-item">
                    <a class=" btn btn-link " style="margin-left:-10%" aria-controls="nav-home" aria-selected="true"
                        data-toggle="tab" href="#link1" role="tablist" aria-expanded="true">
                        <samp style="font-size: 18px">Quản Lý Nhà Sản Xuất</samp>
                    </a>
                </li>

            </ul>
        </div>
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

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">



            <div class="collapse" id="collapseExample">
                <div class="card">



                    <div class="card-header text-left ">
                        <div class="btn btn-social btn-fill btn-facebook">
                            <h6 >Thêm Mới Nhà Sản Xuất</h6>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="post" action="{{ route('manager.Nha_San_Xuat.store') }}"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label class="bmd-label-floating" for="nsx_ten">Tên Nhà Sản Xuất</label>
                                <input required type="text" class="form-control" id="nsx_ten" name="nsx_ten"
                                    value="{{ old('nsx_ten') }}">
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating" for="nsx_thongTin">Thông tin</label>
                                <input required type="text" class="form-control" id="nsx_thongTin" name="nsx_thongTin"
                                    value="{{ old('nsx_thongTin') }}">
                            </div>


                            <button type="submit" class="btn btn-social btn-fill btn-behance">Lưu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header card-header-social card-header-text">
            <div class="card-text">
                <h6 class="card-title">Danh Sách Nhà Sản Xuất</h6>
            </div>
        </div>
        <div style="margin-left: 84%" class="row">
            @can('Thêm NSX')
            <div class="col-lg-12">
                <a class="btn btn-success" data-toggle="collapse" href="#collapseExample" aria-expanded="false"
                    aria-controls="collapseExample">
                    Thêm Nhà Sản Xuất
                </a>
            </div>
            @endcan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table  id="myTableht" class=" text-center table table-bordered table-striped table-hover datatable datatable-dbs display">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th width="50">
                                ID
                            </th>
                            <th>
                                Tên Linh Kiện
                            </th>
                            <th>
                                Thông Tin
                            </th>

                            <th>

                            </th>

                        </tr>
                        <tr>
                            <th width="10">

                            </th>
                            <th width="20">
                                <input style="width: 100px;" type="
                                    text" id="myInput0" onkeyup="myFunction0()" placeholder="  " title="Type in a name">
                            </th>
                            <th>
                                <input style="width: 200px;" type="
                                        text" id="myInput3" onkeyup="myFunction3()" placeholder="  "
                                    title="Type in a name">
                            </th>
                            <th>
                                <input style="width: 300px;" type="
                                        text" id="myInput4" onkeyup="myFunction4()" placeholder="  " title="T điện thoại">
                            </th>



                            </th>
                            <th>
                        </tr>
                        <tr>
                            <th width="10">

                            </th>
                            <th width="50">

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
                        <?php
                        $stt = 1;
                        ?>
                        @foreach ($NSX as $key => $dbs)
                            <tr data-entry-id="{{ $dbs->nsx_ma }}">
                                <td>

                                </td>
                                <td width="10">
                                    {{ $loop->index + 1 }}
                                </td>
                                <td>
                                    {{ $dbs->nsx_ten ?? '' }}
                                </td>
                                <td>
                                    {{ $dbs->nsx_thongTin ?? '' }}
                                </td>

                                <td>
                                    @can('Xem NSX')
                                    <a class="btn btn-xs btn-primary"
                                        href="{{ route('manager.Nha_San_Xuat.show', $dbs->nsx_ma) }}">
                                        <span class="material-icons">
                                            search
                                        </span>
                                    </a>
                                    @endcan
                                    @can('Sửa NSX')
                                    <a class="btn btn-xs btn-info"
                                        href="{{ route('manager.Nha_San_Xuat.edit', [$dbs->nsx_ma]) }}">
                                        <span class="material-icons">
                                            edit
                                        </span>
                                    </a>
                                    @endcan
                                    @can('Xóa NSX')
                                    <form action="{{ route('manager.Nha_San_Xuat.destroy', $dbs->nsx_ma) }}"
                                        method="POST" onsubmit="return confirm(' Bạn có chắc xóa ?');"
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
                            <?php
                            $stt++;
                            ?>
                        @endforeach
                    </tbody>
                </table>
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
            element = document.getElementById("id0");
            name = "active";
            arr = element.className.split(" ");
            if (arr.indexOf(name) == -1) {
                element.className += " " + name;
            }
        }
    </script>
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)


            $.extend(true, $.fn.dataTable.defaults, {
                order: [
                    [1, 'desc']
                ],
                pageLength: 25,
            });
            $('.datatable-dbs:not(.ajaxTable)').DataTable({
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
                td = tr[i].getElementsByTagName("td")[4];
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
        function myFunction0() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput0");
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
@endsection
