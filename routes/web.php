<?php

use App\Http\Controllers\CRUDPhoto;
use App\Http\Controllers\CRUDController;
use App\Http\Controllers\PageControllerSatu;
use App\Http\Controllers\pengajarController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Selamat Datang!';
});

Route::get('/hello', function () {
    return 'Hello VSGA';
});

Route::get('/word', function () {
    return 'Hello Dunia';
});

// Route::get('/about', function () {
//     return 'NIM: 2141720045';
// });

Route::get('/user/{name}', function ($name) {
    return 'Nama saya: '.$name;
});

Route::get('/user/{post}/{comment}', function ($post, $comment) {
    return 'Post ke- '.$post. ' komentar ke- '.$comment;
});

Route::get('/user/{name?}', function ($name=null) {
    return 'Nama saya'.$name;
});

Route::get('/kodebarang/{jenis?}{merek?}', function ($jk='k01', $mrk='nokia') {
    return "Kode barang $jk dan nama barang $mrk";
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/tampil', function () {
    return view('tampil');
})->name('tampil');

Route::get('/pesandisini', function () {
    return '<h1>pesan disini</h1>';
});

Route::redirect('/contact-us', '/pesandisini');

Route::prefix('/polinema')->group(function(){
    Route::get('/dosen', function () {
        return '<h1>daftar nama dosen</h1>';
    });

    Route::get('/tendik', function () {
        return '<h1>daftar nama tendik</h1>';
    });

    Route::get('/jurusan', function () {
        return '<h1>daftar nama jurusan</h1>';
    });
});

Route::fallback(function(){
    return "maaf, alamat ini tidak ditemukan";
});

Route::get('/daftar-dosen',[pengajarController::class,'daftarPengajar']);
Route::get('/tabel-pengajar',[pengajarController::class,'tabelPengajar']);
Route::get('/blog-pengajar',[pengajarController::class,'blogPengajar']);

Route::get('pasar-buah',[PageControllerSatu::class,'satu']);
Route::resource('crud',CRUDController::class);

Route::resource('photos',CRUDPhoto::class)->only([
    'index',
    'show'
]);
Route::resource('photos',CRUDPhoto::class)->except([
    'create',
    'store',
    'update',
    'destroy'
]);

Route::get('/selamat', function () {
    return view('hello',['name'=>'dino']);
});

Route::get('/greeting',[
    WelcomeController::class,
    'greeting'
]);
