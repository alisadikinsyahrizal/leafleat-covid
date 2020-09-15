<?php

use App\Http\Controllers\UpdateController;
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

Route::get('/', 'Covid@index')->name('page');
Route::post('/page', 'Covid@store')->name('covid');
Route::get('/admin', 'UpdateController@index')->name('admin');
Route::get('/history', 'UpdateController@show')->name('history');
Route::get('/update', 'UpdateController@create')->name('update');
Route::post('/', 'UpdateController@store')->name('insert');
Route::delete('/history/{id}', 'UpdateController@destroy')->name('delete');
Route::delete('/{id}', 'UpdateController@delete')->name('hapus');
// Route::resource('update', 'UpdateController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
