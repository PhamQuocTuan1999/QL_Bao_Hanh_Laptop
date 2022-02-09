@extends('admin.homeMG')
@section('title')
    Quản Lý Linh Kiện
@endsection


@section('content')

    <div style="margin-top:-5%">
        <div class="card card-nav-tabs card-plain ">
            <ul class="nav nav-pills nav-pills-icons border-bottom border-dark" role="tablist">
                <li class="nav-item">
                    <a class=" btn btn-link " style="margin-left:-10%" aria-controls="nav-home" aria-selected="true"
                        data-toggle="tab" href="#link1" role="tablist" aria-expanded="true">
                        <samp style="font-size: 18px">Quản Lý Linh Kiện</samp>
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



                    <div class="card-header card-header-social card-header-text">
                        <div class="card-text">
                            <h6 class="card-title">Thêm Mới Linh Kiện</h6>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="post" action="{{ route('manager.Linh_Kien.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group ">
                                        <label for="llk_ma">Loại Linh Kiện : </label>
                                        <select class="form-control selectpicker" data-style="btn btn-link btn-round"
                                            name="llk_ma">
                                            @foreach ($loailinhkien as $loai)
                                                @if (old('llk_ma') == $loai->llk_ma)
                                                    <option value="{{ $loai->llk_ma }}" selected>{{ $loai->llk_ten }}
                                                    </option>
                                                @else
                                                    <option value="{{ $loai->llk_ma }}">{{ $loai->llk_ten }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group ">
                                        <label for="nsx_ma">Nhà Sản Xuất</label>
                                        <select name="nsx_ma" class="form-control selectpicker"
                                            data-style="btn btn-link btn-round">
                                            @foreach ($nsx as $loai)
                                                @if (old('nsx_ma') == $loai->nsx_ma)
                                                    <option value="{{ $loai->nsx_ma }}" selected>{{ $loai->nsx_ten }}
                                                    </option>
                                                @else
                                                    <option value="{{ $loai->nsx_ma }}">{{ $loai->nsx_ten }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="lk_ten" class="bmd-label-floating">Tên Linh Kiện</label>
                                <input required type="text" class="form-control" id="lk_ten" name="lk_ten"
                                    value="{{ old('lk_ten') }}">
                            </div>


                            <div class="form-group">
                                <label for="lk_thongTin" class="bmd-label-floating">Mô Tả</label>
                                <input type="text" class="form-control" id="lk_thongTin" name="lk_thongTin"
                                    value="{{ old('lk_thongTin') }}">
                            </div>
                            <div class="form-group">
                                <label for="bh_ma">Loại Bảo Hành</label>
                                <select name="bh_ma" class="form-control  selectpicker" data-style="btn btn-link btn-round">
                                    @foreach ($bh as $loai)
                                        @if (old('bh_ma') == $loai->bh_ma)
                                            <option value="{{ $loai->bh_ma }}" selected>{{ $loai->bh_ten }}
                                            </option>
                                        @else
                                            <option value="{{ $loai->bh_ma }}">{{ $loai->bh_ten }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="bmd-label-floating" for="lk_gia">Giá Linh Kiện</label>
                                <input type="text" class="form-control" id="lk_gia" name="lk_gia"
                                    value="{{ old('lk_gia') }}">
                            </div>
                            <h6 class="title">Hình Linh Kiện</h6>
                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                <div class="fileinput-new thumbnail">
                                    <img src="../../assets/img/image_placeholder.jpg" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
                                <div>
                                    <span class="btn btn-raised btn-round btn-default btn-file">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input required type="file" name="lk_hinh">
                                    </span>
                                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists"
                                        data-dismiss="fileinput"><i class="fa fa-times"></i> Xóa</a>
                                </div>
                            </div>
                            <br>
                            <button class="btn btn-social btn-fill btn-behance" type="submit">Lưu</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--  --}}

    {{--  --}}

    <div class="card">
        <div class="card-header card-header-social card-header-text">
            <div class="card-text">
                <h6 class="card-title">Danh sách Linh Kiện</h6>
            </div>
        </div>
        <div style="margin-left: 85%" class="row">
            @can('Thêm Linh Kiện')
                <div class="col-lg-12">
                    <a class="btn btn-success" data-toggle="collapse" href="#collapseExample" aria-expanded="false"
                        aria-controls="collapseExample">
                        Thêm Mới Linh Kiện
                    </a>
                </div>
            @endcan
        </div>
        <div class="card-body">
            <div class="table-responsive">

                {{--  --}}
                <table id="myTableht"
                    class=" text-center table table-bordered table-striped table-hover datatable datatable-dbs display">
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
                                Nhà Sản Xuất
                            </th>
                            <th>
                                Loại Linh Kiện
                            </th>
                            <th>
                                Giá Tiền
                            </th>
                            <th>
                                Loại Bảo Hành
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
                                <input style="width: 100px;" type="
                                        text" id="myInput4" onkeyup="myFunction4()" placeholder="  " title="T điện thoại">
                            </th>
                            <th>
                                <input style="width: 100px;" type="
                                        text" id="myInput10" onkeyup="myFunction10()" placeholder=" " title="Loại Đơn">
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
                        @foreach ($dbs as $key => $dbs)
                            <tr data-entry-id="{{ $dbs->lk_ma }}">
                                <td>

                                </td>
                                <td width="10">
                                    {{ $loop->index + 1 }}
                                </td>
                                <td>
                                    {{ $dbs->lk_ten ?? '' }}
                                </td>
                                <td>
                                    {{ $dbs->nsx_ten ?? '' }}
                                </td>
                                <td>
                                    {{ $dbs->llk_ten ?? '' }}
                                </td>
                                <td>
                                    {{ $dbs->lk_gia ?? '' }}
                                </td>
                                <td>
                                    {{ $dbs->bh_ten ?? '' }}
                                </td>
                                <td>
                                    @can('Xem Linh Kiện')
                                        <a class="btn btn-xs btn-primary"
                                            href="{{ route('manager.Linh_Kien.show', $dbs->lk_ma) }}">
                                            <span class="material-icons">
                                                search
                                            </span>
                                        </a>
                                    @endcan
                                    @can('Sửa Linh Kiện')
                                        <a class="btn btn-xs btn-info"
                                            href="{{ route('manager.Linh_Kien.edit', [$dbs->lk_ma]) }}">
                                            <span class="material-icons">
                                                edit
                                            </span>
                                        </a>
                                    @endcan
                                    @can('Xóa Linh Kiện')
                                        <form action="{{ route('manager.Linh_Kien.destroy', $dbs->lk_ma) }}" method="POST"
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
                            <?php
                            $stt++;
                            ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection
@section('scripts')
    <script>
        window.onload = myFunction1()

        function myFunction1() {
            var element, name, arr;
            element = document.getElementById("id4");
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
