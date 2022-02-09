<?php

namespace App\Http\Controllers\Admin;

use App\booking;
use App\hoadon;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\NhanVien;
use App\Quyen;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;


class UsersController extends Controller
{
    public function index()
    {



        $users = NhanVien::all();
        $roles = Role::get()->pluck('name', 'name');
        return view('admin.users.index', compact('users'))->with('roles',$roles);
    }

    public function create()
    { $roles = Quyen::all();


        return view('admin.users.create')->with('roles',$roles);
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'name'=>'required|max:30|min:5',
            'nv_diaChi'=>'required|max:100|min:5',
            'sdt'=>'required|min:6|numeric',
            'nv_email'=>'required|email|max:50',
            'nv_gioiTinh'=>'required',
            'email'=>'required|max:30|min:5|unique:nhanvien',
            'password'=>'required|string|min:3',



        ],[

            'name.min' => 'Tên ít nhất 3 ký tự nhiều nhất 30 ký tự',
            'name.max' => 'Tên ít nhất 3 ký tự nhiều nhất 30 ký tự',
            'nv_diaChi.min' => 'Địa chỉ ít nhất 3 ký tự nhiều nhất 100 ký tự',
            'nv_diaChi.max' => 'Địa chỉ ít nhất 3 ký tự nhiều nhất 100 ký tự',
            'sdt.min' => 'Số điện thoại ít nhất 6 ký tự nhiều nhất 10 ký tự',
            'nv_email.email' => 'Gmail của Google',
            'email.unique' => 'Tên đăng nhập đã được sử dụng',

        ]);

        $nv = nhanvien::create([
            'email' => $request['email'],
             'password' => bcrypt($request['password']), //123456
            'nv_hoTen' => $request['name'],
            'nv_gioiTinh' => $request['nv_gioiTinh'],
            'nv_email' => $request['nv_email'],
            'nv_diaChi' => $request['nv_diaChi'],
            'nv_dienThoai' => $request['sdt'],
            'nv_taoMoi' => Carbon::now(), // Lấy ngày giờ hiện tại (sử dụng Carbon)
            'nv_capNhat' => Carbon::now(), // Lấy ngày giờ hiện tại (sử dụng Carbon)
            'nv_trangThai' => 2, // Mặc định là 2-Khả dụng
            'q_ma' => 2, // Mặc định là 2-Quản trị

        ]);
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $nv->assignRole($roles);
        Session::flash('alert-info', 'Thêm mới thành công ^^~!!!');
        return redirect()->route('manager.users.index');
    }

    public function edit(NhanVien $user)
    {

        $roles = Role::get()->pluck('name', 'name');

        //dd($user);
        return view('admin.users.edit')->with('user',$user)->with('roles',$roles);
    }


    public function update(Request  $request, $id)
    {



        $nv = NhanVien::where("id",$id)->first();//dd($nv);
          $nv->email = $request['email'];

          if($request->pasword==null){
            $nv->password =   bcrypt($request['password']);
          }
          //$nv->password =   bcrypt($request['password']);
          $nv->nv_hoTen =  $request['name'];
          $nv->nv_gioiTinh =  $request['nv_gioiTinh'];
          $nv->nv_email=  $request['nv_email'];
          $nv->nv_diaChi=  $request['nv_diaChi'];
          $nv->nv_dienThoai=  $request['sdt'];
          $nv->nv_capNhat =  Carbon::now();// Lấy ngày giờ hiện tại (sử dụng Carbon)
          $nv->nv_trangThai =   $request['nv_trangThai']; // Mặc định là 2-Khả dụng
          $nv->q_ma=  1; // Mặc định là 2-Quản trị

          $nv->update();


          $roles = $request->input('roles') ? $request->input('roles') : [];

          $nv->syncRoles($roles);

        Session::flash('alert-info', 'Cập nhật thành công ^^~!!!');
        return redirect()->route('manager.users.index');
    }


    public function show(NhanVien $user)
    {

        $user->load('roles');

        return view('admin.users.show', compact('user'));
    }

    public function destroy($user)
    {


        $nv = NhanVien::where("id",$user)->first();
        $nv->nv_trangThai = 1; // Mặc định là 2-Khả dụng

        $nv->delete();
        Session::flash('alert-info', 'Nhân viên đã xóa thành công   ^^~!!!');return back();}



    public function massDestroy( $request)
    {
        NhanVien::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
