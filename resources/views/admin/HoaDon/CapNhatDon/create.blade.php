@extends('admin.CSSKid')
@section('title')
    Danh Sách Đơn Bảo Hành
@endsection

@section('content')

    <div style="margin-top:-4%" >
      <div  class="card card-nav-tabs card-plain " >
        <ul class="nav nav-pills nav-pills-icons border-bottom border-dark" role="tablist">
            <li class="nav-item">
                <a class="nav-link  active btn-outline-danger " aria-controls="nav-home" aria-selected="true" data-toggle="tab" href="#link1" role="tablist" aria-expanded="true">
                    Đơn Bảo Hành

                </a>
            </li>

        </ul>
    </div>
        <div class="">

            <div class="tab-pane text-left" id="link1" aria-expanded="false">
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


                            <div>
                                <div class="card">
                                    <div class="card-header text-left card-header-social card-header-text">
                                        <div class="card-text">
                                          <h6 class="card-title">Đơn Bảo Hành</h6>
                                        </div>
                                      </div>
                                    <div class="card-body ">
                                     <form method="post" action="{{ route('manager.HoaDon.store') }}"
                                        enctype="multipart/form-data">
                                        {{ csrf_field() }}




                                        <div class="form-row ">
                                            <div class="col">
                                                <div class="form-group row">
                                                    <label for="lhd_ma" class=" col-form-label">Loại Đơn Bảo Hành
                                                        :</label>
                                                    <div class="col-sm-3 ">
                                                        <select name="lhd_ma"  data-style="btn btn-primary btn-round"
                                                            class="form-control selectpicker ">
                                                            <option value="1">Bảo Hành</option>
                                                            <option value="2">Sửa Chữa</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group row">
                                                    <label for="nv_id" class="col-form-label">Nhân viên xử lý:
                                                    </label>
                                                    <div class="col-lg-5 col-md-6 col-sm-4 ">



                                                        <select class="form-control selectpicker  " data-style="btn btn-default"
                                                            name="nv_id" >
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
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group align-middle">
                                                    <label class="bmd-label-floating" for="kh_hoTen">Khách Hàng</label>
                                                    <input required type="text" class="form-control " id="kh_hoTen"
                                                        name="kh_hoTen" value="{{ old('kh_hoTen') }}">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating" for="kh_maSoThue">Mã Số Thuế</label>
                                                    <input type="text" class="form-control" id="kh_maSoThue"
                                                        name="kh_maSoThue" value="{{ old('kh_maSoThue') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating" for="kh_dienThoai">Số Điện Thoại</label>
                                                    <input required type="number" class="form-control"
                                                        id="kh_dienThoai" name="kh_dienThoai"
                                                        value="{{ old('kh_dienThoai') }}">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating" for="kh_diaChi">Địa Chỉ</label>
                                                    <input required type="text" class="form-control"
                                                        id="kh_diaChi" name="kh_diaChi"
                                                        value="{{ old('kh_diaChi') }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label class="bmd-label-floating" for="hd_nhan">Tên Thiết Bị</label>
                                            <input required type="text" class="form-control" id="hd_nhan"
                                                name="hd_nhan" value="{{ old('hd_nhan') }}">
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating" for="hd_gia">Báo Giá </label>
                                            <input  type="number" class="form-control" id="hd_gia"
                                                name="hd_gia" value="{{ old('hd_gia') }}">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label  for="hd_thoiGianXuLy">Thời Giang Hẹn Trả</label>
                                            <input required type="date" class="form-control   datepicker" id="hd_thoiGianXuLy"
                                                name="hd_thoiGianXuLy" value="{{ old('hd_thoiGianXuLy'), date('Y-m-d H:i:s')  }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label  class="bmd-label-floating" for="hd_ghiChu">Ghi Chú</label>
                                            <textarea required class="form-control" name="hd_ghiChu"   id="exampleFormControlTextarea1" rows="2">{{ old('hd_ghiChu') }}</textarea>
                                        </div>

                                        <button class="btn btn-rose btn-block " type="submit">Lưu</button>

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
            $('.datatable-dskt:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })
    </script>
@endsection
