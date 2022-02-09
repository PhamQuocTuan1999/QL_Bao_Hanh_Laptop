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
use App\chitietvanchuyen;

class HoaDonController extends Controller
{
    public function index()
    {
        $id = Auth::user();
        $c = $id->hasRole('Kỹ Thuật Viên');

        if ($c == true) {
            $a = Auth::id();

            $HoaDon = DB::select(
                '
                SELECT DISTINCT * FROM hoa_don as hd
                INNER JOIN khachhang as kh on kh.id = hd.kh_ma
                INNER JOIN loai_hoa_don as lhd on lhd.lhd_ma = hd.lhd_ma
                where hd.hd_trangThai >=0 and hd.nv_ma= ' . $a
            );


            $dsth = DB::select('
                        SELECT DISTINCT * FROM hoa_don as hd
                        INNER JOIN khachhang as kh on kh.id = hd.kh_ma

                        INNER JOIN loai_hoa_don as lhd on lhd.lhd_ma = hd.lhd_ma
                        WHERE (hd.hd_trangThai=1 OR hd.hd_trangThai=2 OR hd.hd_trangThai= 5) and hd.hd_thoiGianXuLy <= NOW()and
                        hd.hd_trangThai >=0 and   hd.nv_ma=' . $a);
        } else {
            $HoaDon = DB::select('
                                    SELECT DISTINCT * FROM hoa_don as hd
                                    INNER JOIN khachhang as kh on kh.id = hd.kh_ma
                                    INNER JOIN loai_hoa_don as lhd on lhd.lhd_ma = hd.lhd_ma
                                    where hd_trangThai >=0;
                                ');




            $dsth = DB::select('
                            SELECT DISTINCT * FROM hoa_don as hd
                            INNER JOIN khachhang as kh on kh.id = hd.kh_ma
                            INNER JOIN loai_hoa_don as lhd on lhd.lhd_ma = hd.lhd_ma
                            WHERE (hd.hd_trangThai=1 OR hd.hd_trangThai=2 OR hd.hd_trangThai= 5) and hd.hd_thoiGianXuLy <= NOW()
                        ');
        }
        $loailinhkien = loailinhkien::all();
        $lk = linhkien::all();
        $bh = Baohanh::all();
        $nv = DB::select(
            '
       SELECT  nv.id, nv.nv_hoTen , r.name FROM nhanvien AS nv
        INNER JOIN
            model_has_roles AS hr ON nv.id=hr.model_id
        INNER JOIN
            roles AS r ON hr.role_id=r.id
            WHERE r.id=13'
        );
        if ($HoaDon == null) {
            Session::flash('alert-success', 'Bạn Chưa Được Phân công ^^~!!!');
            return redirect()->route('admin.dashboard');
        }
        return view('admin.HoaDon.index')->with('dsth', $dsth)
            ->with('HoaDon', $HoaDon)->with('loailinhkien', $loailinhkien)
            ->with('lk', $lk)->with('nv', $nv)->with('$bh', $bh);
    }
    public function VanChuyen()
    {
        $id = Auth::user();
        $c = $id->hasRole('Kỹ Thuật Viên');

        if ($c == true) {
            $a = Auth::id();

            $HoaDon = DB::select(
                '
                                SELECT DISTINCT * FROM hoa_don as hd
                                INNER JOIN khachhang as kh on kh.id = hd.kh_ma
                                INNER JOIN chi_tiet_van_chuyen as vc on vc.hd_ma   = hd.hd_ma
                                INNER JOIN loai_hoa_don as lhd on lhd.lhd_ma = hd.lhd_ma
                                where hd.nv_ma=' . $a
            );


            $dsth = DB::select('
                        SELECT DISTINCT * FROM hoa_don as hd
                        INNER JOIN khachhang as kh on kh.id = hd.kh_ma
                        INNER JOIN nhanvien as nv on nv.id = hd.nv_ma
                        INNER JOIN loai_hoa_don as lhd on lhd.lhd_ma = hd.lhd_ma
                        INNER JOIN chi_tiet_van_chuyen as vc on vc.hd_ma   = hd.hd_ma
                        WHERE (hd.hd_trangThai=1 OR hd.hd_trangThai=2 OR hd.hd_trangThai= 5) and hd.hd_thoiGianXuLy <= NOW()
                        and hd.nv_ma=' . $a);
        } else {
            $HoaDon = DB::select('
                                    SELECT DISTINCT * FROM hoa_don as hd
                                    INNER JOIN khachhang as kh on kh.id = hd.kh_ma
                                    INNER JOIN chi_tiet_van_chuyen as vc on vc.hd_ma   = hd.hd_ma
                                    INNER JOIN loai_hoa_don as lhd on lhd.lhd_ma = hd.lhd_ma
                                ');




            $dsth = DB::select('
                            SELECT DISTINCT * FROM hoa_don as hd
                            INNER JOIN khachhang as kh on kh.id = hd.kh_ma
                            INNER JOIN chi_tiet_van_chuyen as vc on vc.hd_ma   = hd.hd_ma
                            INNER JOIN loai_hoa_don as lhd on lhd.lhd_ma = hd.lhd_ma
                            WHERE (hd.hd_trangThai=1 OR hd.hd_trangThai=2 OR hd.hd_trangThai= 5) and hd.hd_thoiGianXuLy <= NOW()
                        ');
        }
        $loailinhkien = loailinhkien::all();
        $lk = linhkien::all();
        $bh = Baohanh::all();
        $nv = DB::select(
            '
       SELECT  nv.id, nv.nv_hoTen , r.name FROM nhanvien AS nv
        INNER JOIN
            model_has_roles AS hr ON nv.id=hr.model_id
        INNER JOIN
            roles AS r ON hr.role_id=r.id
            WHERE r.id=13'
        );
        if ($HoaDon == null) {
            Session::flash('alert-success', 'Bạn Chưa Được Phân công ^^~!!!');
            return redirect()->route('admin.dashboard');
        }
        return view('admin.HoaDon.index')->with('dsth', $dsth)
            ->with('HoaDon', $HoaDon)->with('loailinhkien', $loailinhkien)
            ->with('lk', $lk)->with('nv', $nv)->with('$bh', $bh);
    }
    public function create()
    {
        $loailinhkien = loailinhkien::all();
        $lk = linhkien::all();
        $bh = Baohanh::all();
        $nv = DB::select(
            '
       SELECT  nv.id, nv.nv_hoTen , r.name FROM nhanvien AS nv
        INNER JOIN
            model_has_roles AS hr ON nv.id=hr.model_id
        INNER JOIN
            roles AS r ON hr.role_id=r.id
            WHERE r.id=13'
        );

        return view('admin.HoaDon.TaoDon.create')->with('loailinhkien', $loailinhkien)
            ->with('lk', $lk)->with('nv', $nv)->with('$bh', $bh);
    }


    public function store(Request $request)
    {
        $validation = $request->validate([
            'kh_hoTen' => 'required|max:50|min:5',
            'kh_diaChi' => 'required|max:100|min:5',
            'kh_dienThoai' => 'required|min:6|max:10',
            'hd_thoiGianXuLy'=>'after_or_equal:today'

        ], [
            'kh_dienThoai.min' => 'Số điện thoại không hợp lệ',
            'kh_dienThoai.max' => 'Số điện thoại không hợp lệ',
            'kh_hoTen.required' => 'Họ và tên không hợp lệ',
            'kh_hoTen.max' => 'Họ và tên không nhỏ hơn 5 ký tự và lớn hơn 50 ký tự',
            'hd_thoiGianXuLy.after_or_equal' => 'Thời gian xữ lý trễ hơn hoặc là ngày hôm nay'
        ]);

        $pt = khachhang::where("kh_dienThoai", $request->kh_dienThoai)->first();
        if ($pt == null) {
            $p = new khachhang();
            $p->kh_hoTen = $request->kh_hoTen;
            $p->kh_diaChi = $request->kh_diaChi;
            $p->kh_dienThoai = $request->kh_dienThoai;
            $p->kh_taoMoi = Carbon::now('Asia/Ho_Chi_Minh');
            $p->kh_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
            $p->kh_maSoThue = $request->kh_maSoThue;
            $p->save();
            $kh = $p->id;
            $hd = new HoaDon();
            $hd->lhd_ma = $request->lhd_ma;
            $hd->kh_ma = $p->id;
        } else {
            $hd = new HoaDon();
            $hd->lhd_ma = $request->lhd_ma;
            $hd->kh_ma = $pt->id;
        }






        if ($hd->lhd_ma == 1) {
            $hd->hd_gia = 0;
        } else {
            $hd->hd_gia = $request->hd_gia;
        }
        $hd->nv_nhanTra = Auth::user()->nv_hoTen;
        $hd->hd_nhan = $request->hd_nhan;
        $hd->hd_ghiChu = $request->hd_ghiChu;
        $hd->hd_trangThai = 0;
        $hd->hd_thoiGianXuLy = $request->hd_thoiGianXuLy;
        $hd->hd_gia = $request->hd_gia;
        $hd->hd_taoMoi = Carbon::now('Asia/Ho_Chi_Minh');
        $hd->hd_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $hd->save();


        Session::flash('alert-success', 'Thêm mới Hóa Đơn thành công ^^~!!!');

        return redirect()->route('manager.HoaDon.edit', $hd->hd_ma);
    }

    public function edit($HoaDon)
    {
        $hd = HoaDon::where("hd_ma",  $HoaDon)->first();
        $loailinhkien = loailinhkien::all();
        $lk = linhkien::all();
        $bh = Baohanh::all();

        $lhd = loaihoadon::all();
        $nsx = nhasanxuat::all();
        $nv = DB::select(
            '
       SELECT  nv.id, nv.nv_hoTen , r.name FROM nhanvien AS nv
        INNER JOIN
            model_has_roles AS hr ON nv.id=hr.model_id
        INNER JOIN
            roles AS r ON hr.role_id=r.id
            WHERE r.id=13'
        );






        $dbs = DB::select(
            '
        SELECT DISTINCT * FROM hoa_don as hd
        INNER JOIN khachhang as kh on kh.id = hd.kh_ma
        INNER JOIN loai_hoa_don as lhd on lhd.lhd_ma = hd.lhd_ma
        where hd_ma=' . $HoaDon
        );
        $a = DB::select('
            SELECT * FROM  chi_tiet_hoa_don AS cthd
            INNER JOIN linh_kien  AS lk ON cthd.lk_ma=lk.lk_ma
            INNER JOIN Bao_hanh  AS bh ON bh.bh_ma=lk.bh_ma
            WHERE cthd.hd_ma = ' . $HoaDon);


        return view('admin.HoaDon.edit')->with('dbs', $dbs)->with('loailinhkien', $loailinhkien)->with('linhkienhd', $a)
            ->with('lk', $lk)->with('nv', $nv)->with('hd', $hd)->with('lhd', $lhd)->with('nsx', $nsx);
    }
    public function update(Request $request, $HoaDon)
    {
            $validation = $request->validate([

            'hd_tinhtrang' => 'required|string',
            'hd_thoiGianXuLy' => 'required|date|before_or_equal:today',
            'hd_thoiGianXuLy' => 'required|date|before_or_equal:today',

        ],[
            'hd_tinhtrang.required'=> 'Vui lòng cập nhật biện pháp xử lý',
            'hd_thoiGianXuLy.before_or_equal'=>'Thời gian sửa phải sau hơn hoặc là ngày hôm nay',
            'hd_thoiGianXuLy.date'=>'Thời gian sửa phải sau hơn hoặc là ngày hôm nay',

        ]);

        $kh = khachhang::where("id",  $request->id)->first();
        $kh->kh_hoTen = $request->kh_hoTen;
        $kh->kh_diaChi = $request->kh_diaChi;
        $kh->kh_dienThoai = $request->kh_dienThoai;
        $kh->kh_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $kh->kh_maSoThue = $request->kh_maSoThue;
        $kh->update();

        if ($request->hd_trangThai == 3 && $request->hd_gia == null && $request->lhd_ma == 2) {
            Session::flash('alert-info', 'Cập nhật số tiền cho đơn sửa chữa  ^^~!!!');
            return back();
        };

        $hd = HoaDon::where("hd_ma",  $HoaDon)->first();
        $hd->lhd_ma = $request->lhd_ma;
        $hd->nv_ma = $request->nv_id;
        $hd->hd_nhan = $request->hd_nhan;
        $hd->hd_ghiChu = $request->hd_ghiChu;
        $hd->hd_thoiGianXuLy = $request->hd_thoiGianXuLy;
        // if ($hd->lhd_ma == 1) {
        //     $hd->hd_gia = 0;
        // } else {
        //     $hd->hd_gia = $request->hd_gia;
        // }


        $hd->hd_trangThai = $request->hd_trangThai;
        $hd->hd_tinhtrang = $request->hd_tinhtrang;
        $hd->hd_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        if ($hd->hd_trangThai== 4) {
            $hd->hd_gia = 0;
        } else {
            $hd->hd_gia = $request->hd_gia;
        }

        $hd->update();

        if ($request->hd_trangThai == 2) {
            $KhachHang = DB::table('khachhang')->where("id", $hd->kh_ma)->first();
            if ($KhachHang->kh_email != null) {
                $emails = $KhachHang->kh_email;
                //Gửi mail
                Mail::to($emails)->send(new \App\Mail\SendMail(['emails' => $emails]));
            }
        };
        if ($request->hd_trangThai == 4) {
            $KhachHang = DB::table('khachhang')->where("id", $hd->kh_ma)->first();
            if ($KhachHang->kh_email != null) {
                $emails = $KhachHang->kh_email;
                //Gửi mail
                Mail::to($emails)->send(new \App\Mail\SendMail2(['emails' => $emails]));
            }
        };
        // Hiển thị câu thông báo 1 lần (Flash session)
        Session::flash('alert-info', 'Cập nhật thành công  ^^~!!!');

        return redirect()->route('manager.HoaDon.edit', $hd->hd_ma);
    }
    public function update1(Request $request, $HoaDon)
    {

       // dd($request);

        $hd = HoaDon::where("hd_ma", $request->id)->first();

        if ($request->hd_trangThai == 3 && $hd->hd_gia == null && $hd->lhd_ma == 2) {
            Session::flash('alert-info', ' Vui Lòng!! Cập nhật số tiền cho đơn sửa chữa trước khi hoàn thành đơn ');
            return back();
        };
        $hd->hd_trangThai = $request->hd_trangThai;
        $hd->hd_tinhtrang=$request->hd_tinhtrang;
        $hd->hd_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        if ($hd->hd_trangThai== 4) {
            $hd->hd_gia = 0;
        } else {
            $hd->hd_gia = $request->hd_gia;
        }
        $hd->update();
        if ($request->hd_trangThai == 2) {
            $KhachHang = DB::table('khachhang')->where("id", $hd->kh_ma)->first();
            if ($KhachHang->kh_email != null) {
                $emails = $KhachHang->kh_email;
                //Gửi mail
                Mail::to($emails)->send(new \App\Mail\SendMail(['emails' => $emails]));
            }
        };
        if ($request->hd_trangThai == 4) {
            $KhachHang = DB::table('khachhang')->where("id", $hd->kh_ma)->first();
            if ($KhachHang->kh_email != null) {
                $emails = $KhachHang->kh_email;
                //Gửi mail
                Mail::to($emails)->send(new \App\Mail\SendMail2(['emails' => $emails]));
            }
        };

        // Hiển thị câu thông báo 1 lần (Flash session)
        Session::flash('alert-info', 'Cập nhật thành công  ^^~!!!');

        return back();
    }

    public function update2(Request $request, $HoaDon)
    {

        //dd($request);

        $hd = HoaDon::where("hd_ma", $request->id)->first();


        $hd->nv_ma = $request->nv_id;
        $hd->hd_trangThai = 1;
        $hd->hd_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $hd->update();

        // Hiển thị câu thông báo 1 lần (Flash session)
        Session::flash('alert-info', 'Cập nhật thành công  ^^~!!!');

        return back();
    }

    public function show($HoaDon)
    {
        $HoaDon = DB::select('
        SELECT DISTINCT * FROM hoa_don as hd
        INNER JOIN khachhang as kh on kh.id = hd.kh_ma
        INNER JOIN nhanvien as nv on nv.id = hd.nv_ma
        where hd_ma=' . $HoaDon);

        return view('admin.HoaDon.show')->with('HoaDon', $HoaDon);
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
        $hdvc = chitietvanchuyen::where("hd_ma",$HoaDon->hd_ma);
        $hdvc->delete();
        $hd = chitiethoadon::where("hd_ma",$HoaDon->hd_ma);
        $hd->delete();

        $HoaDon = HoaDon::where("hd_ma", $HoaDon->hd_ma)->first();

        Session::flash('alert-info', 'Xóa thành công ^^~!!!');
        $HoaDon->delete();
        return redirect()->route('manager.HoaDon.index');
    }
}
