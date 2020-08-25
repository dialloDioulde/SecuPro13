<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/auth', 'HomeController@index');

Route::get('/employeesLists', 'EmployeeController@index');
//Route::get('/employeesSearch/{q}', 'EmployeeController@employeesSearch');
Route::post('/employeesLists', 'EmployeeController@store');
Route::get('/employees/edit/{id}', 'EmployeeController@edit');
Route::patch('/employees/edit/{id}', 'EmployeeController@update');
Route::delete('/employees/{id}', 'EmployeeController@destroy');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified', 'mustbeapproved');
Route::get('/mustbeapproved', 'HomeController@mustbeapproved')->name('mustbeapproved');

Route::get('/admin/users', 'AdminController@index')->name('admin.index')->middleware(['auth', 'isAdmin']);

Route::get('/errors/not-an-admin', function (){
    return view('admin.errors.not-an-admin');
})->name('errors.not-an-admin');

