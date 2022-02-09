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
use App\loaihoadon;
use App\loailinhkien;
use app\NhanVien;
use Mail;
use PHPMailer\PHPMailer\PHPMailer;

require_once('../vendor/autoload.php');


class tkController extends Controller
{


        public function tk_nv()
    {
        $HoaDon = DB::select('
        SELECT DISTINCT * FROM hoa_don as hd
        INNER JOIN khachhang as kh on kh.id = hd.kh_ma
        INNER JOIN loai_hoa_don as lhd on lhd.lhd_ma = hd.lhd_ma  where hd_trangThai >=0
    ');
    $nv = DB::select(
        '
        SELECT  nv.id, nv.nv_hoTen , r.name FROM nhanvien AS nv
            INNER JOIN        model_has_roles AS hr ON nv.id=hr.model_id
            INNER JOIN        roles AS r ON hr.role_id=r.id
            WHERE r.id=13'
    );
    return view('admin.QuanLy.ThongKe.NV')->with('HoaDon', $HoaDon)->with('nv', $nv);

    }
    public function tk_nvn()
    {
        $HoaDon = DB::select('
        SELECT DISTINCT * FROM hoa_don as hd
        INNER JOIN khachhang as kh on kh.id = hd.kh_ma
        INNER JOIN loai_hoa_don as lhd on lhd.lhd_ma = hd.lhd_ma where hd_trangThai >=0
    ');
    $nv = DB::select(
        '
        SELECT  nv.id, nv.nv_hoTen , r.name FROM nhanvien AS nv
            INNER JOIN        model_has_roles AS hr ON nv.id=hr.model_id
            INNER JOIN        roles AS r ON hr.role_id=r.id
            WHERE r.id=14 or r.id =17 or r.id =8 '
    );
    return view('admin.QuanLy.ThongKe.NVN')->with('HoaDon', $HoaDon)->with('nv', $nv);

    }
    public function tk_tg()
    {
        $HoaDon = DB::select('
        SELECT DISTINCT * FROM hoa_don as hd
        INNER JOIN khachhang as kh on kh.id = hd.kh_ma
        INNER JOIN loai_hoa_don as lhd on lhd.lhd_ma = hd.lhd_ma where hd_trangThai >=0
    ');
    $nv = NhanVien::all();
    return view('admin.QuanLy.ThongKe.TG')->with('HoaDon', $HoaDon)->with('nv', $nv);
    }
    public function tk_tg_show(Request $request)
    {   //dd($request);


        $validation = $request->validate([

            'tungay' => 'required|date|before:denngay',

            'denngay' => 'required|date',

        ], [
            'tungay.before' => 'Thời Gian Ngày Bắt Đầu Phải Trước Ngày Kết Thúc',
            'denngay.before' => 'Thời Gian Ngày Kết Thúc Phải Trước Ngày Hôm Nay ',

        ]);
            //dd($request);
        $HoaDon = DB::select('
        SELECT DISTINCT * FROM hoa_don as hd
        INNER JOIN khachhang as kh on kh.id = hd.kh_ma
        INNER JOIN loai_hoa_don as lhd on lhd.lhd_ma = hd.lhd_ma where hd_trangThai >=0
       and hd_taoMoi BETWEEN ? AND ?
    ',[$request->tungay,$request->denngay]);
    //dd($HoaDon);
    $nv = NhanVien::all();

//dd($HoaDon);
    if($HoaDon==null){

        Session::flash('alert-success', 'Không có kết quả phù hợp^^~!!!');
        $HoaDon = DB::select('
        SELECT DISTINCT * FROM hoa_don as hd
        INNER JOIN khachhang as kh on kh.id = hd.kh_ma
        INNER JOIN loai_hoa_don as lhd on lhd.lhd_ma = hd.lhd_ma where hd_trangThai >=0
    ');
    $nv = NhanVien::all();
    return view('admin.QuanLy.ThongKe.TG')->with('HoaDon', $HoaDon)->with('nv', $nv);
    }
    return view('admin.QuanLy.ThongKe.TG')->with('HoaDon', $HoaDon)->with('nv', $nv);
    }

    public function tk_kh()
    {
        $HoaDon = DB::select('
        SELECT DISTINCT * FROM hoa_don as hd
        INNER JOIN khachhang as kh on kh.id = hd.kh_ma
        INNER JOIN loai_hoa_don as lhd on lhd.lhd_ma = hd.lhd_ma where hd_trangThai >=0
    ');
    $nv = NhanVien::all();
    return view('admin.QuanLy.ThongKe.KH')->with('HoaDon', $HoaDon)->with('nv', $nv);
    }
    public function tk_ld()
    {
        $HoaDon = DB::select('
        SELECT DISTINCT * FROM hoa_don as hd
        INNER JOIN khachhang as kh on kh.id = hd.kh_ma
        INNER JOIN loai_hoa_don as lhd on lhd.lhd_ma = hd.lhd_ma where hd_trangThai >=0
    ');
    $nv = loaihoadon::all();
    return view('admin.QuanLy.ThongKe.LD')->with('HoaDon', $HoaDon)->with('nv', $nv);

    }

    public function tk_llk()
    {
        $HoaDon = DB::select('
        SELECT DISTINCT * FROM hoa_don as hd
        INNER JOIN khachhang as kh on kh.id = hd.kh_ma
        INNER JOIN loai_hoa_don as lhd on lhd.lhd_ma = hd.lhd_ma where hd_trangThai >=0
    ');
    $nv = loailinhkien::all();
    return view('admin.QuanLy.ThongKe.LLK')->with('HoaDon', $HoaDon)->with('nv', $nv);

    }
    public function tk_llk_show(Request $request)
    {


        //dd($request);


        $HoaDon = DB::select('
        SELECT DISTINCT * FROM hoa_don as hd
        INNER JOIN khachhang as kh on kh.id = hd.kh_ma
        INNER JOIN loai_hoa_don as lhd on lhd.lhd_ma = hd.lhd_ma
         INNER JOIN chi_tiet_hoa_don AS cthd on cthd.hd_ma = hd.hd_ma
         inner join linh_kien AS lk on lk.lk_ma = cthd.lk_ma
        inner join loai_linh_kien AS llk on llk.llk_ma =lk.llk_ma WHERE
         llk.llk_ma=' . $request->llk_ma);
      ;
    //dd($HoaDon);
    $nv = loailinhkien::all();


    if($HoaDon==null){

        Session::flash('alert-success', 'Không có kết quả phù hợp^^~!!!');
        $HoaDon = DB::select('
        SELECT DISTINCT * FROM hoa_don as hd
        INNER JOIN khachhang as kh on kh.id = hd.kh_ma
        INNER JOIN loai_hoa_don as lhd on lhd.lhd_ma = hd.lhd_ma where hd_trangThai >=0
    ');
    $nv = loailinhkien::all();
    return view('admin.QuanLy.ThongKe.LLK')->with('HoaDon', $HoaDon)->with('nv', $nv);
    }
    return view('admin.QuanLy.ThongKe.LLK')->with('HoaDon', $HoaDon)->with('nv', $nv);
    }

    public function nt(Request $request) {
    	$data = $request->all();
    	$emails = $data['emails']??'';


    	//Gửi mail
    	Mail::to($emails)->send(new \App\Mail\SendMail(['emails' => $emails]));
    	Session::flash('flash_message', 'Send message successfully!');
    	return back();
    }


    public function Thong_Ke_Phan_hoi()
    {
        $HoaDon = DB::select('
        SELECT DISTINCT * FROM hoa_don as hd
        INNER JOIN khachhang as kh on kh.id = hd.kh_ma
        INNER JOIN loai_hoa_don as lhd on lhd.lhd_ma = hd.lhd_ma
        where hd.hd_trangThai=3 AND hd.hd_danhGia IS NOT NULL
    ');
    $nv = loailinhkien::all();
    return view('admin.QuanLy.ThongKe.DG')->with('HoaDon', $HoaDon)->with('nv', $nv);

    }


    public function timkiem()
    {
        $kh= khachhang::all();
        $HoaDon = DB::select('
        SELECT DISTINCT * FROM hoa_don as hd
        INNER JOIN khachhang as kh on kh.id = hd.kh_ma
        INNER JOIN loai_hoa_don as lhd on lhd.lhd_ma = hd.lhd_ma where hd_trangThai >=0
    ');
    $nv = NhanVien::all();
    return view('admin.QuanLy.ThongKe.Timkiem')->with('HoaDon', $HoaDon)->with('nv', $nv)->with('kh',$kh);

    }
    public function timkiemshow(Request $request)
    {   dd($request);


















        $validation = $request->validate([

            'tungay' => 'required|date|before:denngay',

            'denngay' => 'required|date',

        ], [
            'tungay.before' => 'Thời Gian Ngày Bắt Đầu Phải Trước Ngày Kết Thúc',
            'denngay.before' => 'Thời Gian Ngày Kết Thúc Phải Trước Ngày Hôm Nay ',

        ]);
            //dd($request);
        $HoaDon = DB::select('
        SELECT DISTINCT * FROM hoa_don as hd
        INNER JOIN khachhang as kh on kh.id = hd.kh_ma
        INNER JOIN loai_hoa_don as lhd on lhd.lhd_ma = hd.lhd_ma where hd_trangThai >=0
       and hd_taoMoi BETWEEN ? AND ?
    ',[$request->tungay,$request->denngay]);
    //dd($HoaDon);
    $nv = NhanVien::all();

//dd($HoaDon);
    if($HoaDon==null){

        Session::flash('alert-success', 'Không có kết quả phù hợp^^~!!!');
        $HoaDon = DB::select('
        SELECT DISTINCT * FROM hoa_don as hd
        INNER JOIN khachhang as kh on kh.id = hd.kh_ma
        INNER JOIN loai_hoa_don as lhd on lhd.lhd_ma = hd.lhd_ma where hd_trangThai >=0
    ');
    $nv = NhanVien::all();
    return view('admin.QuanLy.ThongKe.Timkiem')->with('HoaDon', $HoaDon)->with('nv', $nv);
    }
    return view('admin.QuanLy.ThongKe.Timkiem')->with('HoaDon', $HoaDon)->with('nv', $nv);
    }
}
