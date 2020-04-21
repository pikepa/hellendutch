<?php

Route::get('send_test_email', function () {
    Mail::raw('Sending emails with Mailgun and Laravel is easy!', function ($message) {
        $message->to('pikepeter@gmail.com');
    });
});
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

Route::get('/', 'ProductController@index')->name('root');
Route::get('/theartist', function () {
    return view('homepages.theartist');
});
Route::get('/whyborneo', function () {
    return view('homepages.whyborneo');
});
Route::get('/materials', function () {
    return view('homepages.materials');
});
Route::get('/contactme', function () {
    return view('messages.create');
});

Route::get('/coming_soon', function () {
    return view('homepages.comingsoon');
});

Route::get('/status/{status}', 'ProductController@status')->name('productStatus');

Route::get('/bycategory/{id}', 'CategoryController@bycategory')->name('bycategory');

Route::resource('product', 'ProductController');
Route::resource('message', 'MessageController');
Route::resource('category', 'CategoryController');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/images', 'UploadImageController@index');
    Route::get('/images/{product}/load', 'UploadImageController@load');
    Route::get('/images/{product}/{image}/delete', 'UploadImageController@delete');
    Route::get('/images/{product}/{image}/featured', 'UploadImageController@featured');
    Route::get('/images/{image}', 'UploadImageController@show');
    Route::post('/images/upload', 'UploadImageController@upload');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile/{id}', 'UserController@show')->name('user.profile');
    Route::patch('/users/{id}', 'UserController@update')->name('user.update');

    //  Route::get('/category', 'CategoryController@index');
  //  Route::get('/category/{id}/edit', 'CategoryController@edit')->name('category.edit');
  //  Route::get('/category/create', 'CategoryController@create')->name('category.create');
});
