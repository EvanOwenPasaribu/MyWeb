<?php

use App\Http\Controllers\IndexController;
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

Route::get('/', "IndexController@index");
Route::get('/addGardu', "IndexController@addGardu");
Route::post('/addGardu', "IndexController@saveGardu");
Route::get('/addUser', "IndexController@addUser");
Route::post('/addUser', "IndexController@saveUser");
Route::get('/addPengukuran', "IndexController@addPengukuran");
Route::post('/addPengukuran', "IndexController@savePengukuran");
Route::get('/listGardu', "IndexController@listGardu");
Route::post('/listGardu', "IndexController@getListGardu");
Route::get('/listPengukuran', "IndexController@listPengukuran");
Route::post('/listPengukuran', "IndexController@getListPengukuran");
Route::get('/listUser', "IndexController@listUser");
Route::post('/listUser', "IndexController@getListUser");
