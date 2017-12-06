<?php

Auth::routes();

Route::get('/', function () {
    return view('welcome');
})->name('summit');

//Route::get('/logout', 'Auth\LoginController@logout')->middleware('auth')->name('logout');

Route::get('/summit-2018/signup', 'FormController@index')->name('summit.signup');
Route::get('/summit-2018/checkout', 'FormController@index')->name('summit.checkout');
Route::get('/summit-2018/success', 'FormController@index')->name('summit.checkout');

Route::get('/dashboard', 'HomeController@index')->name('dashboard')->middleware('auth');
Route::get('/form', 'HomeController@index')->name('form')->middleware('auth');
Route::get('/user/list', 'HomeController@index')->name('user.list')->middleware('auth');
Route::get('/booking', 'HomeController@index')->name('booking')->middleware('auth');
Route::get('/calendar', 'HomeController@index')->name('calendar')->middleware('auth');
Route::get('/message', 'HomeController@index')->name('message')->middleware('auth');

Route::get('/mail-purchase', function () {
    return new App\Mail\PurchaseConfirmation(App\Form::first());
});

Route::any('{all}', function () {

    return view('404');

})->where(['all' => '.*']);