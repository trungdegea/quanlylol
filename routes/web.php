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
        Route::get('chitiet/{id}', 'GiaidauController@getchitietGiaidau')->name('chitiet-giaidau.get');
        Route::get('them', 'GiaidauController@getthemGiaidau')->name('them-giaidau.get');
        Route::post('them', 'GiaidauController@postthemGiaidau')->name('them-giaidau.post');
        Route::get('sua/{id}', 'GiaidauController@getsuaGiaidau')->name('sua-giaidau.get');
        Route::post('sua/{id}', 'GiaidauController@postsuaGiaidau')->name('sua-giaidau.post');
    });
    Route::prefix('doi')->group(function (){
        Route::get('/{MaGD}', 'DoituyenController@getDsdoi')->name('ds-doi.get');
        Route::get('them/{MaGD}', 'DoituyenController@getthemdoi')->name('them-doi.get');
        Route::post('them/{MaGD}', 'DoituyenController@postthemdoi')->name('them-doi.post');
        Route::get('chitiet/{MaGD}&&{MaDoi}', 'DoituyenController@getchitietdoi')->name('chitiet-doi.get');
        Route::get('sua/{MaGD}', 'DoituyenController@getsuadoi')->name('sua-doi.get');
        Route::post('sua/{MaGD}', 'DoituyenController@postsuadoi')->name('sua-doi.post');
    });
    
    Route::get('chitietgiaidau', function () {
        return view('admin.giaidau.chitietgiaidau');
    });
    Route::get('danhsachdoi', function () {
        return view('admin.giaidau');
    });
});
