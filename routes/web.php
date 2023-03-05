<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    $produk = DB::table('produk')->get();
    return view('welcome',['produk' => $produk]);
   
});
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('hotel', HotelController::class);

Route::resource('kamar', KamarController::class);
Route::get('/kamar','HotelController@index');

Route::resource('fasilitas', FasilitasController::class);
Route::get('/fasilitas','FasilitasController@index');



Route::get('/admin/tambah_type','AdminController@tambah_type');
Route::get('/admin/edit_type/{id}','AdminController@edit_type');
Route::get('/admin/hapus_type/{id}','AdminController@hapus_type');
Route::post('/admin/update_type','AdminController@update_type');
Route::post('/admin/store_type','AdminController@store_type');

Route::get('/admin/edit_fasilitas/{id}','AdminController@edit_fasilitas');
Route::get('/admin/fasilitas','AdminController@fasilitas');
Route::post('/admin/update_fasilitas','AdminController@update_fasilitas');

Route::post('/admin/update_fasilitas_hotel','AdminController@update_fasilitas_hotel');
Route::get('/admin/edit_fasilitas_hotel/{id}','AdminController@edit_fasilitas_hotel');
Route::get('/admin/fasilitas_hotel','AdminController@fasilitas_hotel');
Route::get('/admin/tambah_fasilitas_hotel','AdminController@tambah_fasilitas_hotel');
Route::post('/admin/store_fasilitas_hotel','AdminController@store_fasilitas_hotel');

Route::get('/resepsionis','ResepsionisController@index');
Route::get('/resepsionis/cari','ResepsionisController@cari');
Route::get('/resepsionis/cari2','ResepsionisController@cari2');

Route::get('/payment','PaymentController@payment');
Route::post('/payment','PaymentController@payment_post');


Route::group(['middleware' => ['role_or_permission:Admin|role-create']], function () {
    Route::resource('admin', AdminController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
});