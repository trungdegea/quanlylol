<?php
use App\Http\Controllers\PostController;

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




Route::get('dangky', 'pagesController@getDangky')->name('dangky.get');
Route::post('dangky', 'pagesController@postDangky');

Route::get('/dangnhap', 'pagesController@getDangnhap')->name('dangnhap.get');
Route::post('/dangnhap', 'pagesController@postDangnhap')->name('dangnhap.post');
Route::get('dangxuat', 'pagesController@getLogout')->name('dangxuat.get');

// Route::middleware(['adminLogin'])->group(function () {
//     Route::prefix('/admin')->group(function () {
//         Route::get('/home', 'TrangchuController@getTrangchu')->name('trangchu.get');
        
//         Route::get('chitietgiaidau', function () {
//             return view('admin.chitietgiaidau');
//         });
//         Route::get('danhsachdoi', function () {
//             return view('admin.giaidau');
//         });
//     });
// });
Route::prefix('/admin')->group(function () {
    Route::get('/', 'TrangchuController@getTrangchu')->name('trangchu.get');
    Route::prefix('giaidau')->group(function (){
        Route::get('/', 'GiaidauController@getDsGiaidau')->name('ds-giaidau.get');
        Route::get('/them', 'GiaidauController@getthemGiaidau')->name('them-giaidau.get');
        Route::post('/them', 'GiaidauController@postthemGiaidau')->name('them-giaidau.post');
    });
    Route::prefix('doi')->group(function (){
        Route::get('/', 'DoituyenController@getDsdoi')->name('ds-giaidau');
        Route::get('/them', 'DoituyenController@getthemdoi')->name('them-doi.get');
        Route::post('/them', 'DoituyenController@postthemdoi')->name('them-doi.post');
    });
    
    Route::get('chitietgiaidau', function () {
        return view('admin.giaidau.chitietgiaidau');
    });
    Route::get('danhsachdoi', function () {
        return view('admin.giaidau');
    });
});
