<?php

namespace App\Http\Controllers\Admin;

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
use App\loaihoadon;
use Spatie\Permission\Models\Permission;
use Mail;
use Spatie\Permission\Models\Role;
use App\chitietvanchuyen;
class VanChuyenController extends Controller
{
    public function index() //ds đến
    {



        $HoaDon = DB::select('SELECT DISTINCT  *,bk.hd_ma FROM hoa_don  as bk
        INNER JOIN khachhang as kh on kh.id   = bk.kh_ma
        INNER JOIN loai_hoa_don as lhd on lhd.lhd_ma = bk.lhd_ma
        INNER JOIN chi_tiet_van_chuyen as vc on vc.hd_ma   = bk.hd_ma
        where  vc.ctvc_trangThai =0
        ');
     $users=0;
        return view('admin.VanChuyen.indextong')->with('HoaDon', $HoaDon)->with('users',$users);
    }

    public function Duyet()// ds duyệt
    {
        $HoaDon = DB::select('SELECT DISTINCT  *,bk.hd_ma FROM hoa_don  as bk
        INNER JOIN khachhang as kh on kh.id   = bk.kh_ma
        INNER JOIN loai_hoa_don as lhd on lhd.lhd_ma = bk.lhd_ma
        	INNER JOIN chi_tiet_van_chuyen as vc on vc.hd_ma   = bk.hd_ma
       where hd_trangThai = -1 and vc.ctvc_trangThai =0 ');

        return view('admin.VanChuyen.index')->with('HoaDon', $HoaDon);
    }
    public function VanChuyen()
    {
        $HoaDon = DB::select('SELECT DISTINCT  *,bk.hd_ma FROM hoa_don  as bk
        INNER JOIN khachhang as kh on kh.id   = bk.kh_ma
        INNER JOIN loai_hoa_don as lhd on lhd.lhd_ma = bk.lhd_ma
        	INNER JOIN chi_tiet_van_chuyen as vc on vc.hd_ma   = bk.hd_ma
       where hd_trangThai = -2 and vc.ctvc_trangThai =1 ');

        return view('admin.VanChuyen.indexvc')->with('HoaDon', $HoaDon);
    }
    public function XacNhanDen()//gửi hàng đi
    {
            $HoaDon = DB::select('SELECT DISTINCT  *,bk.hd_ma FROM hoa_don  as bk
            INNER JOIN khachhang as kh on kh.id   = bk.kh_ma
            INNER JOIN loai_hoa_don as lhd on lhd.lhd_ma = bk.lhd_ma
                INNER JOIN chi_tiet_van_chuyen as vc on vc.hd_ma   = bk.hd_ma
    WHERE bk.hd_trangThai = 2 OR bk.hd_trangThai = 4 ');

        return view('admin.VanChuyen.indexxnd')->with('HoaDon', $HoaDon);
    }
    public function create()
    {   $users=DB::select('SELECT * FROM nhanvien AS nv
            INNER JOIN            model_has_roles AS hr ON nv.id=hr.model_id
            INNER JOIN            roles AS r ON hr.role_id=r.id
            WHERE                   r.id=19 or r.id=18 ');
        //$users = NhanVien::all();
//dd($users);
        $roles = Role::get()->pluck('name', 'name');
        return view('admin.VanChuyen.indexds', compact('users'))->with('roles',$roles);

    }


    public function store(Request $request)
    {
       // dd($request);

        $hdvc =chitietvanchuyen::where("hd_ma",$request->id)->where("ctvc_trangThai",0)->first();
        $hdvc->ctvc_capNhat= Carbon::now('Asia/Ho_Chi_Minh');
        $hdvc->ctvc_nvDuyet= Auth::user()->nv_hoTen;
        $hdvc->nv_ma=Auth::user()->id;
        $hdvc->update();

        $hd = HoaDon::where("hd_ma",$request->id)->first();
        $hd->hd_trangThai = 0;
        $hd->nv_nhanTra=Auth::user()->nv_hoTen;
         $hd->nv_nhanTra=Auth::user()->nv_hoTen;
        $hd->hd_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $hd->update();

        $KhachHang = DB::table('khachhang')->where("id", $hd->kh_ma)->first();
        if ($KhachHang->kh_email != null) {
            $emails = $KhachHang->kh_email;
            //Gửi mail
            Mail::to($emails)->send(new \App\Mail\Nhandon(['emails' => $emails]));
        }



        Session::flash('alert-success', 'Đã Duyệt Đơn Thành Công ^^~!!!');

        return redirect()->route('manager.Van_Chuyen_Duyet');
    }

    public function edit($HoaDon)
    {
    }
    public function update(Request $request, $HoaDon)
    // Gửi về cho khách hàng
    {//dd($request);
        $this->validate($request, [
            //'kh_dienThoai' => 'required|min:10|max:11',
            'kh_diaChi' => 'required|min:6|max:200',
            'ngay_gui' => 'required|date|before_or_equal:today',


        ], [
            'kh_diaChi.min'=> 'Vui Lòng Nhập Địa Chỉ Cụ Thể',
            'kh_diaChi.max' => 'Vui Lòng Nhập Địa Chỉ Cụ Thể',
            //'kh_dienThoai.min'=>'Số Điện Thoại Không Hợp Lệ',
            'ngay_gui.before_or_equal'=>'Thời gian gửi phải sớm hơn hoặc là ngày hôm nay',
            'ngay_gui.date'=>'Thời gian gửi phải sớm hơn hoặc là ngày hôm nay',
        ]);

        $a="1 Lý Tự Trong Ninh Kiều Cần Thơ";
        $hdvc = new chitietvanchuyen();
        $hdvc->hd_ma=$HoaDon;
       $hdvc->ctvc_trangThai = 1;
       $hdvc->ctvc_taoMoi= Carbon::now('Asia/Ho_Chi_Minh');
       $hdvc->ctvc_capNhat= Carbon::now('Asia/Ho_Chi_Minh');
       $hdvc->ctvc_tu= $a;
       $hdvc->ctvc_den=$request->kh_diaChi;
       $hdvc->ctvc_ngayGui= $request->ngay_gui;
       $hdvc->ctvc_dvvc= $request->dvvc;
       $hdvc->ctvc_nvDuyet= Auth::user()->nv_hoTen;
       $hdvc->nv_ma=Auth::user()->id;

       if ($request->hasFile('lk_hinh')) {
        $file = $request->lk_hinh;

        // Lưu tên hình vào column slk_hinh
        $hdvc->ctvc_hinh = $file->getClientOriginalName();

        // Chép file vào thư mục "storate/public/photos"
        $fileSaved = $file->storeAs('public/photos', $hdvc->ctvc_hinh);
        // Hiển thị câu thông báo 1 lần (Flash session)
        $hdvc->save();
    }

    Session::flash('alert-info', 'Cập nhật thông tin gửi thành công  ^^~!!!');
    $hd1 = HoaDon::where("hd_ma",$HoaDon)->first();
    $hd1->hd_trangThai = -2;
    $hd1->hd_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
    $hd1->update();


        $KhachHang = DB::table('khachhang')->where("id", $hd1->kh_ma)->first();
        if ($KhachHang->kh_email != null) {
            $emails = $KhachHang->kh_email;
            //Gửi mail
            Mail::to($emails)->send(new \App\Mail\Guidon(['emails' => $emails]));
        }





    return back();
}

    public function update1(Request $request ,$id)
    {

        //dd($HoaDon);

        //dd($request);
        $this->validate($request, [
            'kh_dienThoai' => 'required|min:10|max:11',
            'kh_diaChi' => 'required|min:6|max:200',
            'ngay_gui' => 'required|date|before_or_equal:today',


        ], [
            'kh_diaChi.min'=> 'Vui Lòng Nhập Địa Chỉ Cụ Thể',
            'kh_diaChi.max' => 'Vui Lòng Nhập Địa Chỉ Cụ Thể',
            'kh_dienThoai.min'=>'Số Điện Thoại Không Hợp Lệ',
            'ngay_gui.before_or_equal'=>'Thời gian gửi phải sớm hơn hoặc là ngày hôm nay',
            'ngay_gui.date'=>'Thời gian gửi phải sớm hơn hoặc là ngày hôm nay',
        ]);

    //dd( Auth::user()->id);

            $hd = HoaDon::where("hd_ma",$id)->first();

            $hd->hd_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
            //dd($hd);
            $hd->update();

            $a="1 Lý Tự Trong Ninh Kiều Cần Thơ";
            $hdvc = chitietvanchuyen::where("hd_ma",$hd->hd_ma)->first();



           $hdvc->ctvc_capNhat= Carbon::now('Asia/Ho_Chi_Minh');
           $hdvc->ctvc_tu=$a;
           $hdvc->ctvc_den=$request->kh_diaChi;
           $hdvc->ctvc_ngayGui= $request->ngay_gui;
           $hdvc->ctvc_dvvc= $request->dvvc;

           //dd($hdvc);
    //dd($request);
           if ($request->hasFile('ctvc_hinh')) {

            $file = $request->ctvc_hinh;
             // Xóa hình cũ để tránh rác
            Storage::delete('public/photos/' . $hdvc->ctvc_hinh);
            // Lưu tên hình vào column slk_hinh

            $hdvc->ctvc_hinh = $file->getClientOriginalName();

            // Chép file vào thư mục "storate/public/photos"
            $fileSaved = $file->storeAs('public/photos', $hdvc->ctvc_hinh);

        }

        $hdvc->update();


        //
      ;


       Session::flash('alert-success', ' Cập Nhật Thành Công thành công ^^~!!!');

       return back();

    }

    public function show($HoaDon)
    {// chi tiet duyet
        $a=$HoaDon;
        $nv = DB::select(
            '
       SELECT  nv.id, nv.nv_hoTen , r.name FROM nhanvien AS nv
        INNER JOIN
            model_has_roles AS hr ON nv.id=hr.model_id
        INNER JOIN
            roles AS r ON hr.role_id=r.id
            WHERE r.id=17 or r.id=8'
        );

        $lhd = loaihoadon::all();
        $HoaDon = DB::select('SELECT DISTINCT  *,bk.hd_ma FROM hoa_don  as bk
        INNER JOIN khachhang as kh on kh.id   = bk.kh_ma
        INNER JOIN loai_hoa_don as lhd on lhd.lhd_ma = bk.lhd_ma
        INNER JOIN chi_tiet_van_chuyen as vc on vc.hd_ma   = bk.hd_ma
       where  hd_trangThai = -1 and vc.ctvc_trangThai =0 and bk.hd_ma='.$HoaDon);
        if ($HoaDon==null) {
            $HoaDon = DB::select('SELECT   *,  bk.nv_ma as nv ,vc.nv_ma as nvvc  FROM hoa_don  as bk
            INNER JOIN khachhang as kh on kh.id   = bk.kh_ma
            INNER JOIN loai_hoa_don as lhd on lhd.lhd_ma = bk.lhd_ma
            INNER JOIN chi_tiet_van_chuyen as vc on vc.hd_ma   = bk.hd_ma
           where  vc.ctvc_trangThai =1 and bk.hd_ma='.$a);
            //dd($HoaDon);
            //dd($nv);
         return view('admin.VanChuyen.editduyetgui', compact('lhd'))->with('HoaDon', $HoaDon)->with('nv', $nv);;

        }


    //dd($HoaDon);
    return view('admin.VanChuyen.editduyetdangky', compact('lhd'))->with('HoaDon', $HoaDon);

    }
    public function print($HoaDon)
    {
        $hd = $HoaDon;
        $HoaDon = DB::select('
        SELECT DISTINCT * FROM hoa_don as hd
        INNER JOIN khachhang as kh on kh.id = hd.kh_ma

        INNER JOIN loai_hoa_don as lhd on lhd.lhd_ma = hd.lhd_ma
        where hd_ma=' . $HoaDon);
        $a = DB::select('
        SELECT * FROM  chi_tiet_hoa_don AS cthd
        INNER JOIN linh_kien  AS lk ON cthd.lk_ma=lk.lk_ma
        INNER JOIN Bao_hanh  AS bh ON bh.bh_ma=lk.bh_ma
        WHERE cthd.hd_ma = ' . $hd);


        return view('admin.HoaDon.print')->with('HoaDon', $HoaDon)->with('linhkien', $a);
    }
    public function sale(Request $request, $HoaDon)
    {





        $hd = HoaDon::where("hd_ma",  $HoaDon)->first();

        $sale = $request->giamgia / 100;


        $hd->hd_gia = $hd->hd_gia - ($sale * $hd->hd_gia);
        $hd->hd_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $hd->update();

        // Hiển thị câu thông báo 1 lần (Flash session)
        Session::flash('alert-info', 'Cập nhật thành công  ^^~!!!');

        return redirect()->route('manager.HoaDon.edit', $hd->hd_ma);
    }

    public function destroy(HoaDon $HoaDon)
    {
        $HoaDon = HoaDon::where("hd_ma", $HoaDon->hd_ma)->first();

        Session::flash('alert-info', 'Xóa thành công ^^~!!!');
        $HoaDon->delete();
        return back();
    }


}
