<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Support\Facades\Storage;
use App\phong;
use App\loaiphong;
use App\booking;
use App\hoadon;
use Carbon\Carbon;
use App\khachhang;
use app\NhanVien;
use App\loaihoadon;
use App\chitietvanchuyen;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {

        return view('user.khachhang.edit');
    }
    public function don() // gửi đến TT

    {

        $HoaDon = DB::select('SELECT DISTINCT  * FROM hoa_don  as bk
        INNER JOIN khachhang as kh on kh.id   = bk.kh_ma

        INNER JOIN loai_hoa_don as lhd on lhd.lhd_ma = bk.lhd_ma
       where bk.kh_ma=' . Auth::user()->id);
        return view('user.khachhang.index')->with('HoaDon', $HoaDon);
    }
    public function dangky() // gửi đến TT

    {

        $HoaDon = DB::select('SELECT DISTINCT  *,bk.hd_ma FROM hoa_don  as bk
        INNER JOIN khachhang as kh on kh.id   = bk.kh_ma
        INNER JOIN loai_hoa_don as lhd on lhd.lhd_ma = bk.lhd_ma
        INNER JOIN chi_tiet_van_chuyen as vc on vc.hd_ma   = bk.hd_ma
       where bk.kh_ma=' . Auth::user()->id . ' and hd_trangThai = -1 and vc.ctvc_trangThai =0  ');
        return view('user.khachhang.dangky')->with('HoaDon', $HoaDon);
    }
    public function vanchuyen() // nhận đơn từ TT
    {

        $HoaDon = DB::select('SELECT DISTINCT  *,vc.nv_ma AS nv_vanchuyen FROM hoa_don  as bk
        INNER JOIN khachhang as kh on kh.id   = bk.kh_ma
        INNER JOIN chi_tiet_van_chuyen as vc on vc.hd_ma   = bk.hd_ma
        INNER JOIN loai_hoa_don as lhd on lhd.lhd_ma = bk.lhd_ma
       where bk.kh_ma=' . Auth::user()->id . ' and hd_trangThai =-2 and vc.ctvc_trangThai =1 ');
        return view('user.khachhang.create')->with('HoaDon', $HoaDon);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   //dd($id);
        $hd = HoaDon::where("hd_ma", $id)->first();
        $hd->hd_trangThai = 3;

        $hd->hd_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $hd->update();
        Session::flash('alert-success', 'Đã xác nhận nhận đơn thành công ^^~!!!');
        return redirect()->route('ds-don');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd($id);
        $HoaDon = DB::select('SELECT DISTINCT  *,bk.hd_ma FROM hoa_don  as bk
        INNER JOIN khachhang as kh on kh.id   = bk.kh_ma
        INNER JOIN loai_hoa_don as lhd on lhd.lhd_ma = bk.lhd_ma
        INNER JOIN chi_tiet_van_chuyen as vc on vc.hd_ma   = bk.hd_ma
       where bk.kh_ma=' . Auth::user()->id . ' and hd_trangThai = -1 and vc.ctvc_trangThai =0 and bk.hd_ma='.$id);
    $lhd = loaihoadon::all();
    //dd($HoaDon);
    return view('user.khachhang.editdangky')->with('HoaDon', $HoaDon)->with('lhd', $lhd);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'kh_hoTen' => 'required|max:30|min:5',
            'kh_diaChi' => 'required|max:200|min:10',
            'kh_dienThoai' => 'required|min:8|numeric',
            'kh_email' => 'required|max:50',

            'email' => 'required|max:30|min:5',
            'password' => 'required|string|min:3',



        ]);

        // dd($request);


        $kh = khachhang::where("id", $id)->first(); //dd($kh);
        $kh->email = $request['email'];
        $kh->password =   bcrypt($request['password']); //123456
        $kh->kh_hoTen =  $request['kh_hoTen'];
        $kh->kh_maSoThue = $request['kh_maSoThue'];
        $kh->kh_email =  $request['kh_email'];
        $kh->kh_diaChi =  $request['kh_diaChi'];
        $kh->kh_dienThoai =  $request['kh_dienThoai'];
        $kh->kh_capNhat =  Carbon::now(); // Lấy ngày giờ hiện tại (sử dụng Carbon)


        $kh->update();


        Session::flash('alert-success', 'Cập Nhật Thành Công ^^~!!!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        $hdvc = chitietvanchuyen::where("hd_ma",$id)->first();
        $hdvc->delete();
        $hd = hoadon::where("hd_ma",$id)->first();
        $hd->delete();
        Session::flash('alert-success', ' Xóa Công thành công ^^~!!!');

        return back();
    }
}
