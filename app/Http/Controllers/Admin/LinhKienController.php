<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\linhkien;
use App\loailinhkien;
use App\nhasanxuat;
use App\NhanVien;
use App\khachhang;
use App\Baohanh;

class LinhKienController extends Controller
{
    public function index(Request $request)
    {
        $dbs = DB::select('
        SELECT * from linh_kien as lk
        INNER JOIN loai_linh_kien as llk  ON lk.llk_ma=llk.llk_ma
        INNER JOIN nha_san_xuat as nsx  ON nsx.nsx_ma=lk.nsx_ma
        INNER JOIN bao_hanh as bh  ON bh.bh_ma=lk.bh_ma
            ;');
            $loailinhkien = loailinhkien::all();
            $nsx = nhasanxuat::all();
            $bh = Baohanh::all();
        return view('admin.Linh_Kien.index')->with('loailinhkien', $loailinhkien)->with('nsx', $nsx)->with('bh', $bh)->with('dbs', $dbs);
    }

    public function create()
    {
        $loailinhkien = loailinhkien::all();
        $nsx = nhasanxuat::all();
        $bh = Baohanh::all();
        return view('admin.Linh_Kien.create')->with('loailinhkien', $loailinhkien)->with('nsx', $nsx)->with('bh', $bh);
    }

    public function store(Request $request)
    {
        $validation = $request->validate([

            'lk_hinh' => 'required|file|image|mimes:jpeg,png,gif,webp|unique:linh_kien',
            'lk_ten'=>'required|max:100|min:3|unique:linh_kien,lk_ten',
            'lk_gia'=>'required',
            'lk_thongTin'=>'required|max:255',


        ],[
            'lk_ten.unique'=> 'Tên linh kiện đã có vui lòng nhập lại',
            'lk_hinh.unique' => 'Tên hình linh kiện đã có vui lòng nhập lại',
            'lk_ten.min' => 'Tên linh kiện ít nhất 3 ký tự nhiều nhất 30 ký tự',
            'lk_ten.max' => 'Tên linh kiện ít nhất 3 ký tự nhiều nhất 30 ký tự'

        ]);

        $p = new linhkien();
        $p->lk_ten = $request->lk_ten;
        $p->lk_gia = $request->lk_gia;
        $p->lk_chiTiet = $request->lk_thongTin;
        $p->lk_taoMoi = Carbon::now('Asia/Ho_Chi_Minh') ;
        $p->lk_capNhat = Carbon::now('Asia/Ho_Chi_Minh') ;
        $p->lk_trangThai = 2;
        $p->llk_ma = $request->llk_ma;
        $p->nsx_ma = $request->nsx_ma;
        $p->bh_ma = $request->bh_ma;


        if ($request->hasFile('lk_hinh')) {
            $file = $request->lk_hinh;

            // Lưu tên hình vào column slk_hinh
            $p->lk_hinh = $file->getClientOriginalName();

            // Chép file vào thư mục "storate/public/photos"
            $fileSaved = $file->storeAs('public/photos', $p->lk_hinh);

        }

        $p->save();


        Session::flash('alert-info', 'Thêm Mới Thành Công ^^~!!!');

        return redirect()->route('manager.Linh_Kien.index');
    }

    public function edit( $id)
    {   $lk = linhkien::where("lk_ma",  $id)->first();
        $llk = loailinhkien::all();
        $nsx = nhasanxuat::all();
        $bh = Baohanh::all();
        $dbs = DB::select('
        SELECT * from linh_kien as lk
        INNER JOIN loai_linh_kien as llk  ON lk.llk_ma=llk.llk_ma
        INNER JOIN nha_san_xuat as nsx  ON nsx.nsx_ma=lk.nsx_ma
        INNER JOIN bao_hanh as bh  ON bh.bh_ma=lk.bh_ma where lk_ma='.$id
            );

        return view('admin.Linh_Kien.edit')
        ->with('llk', $llk)->with('nsx', $nsx)->with('bh', $bh)->with('lk', $lk);

    }

    public function update(Request $request,$id)
    {
        $validation = $request->validate([

            'lk_hinh' => 'file|image|mimes:jpeg,png,gif,webp|max:204',
            'lk_ten'=>'required|max:100|min:3',
            'lk_gia'=>'required',
            'lk_thongTin'=>'required|max:255',


        ],[

            'lk_ten.min' => 'Tên linh kiện ít nhất 3 ký tự nhiều nhất 30 ký tự',
            'lk_ten.max' => 'Tên linh kiện ít nhất 3 ký tự nhiều nhất 30 ký tự'

        ]);

        $p = linhkien::where("lk_ma",  $id)->first();
        $p->lk_ten = $request->lk_ten;
        $p->lk_gia = $request->lk_gia;
        $p->lk_chiTiet = $request->lk_thongTin;
        $p->lk_capNhat = Carbon::now('Asia/Ho_Chi_Minh') ;
        $p->lk_trangThai = $request->lk_trangThai;
        $p->llk_ma = $request->llk_ma;
        $p->nsx_ma = $request->nsx_ma;
        $p->bh_ma = $request->bh_ma;


        if ($request->hasFile('lk_hinh')) {

            $file = $request->lk_hinh;
             // Xóa hình cũ để tránh rác
             Storage::delete('public/photos/' . $p->lk_hinh);
            // Lưu tên hình vào column slk_hinh

            $p->lk_hinh = $file->getClientOriginalName();

            // Chép file vào thư mục "storate/public/photos"
            $fileSaved = $file->storeAs('public/photos', $p->lk_hinh);

        }


        $p->update();

        // Hiển thị câu thông báo 1 lần (Flash session)
        Session::flash('alert-info', 'Cập nhật thành công ^^~!!!');


        return redirect()->route('manager.Linh_Kien.index');
    }

    public function show($linhkien)
    {
        $linhkien= DB::select('
        SELECT * from linh_kien as lk
        INNER JOIN loai_linh_kien as llk  ON lk.llk_ma=llk.llk_ma
        INNER JOIN nha_san_xuat as nsx  ON nsx.nsx_ma=lk.nsx_ma
        INNER JOIN bao_hanh as bh  ON bh.bh_ma=lk.bh_ma where lk_ma='.$linhkien
            );

        return view('admin.Linh_Kien.show')->with('linhkien',$linhkien);


    }

    public function destroy( $linhkien)
    {
        // $bk = booking::where("lk_ma",$room)->first();
        // if($bk==null){
        //     $room = phong::where("lk_ma", $room)->first();
        //     Session::flash('alert-info', 'Xóa thành công ^^~!!!');
        //     $room ->delete();
        //         return back();}
        // else{
        //     $dele = booking::select('bk_ma')->where("lk_ma",$room)->get();
        //     foreach($dele as $xoabk)
        //     {
        //         $booking = booking::where("bk_ma", $xoabk->bk_ma)->first();
        // $booking->delete();

        //     }



            $linhkien = linhkien::where("lk_ma", $linhkien)->first();
            $linhkien->lk_trangThai = 2; // Mặc định là 2-Khả dụng
            $linhkien ->delete();
            Session::flash('alert-info', 'Đã xóa   ^^~!!!');return back();




    }


}
