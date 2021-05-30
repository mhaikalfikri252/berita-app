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

Route::get('/', function () {
    return view('auth/login');
});

Route::group(['middleware' => ['auth']], function () {
    Route::resource('/post', 'PostController');
    Route::resource('/tag', 'TagController');

    Route::get('/home', 'HomeController@index')->name('home');
    // Route::get('/profil', '');

    Route::delete('/post/{post_id}', 'PostController@destroy');
});
// Route::group(['middleware' =>['auth']], function(){
//     Route::resource('/post', 'PostController');
//     // Route::resource('/tag', 'TagController');

//     Route::get('/home', 'HomeController@index')->name('home');
// // Route::get('/profil', '');

//     // Route::delete('/post/{post}', 'PostController@destroy');

// });

// Route::get('/post', 'PostController@index');
// Route::get('/post/create', 'PostController@create');
// Route::post('/post', 'PostController@store');
// Route::get('/post/{post_id}', 'PostController@show');
// Route::get('/post/{post_id}/edit', 'PostController@edit');
// Route::put('/post/{post_id}', 'PostController@update');
// Route::delete('/post/{post_id}', 'PostController@destroy');

Route::resource('/post', 'PostController');
Route::resource('/profile', 'ProfileController');
Route::resource('/editc', 'EditController');

// Show Posts By Tag
Route::get('/tag/{tag_id}', 'TagController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/lgn/{id}', 'LoginController@index');
// Route::get('/profil', '');


//edit password
Route::get('/edit', 'ProfileController@index')->name('edit.index');
Route::post('/editprofile', 'ProfileController@editprofile')->name('edit.editprofile');


// Route::
