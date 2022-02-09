<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRoomTypeRequest;
use App\Http\Requests\StoreRoomTypeRequest;
use App\Http\Requests\UpdateRoomTypeRequest;
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
use App\Baohanh;
use App\NhanVien;
use App\khachhang;
use App\Bao_Hanh;



class BaohanhController extends Controller
{
    public function index()
    {
        $bh=Baohanh::all();

        return view('admin.Bao_Hanh.index', compact('bh'));
    }

    public function create()
    {


        return view('admin.Bao_Hanh.create');
    }

    public function store(Request $request)
    {
        $validation = $request->validate([

            'bh_ten'=>'required|max:100|min:3|unique:bao_hanh,bh_ten',

            'bh_thongTin'=>'required|max:255',
        ],[
            'bh_ten.unique'=> 'Tên nhà sả xuất đã có',
            'bh_ten.max' => 'Tên nhà sản xuất ít nhất 3 ký tự nhiều nhất 100 ký tự',
            'bh_ten.min' => 'Tên nhà sản xuất ít nhất 3 ký tự nhiều nhất 100 ký tự'

        ]);

        $p = new Baohanh();
        $p->bh_ten = $request->bh_ten;
        $p->bh_thongTin = $request->bh_thongTin;
        $p->bh_taoMoi = Carbon::now('Asia/Ho_Chi_Minh') ;
        $p->bh_capNhat = Carbon::now('Asia/Ho_Chi_Minh') ;
        $p->bh_trangThai = 2;

        $p->save();

        // Hiển thị câu thông báo 1 lần (Flash session)
        //
        $request->session()->flash('alert-info', 'Thêm mới thành công ^^~!!!');


        return redirect()->route('manager.Bao_Hanh.index');
    }

    public function edit( $bh)
    {
        $bh = Baohanh::find($bh);
        //dd($bh);
        return view('admin.Bao_Hanh.edit')->with('bh',$bh);
    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'bh_ten'=>'required|max:100|min:3',
            'bh_thongTin'=>'required|max:255',
        ]);


        $p = Baohanh::where("bh_ma",$id)->first();
        $p->bh_ten = $request->bh_ten;

        $p->bh_thongTin = $request->bh_thongTin;
        $p->bh_capNhat = Carbon::now('Asia/Ho_Chi_Minh') ;
        $p->bh_trangThai = $request->bh_trangThai;
        $p->update();

        // Hiển thị câu thông báo 1 lần (Flash session)
        Session::flash('alert-info', 'Cập nhật thành công  ^^~!!!');

        return redirect()->route('manager.Bao_Hanh.index');
    }

    public function show($bh)
    {//dd($bh);
        $bh= Baohanh::where("bh_ma", $bh)->first();

        return view('admin.Bao_Hanh.show')->with('bh',$bh);
    }

    public function destroy( $bh)
    {
        // $bk = Baohanh::where("bh_ma",$bh)->first();
        // if($bk==null){
        //     $roomType = loaiphong::where("bh_ma", $bh)->first();
        //     Session::flash('alert-info', 'Xóa thành công ^^~!!!');
        //     $roomType ->delete();
        //         return back();}
        // else{


        //     $dsBaohanh = Baohanh::select('p_ma')->where("bh_ma",$roomType)->get();

        //     foreach($dsBaohanh as $xoap)
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
        //         $room = Baohanh::where("p_ma", $xoap->p_ma)->first();
        //         $room ->delete();
        //     }

        //     $roomType = loaiphong::where("bh_ma", $roomType)->first();
        //     Session::flash('alert-info', 'Xóa thành công dữ liệu Loại phòng và các phòng , hóa đơn liên quan ^^~!!!');
        //     $roomType ->delete();
        //         return back();;

        // }
        $Baohanh= Baohanh::where("bh_ma", $bh)->first();
            Session::flash('alert-info', 'Xóa thành công dữ liệu liên quan ^^~!!!');
            $Baohanh ->delete();
             return back();;




    }


}
