<?php

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

// admin group
// http://127.0.0.1:8000/admin/customer
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
	// app/Http/Controllers/Admin/CustomerCrudController.php
	CRUD::resource('customer', 'Admin\CustomerCrudController');
});