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

Route::get('/',  function (){
    return view('components');
})->name('home');

Route::get('/catalog',  function (){
    return view('catalog');
})->name('catalog');

Route::get('/landing',  function (){
    return view('landing');
})->name('landing');

Route::get('/profile',  function (){
    return view('profile');
})->name('profile');

Route::get('/register',  function (){
    return view('register');
})->name('register');

Route::get('/contact',  function (){
    return view('landing');
})->name('contact');

Route::get('/about',  function (){
    return view('landing');
})->name('about');

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/admin-users',                            'Admin\AdminUsersController@index');
    Route::get('/admin/admin-users/create',                     'Admin\AdminUsersController@create');
    Route::post('/admin/admin-users',                           'Admin\AdminUsersController@store');
    Route::get('/admin/admin-users/{adminUser}/edit',           'Admin\AdminUsersController@edit')->name('admin/admin-users/edit');
    Route::post('/admin/admin-users/{adminUser}',               'Admin\AdminUsersController@update')->name('admin/admin-users/update');
    Route::delete('/admin/admin-users/{adminUser}',             'Admin\AdminUsersController@destroy')->name('admin/admin-users/destroy');
    Route::get('/admin/admin-users/{adminUser}/resend-activation','Admin\AdminUsersController@resendActivationEmail')->name('admin/admin-users/resendActivationEmail');
});

/* Auto-generated profile routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/profile',                                'Admin\ProfileController@editProfile');
    Route::post('/admin/profile',                               'Admin\ProfileController@updateProfile');
    Route::get('/admin/password',                               'Admin\ProfileController@editPassword');
    Route::post('/admin/password',                              'Admin\ProfileController@updatePassword');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/films',                                  'Admin\FilmsController@index');
    Route::get('/admin/films/create',                           'Admin\FilmsController@create');
    Route::post('/admin/films',                                 'Admin\FilmsController@store');
    Route::get('/admin/films/{film}/edit',                      'Admin\FilmsController@edit')->name('admin/films/edit');
    Route::post('/admin/films/{film}',                          'Admin\FilmsController@update')->name('admin/films/update');
    Route::delete('/admin/films/{film}',                        'Admin\FilmsController@destroy')->name('admin/films/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/comments',                               'Admin\CommentsController@index');
    Route::get('/admin/comments/create',                        'Admin\CommentsController@create');
    Route::post('/admin/comments',                              'Admin\CommentsController@store');
    Route::get('/admin/comments/{comment}/edit',                'Admin\CommentsController@edit')->name('admin/comments/edit');
    Route::post('/admin/comments/{comment}',                    'Admin\CommentsController@update')->name('admin/comments/update');
    Route::delete('/admin/comments/{comment}',                  'Admin\CommentsController@destroy')->name('admin/comments/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/categories',                             'Admin\CategoriesController@index');
    Route::get('/admin/categories/create',                      'Admin\CategoriesController@create');
    Route::post('/admin/categories',                            'Admin\CategoriesController@store');
    Route::get('/admin/categories/{category}/edit',             'Admin\CategoriesController@edit')->name('admin/categories/edit');
    Route::post('/admin/categories/{category}',                 'Admin\CategoriesController@update')->name('admin/categories/update');
    Route::delete('/admin/categories/{category}',               'Admin\CategoriesController@destroy')->name('admin/categories/destroy');
});

Route::get('/{any}', 'Home\HomeController@index')->where('any','.*');