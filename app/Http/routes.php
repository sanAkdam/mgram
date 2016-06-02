<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */

Route::group(['middleware' => ['web']], function () {
	Route::get('/', function () {
		return view('signin');
	})->name('signin');

	Route::get('/signup', function () {
		return view('signup');
	})->name('signup');

	Route::get('/upload', function () {
		return view('upload');
	})->name('upload');

	Route::post('/signup', [
		'uses' => 'UserController@postSignUp',
		'as' => 'userSignup',
	]);

	Route::post('/signin', [
		'uses' => 'UserController@postSignIn',
		'as' => 'userSignin',
	]);

	Route::get('/logout', [
		'uses' => 'UserController@getLogout',
		'as' => 'logout',
	]);

	Route::get('/dashboard', [
		'uses' => 'PostController@getDashboard',
		'as' => 'dashboard',
		'middleware' => 'auth',
	]);

	Route::get('/admin', [
		'uses' => 'PostController@getAdminDashboard',
		'as' => 'admin',
		'middleware' => 'auth',
	]);

	Route::get('/account', [
		'uses' => 'UserController@getAccount',
		'as' => 'account',
	]);

	Route::post('/updateaccount', [
		'uses' => 'UserController@postSaveAccount',
		'as' => 'account.save',
	]);

	Route::get('/userimage/{filename}', [
		'uses' => 'UserController@getUserImage',
		'as' => 'account.image',
	]);

	Route::post('/createpost', [
		'uses' => 'PostController@postCreatePost',
		'as' => 'post.create',
		'middleware' => 'auth',
	]);

	Route::get('/post-delete/{post_id}', [
		'uses' => 'PostController@getDeletePost',
		'as' => 'post.delete',
		'middleware' => 'auth',
	]);

	Route::post('/edit', [
		'uses' => 'PostController@postEditPost',
		'as' => 'edit',
	]);

	Route::post('/like', [
		'uses' => 'PostController@toggleLike',
		'as' => 'like',
	]);

	Route::post('/comment', [
		'uses' => 'PostController@postCommentPost',
		'as' => 'comment.create',
	]);

	Route::post('/report', [
		'uses' => 'PostController@report',
		'as' => 'report.create'
	]);

	Route::get('profile/{username}', [
		'uses' => 'ProfileController@index',
		'as' => 'profile',
		'middleware' => 'auth',
	]);

	Route::get('follow/{id}', 'ProfileController@follow');
});
