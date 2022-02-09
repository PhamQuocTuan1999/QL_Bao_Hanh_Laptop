<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CTU TECH </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" <link
        href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ asset('css/pe-icon-7-stroke.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('css/et-line-icons.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('css/themify-icons.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('css/flexslider.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('css/lightbox.min.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('css/ytplayer.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('css/theme-chipotle.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" media="all" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Mono&display=swap" rel="stylesheet">
    <link
        href="{{ asset('https://fonts.googleapis.com/css?family=Lato:300,400%7CRaleway:100,400,300,500,600,700%7COpen+Sans:400,500,600') }}"
        rel='stylesheet' type='text/css'>
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Titillium+Web:100,300,400,600,700') }}"
        rel="stylesheet" type="text/css">
        <link href="https://kit-pro.fontawesome.com/releases/v5.15.2/css/pro.min.css" rel="stylesheet">
    <link href="{{ asset('css/font-titillium.css') }}" rel="stylesheet" type="text/css">
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: "Times New Roman", Times, serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
            font-size: 14px;
        }
        h5{
            font-family: "Times New Roman", Times, serif;

        }
                .cover h4 {
            color: #007bff;
            background-color: transparent !important;
            width: 800px;
        }
        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        /**/
        .ratings {
            bottom: 4px;
            position: relative
        }

        .ratings i {
            color: #aba8a88c
        }

        .listing {
            background: #eee
        }

        .modal-content {
            border: none
        }

        .listing-child {
            background: #00000012
        }

        .room-spec span {
            margin-right: 10px;
            font-size: 12px
        }

        .spec-text-color {
            color: #8bc34a;
            font-weight: 800
        }

        .info span {
            margin-right: 10px
        }

        .more {
            text-decoration: none;
            font-size: 15px
        }

        .info span i {
            font-size: 12px;
            color: #9e9e9e8f !important
        }

        .spec span {
            margin-right: 10px
        }

        .date {
            line-height: 17px;
            margin-bottom: 8px
        }

        .date-o {
            color: green
        }

        .booking {
            padding-left: 150px !important;
            padding-right: 150px !important
        }
        .bg-secondary {
    background-image: url(img/42_hedg.jpg);
}

    </style>
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
</head>

<body>

    <div class="nav-container">
        <nav class="absolute transparent">
            <div class="nav-bar">
                <div class="module left">
                    <a  style="color: #1f88eb;margin-left: 40px;font-size: 20px" href="#top" class="inner-link" target="_self">
                        <i class="material-icons">handyman</i>
            <samp>CTUTECH CẦN THƠ</samp>
                    </a>
                </div>
                <div class="module widget-handle mobile-toggle right visible-sm visible-xs">
                    <i class="ti-menu"></i>
                </div>
                <div class="module-group right">
                    <div class="module left">
                        <ul class="menu">
                            <li>
                                <a href="{{ route('orders') }}" class="inner-link" target="_self">Gửi Từ Xa</a>
                            </li>
                        </ul>
                    </div>
                    <div class="module left">
                        <ul class="menu">
                            <li>
                                <a href="#about" class="inner-link" target="_self">Điều Kiện</a>
                            </li>
                        </ul>
                    </div>
                    <div class="module left">
                        <ul class="menu">
                            <li>
                                <a href="#rooms" class="inner-link" target="_self">Thông Tin</a>
                            </li>
                        </ul>
                    </div>


                    <div class="module left">
                        <ul class="menu">
                            <li>
                                <a href="#tours" class="inner-link" target="_self">Liên Hệ </a>
                            </li>
                        </ul>
                    </div>

                    @if (Auth::guest())

                        <div class="module left">
                            <ul class="menu">
                                <li>
                                    <a href="{{ route('login') }}">Đăng Nhập</a>
                                </li>
                            </ul>
                        </div>
                        <div class="module left">
                            <ul class="menu">
                                <li>
                                <a href="{{ route('register') }}">Đăng Ký</a>
                                </li>
                            </ul>
                        </div>
                    @else
                        <div class="module left">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @if (Auth::guard('web')->check())
                                        {{ Auth::user()->kh_hoTen }} <span class=""></span> @endif
                                    @if (Auth::guard('admin')->check())
                                        {{ Auth::user()->nv_hoTen }} <span class=""></span>@endif
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ url('/user') }} ">Trang Cá Nhân</a>
                                    {{-- <a class="dropdown-item" href="{{ route('user') }}">Profile</a> --}}
                                    <a class="dropdown-item" href="{{ route('logout') }} "
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng Xuất</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        {{ csrf_field() }}
                                    </form>


                                </div>

                            </div>

                        </div>


                    @endif

{{--
                    @if (Auth::guest())
                    <script>
                        var a =document.getElementById("dropdownMenuButton");
                        function initFreshChat() {
                          window.fcWidget.init({
                            token: "e962a1f8-fa16-4514-bc05-e78b5bbc0ede",
                            host: "https://wchat.freshchat.com"
                          });

                        }
                        function initialize(i,t){var e;i.getElementById(t)?initFreshChat():((e=i.createElement("script")).id=t,e.async=!0,e.src="https://wchat.freshchat.com/js/widget.js",e.onload=initFreshChat,i.head.appendChild(e))}function initiateCall(){initialize(document,"Freshchat-js-sdk")}window.addEventListener?window.addEventListener("load",initiateCall,!1):window.attachEvent("load",initiateCall,!1);
                      </script>
                    @else
                    <?php  $ten= Auth::user()->kh_hoTen ;  ?>
                        <!-- Head -->
<script src="https://wchat.freshchat.com/js/widget.js"></script>
<!-- Head -->

<script>
    var a =document.getElementById("dropdownMenuButton");
    function initFreshChat() {
      window.fcWidget.init({
        token: "e962a1f8-fa16-4514-bc05-e78b5bbc0ede",
        host: "https://wchat.freshchat.com"
      });
      window.fcWidget.user.setFirstName('{{$ten}}');
    }
    function initialize(i,t){var e;i.getElementById(t)?initFreshChat():((e=i.createElement("script")).id=t,e.async=!0,e.src="https://wchat.freshchat.com/js/widget.js",e.onload=initFreshChat,i.head.appendChild(e))}function initiateCall(){initialize(document,"Freshchat-js-sdk")}window.addEventListener?window.addEventListener("load",initiateCall,!1):window.attachEvent("load",initiateCall,!1);
  </script>
                    @endif --}}


                    <!-- logio  -->
                    <div class="collapse navbar-collapse module left" id="navbarSupportedContent">
                        <!-- Right Side Of Navbar -->
                        <!-- Authentication Links -->
                    </div>
                    <!-- logio -->
                </div>
            </div>



        </nav>
    </div>
    <div class="main-container">
        <section class="cover fullscreen image-slider slider-arrow-controls kenburns parallax">
            <ul class="slides">

                <li class="image-bg col">
                    <div class="background-image-holder">
                        <img alt="" class="background-image" src="img/slide1.jpg">
                    </div>
                    <div class="align-bottom">
                        <div class="row">
                            <div class="col-sm-12">
                                <hr class="mb24">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12 text-center-xs mb-xs-24">
                                <h4 class="uppercase mb0 bold"><i class="fal fa-desktop"></i> Chúng Tôi Cam Kết Sửa Chuyên Nghiêp</h4>
                            </div>
                            <div class="hidden-sm hidden-xs col-md-6">

                            </div>
                            <div class="col-sm-6 col-xs-12 text-right text-center-xs col-md-3">
                                <!-- aa -->

                                <!-- bbb -->
                            </div>
                        </div>

                    </div>

                </li>
                <li class="image-bg ">
                    <div class="background-image-holder">
                        <img alt="" class="background-image"
                            src="img/IMG_6790-1.JPG">
                    </div>
                    <div class="align-bottom">
                        <div class="row">
                            <div class="col-sm-12">
                                <hr class="mb24">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-xs-12 text-center-xs mb-xs-24">
                            <h4 class="uppercase mb0 bold"><i class="fal fa-desktop"></i> Chúng Tôi Cam Kết Sửa Chuyên Nghiêp</h4>
                            </div>
                            <div class="hidden-sm hidden-xs col-md-6">

                            </div>
                            <div class="col-sm-6 col-xs-12 text-right text-center-xs col-md-3">

                            </div>
                        </div>

                    </div>

                </li>
                <li class="image-bg pt-xs-140 pb-xs-140">
                    <div class="background-image-holder">
                        <img alt="MÁY TÍNH CẦN THƠ, Can Tho, Mekong Delta, Vietnam" class="background-image"
                            src="img/42_hedg.JPG">
                    </div>
                    <div class="align-bottom">
                        <div class="row">
                            <div class="col-sm-12">
                                <hr class="mb24">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-xs-12 text-center-xs mb-xs-24">
                            <h4 class="uppercase mb0 bold" style="    color: #007bff;"><i class="fal fa-desktop"></i> Chúng Tôi Cam Kết Sửa Chuyên Nghiêp</h4>
                            </div>
                            <div class="hidden-sm hidden-xs col-md-6">

                            </div>
                            <div class="col-sm-6 col-xs-12 text-right text-center-xs col-md-3">

                            </div>
                        </div>

                    </div>

                </li>
            </ul>
        </section>
        <div class="problems">
            <div class="problems-title">
                <h3>Những vấn đề gì có thể sửa chữa khắc phục?</h3>
                <h3 id="icon-text"></h3>
            </div>
            <div class="problems-content">
                <div class="problems-row">
                    <div class="problems-item">

                        <h4><img src="img/icon1.JPG" alt=""> Cracked Screen</h4>
                        <p>Dịch vụ thay thế màn hình bị nứt vừa nhanh chóng vừa hợp túi tiền.</p>
                    </div>
                    <div class="problems-item">
                        <h4><img src="img/icon2.JPG" alt=""> Water Damage</h4>
                        <p>Chúng tôi sẽ thực hiện chẩn đoán để xác định mức độ thiệt hại.</p>
                    </div>
                    <div class="problems-item">
                        <h4><img src="img/icon3.JPG" alt=""> Speaker Not Working</h4>
                        <p>Bạn có thể cần sửa chữa hoặc thay thế loa.</p>
                    </div>
                </div>
                <div class="problems-row">
                    <div class="problems-item">
                        <h4><img src="img/icon4.JPG" alt=""> No Signal</h4>
                        <p>Khi bạn đang gặp phải tình trạng tín hiệu yếu hoặc không có tín hiệu.</p>
                    </div>
                    <div class="problems-item">
                        <h4><img src="img/icon5.JPG" alt=""> Broken Buttons</h4>
                        <p>Nếu các nút trên thiết bị của bạn bị trục trặc hoặc bị hỏng.</p>
                    </div>
                    <div class="problems-item">
                        <h4><img src="img/icon6.JPG" alt=""> Dead Battery</h4>
                        <p>FixTeam thực hiện thay thế pin chuyên nghiệp.</p>
                    </div>
                </div>
            </div>

        </div>
        <section>
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if (Session::has('alert-' . $msg))
                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#"
                                class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    @endif
                @endforeach
            </div>
            <div class="container">
                <div class="row v-align-children">
                    <div class="col-sm-5">
                        <!-- <h3> MÁY TÍNH CẦN THƠ</h3>
                        <p class="lead mb40">
                        </p>
                        <div class="overflow-hidden mb32 mb-xs-24">
                            <i class="icon pull-left ti ti-star icon-sm"></i>
                            <h6 class="uppercase mb0 inline-block p32">Uy Tín - Chất Lượng Hàng Đầu <br></h6>
                        </div>
                        <div class="overflow-hidden mb32 mb-xs-24">
                            <i class="ti-medall-alt icon icon-sm pull-left"></i>
                            <h6 class="uppercase mb0 inline-block p32">Top Các Trung Tâm Bảo Hành Tại Cần Thơ</h6>
                        </div> -->
                        <img src="img/laptop.jpg" alt="">
                    </div>
                    <div class="col-sm-6 col-md-6" style="color: ">
                        <div class="pricing-table pt-1 text-center emphasis">
                            <h4 class="uppercase bold"><br>Quy Trình Sửa Chửa</h4>
                            <!-- <h5 class=" bold" > BƯỚC 1: Nhân viên kiểm tra báo tình trạng máy và hẹn ngày trả máy cho khách hàng </h5>
                            <h5 class=" bold" > BƯỚC 2: Nhân viên kỹ thuận sẽ tiến tiến hành sửa thiết bị <br> (Nếu có hư hổng nặng nhân viên sẽ liên hệ khách hàng để sử lý) </h5>
                            <h5 class=" bold"> BƯỚC 3: Nhân viên cùng với khách hàng sẽ tiến tiến hành kiểm tra thiết bị trước nhận thiết bị <br> (Nhân viên lập phiếu bảo hành cho khách hàng ) </h5> -->
                            <h5><i class="fal fa-laptop-medical"></i> Kiểm tra tình trạng máy, hẹn ngày trả</h5>
                            <h5><i class="fal fa-tools"></i> Tiến hành sửa chữa thiết bị</h5>
                            <h5><i class="fal fa-spray-can"></i> Vệ sinh thiết bị</h5>
                            <h5><i class="fal fa-laptop"></i> Kiểm tra trước khi giao cho khách hàng</h5>
                            <h5><i class="fal fa-ballot-check"></i> Bảo hành thiết bị nếu có</h5>
                        </div>

                    </div>
                </div>

            </div>

        </section><a id="rooms" class="in-page-link"></a>
            <div class="problems-title" id="Testimonials">
                <h3>Chứng Thực</h3>
                <h3 id="icon-text"></h3>
            </div>
        <section class="projects">
            <div class="container">
                <div class="masonry-loader">
                    <div class="col-sm-12 text-center">
                        <div class="spinner"></div>
                    </div>
                </div>
                <div class="row masonry masonryFlyIn">
                <p class="mySlides"> Kiểm tra máy miễn phí</p>
                        <p class="mySlides"> Báo giá trước khi sửa chữa</p>
                        <p class="mySlides"> Làm sai, hỏng 01 đền gấp đôi</p>
                        <p class="mySlides">  Giữ máy lâu quá 10 ngày GIẢM 50% chi phí sửa</p>
                        <p class="mySlides">  Máy lỗi quay lại lần 03 hoàn trả lại 100% chi phí</p>
                        <div class="btn-slider">
                            <button class="w3-button w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
                            <button class="w3-button w3-display-right" onclick="plusDivs(+1)">&#10095;</button>
                        </div>
                    <!-- <div class="col-sm-10 col-md-6 masonry-item project" data-filter="People">
                         <div class="image-tile hover-tile text-center">
                            <img alt="Delux Room" class="background-image"
                                src="img/3-rooms-size-L-with-fan-ac-size-s-m-economy1.JPG">
                            <div class="hover-state">
                            </div>
                        </div> -->

                    </div> -->
                    <!-- <div class="col-sm-6 masonry-item project" data-filter="People">
                            <h3> - Kiểm tra máy miễn phí. </h3>
                            <h3> - Báo giá trước khi sửa chữa. </h3>
                            <h3> -Làm sai, hỏng 01 đền gấp đôi. </h3>
                            <h3> - Giữ máy lâu quá 10 ngày GIẢM 50% chi phí sửa. </h3>
                            <h3> - Máy lỗi quay lại lần 03 hoàn trả lại 100% chi phí </h3>
                    </div> -->
                </div>

            </div>

        </section><a id="about" class="in-page-link"></a>

        <section class="bg-secondary">

            <div class="container">
                <div class="row mb64 mb-xs-24">
                    <div class="col-md-10 col-md-offset-1 col-sm-12 text-center">
                        <h3>Điều kiện bảo hành </h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5 col-md-offset-1 col-sm-6 mb40 mb-xs-24">
                        <i  style="color: #33ff00"class="ti-layers icon inline-block mb16 fade-3-4"></i>
                        <h4 id="baohanh">Trường hợp được bảo hành</h4>
                        <p style="color: #fff">
                            - Các điều kiện được bảo hành tuân thủ theo các điều kiện bảo hành của các hãng sản xuất như: HP, IBM, Lenovo, Sony, Samsung, Acer, LG, Dell,... (có trong Catalogue đi kèm theo sản phẩm).
                            <br> <br>
                            - Thiết bị được bảo hành miễn phí nếu thiết bị đó còn trong thời gian bảo hành tính từ ngày giao hàng, thiết bị được bảo hành trong thời gian bảo hành ghi trong TEM và theo quy định của từng hãng sản xuất tất cả các sự cố về mặt kỹ thuật.
                            <br> <br>
                            - Có phiếu xuất hàng linh kiện và tem bảo hành của công ty trên thiết bị.
                            <br> <br>
                            - Các thiết bị điện tử do trung tâm sửa chữa, thay thế linh kiện theo báo giá hoặc quy định của công ty (từ 1 tháng đến 12 tháng tùy theo từng sản phẩm)..</p>
                            <br> <br>
                        </div>
                    <div class="col-md-5 col-sm-6 mb40 mb-xs-24">
                        <i style="color: rgb(182, 11, 11)"class="icon inline-block mb16 fade-3-4 ti ti-heart"></i>
                        <h4 id="khongbaohanh">Trường hợp không được bảo hành</h4>
                        <p style="color: #fff ">- Các lỗi mà hãng sản xuất quy định không thuộc diện bảo hành.

                            - Các lỗi do người dùng sử dụng không đúng hướng dẫn, tự tháo máy, tự chỉnh sửa, bảo trì không đúng cách.
                            <br> <br>
                            - Hư hỏng do tai nạn, thiên tai, môi trường sử dụng, do va đập, gãy vỡ, chất lỏng vào, côn trùng xâm nhập hoặc nguồn điện không ổn định.
                            <br> <br>
                            - Các trường hợp phiếu bảo hành hết hạn, mất phiếu bảo hành, thông tin trên phiếu bảo hành bị thay đổi hoặc thông tin thiết bị không tra cứu được trên cơ sở dữ liệu và khách hàng không xuất trình được chứng từ mua hàng hợp lệ.
                            <br> <br>
                            - Các trường hợp tem/ nhãn bảo hành, tem mã vạch trên sản phẩm và linh kiện không còn nguyên vẹn, mở tem không xác định được ngày tháng. <br><br><br> </p>
                            <br> <br>
                        </div>

                </div>

            </div>

        </section>
        <section>
            <div class="container">
                <div class="row v-align-children">
                    <div class="col-sm-10 col-md-10">
                        <h2 class="uppercase color-primary text-lg-center">Cửa Hàng Bảo Hành/ Sửa Chữa CTU TECH</h2>
                        <hr >

                    <div class="text-lg-center">
                            <span class="sub " >  CÔNG TY TNHH MTV KHOA HỌC - CÔNG NGHỆ THUỘC TRƯỜNG ĐẠI HỌC CẦN THƠ  &nbsp; Số 1 Lý Tự Trọng, P. An Phú, Q. Ninh Kiều, TP. Cần Thơ <br>https://www.ctutech.com.vn/ &nbsp;| Email <a
                                    href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                    data-cfemail="c3aaada5ac83abacb7a6afbbaca2aaeda0acae">ctutech.co@gmail.com</a><br> Hỗ trợ kỹ thuật:
                                    0292. 3733.113 <br>Thứ Hai – Thứ Sáu : 7:30-11:30, 13:30-17:30. Thứ Bảy : Tạm nghỉ                      </span>
                            </div>
                    </div>
                    <div class="col-sm-6 col-md-offset-1 p0">

                    </div>
                </div>

            </div>
            <a class="btn btn-sm fade-half back-to-top inner-link" href="#top">Top</a>
            <div class="zalo-chat-widget" data-oaid="2553555335294890658" data-welcome-message="Rất vui khi được hỗ trợ bạn!" data-autopopup="5" data-width="350" data-height="420"></div>

        <script src="https://sp.zalo.me/plugins/sdk.js"></script>
        </section>


        <a id="tours" class="in-page-link"></a>



        <section class="p0">
            <div class="map-holder pt180 pb180">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7857.580054077018!2d105.7765734!3d10.0341785!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0881f97fc2a4b%3A0x6bb8d2fcfabee8f2!2zQ1RVVEVDSCBDw7RuZyB0eSBUTkhIIE1UViBLaG9hIEjhu41jIEPDtG5nIE5naOG7hyBUaHXhu5ljIFRyxrDhu51uZyDEkOG6oWkgSOG7jWMgQ-G6p24gVGjGoQ!5e0!3m2!1svi!2s!4v1625402200956!5m2!1svi!2s"></iframe>
            </div>
        </section><a id="location" class="in-page-link"></a>





    </div>


    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/flexslider.min.js"></script>
    <script src="js/lightbox.min.js"></script>
    <script src="js/masonry.min.js"></script>
    <script src="js/twitterfetcher.min.js"></script>
    <script src="js/spectragram.min.js"></script>
    <script src="js/ytplayer.min.js"></script>
    <script src="js/countdown.min.js"></script>
    <script src="js/smooth-scroll.min.js"></script>
    <script src="js/parallax.js"></script>
    <script src="js/scripts.js"></script>


    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length} ;
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  x[slideIndex-1].style.display = "block";
}
    </script>
</body>

</html>
