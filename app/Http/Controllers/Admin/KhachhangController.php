<?php

namespace App\Http\Controllers\Admin;

use App\NhanVien;
use App\Quyen;
use App\booking;
use App\hoadon;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\loaiphong;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\phong;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\khachhang;
use Symfony\Component\HttpFoundation\Response;

class KhachHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $KhachHang= DB::table('khachhang')->get();

        return view('admin.khachhang.index')->with('KhachHang',$KhachHang);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $KhachHang= DB::table('khachhang')->where("id",$id)->first();
        //dd($KhachHang);
        return view('admin.khachhang.show')->with('KhachHang',$KhachHang);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $KhachHang= DB::table('khachhang')->where("id",$id)->first();
        //dd($user);
        return view('admin.khachhang.edit')->with('KhachHang',$KhachHang);
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

            'kh_hoTen' => 'required|string|max:50',

            'kh_email' => 'string|email|max:100',
            'kh_diaChi' => 'required',
            'kh_dienThoai' => 'numeric|max:10000000000'

        ],[



        ]);
        //dd($request);
        $p = khachhang::where("id",  $id)->first();
        $p->kh_hoTen = $request->kh_hoTen;
        $p->kh_maSoThue = $request->kh_maSoThue;
        $p->kh_email = $request->kh_email;
        $p->kh_capNhat = Carbon::now('Asia/Ho_Chi_Minh') ;
        $p->kh_trangThai = $request->kh_trangThai;
        $p->kh_diaChi = $request->kh_diaChi;
        $p->kh_dienThoai = $request->kh_dienThoai;

        $p->update();
        Session::flash('alert-info', 'Cập nhật thành công ^^~!!!');


        return redirect()->route('manager.khachhang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bk = hoadon::where("kh_ma",$id)->first();
    if($bk==null){
        $KhachHang= DB::table('khachhang')->where("id",$id)->first();
        Session::flash('alert-info', 'Xóa thành công ^^~!!!');
            $KhachHang->delete();

            return back();
    }

    else{

        $dele = hoadon::select('bk_ma')->where("kh_ma",$id)->get();
            foreach($dele as $xoabk)
            {
                $booking = hoadon::where("bk_ma", $xoabk->bk_ma)->first();
        $booking->delete();

            }



            $KhachHang = khachhang::where("id", $id)->first();

            $KhachHang ->delete();
            Session::flash('alert-info', 'Đã xóa khách hàng và các hóa đơn  liên quan  ^^~!!!');return back();
     return back();
    }

    }
}
