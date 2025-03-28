<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\lab6Controller;

Route::get('/lab06/{name}', function ($name) {
    return "<h1>Welcome to $name homepage</h1>
            <p><strong>This is the first time to run Laravel Framework.</strong></p>";
});


Route::get('it/{firstname?}/{lastname?}', [lab6Controller::class, 'welcome']);//เอาค่าจากฟังก์ชั่นจากคลาสคอนโทล จากwelcomeหน้าคอนโทล
Route::get('welcome/{firstname?}/{lastname?}', [Controller::class, 'welcome']);

Route::get('/', function () {
    return view('welcome');
});
