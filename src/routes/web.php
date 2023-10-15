<?php

use Illuminate\Support\Facades\Route;
use Nasermekky\Quickadmin\Controllers\QuickAdminSettingController;

Route::get('quickadmin', function () {
    return view('quickadmin::welcome');
}
);
Route::get('test', function() {



    config(['quickadmin.naser' => 'Naser New']);

    $text = '<?php return ' . var_export(config('quickadmin'), true) . ';';
    file_put_contents(config_path('quickadmin.php'), $text);


    dd(var_export(file_get_contents(config_path('quickadmin.php')), true));
}
);

Route::resource("settings", QuickAdminSettingController::class);