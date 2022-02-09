<?php

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|user\index
*/
Route::get('test', function () {
    return view('test');
});

Route::get('/', function () {
    return view('user.index');
});
Route::get('Home', function () {
    return view('user.index')->name('home');
});

Route::get('manager', function () {
    return view('backend.index');
});
//phong


//admin.


 Route::get('admin', 'AdminController@index')->name('admin');



//xac thuc tai khoang
Auth::routes();

Route::prefix('admin')->group(function() {
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});



Route::get('/home', 'HomeController@index')->name('home');


//frontend
//khachhang
Route::resource('/user', 'Frontend\UserController');
Route::get('DS-Don', 'Frontend\UserController@don')->name('ds-don');
Route::get('DS-Dang-Ky', 'Frontend\UserController@dangky')->name('ds-dangky');
Route::get('DS-Van-Chuyen', 'Frontend\UserController@vanchuyen')->name('ds-vanchuyen');
//booking backend khach dat phong
Route::get('/Backend/booking', 'Frontend\BookingController@index')->name('backend.booking.index');
Route::post('/Backend/booking/update', 'Frontend\BookingController@update')->name('backend.booking.update');
Route::post('/Backend/booking/edit', 'Frontend\BookingController@edit')->name('backend.booking.edit');
Route::get('/Backend/booking/{id}/checkin', 'Frontend\BookingController@checkin')->name('backend.booking.checkin');

//booking user
Route::get('Gui_Sua', 'ExampleController@index')->name('orders');
Route::get('Gui_Sua/create', 'ExampleController@create')->name('orders.create');
Route::post('Gui_Sua/store', 'ExampleController@store')->name('orders.store');
Route::post('Gui_Sua/{id}/uptate', 'ExampleController@update')->name('orders.update');
Route::post('Danh_gia/{id}/danhgia', 'ExampleController@danhgia')->name('orders.danhgia');
Route::get('Nhan_Chi_Tiet/{id}/show', 'ExampleController@show')->name('orders.show');
// admin manage

Route::group(['prefix' => 'manager', 'as' => 'manager.', 'namespace' => 'Admin', 'middleware' => ['auth:admin']], function () {

    Route::get('/', 'HomeController@index')->name('home');
//Quản Lý
    //kh
    Route::get('kh_day', 'QuanLy\khController@khday')->name('kh_day');
    Route::get('kh_week', 'QuanLy\khController@khweek')->name('kh_week');
    Route::get('kh_month', 'QuanLy\khController@khmonth')->name('kh_month');
    //bh
    Route::get('bh_day', 'QuanLy\bhController@bh_day')->name('bh_day');
    Route::get('bh_week', 'QuanLy\bhController@bh_week')->name('bh_week');
    Route::get('bh_month', 'QuanLy\bhController@bh_month')->name('bh_month');
    //sc
    Route::get('sc_day', 'QuanLy\scController@sc_day')->name('sc_day');
    Route::get('sc_week', 'QuanLy\scController@sc_week')->name('sc_week');
    Route::get('sc_month', 'QuanLy\scController@sc_month')->name('sc_month');

    // Thống Kê theo
    Route::get('tk_nv', 'QuanLy\tkController@tk_nv')->name('tk_nv');
    Route::get('tk_tg', 'QuanLy\tkController@tk_tg')->name('tk_tg');
    Route::get('tk_kh', 'QuanLy\tkController@tk_kh')->name('tk_kh');
    //
    Route::post('tk_nv_show', 'QuanLy\tkController@tk_nv_show')->name('tk_nv_show');
    Route::put('tk_tg_show', 'QuanLy\tkController@tk_tg_show')->name('tk_tg_show');
    Route::post('tk_kh_show', 'QuanLy\tkController@tk_kh_show')->name('tk_kh_show');
//
Route::get('tk_nvn', 'QuanLy\tkController@tk_nvn')->name('tk_nvn');
Route::post('tk_nvn_show', 'QuanLy\tkController@tk_nvn_show')->name('tk_nvn_show');
//
Route::get('tk_Loai_Don', 'QuanLy\tkController@tk_ld')->name('tk_ld');
Route::put('nhan_tin', 'QuanLy\tkController@nt')->name('nt');
//

Route::get('tk_Loai_Linh_Kien', 'QuanLy\tkController@tk_llk')->name('tk_llk');
Route::put('tk_Loai_Linh_Kien_show', 'QuanLy\tkController@tk_llk_show')->name('tk_llk_show');

Route::get('Tim_Kiem', 'QuanLy\tkController@timkiem')->name('Tim_kiem');
Route::put('Tim_Kiem_show', 'QuanLy\tkController@timkiemshow')->name('Tim_kiem_show');
// tk theo phản hồi
Route::get('Thong_Ke_Phan_hoi', 'QuanLy\tkController@Thong_Ke_Phan_hoi')->name('Thong_Ke_Phan_hoi');
//
    // Users
    Route::resource('users', 'UsersController');
    // khachhang
    Route::resource('khachhang', 'KhachhangController');
    //Nhà sản xuất
    Route::resource('Nha_San_Xuat', 'NhaSanXuatController');
    //Loại Linh Kiện
    Route::resource('Loai_Linh_Kien', 'LoaiLinhKienController');
    //Loại Bao Hành
    Route::resource('Bao_Hanh', 'BaoHanhController');

    //van chuyen
    Route::resource('Van_Chuyen', 'VanChuyenController');
    Route::get('Duyet_Van_Chuyen', 'VanChuyenController@Duyet')->name('Van_Chuyen_Duyet');
    Route::get('Van_Chuyen_Don', 'VanChuyenController@VanChuyen')->name('Van_Chuyen_Don');
    Route::get('Xac_Nhan_Den', 'VanChuyenController@XacNhanDen')->name('Xac_Nhan_Den');
    Route::put('Chi_Tiet/{id}/update1', 'VanChuyenController@update1')->name('Chi_Tiet.update1');


    Route::resource('Linh_Kien', 'LinhKienController');
    // HoaDon
    Route::resource('HoaDon', 'HoaDonController');
    Route::get('HoaDonVanChuyen', 'HoaDonController@VanChuyen')->name('HoaDon.Van_Chuyen');
    Route::resource('LinhKienHD', 'HoaDon\LinhKienHDController');
    Route::put('HoaDon/{id}/sale', 'HoaDonController@sale')->name('HoaDon.sale');
    Route::put('HoaDon/{id}/update1', 'HoaDonController@update1')->name('HoaDon.update1');
    Route::put('HoaDon/{id}/update2', 'HoaDonController@update2')->name('HoaDon.update2');

     Route::get('HoaDon/{id}/print', 'HoaDonController@print')->name('HoaDon.print');


     Route::resource('HoaDonCN', 'HoaDon\HoaDonCNController');
});
Route::group(['middleware' => ['auth:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('permissions', 'Admin\PermissionsController');

    Route::resource('roles', 'Admin\RolesController');



});
