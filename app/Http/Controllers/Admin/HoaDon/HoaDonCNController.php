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


class HoaDonCNController extends Controller
{
    public function index()
    {
        $a=Auth::id();

        $HoaDon = DB::select('
         SELECT DISTINCT * FROM hoa_don as hd
        INNER JOIN khachhang as kh on kh.id = hd.kh_ma
        INNER JOIN nhanvien as nv on nv.id = hd.nv_ma
        where hd.nv_ma='.$a
       );
        $dskt = DB::select('
       SELECT DISTINCT * FROM hoa_don as hd
       INNER JOIN khachhang as kh on kh.id = hd.kh_ma
       INNER JOIN nhanvien as nv on nv.id = hd.nv_ma
     where hd.hd_trangThai=1 and hd.nv_ma='.$a);
        $dssc = DB::select('
     SELECT DISTINCT * FROM hoa_don as hd
     INNER JOIN khachhang as kh on kh.id = hd.kh_ma
     INNER JOIN nhanvien as nv on nv.id = hd.nv_ma
   where hd.hd_trangThai=2
   and hd.nv_ma='.$a);
        $dssx = DB::select('
   SELECT DISTINCT * FROM hoa_don as hd
   INNER JOIN khachhang as kh on kh.id = hd.kh_ma
   INNER JOIN nhanvien as nv on nv.id = hd.nv_ma
 where hd.hd_trangThai=3
 and hd.nv_ma='.$a);
        $dsht = DB::select('
 SELECT DISTINCT * FROM hoa_don as hd
 INNER JOIN khachhang as kh on kh.id = hd.kh_ma
 INNER JOIN nhanvien as nv on nv.id = hd.nv_ma
where hd.hd_trangThai=3
and hd.nv_ma='.$a);
        $dsksd = DB::select('
SELECT DISTINCT * FROM hoa_don as hd
INNER JOIN khachhang as kh on kh.id = hd.kh_ma
INNER JOIN nhanvien as nv on nv.id = hd.nv_ma
where hd.hd_trangThai=4
and hd.nv_ma='.$a);
        $dsdlk = DB::select('
SELECT DISTINCT * FROM hoa_don as hd
INNER JOIN khachhang as kh on kh.id = hd.kh_ma
INNER JOIN nhanvien as nv on nv.id = hd.nv_ma
where hd.hd_trangThai=5
and hd.nv_ma='.$a);
        $dshtkh = DB::select('
SELECT DISTINCT * FROM hoa_don as hd
INNER JOIN khachhang as kh on kh.id = hd.kh_ma
INNER JOIN nhanvien as nv on nv.id = hd.nv_ma
where hd.hd_trangThai=6
and hd.nv_ma='.$a);

        $loailinhkien = loailinhkien::all();
        $lk = linhkien::all();
        $bh = Baohanh::all();
        $nv = NhanVien::all();

        return view('admin.HoaDon.CapNhatDon.index')->with('dsksd', $dsksd)->with('dssc', $dssc)->with('dssx', $dssx)->with('dsht', $dsht)
            ->with('dskt', $dskt)->with('HoaDon', $HoaDon)->with('loailinhkien', $loailinhkien)->with('dsdlk', $dsdlk)->with('dshtkh', $dshtkh)
            ->with('lk', $lk)->with('nv', $nv)->with('$bh', $bh);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'kh_hoTen'=>'required|max:30|min:5',
            'kh_diaChi'=>'required|max:30|min:5',
            'kh_dienThoai'=>'required|min:10',

    ], [

        'kh_hoTen.required'=>'Họ và tên không hợp lệ'
        ]);


        $p = new khachhang();
        $p->kh_hoTen = $request->kh_hoTen;
        $p->kh_diaChi = $request->kh_diaChi;
        $p->kh_dienThoai = $request->kh_dienThoai;
        $p->kh_taoMoi = Carbon::now('Asia/Ho_Chi_Minh') ;
        $p->kh_capNhat = Carbon::now('Asia/Ho_Chi_Minh') ;
        $p->kh_maSoThue = $request->kh_maSoThue ;
        $p->save(); $kh=$p->id;
        //

        $pt = khachhang::where("kh_hoTen",$request->kh_ten)->first();

        $hd= new HoaDon();
        $hd->kh_ma=$p->id;
        $hd->nv_ma=$request->nv_id;
        $hd->hd_nhan=$request->hd_nhan;
        $hd->hd_ghiChu=$request->hd_ghiChu;
        $hd->hd_trangThai=1;
        $hd->hd_taoMoi = Carbon::now('Asia/Ho_Chi_Minh') ;
        $hd->hd_capNhat = Carbon::now('Asia/Ho_Chi_Minh') ;
        $hd->save();


        Session::flash('alert-success', 'Thêm mới Hóa Đơn thành công ^^~!!!');

        return redirect()->route('manager.HoaDon.index');
    }

    public function edit($HoaDon)
    {   $hd = HoaDon::where("hd_ma",  $HoaDon)->first();
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


        return view('admin.HoaDon.edit')->with('dbs', $dbs)->with('loailinhkien', $loailinhkien)->with('lk', $lk)->with('nv', $nv)->with('hd', $hd);
    }
    public function update(Request $request, $HoaDon)
    {


        return redirect()->route('manager.HoaDon.index');
    }
    //
    public function editkt($HoaDon)
    {   $hd = HoaDon::where("hd_ma",  $HoaDon)->first();
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
            dd('a');

        return view('admin.HoaDon.edit1')->with('dbs', $dbs)->with('loailinhkien', $loailinhkien)->with('lk', $lk)->with('nv', $nv)->with('hd', $hd);
    }
    public function updatekt(Request $request, $HoaDon)
    {


        return redirect()->route('manager.HoaDon.index');
    }
    //
    public function editph($HoaDon)
    {   $hd = HoaDon::where("hd_ma",  $HoaDon)->first();
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


        return view('admin.HoaDon.edit2')->with('dbs', $dbs)->with('loailinhkien', $loailinhkien)->with('lk', $lk)->with('nv', $nv)->with('hd', $hd);
    }
    public function updateph(Request $request, $HoaDon)
    {


        return redirect()->route('manager.HoaDon.index');
    }
    //
    public function editsc($HoaDon)
    {   $hd = HoaDon::where("hd_ma",  $HoaDon)->first();
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


        return view('admin.HoaDon.edit3')->with('dbs', $dbs)->with('loailinhkien', $loailinhkien)->with('lk', $lk)->with('nv', $nv)->with('hd', $hd);
    }



    public function updatesc(Request $request, $HoaDon)
    {


        return redirect()->route('manager.HoaDon.index');
    }







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

    public function destroy(HoaDon $HoaDon)
    {
        $HoaDon = HoaDon::where("hd_ma", $HoaDon->hd_ma)->first();

        Session::flash('alert-info', 'Xóa thành công ^^~!!!');
        $HoaDon->delete();
            return back();




}
}
