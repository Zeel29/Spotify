<?php

use App\Http\Controllers\spotify;
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


Route::get('welcome','App\Http\Controllers\spotify@wel_album');
    

Route::get('/', function () {
    return view('login');
});

Route::get('home',function(){
    return view('home');
});

Route::get('home1',function(){
    return view('home1');
});

Route::view('register','register');

Route::post("register",'App\Http\Controllers\login_controller@insert_data');

Route::view('login','login');

Route::post("login",'App\Http\Controllers\login_controller@index');

Route::get('login', 'App\Http\Controllers\login_controller@login_check');

Route::get('logout', 'App\Http\Controllers\login_controller@logout');

Route::get('logout1', 'App\Http\Controllers\login_controller@logout_admin');

Route::view('l','admin_panel');

Route::view('admin','admin');

Route::view('u','user_info');

// Route::view('editPro','editPro');

Route::get('user_info','App\Http\Controllers\login_controller@search');

Route::get('l_delete/{id}','App\Http\Controllers\login_controller@l_delete');

Route::get('l_edit/{id}','App\Http\Controllers\login_controller@pro_edit');

Route::get('l_edit','App\Http\Controllers\login_controller@u_update');

Route::view('disp_alb','disp_alb');

Route::get('disp_alb', 'App\Http\Controllers\spotify@join_album'); // Display albums

Route::post('albums', 'App\Http\Controllers\spotify@insert_album'); // Insert albums

// Route::get('albums', 'App\Http\Controllers\spotify@search_a'); // Search albums
Route::get('albums', 'App\Http\Controllers\spotify@search_a'); // Search albums

Route::view('songs_form','songs_form');

Route::get('songs_form','App\Http\Controllers\spotify@search_songart');

Route::post('songs_form','App\Http\Controllers\spotify@insert_song');

Route::view('disp_song','disp_song');

Route::get('disp_song','App\Http\Controllers\spotify@search_song');

Route::get('s_delete/{id}','App\Http\Controllers\spotify@s_delete');

Route::view('artistt','artistt');

Route::post('artistt', 'App\Http\Controllers\spotify@insert_artist');

Route::get("dis_artist",'App\Http\Controllers\spotify@search_art');

Route::get('edit/{id}','App\Http\Controllers\spotify@Art_edit');

Route::get('edit','App\Http\Controllers\spotify@update');

Route::get('delete/{id}','App\Http\Controllers\spotify@delete');

Route::view('header','header');

Route::get('album/{id}', 'App\Http\Controllers\spotify@album_song_fetch')->name('fecthed_album');

Route::get('a_delete/{id}','App\Http\Controllers\spotify@a_delete');

Route::get('wel2','App\Http\Controllers\login_controller@showUserProfile');

