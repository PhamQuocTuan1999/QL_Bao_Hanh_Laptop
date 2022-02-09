<?php

namespace App\Http\Controllers\Admin\HoaDon;

use App\HoaDon;
use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\linhkien;
use App\loailinhkien;
use App\nhasanxuat;
use App\NhanVien;
use App\khachhang;
use App\Baohanh;
use App\chitiethoadon;


class LinhKienHDController extends Controller
{
    public function index()
    {
        $loailinhkien = loailinhkien::all();
        $lk = linhkien::all();
        $bh = Baohanh::all();
        $nv = NhanVien::all();

        return view('admin.HoaDon.TaoDon.create')->with('loailinhkien', $loailinhkien)
        ->with('lk', $lk)->with('nv', $nv)->with('$bh', $bh);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'cthd_soLuong'=>'required|numeric|min:0',


    ], [

        'cthd_soLuong.min'=>' Số lượng phải lớn hơn 0'
        ]);


        $p = new chitiethoadon();
        $p->hd_ma = $request->hd_ma;
        $p->lk_ma = $request->lk_ma;
        $p->cthd_taoMoi = Carbon::now('Asia/Ho_Chi_Minh') ;
        $p->cthd_capNhat = Carbon::now('Asia/Ho_Chi_Minh') ;
        $p->cthd_soLuong = $request->cthd_soLuong ;
        $p->cthd_ghiChu = $request->cthd_ghiChu ;
        $p->save();
        //
         $hd = HoaDon::where("hd_ma",  $request->hd_ma)->first();
         $lk = linhkien::where("lk_ma",  $request->lk_ma)->first();
        if($hd->lhd_ma==2)
        {   $tong = $lk->lk_gia * $request->cthd_soLuong;
            $hd->hd_gia=$tong+$hd->hd_gia;
            $hd->save();
        }





        Session::flash('alert-success', 'Thêm Linh kiện cho đơn thành công ^^~!!!');

        return back();
    }

    public function edit($HoaDon)

    {
         $hd = HoaDon::where("hd_ma",  $HoaDon)->first();
        $loailinhkien = loailinhkien::all();
        $lk = linhkien::all();
        $bh = Baohanh::all();
        $nv = NhanVien::all();
        $dbs = DB::select('
        SELECT DISTINCT * FROM hoa_don as hd
        INNER JOIN khachhang as kh on kh.id = hd.kh_ma
        INNER JOIN nhanvien as nv on nv.id = hd.nv_ma
        where hd_ma='.$HoaDon
            );
            $a=DB::select('
            SELECT * FROM  chi_tiet_hoa_don AS cthd
            INNER JOIN linh_kien  AS lk ON cthd.lk_ma=lk.lk_ma
            INNER JOIN Bao_hanh  AS bh ON bh.bh_ma=lk.bh_ma
            WHERE cthd.hd_ma = '.$hd);

        return view('admin.HoaDon.edit1')->with('dbs', $dbs)->with('loailinhkien', $loailinhkien)->with('lk', $lk)->with('nv', $nv)->with('hd', $hd)->with('linhkienhd',$a) ;
    }
    public function update(Request $request, $HoaDon)
    {


        return redirect()->route('manager.HoaDon.index');
    }
    //





    public function show($HoaDon)
    {
        $HoaDon=DB::select('
        SELECT DISTINCT * FROM HoaDon as hd
        INNER JOIN khachhang as kh on kh.id = hd.kh_ma
        INNER JOIN nhanvien as nv on nv.id= hd.nv_ma
        INNER JOIN phong as p on p.p_ma=hd.p_ma

       WHERE  hd_ma ='.$HoaDon);
//dd($HoaDon);
        return view('admin.HoaDon.show')->with('HoaDon',$HoaDon);
    }

    public function destroy($cthd)
    {

        $cthd = chitiethoadon::where("cthd_ma", $cthd)->first();
        $hd = HoaDon::where("hd_ma",  $cthd->hd_ma)->first();
        $lk = linhkien::where("lk_ma",  $cthd->lk_ma)->first();
       if($hd->lhd_ma==2)
       {   $tong = $lk->lk_gia * $cthd->cthd_soLuong;
           $hd->hd_gia=$hd->hd_gia-$tong;
            if($hd->hd_gia < 0) {$hd->hd_gia = 0; }
           $hd->save();
       }

        Session::flash('alert-info', 'Xóa thành công ^^~!!!');
        $cthd->delete();

            return back();




}
}
