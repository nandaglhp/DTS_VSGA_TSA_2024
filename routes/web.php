<?php

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

Route::get('/about', function () {
    return 'NIM: 2141720045';
});

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

