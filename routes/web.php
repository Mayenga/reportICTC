<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\TodoController;

Route::get('/', function () {
    return view('auth.login');
});

// auth rout for all users, when they logged in
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});

// routes for users only
Route::group(['middleware' => ['auth', 'role:user']], function () {
    Route::get('/dashboard/tasklist', 'App\Http\Controllers\RouteController@tasklist')->name('dashboard.tasklist');
    Route::get('/dashboard/report', 'App\Http\Controllers\RouteController@report')->name('dashboard.report');
});

// routes for Director only
Route::group(['middleware' => ['auth', 'role:director']], function () {
    Route::get('/dashboard/tasklistdir', 'App\Http\Controllers\RouteController@tasklistdir')->name('dashboard.tasklistdir');
    Route::get('/dashboard/newtaskdir', 'App\Http\Controllers\RouteController@newtaskdir')->name('dashboard.newtaskdir');
    Route::get('/dashboard/reportdir', 'App\Http\Controllers\RouteController@reportdir')->name('dashboard.reportdir');
});

// routes for DG only
Route::group(['middleware' => ['auth', 'role:dg']], function () {
    Route::get('/dashboard/tasklistdg', 'App\Http\Controllers\RouteController@tasklistdg')->name('dashboard.tasklistdg');
    Route::get('/dashboard/newtaskdg', 'App\Http\Controllers\RouteController@newtaskdg')->name('dashboard.newtaskdg');
    Route::get('/dashboard/reportdg', 'App\Http\Controllers\RouteController@reportdg')->name('dashboard.reportdg');
});

// routes for admin only
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/dashboard/userlist', 'App\Http\Controllers\AdminController@userlist')->name('dashboard.userlist');
    Route::get('/registerr', 'App\Http\Controllers\RegisterUserController@create')->name('registerr');
    Route::post('/registerr', 'App\Http\Controllers\RegisterUserController@store')->name('registerr');    
    Route::get('/dashboard/dptlist', 'App\Http\Controllers\AdminController@dptlist')->name('dashboard.dptlist');
    Route::get('/registerdpt', 'App\Http\Controllers\RegisterDepartmentController@create')->name('registerdpt');
    Route::post('/registerdpt', 'App\Http\Controllers\RegisterDepartmentController@store')->name('registerdpt');
});
Route::get('/backregisterr', 'App\Http\Controllers\RegisterUserController@backcreate')->name('backregisterr');
Route::post('/backregisterr', 'App\Http\Controllers\RegisterUserController@backstore')->name('backregisterr');
require __DIR__.'/auth.php';

// routes for todo
Route::get('/{id}/edit', 'App\Http\Controllers\TodoController@edit')->name('edit');
Route::post('/sendDelaymessage', 'App\Http\Controllers\TodoController@sendDelaymessage')->name('sendDelaymessage');
Route::post('/update', 'App\Http\Controllers\TodoController@update')->name('update');
Route::get('/{id}/complited', 'App\Http\Controllers\TodoController@complited')->name('complited');
Route::get('/{id}/delete', 'App\Http\Controllers\TodoController@delete')->name('delete');
Route::get('/upload', 'App\Http\Controllers\TodoController@upload')->name('upload');
Route::get('/todolistThisWeek', 'App\Http\Controllers\TodoController@getTodosWeek')->name('todolistThisWeek');
Route::get('/todolistall', 'App\Http\Controllers\TodoController@getTodosAll')->name('todolistall');
Route::get('/{id}/guttdir', 'App\Http\Controllers\TodoController@getUsersTasktodirector')->name('getUsersTasktodirector');
Route::get('/{id}/guttdg1', 'App\Http\Controllers\TodoController@getUsersTasktodg1')->name('getUsersTasktodg1');
Route::get('/{id}/guttdg2', 'App\Http\Controllers\TodoController@getUsersTasktodg2')->name('getUsersTasktodg2');

// all users except admin
Route::get('/dashboard/newtodo', 'App\Http\Controllers\TodoController@create')->name('dashboard.newtodo');
Route::get('/dashboard/todolist', 'App\Http\Controllers\TodoController@index')->name('dashboard.todolist');
Route::get('/profile', 'App\Http\Controllers\RouteController@profile')->name('profile');
Route::post('/editprofile', 'App\Http\Controllers\RegisterUserController@editprofile')->name('editprofile');
Route::post('/resetpass', 'App\Http\Controllers\RegisterUserController@resetpass')->name('resetpass');

// reports
Route::get('/reporttodo', 'App\Http\Controllers\TodoController@reporttodo')->name('reporttodo');
Route::get('/reporttododg', 'App\Http\Controllers\TodoController@reporttododg')->name('reporttododg');
Route::get('/reporttododr', 'App\Http\Controllers\TodoController@reporttododr')->name('reporttododr');
Route::post('/report', 'App\Http\Controllers\TodoController@report')->name('report');
Route::post('/reportdg', 'App\Http\Controllers\TodoController@reportdg')->name('reportdg');
Route::post('/reportdr', 'App\Http\Controllers\TodoController@reportdr')->name('reportdr');

Route::get('/getReport', 'App\Http\Controllers\PdfController@pdfReport')->name('getReport');
