<?php

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get ('logout',   'Auth\LoginController@logout')->name('logout');
Route::post('logout',   'Auth\LoginController@logout');

Auth::routes();

Route::get('/summit-2018', 'FormController@index')->name('summit.home');
Route::get('/summit-2018/signup', 'FormController@index')->name('summit.signup');
Route::get('/summit-2018/terms-and-conditions', 'FormController@index')->name('summit.terms');
Route::get('/summit-2018/checkout', 'FormController@index')->name('summit.checkout');
Route::get('/summit-2018/success', 'FormController@index')->name('summit.checkout');
Route::get('/summit-2018/registered-users', 'FormController@show')->name('summit.result')->middleware('auth');

Route::get('/registration/','RegistrationsController@index')->name('rego.index');
Route::get('/registration/cell-group','RegistrationsController@index')->name('rego.registrations');
Route::get('/registration/baptism','RegistrationsController@index')->name('rego.baptism');
Route::get('/registration/confirmation','RegistrationsController@index')->name('rego.confirm');


Route::get('/dashboard', 'HomeController@index')->name('dashboard')->middleware('auth');
Route::get('/dashboard/profile-edit', 'HomeController@index')->name('profile.edit')->middleware('auth');
Route::get('/dashboard/password-edit', 'HomeController@index')->name('password.edit')->middleware('auth');

Route::get('/user/profile','UserController@fetchUser')->middleware('auth');
Route::post('/user/profile/update','UserController@update')->middleware('auth');
Route::post('/user/password/update','PasswordController@update')->name('password.update')->middleware('auth');

Route::get('/user/list', 'HomeController@index')->name('user.list')->middleware('auth');
Route::get('/user/invite', 'HomeController@index')->name('user.invite')->middleware('auth');
Route::get('/user/invite/success', 'HomeController@index')->name('user.invite.success')->middleware('auth');
Route::get('/user-confirmation/{confirmToken}','Auth\LoginController@confirm')->middleware('guest');
//Route::post('/user/send-invitation', 'Auth\RegisterController@invite')->middleware('auth');

Route::get('/users/list','UserController@show')->middleware('auth');

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

Route::get('/user-invitation', function () {
    return new App\Mail\UserInvitation(App\User::first(), str_random(16));
});

Route::any('{all}', function () {

    return view('404');

})->where(['all' => '.*']);