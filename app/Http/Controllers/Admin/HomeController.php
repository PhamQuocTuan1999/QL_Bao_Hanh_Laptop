<?php

namespace App\Http\Controllers\Admin;

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
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
class HomeController extends Controller
{


        public function index()
    {

        // if (Auth::user()->nv_trangThai==1){return  redirect()->route('admin.dashboard');}
    // if (Auth::user()->q_ma==1){return  redirect()->route('admin.dashboard');}
    //day


            $doanhthuday = DB::table('hoa_don')->whereRaw('(hd_capNhat)>= DATE_SUB(NOW(), INTERVAL 1 day) ')->where('hd_trangThai', 3)->sum('hd_gia');
            $hoadonbhday = DB::table('hoa_don')->whereRaw('(hd_taoMoi)>= DATE_SUB(NOW(), INTERVAL 1 day) ')->where('lhd_ma', 1)->count();
            $hoadonscday = DB::table('hoa_don')->whereRaw('(hd_taoMoi)>= DATE_SUB(NOW(), INTERVAL 1 day) ')->where('lhd_ma', 2)->count();
            $khday = DB::table('khachhang')->whereRaw('(kh_taoMoi)>= DATE_SUB(NOW(), INTERVAL 1 day)')->count();
    //week
            $doanhthuweek= DB::table('hoa_don')->whereRaw('(hd_capNhat)>= DATE_SUB(NOW(), INTERVAL 1 week) ')->where('hd_trangThai', 3)->sum('hd_gia');
            $hoadonbhweek = DB::table('hoa_don')->whereRaw('(hd_taoMoi)>= DATE_SUB(NOW(), INTERVAL 1 week) ')->where('lhd_ma',1)->count();
            $hoadonscweek = DB::table('hoa_don')->whereRaw('(hd_taoMoi)>= DATE_SUB(NOW(), INTERVAL 1 week) ')->where('lhd_ma',2)->count();
            $khweek = DB::table('khachhang')->whereRaw('(kh_taoMoi)>= DATE_SUB(NOW(), INTERVAL 1 week)')->count();
    //month
            $doanhthumonth= DB::table('hoa_don')->whereRaw('(hd_capNhat)>= DATE_SUB(NOW(), INTERVAL 30 day) ')->where('hd_trangThai', 3)->sum('hd_gia');
            $hoadonbhmonth = DB::table('hoa_don')->whereRaw('hd_taoMoi >= DATE_SUB(NOW(), INTERVAL 30 day) ')->whereRaw('hd_trangThai>=0')->where('lhd_ma',1)->count();
            $hoadonscmonth = DB::table('hoa_don')->whereRaw('hd_taoMoi >= DATE_SUB(NOW(), INTERVAL 30 day) ')->whereRaw('hd_trangThai>=0')->where('lhd_ma',2)->count();
            $khmonth = DB::table('khachhang')->whereRaw('(kh_taoMoi)>=  DATE_SUB(NOW(), INTERVAL 30 day)')->count();
    //Doanh Thu

    $tien[]=[];

    for ($i = 0; $i <= 30; $i++) {
                $tien[$i]=DB::select('SELECT  DATE_FORMAT(hd_capNhat, "new Date(%Y,%m,%d)") AS x, SUM(hd_gia) AS y FROM hoa_don
                WHERE hd_trangThai=3 AND DATE_FORMAT(hd_capNhat, "%m %d %Y")= DATE_FORMAT(DATE_SUB(NOW(), INTERVAL ? DAY), "%m %d %Y")
                GROUP BY x
                ORDER BY x ',[$i]);


    }

    $array = Arr::collapse($tien);
   $f= json_encode($array, JSON_NUMERIC_CHECK);

   $str=str_replace( array('"',) , '', $f );


     $TB=ROUND($doanhthumonth/30);


        //dd($hoadonscweek);
        return view('admin.Dashboard')->with('doanhthuday', $doanhthuday)->with('hoadonbhday', $hoadonbhday )->with('khday',$khday)->with('hoadonscday', $hoadonscday )
        ->with('doanhthuweek', $doanhthuweek)->with('hoadonbhweek', $hoadonbhweek )->with('khweek',$khweek)->with('hoadonscweek', $hoadonscweek )
        ->with('doanhthumonth', $doanhthumonth)->with('hoadonbhmonth', $hoadonbhmonth )->with('khmonth',$khmonth)->with('hoadonscmonth', $hoadonscmonth )
        ->with('TB', $TB)->with('str', $str)

        ;
    }

}
