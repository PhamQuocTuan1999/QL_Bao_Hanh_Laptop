<?php

namespace App\Http\Controllers\Admin\QuanLy;

use Carbon\CarbonPeriod;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Support\Facades\Storage;
use App\phong;
use App\loaiphong;
use App\hoa_don;
use App\hoadon;
use Carbon\Carbon;
use App\khachhang;
use app\NhanVien;

class khController extends Controller
{


        public function khday()
    {

             $khday = DB::select('
            SELECT DISTINCT * FROM khachhang
            where  kh_taoMoi >= DATE_SUB(NOW(), INTERVAL 1 day)
        ');
        //dd($khday);
        return view('admin.QuanLy.Day.KH')->with('khday', $khday)



        ;
    }
    public function khweek()
    {

             $khday = DB::select('
            SELECT DISTINCT * FROM khachhang
            where  kh_taoMoi >= DATE_SUB(NOW(), INTERVAL 7 day)
        ');
        //dd($khday);
        return view('admin.QuanLy.Week.KH')->with('khday', $khday)



        ;
    }
    public function khMonth()
    {

             $khday = DB::select('
            SELECT DISTINCT * FROM khachhang
            where  kh_taoMoi >= DATE_SUB(NOW(), INTERVAL 30 day)
        ');
        //dd($khday);
        return view('admin.QuanLy.Month.KH')->with('khday', $khday)



        ;
    }

}
