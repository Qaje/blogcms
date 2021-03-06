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

Route::group(['middleware' => ['web']],function(){
	//aUTHENTICATION rOUTES
/*	Route::get('auth/login', 'Auth\LoginController@getLogin');
	Route::post('auth/login', 'Auth\LoginController@postLogin');
	Route::get('auth/logout', 'Auth\LoginController@getLogout');
	//Registration Routes
	Route::get('auth/register','Auth\AuthController@getRegister');
	Route::post('auth/register','Auth\AuthController@postRegister');
*/
	//Categories
	Route::resource('categories','CategoryController',['except'=>['create'] ] );
	//Comments
	Route::post('comments/{post_id}',
		[	'uses'=>'CommentsController@store',
			'as'=>'comments.store'
		]
	);
	//Tags
	Route::resource('tags','TagController',['except'=>['create'] ] );


	//blog
	Route::get('blog/{slug}', ['as' => 'blog.single', 'uses'=>'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');
	Route::get('blog',['uses'=>'BlogController@getIndex','as'=>'blog.index']);
	Route::get('contact', 'PagesController@getContact');
	Route::post('contact','PagesController@postContact');
	Route::get('about', 'PagesController@getAbout');
	Route::get('/', ['as'=>'pages.welcome', 'uses'=>'PagesController@getIndex']);
	Route::resource('posts','PostController');



});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


