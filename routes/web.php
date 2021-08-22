<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
//page
Route::get('/','PostController@home')->name('home');
Route::get('master','PostController@master')->name('master');
//page category
Route::get('category/{slug}/post','CategoryController@category')->name('category');
//page tag
Route::get('tag/{slug}/post','TagController@tag')->name('tag');

//page article
Route::get('article/{slug}','PostController@article')->name('article');
//page comment
Route::post('comment','CommentController@comment')->name('comment');


//Admin
Route::Group([
	'middleware'=>'auth',
	'prefix'=>'admin'
],function(){
// Post Index
Route::get('index','PostController@index')->name('index');
//Create Post
Route::get('post','PostController@create')->name('postCreate');
Route::post('post','PostController@store')->name('postStore');
//Post delete
Route::delete('post/{id}','PostController@delete')->name('postDelete');
//Post update
Route::get('post/{id}/edit','PostController@edit')->name('postEdit');
Route::put('post/{id}','PostController@update')->name('postUpdate');
//Post Collaborators
Route::get('postcollaborators','PostController@postcollaborators')->name('postcollaborators');

// Category Index
Route::get('categoryindex','CategoryController@index')->name('categoryIndex');
// Category Create
Route::get('category','CategoryController@create')->name('categoryCreate');
Route::post('category','CategoryController@store')->name('categoryStore');
//Category delete
Route::delete('category/{id}','CategoryController@delete')->name('categoryDelete');
//Category update
Route::get('category/{id}/edit','CategoryController@edit')->name('categoryEdit');
Route::put('category/{id}','CategoryController@update')->name('categoryUpdate');

//Tag Index
Route::get('tagindex','TagController@index')->name('tagIndex');
//Tag Create 
Route::get('tag','TagController@create')->name('tagCreate');
Route::post('tag','TagController@store')->name('tagStore');
//Tag delete
Route::delete('tag/{id}','TagController@delete')->name('tagDelete');
//Tag update
Route::get('tag/{id}/edit','TagController@edit')->name('tagEdit');
Route::put('tag/{id}','TagController@update')->name('tagUpdate');

//Quản lý User
Route::get('user','AuthController@user')->name('user');
Route::get('user/{id}/edit','AuthController@useredit')->name('useredit');
Route::put('user/{id}','AuthController@userupdate')->name('userupdate');

//Logout
Route::post('logout','AuthController@logout')->name('logout');


});

//Login
Route::get('login','AuthController@getFormLogIn')->name('loginGetForm');
Route::post('login','AuthController@login')->name('login');

//Register
Route::get('register','AuthController@getFormRegister')->name('registerGetForm');
Route::post('register','AuthController@register')->name('register');

//Verify User
Route::get('getverifyUsercode/{email}/{token}','VerifyUserController@getverifyUsercode')->name('getverifyUsercode');
Route::post('verifyaccount','VerifyUserController@verifyaccount')->name('verifyaccount');
//Change Password
Route::get('getformchangepassword','ChangePasswordController@getformchangepassword')->name('getformchangepassword');
Route::post('sendpasswordtoken','ChangePasswordController@sendpasswordtoken')->name('sendpasswordtoken');
Route::get('checkchangepasswordtoken/{email}/{token}','ChangePasswordController@checkchangepasswordtoken')->name('checkchangepasswordtoken');
Route::post('savechangedpassword','ChangePasswordController@savechangedpassword')->name('savechangedpassword');



//Sendmail
Route::get('sendmail','SendMailController@sendmail');

//Forgot password
Route::get('forgotpassword','ForgotPasswordController@getemail')->name('getforgotpasswordemail');
Route::post('getverifycode','ForgotPasswordController@getverifycode')->name('getverifycode');
Route::get('getverifycodeandtoken/{email}/{token}','ForgotPasswordController@getverifycodeandtoken')->name('getverifycodeandtoken');
Route::put('savenewpassword','ForgotPasswordController@savenewpassword')->name('savenewpassword');

