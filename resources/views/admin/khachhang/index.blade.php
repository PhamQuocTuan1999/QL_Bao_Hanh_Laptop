@extends('admin.homeMG')
@section('title')
    Quản Lý Khách Hàng
@endsection


@section('content')
    <div style="margin-top:-5%">
        <div class="card card-nav-tabs card-plain ">
            <ul class="nav nav-pills nav-pills-icons border-bottom border-dark" role="tablist">
                <li class="nav-item">
                    <a class=" btn btn-link " style="margin-left:-10%" aria-controls="nav-home" aria-selected="true"
                        data-toggle="tab" href="#link1" role="tablist" aria-expanded="true">
                        <samp style="font-size: 18px">Quản Lý Khách Hàng</samp>
                    </a>
                </li>

            </ul>
        </div>
    </div>

    <div style="margin-bottom: 10px;" class="row">
    </div>
    <div class="card">
        <div class="card-header card-header-social card-header-text">
            <div class="card-text">
                <h6 class="card-title">Danh sách Khách Hàng</h6>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">


                <table  id="myTableht" class=" text-center table table-bordered table-striped table-hover datatable datatable-User  display">
                    <thead>
                        <tr class="text-center">
                            <th width="10">

                            </th>
                            <th width="50">
                                ID
                            </th>
                            <th>
                                Họ Tên Khách Hàng
                            </th>
                            <th>
                                Email Khách Hàng
                            </th>
                            <th>
                                Số Điện Thoại
                            </th>
                            <th>
                                Địa Chỉ
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
                                <input style="width: 200px;" type="
                                        text" id="myInput5" class="col-13" onkeyup="myFunction5s()"
                                    placeholder="  " title="Thiết bị ">
                            </th>
                            <th>

                            </th>


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


                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        @foreach ($KhachHang as $key => $user)
                            <tr data-entry-id="{{ $user->id }}">
                                <td>

                                </td>
                                <td class="text-center" width="10">
                                    {{ $loop->index + 1 }}
                                </td>
                                <td>
                                    {{ $user->kh_hoTen ?? '' }}
                                </td>
                                <td>
                                    {{ $user->kh_email ?? '' }}
                                </td>
                                <td>
                                    {{ $user->kh_dienThoai ?? '' }}
                                </td>
                                <td>
                                    {{ $user->kh_diaChi ?? '' }}
                                </td>
                                <td>
                                    @can('Xem Khách Hàng')
                                    <a class="btn btn-xs btn-primary"
                                        href="{{ route('manager.khachhang.show', $user->id) }}">
                                        <span class="material-icons">
                                            search
                                        </span>
                                    </a>

                                    @endcan
                                    @can('Sửa Khách Hàng')
                                    <a class="btn btn-xs btn-info"
                                        href="{{ route('manager.khachhang.edit', [$user->id]) }}">
                                        <span class="material-icons">
                                            edit
                                        </span>
                                    </a>
                                    @endcan
                                    @can('Xóa khách Hàng')
                                    <form action="{{ route('manager.khachhang.destroy', $user->id) }}" method="POST"
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
                </table>
                {{-- dang thuye --}}

            </div>
        </div>
    </div>




@endsection
@section('scripts')
    <script>
        window.onload = myFunction1()

        function myFunction1() {
            var element, name, arr;
            element = document.getElementById("id5");
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
            @can('khachhang_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('manager.khachhang.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                return $(entry).data('entry-id')
                });

                if (ids.length === 0) {
                alert('{{ trans('global.datatables.zero_selected') }}')

                return
                }

                if (confirm(' Bạn có chắc xóa ?')) {
                $.ajax({
                headers: {'x-csrf-token': _token},
                method: 'POST',
                url: config.url,
                data: { ids: ids, _method: 'DELETE' }})
                .done(function () { location.reload() })
                }
                }
                }
                dtButtons.push(deleteButton)
            @endcan

            $.extend(true, $.fn.dataTable.defaults, {
                order: [
                    [1, 'desc']
                ],
                pageLength: 25,
            });
            $('.datatable-User:not(.ajaxTable)').DataTable({
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
