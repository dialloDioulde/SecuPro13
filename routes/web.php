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

// Welcome
 Route::get('wel', function () {
    return view('welcome');
});



// Auth
Auth::routes(['verify' => true]);

Route::post('login', 'Auth\LoginController@login')->name('login')->middleware('isNotBanned');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

// Admin
Route::get('/home', 'HomeController@index')->name('home'); //->middleware('verified', 'mustbeapproved');

Route::get('/', 'HomeController@index')->name('home')->middleware('verified'); //->middleware('verified', 'mustbeapproved');

Route::get('/mustbeapproved', 'HomeController@mustbeapproved')->name('mustbeapproved');



// Admin Users, Employees

Route::get('/admin/usersDashboard', 'AdminUserController@index')->name('admin.dashboard.index')->middleware(['auth', 'isAdmin']);

Route::get('/admin/employeesDashboard', 'AdminUserController@indexEmployees')->name('admin.dashboard.indexEmployees')->middleware(['auth', 'isAdmin']);

Route::get('/admin/editEmailName/{id}', 'AdminUserController@editEmailName')->name('admin.editEmailName');

Route::patch('/admin/updateEmailName/{id}', 'AdminUserController@updateEmailName')->name('admin.updateEmailName');

Route::delete('/admin/deleteEmailName/{id}', 'AdminUserController@deleteEmailName')->name('admin.deleteEmailName');



Route::get('/admin/users', 'AdminController@index')->name('admin.index')->middleware(['auth', 'isAdmin']);

Route::get('/admin/approve/{id}', 'AdminController@approve')->name('admin.approve')->middleware(['auth', 'isAdmin']);

Route::get('/admin/ban/{id}', 'AdminController@ban')->name('admin.ban')->middleware(['auth', 'isAdmin']);

Route::get('/admin/editRole/{user}', 'AdminController@editRole')->name('admin.editRole');

Route::patch('/admin/updateRole/{user}', 'AdminController@updateRole')->name('admin.updateRole');

Route::get('/errors/not-an-admin', function ()
{return view('admin.errors.not-an-admin');
})->name('errors.not-an-admin');



// Employees
Route::get('/employeesLists', 'EmployeeController@index');

//Route::get('/employeesSearch/{q}', 'EmployeeController@employeesSearch');

Route::post('/employeesLists', 'EmployeeController@store');

Route::get('/employees/edit/{id}', 'EmployeeController@edit');

Route::patch('/employees/edit/{id}', 'EmployeeController@update');

Route::delete('/employees/{id}', 'EmployeeController@destroy');





