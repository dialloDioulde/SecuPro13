<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/employeesLists/{words?}', 'EmployeeController@index');
Route::post('/employeesLists', 'EmployeeController@store');
Route::get('/employees/edit/{id}', 'EmployeeController@edit');
Route::patch('/employees/edit/{id}', 'EmployeeController@update');
Route::delete('/employees/{id}', 'EmployeeController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
