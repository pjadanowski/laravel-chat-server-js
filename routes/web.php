<?php

use App\User;
use Carbon\Carbon;

Carbon::setLocale('pl');
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

    $user = User::find(1);
    // $user->premium = Carbon::now()->addDays(30);
    // $user->save();

    // Auth::login($user, true);

    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/chat', function(){
	return view('pages.chat');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
