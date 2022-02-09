<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLoaiLKRequest;
use App\Http\Requests\StoreLoaiLKRequest;
use App\Http\Requests\UpdateLoaiLKRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
Use PDF;
use Carbon\Carbon;
use App\linhkien;
use App\loailinhkien;
use App\nhasanxuat;
use App\NhanVien;
use App\khachhang;
use App\loai_linh_kien;

class LoaiLinhkienController extends Controller
{
    public function index()
    {    $nsx=nhasanxuat::all();
        $LoaiLK=loailinhkien::all();

        return view('admin.LoaiLK.index', compact('LoaiLK'))->with('nsx',$nsx);
    }

    public function create()
    {
        $nsx=nhasanxuat::all();

        return view('admin.LoaiLK.create',compact('nsx'));
    }

    public function store(Request $request)
    {
        $validation = $request->validate([

            'llk_ten'=>'required|max:100|min:3|unique:loai_linh_kien,llk_ten',
            'llk_thongTin'=>'required|max:255',
        ]);

        $p = new loailinhkien();
        $p->llk_ten = $request->llk_ten;
        $p->llk_thongTin = $request->llk_thongTin;
        $p->llk_taoMoi = Carbon::now('Asia/Ho_Chi_Minh') ;
        $p->llk_capNhat = Carbon::now('Asia/Ho_Chi_Minh') ;
        $p->llk_trangThai = 2;
        $p->save();

        // Hiển thị câu thông báo 1 lần (Flash session)
        //
        $request->session()->flash('alert-info', 'Thêm mới thành công ^^~!!!');


        return redirect()->route('manager.Loai_Linh_Kien.index');
    }

    public function edit( $LoaiLK)
    {    $nsx=nhasanxuat::all();

        $loailinhkien = loailinhkien::find($LoaiLK);
       // dd($loaiphong);
        return view('admin.LoaiLK.edit')->with('loailinhkien',$loailinhkien)->with('nsx',$nsx);
    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'llk_ten'=>'required|max:100|min:3',
            'llk_thongTin'=>'required|max:255',
        ]);


        $p = loailinhkien::where("llk_ma",$id)->first();
        $p->llk_ten = $request->llk_ten;
        $p->llk_thongTin = $request->llk_thongTin;
        $p->llk_capNhat = Carbon::now('Asia/Ho_Chi_Minh') ;
        $p->llk_trangThai = $request->llk_trangThai;

        // Kiểm tra xem người dùng có upload hình
        if ($request->hasFile('llk_hinh')) {

        Storage::delete('public/photos/' . $p->llk_hinh);

            // Upload hình mới

            $file = $request->llk_hinh;

            $p->llk_hinh = $file->getClientOriginalName();

            // Chép file vào thư mục "storate/public/photos"
            $fileSaved = $file->storeAs('public/photos', $p->llk_hinh);
        }
        $p->update();

        // Hiển thị câu thông báo 1 lần (Flash session)
        Session::flash('alert-info', 'Cập nhật thành công  ^^~!!!');

        return redirect()->route('manager.Loai_Linh_Kien.index');
    }

    public function show($LoaiLK)
    {//dd($LoaiLK);
        $nsx=nhasanxuat::all();
        $Loai_Linh_Kien= loailinhkien::where("llk_ma",$LoaiLK)->first();

        return view('admin.LoaiLK.show')->with('nsx',$nsx)->with('Loai_Linh_Kien',$Loai_Linh_Kien);
    }

    public function destroy( $LoaiLK)
    {
        // $bk = phong::where("llk_ma",$LoaiLK)->first();
        // if($bk==null){
        //     $LoaiLK = loaiphong::where("llk_ma", $LoaiLK)->first();
        //     Session::flash('alert-info', 'Xóa thành công ^^~!!!');
        //     $LoaiLK ->delete();
        //         return back();}
        // else{


        //     $dsphong = phong::select('p_ma')->where("llk_ma",$LoaiLK)->get();

        //     foreach($dsphong as $xoap)
        //     { $b=$xoap->p_ma;
        //          $dsbk = booking::select('bk_ma')->where("p_ma",$b)->get();
        //         $a = DB::select('select bk_ma from booking where p_ma='.$b);
        //           if($dsbk!= null){
        //                     foreach( $dsbk as $xoabk)
        //                     {

        //                         $booking = booking::where("bk_ma", $xoabk->bk_ma)->first();
        //                         $booking->delete();

        //                     }
        //               }
        //           // echo $xoap->p_ma ;
        //         $room = phong::where("p_ma", $xoap->p_ma)->first();
        //         $room ->delete();
        //     }

        //     $LoaiLK = loaiphong::where("llk_ma", $LoaiLK)->first();
        //     Session::flash('alert-info', 'Xóa thành công dữ liệu Loại phòng và các phòng , hóa đơn liên quan ^^~!!!');
        //     $LoaiLK ->delete();
        //         return back();;

        // }


        $loailinhkien= loailinhkien::where("llk_ma", $LoaiLK)->first();
        Session::flash('alert-info', 'Xóa thành công dữ liệu liên quan ^^~!!!');
        $loailinhkien ->delete();
         return back();;

    }


}
