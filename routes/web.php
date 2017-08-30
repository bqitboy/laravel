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

Route::get('index', 'DangranController@index');
Route::get('getMemberList', 'DangranController@getMemberList');
Route::get('addMember', 'DangranController@addMember');
Route::get('getOne', 'DangranController@getOne');
Route::get('getValue', 'DangranController@getValue');
Route::get('getValueList', 'DangranController@getValueList');
Route::get('getData', 'DangranController@getData');
Route::get('getLists', 'DangranController@getLists');
Route::get('query1', 'DangranController@query1');
Route::get('query2', 'DangranController@query2');
Route::get('query3', 'DangranController@query3');
Route::get('query4', 'DangranController@query4');
Route::get('query5', 'DangranController@query5');
Route::get('query6', 'DangranController@query6');
Route::get('query7', 'DangranController@query7');
Route::get('query8', 'DangranController@query8');
Route::get('query9', 'DangranController@query9');
Route::get('query10', 'DangranController@query10');
Route::get('query11', 'DangranController@query11');
Route::get('query12', 'DangranController@query12');
Route::get('dangran1', 'DangranController@dangran1');
Route::get('delete1', 'DangranController@delete1');
Route::get('getSoftDeleteList', 'DangranController@getSoftDeleteList');
