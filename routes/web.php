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

Route::get('/get/employees', 'Employees@get');
Route::post('/create/employee', 'Employees@create');
Route::get('/read/employee/{id}', 'Employees@read');
Route::post('/update/employee/{id}', 'Employees@update');
Route::post('/delete/employee/{id}', 'Employees@delete');