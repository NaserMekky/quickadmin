<?php

use Illuminate\Support\Facades\Route;
use Nasermekky\Quickadmin\Controllers\QuickAdminSettingController;

Route::get('quickadmin', function () {
    return view('quickadmin::welcome');
}
);
Route::get('test', function() {



    config('naser' ,'config/quickadmin.php');

   

    dd(config('quickadmin'));
}
);

Route::resource("settings", QuickAdminSettingController::class);