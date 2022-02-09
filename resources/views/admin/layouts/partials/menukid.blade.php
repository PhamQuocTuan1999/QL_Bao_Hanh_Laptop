<div class="sidebar" data-color="green" data-background-color="white" data-image="../../../../../assets/img/sidebar-2.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo"> <a style="color: #1f88eb;margin-left: 25px"  href="#" class="simple-text logo-normal">
        <i class="material-icons">handyman</i>
        <samp>CTUTECH CẦN THƠ</samp>
        </a></div>

    <div class="sidebar-wrapper" style="background-image: ../../../../../assets/img/sidebar-2.jpg">
        <div class="user">
            <div class="">

            </div>
            <div  class="user-info">

                <a style="margin-left: 50px" data-toggle="collapse" href="#usere1" class="nav-link">
                    <span>
                        {{ Auth::user()->nv_hoTen }}
                        <b class="caret"></b>
                    </span>
                </a>
                <div class="collapse" id="usere1">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> MP </span>
                                <span class="sidebar-normal">Hồ Sơ Cá Nhân </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        <ul class="nav">
            @can('Xem Thống Kê')


                {{-- <li id="id1" class="nav-item   ">
                    <a class="nav-link" href="{{ url('manager') }}">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                    </a>
                </li> --}}

                <li class="nav-item ">
                    <a class="nav-link active" id="id8" data-toggle="collapse" aria-expanded="false" href="#mapsExamples3">
                        <i class="material-icons">dashboard</i>
                        <p> Thống Kê
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="mapsExamples3">
                        <ul class="nav"style="margin-left: 20px" >

                                <li class="nav-item">
                                    <a href="{{ url('manager') }}"
                                        class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <span class="sidebar-mini"> TH</span>
                                        <span class="sidebar-normal"> Thống Kê Tổng</span>

                                    </a>
                                </li>

                            <li class="nav-item">
                                <a href="{{ route('manager.tk_nv') }}"
                                    class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                    <span class="sidebar-mini"> NV </span>
                                    <span class="sidebar-normal">Theo Nhân Viên Xử Lý</span>

                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('manager.tk_nvn') }}"
                                    class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                    <span class="sidebar-mini"> NV </span>
                                    <span class="sidebar-normal"> Theo Nhân Viên Nhận </span>

                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('manager.tk_tg') }}"
                                    class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                    <span class="sidebar-mini"> TN </span>
                                    <span class="sidebar-normal"> Theo Ngày</span>

                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('manager.tk_kh') }}"
                                    class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                    <span class="sidebar-mini"> KH </span>
                                    <span class="sidebar-normal">  Theo Khách Hàng </span>

                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('manager.tk_ld') }}"
                                    class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                    <span class="sidebar-mini"> LD </span>
                                    <span class="sidebar-normal"> Theo Loại Đơn </span>

                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('manager.tk_llk') }}"
                                    class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                    <span class="sidebar-mini"> LD </span>
                                    <span class="sidebar-normal"> Theo Loại Linh Kiện </span>

                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('manager.Thong_Ke_Phan_hoi') }}"
                                    class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                    <span class="sidebar-mini"> PH </span>
                                    <span class="sidebar-normal"> Theo Phản Hồi/Đánh Gia </span>

                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
            @endcan

            @can('Xem Nhân Viên')
                <li class="nav-item ">
                    <a class="nav-link active" id="id8" data-toggle="collapse" aria-expanded="false" href="#mapsExamples1">
                        <i class="material-icons">person</i>
                        <p> QL Nhân Viên
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="mapsExamples1">
                        <ul class="nav" style="margin-left: 20px" >
                            @can('Super_user')
                                <li class="nav-item">
                                    <a href="{{ route('admin.permissions.index') }}"
                                        class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <span class="sidebar-mini"> PR</span>
                                        <span class="sidebar-normal"> Quyen</span>

                                    </a>
                                </li>
                            @endcan
                            <li class="nav-item">
                                <a href="{{ route('admin.roles.index') }}"
                                    class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                    <span class="sidebar-mini"> VT </span>
                                    <span class="sidebar-normal">Vai Trò </span>

                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('manager.users.index') }}"
                                    class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                    <span class="sidebar-mini"> NV </span>
                                    <span class="sidebar-normal"> Nhân Viên</span>

                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endcan


          @can('Quản Lý Vận Chuyển')


            <li class="nav-item ">
                <a class="nav-link active" id="id8" data-toggle="collapse" aria-expanded="false" href="#mapsExamples2">
                    <i class="material-icons">person</i>
                    <p> QL Vận Chuyển
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="mapsExamples2">
                    <ul class="nav" style="margin-left: 20px" >

                            <li class="nav-item">
                                <a href="{{ route('manager.Van_Chuyen.index') }}"
                                    class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                    <span class="sidebar-mini"> PR</span>
                                    <span class="sidebar-normal">Vận Chuyển</span>

                                </a>
                            </li>

                        <li class="nav-item">
                            <a href="{{ route('manager.Van_Chuyen_Duyet') }}"
                                class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                <span class="sidebar-mini"> PR</span>
                                <span class="sidebar-normal"> Vận Chuyển Đến </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('manager.Xac_Nhan_Den') }}"
                                class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                <span class="sidebar-mini"> PR</span>
                                <span class="sidebar-normal"> Vận Chuyển Đi</span>
                            </a>
                        </li>


                    </ul>
                </div>
            </li>
            @endcan
            @can('Xem Đơn Bảo Hành')




{{-- ?\ --}}
<li class="nav-item ">
    <a class="nav-link active" id="id8"  href="{{ route('manager.HoaDon.index') }}">
        <i class="material-icons">pending_actions</i>
        <p> QL Đơn Bảo Hành

        </p>
    </a>
    <div class="collapse" id="mapsExamples5">
        <ul class="nav" style="margin-left: 20px" >

                <li class="nav-item">
                    <a href="{{ route('manager.HoaDon.index') }}"
                        class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                        <span class="sidebar-mini"> PR</span>
                        <span class="sidebar-normal"> Đơn Bảo Hành </span>

                    </a>
                </li>



        </ul>
    </div>
</li>




{{--  --}}

            @endcan
            {{--  --}}
            @can('Xem NSX')
                <li id="id0" class="nav-item ">
                    <a class="nav-link" href="{{ route('manager.Nha_San_Xuat.index') }}">
                        <i class="material-icons">account_balance</i>
                        <p>QL Nhà Sản Xuất</p>
                    </a>
                </li>
            @endcan
            @can('Xem Loại Linh Kiện')
                <li id="id3" class="nav-item ">
                    <a class="nav-link" href="{{ route('manager.Loai_Linh_Kien.index') }}">
                        <i class="material-icons">content_paste</i>
                        <p> QL Loại Linh Kiện</p>
                    </a>
                </li>
            @endcan
            @can('Xem Linh Kiện')
                <li id="id4" class="nav-item ">
                    <a class="nav-link" href="{{ route('manager.Linh_Kien.index') }}">
                        <i class="material-icons">devices_other</i>
                        <p>QL Linh Kiện</p>
                    </a>
                </li>
            @endcan
            @can('Xem Khách Hàng')


                <li id="id5" class="nav-item ">
                    <a class="nav-link" href="{{ route('manager.khachhang.index') }}">
                        <i class="material-icons">transfer_within_a_station</i>
                        <p>QL Khách Hàng</p>
                    </a>
                </li>
            @endcan


            @can('Xem Bảo Hành')
                <li id="id7" class="nav-item ">
                    <a class="nav-link" href="{{ route('manager.Bao_Hanh.index') }}">
                        <i class="material-icons">beenhere</i>
                        <p>QL Bảo Hành</p>
                    </a>
                </li>
            @endcan
            <li class="nav-item ">
                <a href="#" class="nav-link"
                    onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="material-icons">logout</i>
                    <p>Đăng Xuất</p>

                    <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </a>
            </li>


        </ul>
    </div>
</div>
