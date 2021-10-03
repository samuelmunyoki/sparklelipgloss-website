<?php
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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/about', 'App\Http\Controllers\HomeController@about')->name('about');
Route::get('/new_arrivals', 'App\Http\Controllers\HomeController@new_arrivals')->name('new_arrivals');
Route::get('/popular', 'App\Http\Controllers\HomeController@popular')->name('popular');
Route::get('/password-reset', 'App\Http\Controllers\HomeController@password_reset')->name('password_reset');



Route::get('/login', 'App\Http\Controllers\Auth\LoginController@index')->name('login');
Route::post('/login', 'App\Http\Controllers\Auth\RegisterController@create')->name('register');
Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');


Route::get('cart', 'App\Http\Controllers\CartController@cartList')->name('cart.list');
Route::post('cart','App\Http\Controllers\CartController@addToCart')->name('cart.store');
Route::post('update-cart', 'App\Http\Controllers\CartController@updateCart')->name('cart.update');
Route::post('remove', 'App\Http\Controllers\CartController@removeCart')->name('cart.remove');
Route::post('clear', 'App\Http\Controllers\CartController@clearAllCart')->name('cart.clear');
Route::post('orderNow', 'App\Http\Controllers\CartController@orderNow')->name('cart.order');

Route::get('/userlogin', 'App\Http\Controllers\AdminController@userlogin')->name('userlogin');
Route::get('/user-registration', 'App\Http\Controllers\AdminController@user_registration')->name('user-registration');
Route::post('/user-registration', 'App\Http\Controllers\Auth\RegisterController@create')->name('register');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'prevent-back-history'], function(){



});
Route::group(['prefix' =>'admin'], function()
{
    Route::get('/', 'App\Http\Controllers\AdminController@index')->name('adminhome');
    Route::get('/popular', 'App\Http\Controllers\AdminController@admin_popular')->name('adminpopular');
    Route::get('/new-arrivals', 'App\Http\Controllers\AdminController@admin_new_arrivals')->name('adminnew-arrivals');
    Route::get('/search', 'App\Http\Controllers\AdminController@search')->name('adminsearch');
    Route::get('/users', 'App\Http\Controllers\AdminController@users')->name('adminusers');
    Route::get('/new-item/create', 'App\Http\Controllers\ProductFormController@create' )->name('admincreate');
    Route::post('/new-item', 'App\Http\Controllers\ProductFormController@store' )->name('adminstore');
    Route::get('/delete/{prod_id}', 'App\Http\Controllers\ProductFormController@destroy' )->name('admindestroy');
    Route::get('/edit/{prod_id}', 'App\Http\Controllers\ProductFormController@edit' )->name('adminedit');
    Route::any('/update/{prod_id}', 'App\Http\Controllers\ProductFormController@update' )->name('adminupdate');
    //Route::get('/users-online', 'App\Http\Controllers\UserController@userOnlineStatus')->name('admin.users');
    
});