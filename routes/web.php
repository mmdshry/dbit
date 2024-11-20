<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $tls = new \App\Vendors\TlsVendor();
    dd($tls->getToken());
});
