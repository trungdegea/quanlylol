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


Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('admin.home');
});

Route::get('giaidau', function () {
    return view('admin.giaidau');
});

Route::get('dangky', 'pagesController@getDangky');
Route::post('dangky', 'pagesController@postDangky');

Route::get('dangnhap', 'pagesController@getDangnhap');
Route::post('dangnhap', 'pagesController@postDangnhap');