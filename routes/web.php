<?php

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get ('logout',   'Auth\LoginController@logout')->name('logout');
Route::post('logout',   'Auth\LoginController@logout');

Auth::routes();

Route::get('/summit-2018/signup', 'FormController@index')->name('summit.signup');
Route::get('/summit-2018/terms-and-conditions', 'FormController@index')->name('summit.terms');
Route::get('/summit-2018/checkout', 'FormController@index')->name('summit.checkout');
Route::get('/summit-2018/success', 'FormController@index')->name('summit.checkout');

Route::get('/summit-2018/registered-users', 'FormController@show')->name('summit.result')->middleware('auth');

Route::get('/dashboard', 'HomeController@index')->name('dashboard')->middleware('auth');
Route::get('/dashboard/profile-edit', 'HomeController@index')->name('profile.edit')->middleware('auth');
Route::get('/dashboard/password-edit', 'HomeController@index')->name('password.edit')->middleware('auth');

Route::get('/user/profile','ProfileController@fetchUser')->middleware('auth');
Route::post('/user/profile/update','ProfileController@update')->middleware('auth');
Route::post('/user/password/update','PasswordController@update')->middleware('auth');
Route::get('/user/list', 'HomeController@index')->name('user.list')->middleware('auth');
Route::get('/user/create', 'HomeController@index')->name('user.create')->middleware('auth');
Route::get('/users/list','ProfileController@show')->middleware('auth');

Route::get('/form/download-registered-users', function () {
    return view('forms.download');
})->middleware('auth');

Route::get('/form/download-users', 'FormController@download')->middleware('auth');
Route::get('/form', 'HomeController@index')->name('form')->middleware('auth');
Route::get('/booking', 'HomeController@index')->name('booking')->middleware('auth');
Route::get('/calendar', 'HomeController@index')->name('calendar')->middleware('auth');
Route::get('/message', 'HomeController@index')->name('message')->middleware('auth');

Route::get('/mail-purchase', function () {
    return new App\Mail\PurchaseConfirmation(App\Form::first());
});

Route::any('{all}', function () {

    return view('404');

})->where(['all' => '.*']);