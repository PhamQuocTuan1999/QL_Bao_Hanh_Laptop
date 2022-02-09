@extends('admin.homeMG')
@section('title')
    Dashboard
@endsection
@section('content')
    <div id="carouselExampleIndicators" class="carousel slide" data-slick="autoplay :true, autoplaySpeed:5"
        data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <h2> Thống kê theo ngày</h2>
                <div class="row" id="day">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">transfer_within_a_station</i>
                                </div>
                                <p class="card-category"> Khách Hàng</p>
                                <h3 class="card-title">+{{$khday}}

                                </h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">update</i>
                                    <samp>Thêm Mới Hôm Nay</samp>
                                </div>
                                <a href="{{ route('manager.kh_day') }}"target="_blank" rel="noopener noreferrer"> Chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-info card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">gpp_good</i>
                                </div>
                                <p class="card-category">Đơn Bảo Hành</p>
                                <h3 class="card-title">+ {{$hoadonbhday}}</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">update</i> <samp>Thêm Mới Hôm Nay</samp>
                                </div>
                                <a  href="{{ route('manager.bh_day') }}"target="_blank" rel="noopener noreferrer"> Chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-danger card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">handyman</i>
                                </div>
                                <p class="card-category">Đơn Sửa Chữa</p>
                                <h3 class="card-title">+{{$hoadonscday}} </h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">local_offer</i>
                                    <samp>Thêm Mới Hôm Nay</samp>
                                </div>
                                <a href="{{  route('manager.sc_day') }}"target="_blank" rel="noopener noreferrer"> Chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-success card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">price_check</i>
                                </div>
                                <p class="card-category">Doanh Thu: <small>VNĐ</small> </p>
                                <h3 class="card-title">+ {{ number_format($doanhthuday)}}  </h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">date_range</i> <samp>Ngày Hôm Nay</samp>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="carousel-item">
                <h2> Thống kê theo Tuần</h2>
                <div class="row " id="week">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">transfer_within_a_station</i>
                                </div>
                                <p class="card-category"> Khách Hàng</p>
                                <h3 class="card-title">+{{$khweek}}

                                </h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">update</i>
                                    <samp>Thêm Mới Hôm Nay</samp>
                                </div>
                                <a href="{{  route('manager.kh_week') }}"target="_blank" rel="noopener noreferrer"> Chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-info card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">gpp_good</i>
                                </div>
                                <p class="card-category">Đơn Bảo Hành</p>
                                <h3 class="card-title">+ {{$hoadonbhweek}}</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">update</i> <samp>Thêm Mới Hôm Nay</samp>
                                </div>
                                <a href="{{  route('manager.bh_week') }}"target="_blank" rel="noopener noreferrer"> Chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-danger card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">handyman</i>
                                </div>
                                <p class="card-category">Đơn Sửa Chữa</p>
                                <h3 class="card-title">+{{$hoadonscweek}} </h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">local_offer</i> <samp>Thêm Mới Hôm Nay</samp>
                                </div>
                                <a href="{{  route('manager.sc_week') }}"target="_blank" rel="noopener noreferrer"> Chi tiết</a>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-success card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">price_check</i>
                                </div>
                                <p class="card-category">Doanh Thu: <small>VNĐ</small> </p>
                                <h3 class="card-title">+ {{ number_format($doanhthuweek)}} </h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">date_range</i> <samp>Ngày Hôm Nay</samp>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="carousel-item">
                <h2> Thống kê theo Tháng</h2>
                <div class="row " id="mont">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">transfer_within_a_station</i>
                                </div>
                                <p class="card-category"> Khách Hàng</p>
                                <h3 class="card-title">+{{$khmonth}}

                                </h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">update</i>
                                    <samp>Thêm Mới Hôm Nay</samp>
                                </div>
                                <a href="{{  route('manager.kh_month') }}"target="_blank" rel="noopener noreferrer"> Chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-info card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">gpp_good</i>
                                </div>
                                <p class="card-category">Đơn Bảo Hành</p>
                                <h3 class="card-title">+ {{$hoadonbhmonth}}</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">update</i> <samp>Thêm Mới Hôm Nay</samp>
                                </div>
                                <a href="{{  route('manager.bh_month') }}"target="_blank" rel="noopener noreferrer"> Chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-danger card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">handyman</i>
                                </div>
                                <p class="card-category">Đơn Sửa Chữa</p>
                                <h3 class="card-title">+{{$hoadonscmonth}} </h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">local_offer</i> <samp>Thêm Mới Hôm Nay</samp>
                                </div>
                                <a href="{{  route('manager.sc_month') }}"target="_blank" rel="noopener noreferrer"> Chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-success card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">price_check</i>
                                </div>
                                <p class="card-category">Doanh Thu: <small>VNĐ</small> </p>
                                <h3 class="card-title">+ {{ number_format($doanhthumonth)}} </h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">date_range</i> <samp>Ngày Hôm Nay</samp>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
        <a style="color: red " class=" carousel-control-prev" href="#carouselExampleIndicators" role="button"
            data-slide="prev">
            <span class=" carousel-control-prev-icon" aria-hidden="true"></span>
            <span style="color: red" class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>



    <div class="row">
        {{-- <div class="col-md-12"> --}}
          <div class="card card-chart">
            <div class="card-header card-header-success">
             {{--  --}}
             <div id="chartContainer1" style="height: 250px; width: 100%;"></div>

             {{--  --}}
            </div>
            <div class="card-body">
              <h4 class="card-title">Tổng Doanh Thu Trung Bình Của Tháng:<i class="fa fa-long-arrow-up"></i>  <span class="text-success">{{number_format($TB)}} VNĐ </span> </h4>

              <p class="card-category">
                <span class="text-success"> </span> </p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> {{Now()}}
              </div>
            </div>
          </div>
        </div>
    </div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


{{--
        <script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer1", {
	animationEnabled: true,
	title:{
		text: "Doanh Thu 30 Ngày"
	},
    axisX:{
		valueFormatString: "DD MMM",
		crosshair: {
			enabled: true,
			snapToDataPoint: true
		}
	},
	axisY: {
		title: "Nghìn VNĐ",
		valueFormatString: "#0,,.",
		suffix: " triệu VNĐ",
		stripLines: [{
			value: 300000,
			label: "Average"
		}]
	},
	data: [{
        type: "area",
        xValueFormatString: "DD MMM",
		xValueFormatString: "YYYY",
		type: "spline",
		dataPoints: <?php echo $str ?>
	}]
});
chart.render();

}
</script> --}}
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer1", {
	animationEnabled: true,
	title:{
		text: "Doanh Thu 30 Ngày"
	},
	axisX:{
		valueFormatString: "DD MMM",
		crosshair: {
			enabled: true,
			snapToDataPoint: true
		}
	},
	axisY: {
		title: "Nghìn VNĐ",
		valueFormatString: "##0,.",
        suffix: "",
		stripLines: [{
			value: <?php echo $TB ?>,
			label: "Average"
		}],
		crosshair: {
			enabled: true,
			snapToDataPoint: true,

			labelFormatter: function(e) {
				return  CanvasJS.formatNumber(e.value, "##0,.")+" Nghìn VND";
			}

		}
	},
	data: [{
		type: "area",
		xValueFormatString: "DD MMM",
		yValueFormatString: "##0,."+" Nghìn VND"    ,
		dataPoints:<?php echo $str ?>
	}]
});
chart.render();

}
</script>







@endsection
