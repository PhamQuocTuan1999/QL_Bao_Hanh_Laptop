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
use App\nhasanxuat;
use App\NhanVien;
use App\khachhang;
use App\Nha_San_Xuat;


class NhaSanXuatController extends Controller
{
    public function index()
    {
        $NSX=nhasanxuat::all();

        return view('admin.NhaSX.index', compact('NSX'));
    }

    public function create()
    {


        return view('admin.NhaSX.create');
    }

    public function store(Request $request)
    {
        $validation = $request->validate([

            'nsx_ten'=>'required|max:100|min:3|unique:nha_san_xuat,nsx_ten',

            'nsx_thongTin'=>'required|max:255',
        ],[
            'nsx_ten.unique'=> 'Tên nhà sả xuất đã có',
            'nsx_ten.max' => 'Tên nhà sản xuất ít nhất 3 ký tự nhiều nhất 100 ký tự',
            'nsx_ten.min' => 'Tên nhà sản xuất ít nhất 3 ký tự nhiều nhất 100 ký tự'

        ]);

        $p = new nhasanxuat();
        $p->nsx_ten = $request->nsx_ten;
        $p->nsx_thongTin = $request->nsx_thongTin;
        $p->nsx_taoMoi = Carbon::now('Asia/Ho_Chi_Minh') ;
        $p->nsx_capNhat = Carbon::now('Asia/Ho_Chi_Minh') ;
        $p->nsx_trangThai = 2;

        $p->save();

        // Hiển thị câu thông báo 1 lần (Flash session)
        //
        $request->session()->flash('alert-info', 'Thêm mới thành công ^^~!!!');


        return redirect()->route('manager.Nha_San_Xuat.index');
    }

    public function edit( $NSX)
    {
        $NSX = nhasanxuat::find($NSX);
        //dd($NSX);
        return view('admin.NhaSX.edit')->with('NSX',$NSX);
    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'nsx_ten'=>'required|max:100|min:3',
            'nsx_thongTin'=>'required|max:255',
        ]);


        $p = nhasanxuat::where("nsx_ma",$id)->first();
        $p->nsx_ten = $request->nsx_ten;

        $p->nsx_thongTin = $request->nsx_thongTin;
        $p->nsx_capNhat = Carbon::now('Asia/Ho_Chi_Minh') ;
        $p->nsx_trangThai = $request->nsx_trangThai;
        $p->update();

        // Hiển thị câu thông báo 1 lần (Flash session)
        Session::flash('alert-info', 'Cập nhật thành công  ^^~!!!');

        return redirect()->route('manager.Nha_San_Xuat.index');
    }

    public function show($NSX)
    {//dd($NSX);
        $NSX= nhasanxuat::where("nsx_ma", $NSX)->first();

        return view('admin.NhaSX.show')->with('NSX',$NSX);
    }

    public function destroy( $NSX)
    {
        // $bk = nhasanxuat::where("nsx_ma",$NSX)->first();
        // if($bk==null){
        //     $roomType = loaiphong::where("nsx_ma", $NSX)->first();
        //     Session::flash('alert-info', 'Xóa thành công ^^~!!!');
        //     $roomType ->delete();
        //         return back();}
        // else{


        //     $dsnhasanxuat = nhasanxuat::select('p_ma')->where("nsx_ma",$roomType)->get();

        //     foreach($dsnhasanxuat as $xoap)
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
        //         $room = nhasanxuat::where("p_ma", $xoap->p_ma)->first();
        //         $room ->delete();
        //     }

        //     $roomType = loaiphong::where("nsx_ma", $roomType)->first();
        //     Session::flash('alert-info', 'Xóa thành công dữ liệu Loại phòng và các phòng , hóa đơn liên quan ^^~!!!');
        //     $roomType ->delete();
        //         return back();;

        // }
        $nhasanxuat= nhasanxuat::where("nsx_ma", $NSX)->first();
            Session::flash('alert-info', 'Xóa thành công dữ liệu liên quan ^^~!!!');
            $nhasanxuat ->delete();
             return back();;




    }


}
