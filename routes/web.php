<?php

Route::redirect('/', 'dashboard');

/**
 * App Routes.
 */
Route::group(['middleware' => 'auth'], function () {
    Route::livewire('dashboard', 'dashboard.dashboard');
    Route::livewire('profile', 'user.profile');
    Route::livewire('message', 'messages.display-messages');
});

/* Home Routes web security */
Route::group(['middleware' => 'web'], function () {
    Route::livewire('/contactme', 'messages.contact-me');

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

    Route::get('/coming_soon', function () {
        return view('homepages.comingsoon');
    });
});

Route::get('/status/{status}', 'ProductController@status')->name('productStatus');

Route::get('/bycategory/{id}', 'CategoryController@bycategory')->name('bycategory');

Route::resource('product', 'ProductController');
Route::resource('category', 'CategoryController');
Route::resource('page', 'PageController');

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
});
