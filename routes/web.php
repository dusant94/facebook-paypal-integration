<?php

use App\Http\Controllers\HomeController;
use App\Message;
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


Route::get('/signin', 'UserController@showsignin')->name('show.signin');
Route::post('/user/signin', 'UserController@signin')->name('user.signin');

Route::get('/user/logout', 'UserController@logout')->name('user.logout');

Route::get('/register','UserController@showregister')->name('show.register');
Route::post('/user/register','UserController@register')->name('user.register');





Route::get('/reset-password/send','PasswordController@showsendemail')->name('reset.password.email');
Route::post('/reset-password/send','PasswordController@sendemail')->name('reset.password.send');
Route::get('/reset-password/{user}/{code}','PasswordController@resetPasswordForm')->name('reset.password');
Route::post('/reset-password/{user}/{code}','PasswordController@resetPassword')->name('reset.password.update');


Route::get('/verificate/{user}/{kod}', 'UserController@verificateForm')->name('user.verificate.form');

Route::middleware(['sentinelauth' ])->group(function(){

Route::get('/user/{user}/profile','UserController@userprofile')->name('user.profile');
Route::get('/user/image','UserController@getUserImage')->name('profile.picture');

Route::get('/user/{user}/orders','ChartController@orders')->name('user.orders');
Route::get('/products','ProductsController@products')->name('products');
Route::post('/cart/{id}','ProductsController@addproduct')->name('add.to.chart');
Route::post('/cart/{id}/delete','ProductsController@deletefromchart')->name('delete.from.chart');

Route::get('/user/integrations','UserController@integrations')->name('integrations');
Route::get('/user/chat','MessageController@showChat')->name('chat');
Route::get('/contacts', 'MessageController@getContacts');
Route::get('/conversation/{id}', 'MessageController@getMessagesFor');
Route::post('/conversation/send', 'MessageController@send');






Route::post('/token/insert','ApiTokenController@update')->name('refresh.token');


Route::put('/user/{user}/edit','UserController@edit')->name('user.edit');

Route::get('/','HomeController@show')->name('home');

// route for processing payment
Route::post('paypal/{id}', 'PaymentController@payWithpaypal')->name('paypal');
// route for check status of the payment
Route::get('status', 'PaymentController@getPaymentStatus')->name('status');


});



Route::get('login/facebook', 'LoginController@redirectToProvider')->name('login.facebook');
Route::get('login/facebook/callback', 'LoginController@handleProviderCallback');



Route::get('oauth/redirect','OAuthController@redirect')->name('redirect');
Route::get('oauth/callback','OAuthController@callback');

Route::get('facebook', 'FacebookUser@store');

