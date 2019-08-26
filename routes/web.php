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

Route::get('/', 'StaticPagesController@home')->name('home');
Route::get('/help', 'StaticPagesController@help')->name('help');
Route::get('/about', 'StaticPagesController@about')->name('about');
Route::get('/signup', 'UserController@create')->name('signup');
//Route::get('/users/{user}', 'UserController@show')->name('users.show');
Route::resource('users',"UserController");
Route::get('login',"SessionsController@create")->name('login');
Route::post('login',"SessionsController@store")->name('login');
Route::delete('logout',"SessionsController@destroy")->name('logout');


Route::get('/users/{user}/edit','UserController@edit')->name('users.edit');

Route::get('signup/confirm/{token}','UserController@confirmEmail')->name('confirm_email');

//--------密码重置----------------------------------------------------------------------------------------
#---重置表单
Route::get('password/reset','Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
#---发送邮件
Route::post('password/email','Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
#---密码更新页面
Route::get('password/reset/{token}','Auth\ResetPasswordController@showResetForm')->name('password.reset');
#---执行密码更新操作
Route::post('password/reset','Auth\ResetPasswordController@reset')->name('password.update');


//---------微博功能-----------------------------------------------------------------------------------------
Route::resource('statuses','StatusesController',[
    'only'=>['store','destroy']
]);


//-----------用户关注者列表和粉丝列表路由----------------------------------------------------------------------
Route::get('/users/{user}/followings',"UserController@followings")->name('users.followings');
Route::get('/users/{user}/followers',"UserController@followers")->name('users.followers');

//----------关注用户和取消关注用户功能------------------------------------------------------------------------
Route::post('/users/followers/{user}',"FollowersController@store")->name('followers.store');
Route::delete('/users/followers/{user}',"FollowersController@destroy")->name('followers.destroy');