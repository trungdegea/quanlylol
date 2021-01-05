<?php
use App\Http\Controllers\PostController;
use App\Http\Middleware\Login;

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

Route::get('viewer', 'pagesController@gettrangchu')->name('trangchu.get');


Route::get('dangky', 'pagesController@getDangky')->name('dangky.get');
Route::post('dangky', 'pagesController@postDangky')->name('dangky.post');

Route::get('/dangnhap', 'pagesController@getDangnhap')->name('dangnhap.get');
Route::post('/dangnhap', 'pagesController@postDangnhap')->name('dangnhap.post');
Route::get('dangxuat', 'pagesController@getLogout')->name('dangxuat.get');
Route::get('viewer', 'pagesController@gettrangchu')->name('trangchu.get');
Route::prefix('/admin')->middleware('adminlogin')->group(function () {
    Route::get('/', 'TrangchuController@getTrangchu')->name('trangchu.get');
    Route::get('/lienhe', 'pagesController@getLienhe')->name('lienhe.get');
    Route::prefix('giaidau')->group(function (){
        Route::get('/', 'GiaidauController@getDsGiaidau')->name('ds-giaidau.get');
        Route::get('chitiet/{id}', 'GiaidauController@getchitietGiaidau')->name('chitiet-giaidau.get');
        Route::post('Locdoi/{id}', 'GiaidauController@Locdoigiaidau')->name('locdoi-giaidau.post');
        Route::get('them', 'GiaidauController@getthemGiaidau')->name('them-giaidau.get');
        Route::post('them', 'GiaidauController@postthemGiaidau')->name('them-giaidau.post');
        Route::get('sua/{id}', 'GiaidauController@getsuaGiaidau')->name('sua-giaidau.get');
        Route::post('sua/{id}', 'GiaidauController@postsuaGiaidau')->name('sua-giaidau.post');
    });
    Route::prefix('doi')->group(function (){
        //danh sach doi tham gia giai dau
        Route::get('/{MaGD}', 'DoituyenController@getDsdoi')->name('ds-doi.get');
        //them mot doi vao giai dau
        Route::get('them/{MaGD}', 'DoituyenController@getthemdoi')->name('them-doi.get');
        Route::post('them/{MaGD}', 'DoituyenController@postthemdoi')->name('them-doi.post');
        //chi tiet cua mot doi
        Route::get('chitiet/{MaGD}&&{MaDoi}', 'DoituyenController@getchitietdoi')->name('chitiet-doi.get');
        //delete mot thanh vien trong danh sach thanh vien doi
        Route::get('chitiet/{MaTV}',     'DoituyenController@xoathanhviendoi')->name('delete-thanhvien-doi.get');
        //them thanh vien vao danh sach thanh vien
        Route::post('themthanhvien/{MaGD}&&{MaDoi}', 'DoituyenController@posthemthanhvien')->name('them-thanhviendoi.post');
        //update table thanh vien cua doi
        Route::post('chitiet/{MaGD}&&{MaDoi}', 'DoituyenController@postsuaDSThanhVien')->name('sua-thanhvien-doi.post');
        //sua thong tin cua doi
        Route::get('sua/{MaGD}', 'DoituyenController@getsuadoi')->name('sua-doi.get');
        Route::post('sua/{MaGD}', 'DoituyenController@postsuadoi')->name('sua-doi.post');
        // Xóa đội , gồm xóa tất cả thành viên.
        Route::get('xoa/{MaDoi}',     'DoituyenController@xoaDoi')->name('delete-doi.get');

    });
    Route::prefix('thanhvien')->group(function (){
        //danh sach  thanh vien cua tat ca cac doi  trong giai dau
        Route::get('/{MaGD}', 'ThanhvienController@getDsThanhVien')->name('ds-thanhvien.get');
        //xoa 1 thanh vien tu bang danh sach thanh vien
        Route::get('xoa/{MaTV}',     'ThanhvienController@xoathanhvien')->name('delete-thanhvien.get');
       
        Route::post('them', 'ThanhvienController@postthemthanhvien')->name('them-thanhvien.post');

        Route::post('/{MaGD}', 'ThanhvienController@postLoDoi')->name('xemdoithanhvien.post');
       
        
        Route::post('sua/{MaGD}', 'ThanhvienController@postsuadoi')->name('sua-danhsachTV.post');
    });
   
    Route::group(['prefix' => 'lichthidau'], function () {
        Route::get('/{MaGD}','LichthidauController@getLichThiDau')->name('lichthidau.get');
        Route::post('Xếp/{MaGD}','LichthidauController@postXepLichThiDau')->name('xeplichthidau.post');
        Route::post('Lưu/{MaGD}','LichthidauController@postCapNhatKetQua' )->name('capnhatketqua.post');
    });
   
});
