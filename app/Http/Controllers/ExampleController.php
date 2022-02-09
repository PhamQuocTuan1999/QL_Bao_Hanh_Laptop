<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\HoaDon;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Validator;
use Carbon\Carbon;
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
class ExampleController extends Controller
{


    public function index()

    {

       return view('user.orders.list');

    }
    public function __construct()
    {
        $this->middleware('auth:web');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {


        dd($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   //dd($request);
        $this->validate($request, [
        'kh_dienThoai' => 'required|min:10|max:11',
        'kh_diaChi' => 'required|min:6|max:200',
        'ngay_gui' => 'required|before_or_equal:today',


    ], [
        'kh_diaChi.min'=> 'Vui Lòng Nhập Địa Chỉ Cụ Thể',
        'kh_diaChi.max' => 'Vui Lòng Nhập Địa Chỉ Cụ Thể',
        'kh_dienThoai.min'=>'Số Điện Thoại Không Hợp Lệ',
        'ngay_gui.before_or_equal'=>'Thời gian gửi phải sớm hơn hoặc là ngày hôm nay',
    ]);

//dd( Auth::user()->id);
        $hd = new HoaDon();
        $hd->lhd_ma = $request->lhd_ma;
        $hd->kh_ma =   Auth::user()->id;
        $hd->hd_nhan = $request->hd_nhan;
        $hd->hd_ghiChu = $request->hd_ghiChu;
        $hd->hd_trangThai = -1;
        $hd->hd_thoiGianXuLy= Carbon::now('Asia/Ho_Chi_Minh');
        $hd->hd_taoMoi = Carbon::now('Asia/Ho_Chi_Minh');
        $hd->hd_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        //dd($hd);
        $hd->save();

        $a="1 Lý Tự Trong Ninh Kiều Cần Thơ";
        $hdvc = new chitietvanchuyen();
        $hdvc->hd_ma=$hd->hd_ma;
       $hdvc->ctvc_trangThai = 0;
       $hdvc->ctvc_taoMoi= Carbon::now('Asia/Ho_Chi_Minh');
       $hdvc->ctvc_capNhat= Carbon::now('Asia/Ho_Chi_Minh');
       $hdvc->ctvc_tu= $request->kh_diaChi;
       $hdvc->ctvc_den=$a;
       $hdvc->ctvc_ngayGui= $request->ngay_gui;
       $hdvc->ctvc_dvvc= $request->dvvc;


       if ($request->hasFile('lk_hinh')) {
        $file = $request->lk_hinh;

        // Lưu tên hình vào column slk_hinh
        $hdvc->ctvc_hinh = $file->getClientOriginalName();

        // Chép file vào thư mục "storate/public/photos"
        $fileSaved = $file->storeAs('public/photos', $hdvc->ctvc_hinh);

    }
       $hdvc ->save();








Session::flash('alert-success', 'Đẵ Gửi Thông Tin Thành Công ^^~!!!');

            return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($HoaDon)
    {//Nhận đơn Chi tiết



        //dd($HoaDon);

        $nvg = DB::select(
            '
       SELECT  nv.id, nv.nv_hoTen , r.name FROM nhanvien AS nv
        INNER JOIN
            model_has_roles AS hr ON nv.id=hr.model_id
        INNER JOIN
            roles AS r ON hr.role_id=r.id
            WHERE r.id=17 or r.id=8'
        );
        $nv = NhanVien::all();
        $lhd = loaihoadon::all();
        $HoaDon = DB::select('SELECT   *,  bk.nv_ma as nv ,vc.nv_ma as nvvc  FROM hoa_don  as bk
        INNER JOIN khachhang as kh on kh.id   = bk.kh_ma
        INNER JOIN loai_hoa_don as lhd on lhd.lhd_ma = bk.lhd_ma
        INNER JOIN chi_tiet_van_chuyen as vc on vc.hd_ma   = bk.hd_ma
       where  vc.ctvc_trangThai =1 and bk.hd_ma='.$HoaDon);
        //dd($HoaDon);
        //dd($nv);
     return view('user.khachhang.editduyetnhan', compact('lhd'))->with('HoaDon', $HoaDon)->with('nv', $nv)->with('nvg', $nvg);





    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   //dd($id);


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
            $hd->lhd_ma = $request->lhd_ma;
            $hd->kh_ma =   Auth::user()->id;
            $hd->hd_nhan = $request->hd_nhan;
            $hd->hd_ghiChu = $request->hd_ghiChu;
            $hd->hd_trangThai = -1;
            $hd->hd_thoiGianXuLy= Carbon::now('Asia/Ho_Chi_Minh');
            $hd->hd_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
            //dd($hd);
            $hd->update();

            $a="1 Lý Tự Trong Ninh Kiều Cần Thơ";
            $hdvc = chitietvanchuyen::where("hd_ma",$hd->hd_ma)->first();
            $hdvc->hd_ma=$hd->hd_ma;
           $hdvc->ctvc_trangThai = 0;

           $hdvc->ctvc_capNhat= Carbon::now('Asia/Ho_Chi_Minh');
           $hdvc->ctvc_tu= $request->kh_diaChi;
           $hdvc->ctvc_den=$a;
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
    public function danhgia(Request $request, $id)
    {   //dd($id);


        //dd($request);
        $this->validate($request, [





        ], [


        ]);



            $hd = HoaDon::where("hd_ma",$request->id)->first();
            $hd->hd_phanHoi= $request->hd_phanHoi;
            $hd->hd_danhGia = $request->rating;
            $hd->hd_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
            //dd($hd);
            $hd->update();




        //
      ;


       Session::flash('alert-success', ' Cảm ơn Quý khách đã đánh giá cho dịch vụ của chúng tôi ^^~!!!');

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
        //
    }
}
