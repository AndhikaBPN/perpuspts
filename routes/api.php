<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function(){
    $cek_koneksi=DB::connection()->getPdo();
    if ($cek_koneksi) {
        echo "nyambung";
    } else {
        echo "gagal";
    }
});

//kategori
Route::post('/insert_kategori', 'ckategori@inkategori');
Route::put('/update_kategori/{id}', 'ckategori@update');
Route::delete('/hapus_kategori/{id}', 'ckategori@destroy');

//buku
Route::post('/insert_buku', 'cbuku@inbuku');
Route::put('/update_buku/{id}', 'cbuku@update');
Route::delete('/hapus_buku/{id}', 'cbuku@destroy');

//peminjam
Route::post('/insert_pinjam', 'cpinjam@inpinjam');
Route::put('/update_pinjam/{id}', 'cpinjam@update');
Route::delete('/hapus_pinjam/{id}', 'cpinjam@destroy');

//transpinjam
Route::post('/insert_transpinjam', 'ctranspinjam@inpinjam');
Route::put('/update_transpinjam/{id}', 'ctranspinjam@update');
Route::delete('/hapus_transpinjam/{id}', 'ctranspinjam@destroy');

//detailpinjam
Route::post('/insert_detpinjam', 'cdetpinjam@indetail');
Route::get('/getCustomer', 'cdetpinjam@getCustomer');