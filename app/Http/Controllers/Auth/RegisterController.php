<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Session;
use App\Nhanvien;
use App\Http\Controllers\Controller;
use App\khachhang;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Carbon\Carbon;
use Mail;
use App\Mail\RegisterMailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\HoaDon;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\linhkien;
use App\loailinhkien;
use App\nhasanxuat;
use App\Baohanh;
use App\chitiethoadon;
use App\loaihoadon;
use Spatie\Permission\Models\Permission;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/'; // Sau khi đăng ký xong sẽ tự động đăng nhập và chuyển về trang /admin

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\khachhang
     */
    protected function register(Request $request)
    {
        $pt = khachhang::where("kh_dienThoai", $request->kh_dienThoai)->first();


        if($pt == null){
            $validation = $request->validate([
                'email' => 'required|string|max:50|unique:khachhang',
                'password' => 'required|string|min:3',
                'kh_hoTen' => 'required|string|max:50',

                'kh_diaChi' => 'required',
                'kh_dienThoai' => 'required|numeric|unique:khachhang'

            ],[
                'kh_taiKhoan.unique'=> 'Tài Khoảng đã tồn tại',
                'kh_matKhau.confirmed' => 'Mật khẩu không chính xác '
            ]);


                $kh = khachhang::create([
                    'email' => $request['email'],
                    'password' => bcrypt($request['password']), //123456
                    'kh_hoTen' => $request['kh_hoTen'],

                    'kh_email' => $request['kh_email'],
                    'kh_diaChi' => $request['kh_diaChi'],
                    'kh_dienThoai' =>$request['kh_dienThoai'],
                    'kh_taoMoi' => Carbon::now(), // Lấy ngày giờ hiện tại (sử dụng Carbon)
                    'kh_capNhat' => Carbon::now(), // Lấy ngày giờ hiện tại (sử dụng Carbon)
                    'kh_trangThai' => 1, // Mặc định là 2-Khả dụng

                ]);


                // mail

                if (  $kh->kh_email != null) {
                    $emails =   $kh->kh_email;
                    //Gửi mail
                    Mail::to($emails)->send(new \App\Mail\DangKy(['emails' => $emails]));

                }
                    Auth::login($kh);

                Session::flash('alert-info', 'Thêm mới thành công ^^~!!!');
                return view('user.index');



        }
        elseif($pt->email==null){

            $validation = $request->validate([
                'email' => 'required|string|max:50|unique:khachhang',
                'password' => 'required|string|min:3',
                'kh_hoTen' => 'required|string|max:50',


                'kh_diaChi' => 'required',
                'kh_dienThoai' => 'required|numeric'

            ],[
                'kh_taiKhoan.unique'=> 'Tài Khoảng đã tồn tại',
                'kh_matKhau.confirmed' => 'Mật khẩu không chính xác '


            ]);
            $pt->email = $request->email ;
            $pt->password =  bcrypt($request['password']);
            $pt->kh_hoTen = $request->kh_hoTen;
            $pt->kh_email = $request->kh_email;
            $pt->kh_diaChi = $request->kh_diaChi;
            $pt->kh_capNhat = Carbon::now();
            $pt->kh_trangThai = 1;
            $pt->update();

// MAIL

if ( $pt->kh_email != null) {
    $emails =  $pt->kh_email;
    //Gửi mail
    Mail::to($emails)->send(new \App\Mail\DangKy(['emails' => $emails]));

}

            Auth::login($pt);
            Session::flash('alert-info', 'Thêm mới thành công ^^~!!!');
            return view('user.index');

        }else{
            Session::flash('alert-info', 'Số điện Thoại đã có người đăng ký ^^~!!!');
            return back();

        }

    //      $validation = $request->validate([
    //     'email' => 'required|string|max:50|unique:khachhang',
    //     'password' => 'required|string|min:3',
    //     'kh_hoTen' => 'required|string|max:50',
    //     'kh_gioiTinh' => 'required',
    //     'kh_email' => 'required|string|email|max:100',
    //     'kh_diaChi' => 'required',
    //     'kh_dienThoai' => 'required|numeric|unique:khachhang'

    // ],[
    //     'kh_taiKhoan.unique'=> 'Tài Khoảng đã tồn tại',
    //     'kh_matKhau.confirmed' => 'Mật khẩu không chính xác '


    // ]);



        // $kh = khachhang::create([
        //     'email' => $request['email'],
        //     'password' => bcrypt($request['password']), //123456
        //     'kh_hoTen' => $request['kh_hoTen'],
        //     'kh_gioiTinh' => $request['kh_gioiTinh'],
        //     'kh_email' => $request['kh_email'],
        //     'kh_diaChi' => $request['kh_diaChi'],
        //     'kh_dienThoai' =>$request['kh_dienThoai'],
        //     'kh_taoMoi' => Carbon::now(), // Lấy ngày giờ hiện tại (sử dụng Carbon)
        //     'kh_capNhat' => Carbon::now(), // Lấy ngày giờ hiện tại (sử dụng Carbon)
        //     'kh_trangThai' => 1, // Mặc định là 2-Khả dụng

        // ]);
        //     Auth::login($kh);
        //     Session::flash('alert-info', 'Thêm mới thành công ^^~!!!');
        //     return view('user.index');

    }
}
