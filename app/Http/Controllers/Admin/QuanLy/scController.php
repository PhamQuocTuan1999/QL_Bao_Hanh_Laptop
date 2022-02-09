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

class scController extends Controller
{


        public function sc_day()
    {
        $nv = DB::select(
            '
            SELECT  nv.id, nv.nv_hoTen , r.name FROM nhanvien AS nv
                INNER JOIN        model_has_roles AS hr ON nv.id=hr.model_id
                INNER JOIN        roles AS r ON hr.role_id=r.id
                WHERE r.id=13'
        );
        $HoaDon = DB::select('
        SELECT   *,hd.hd_ma FROM hoa_don  as hd
        INNER JOIN khachhang as kh on kh.id = hd.kh_ma
              INNER JOIN loai_hoa_don as lhd on lhd.lhd_ma = hd.lhd_ma
           WHERE hd.hd_taoMoi >= DATE_SUB(NOW(), INTERVAL 1 day) AND hd.lhd_ma=2 AND hd.hd_trangThai >=0
        '
    );
    return view('admin.QuanLy.Day.sc')->with('HoaDon', $HoaDon)->with('nv', $nv);

    }
    public function sc_week()
    {
        $nv = DB::select(
            '
            SELECT  nv.id, nv.nv_hoTen , r.name FROM nhanvien AS nv
                INNER JOIN        model_has_roles AS hr ON nv.id=hr.model_id
                INNER JOIN        roles AS r ON hr.role_id=r.id
                WHERE r.id=13'
        );
        $HoaDon = DB::select('
        SELECT   *,hd.hd_ma FROM hoa_don  as hd
        INNER JOIN khachhang as kh on kh.id = hd.kh_ma
        INNER JOIN loai_hoa_don as lhd on lhd.lhd_ma = hd.lhd_ma
        WHERE hd.hd_taoMoi >= DATE_SUB(NOW(), INTERVAL 7 day) AND hd.lhd_ma=2 AND hd.hd_trangThai >=0
        '
    );
    return view('admin.QuanLy.Day.BH')->with('HoaDon', $HoaDon)->with('nv', $nv);
    }
    public function sc_month()
    {
        $nv = DB::select(
            '
            SELECT  nv.id, nv.nv_hoTen , r.name FROM nhanvien AS nv
                INNER JOIN        model_has_roles AS hr ON nv.id=hr.model_id
                INNER JOIN        roles AS r ON hr.role_id=r.id
                WHERE r.id=13'
        );
        $HoaDon = DB::select('
        SELECT   *,hd.hd_ma FROM hoa_don  as hd
        INNER JOIN khachhang as kh on kh.id = hd.kh_ma
        INNER JOIN loai_hoa_don as lhd on lhd.lhd_ma = hd.lhd_ma
        WHERE hd.hd_taoMoi >= DATE_SUB(NOW(), INTERVAL 30 day) AND hd.lhd_ma=2 AND hd.hd_trangThai >=0
        '
    );
    return view('admin.QuanLy.Day.BH')->with('HoaDon', $HoaDon)->with('nv', $nv);
    }
}
