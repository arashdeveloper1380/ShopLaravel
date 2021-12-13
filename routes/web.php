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


/*
|--------------------------------------------------------------------------
| FrontEnd Site
|--------------------------------------------------------------------------
*/
Route::get('/', 'Frontend\HomeController@index')->name('front.index');
Route::get('/product/{id}/{product_name}', 'Frontend\HomeController@show')->name('front.show');
Route::get('/category/{id}', 'Frontend\HomeController@category')->name('front.category');
Route::get('/brand/{id}/{name}', 'Frontend\HomeController@brand')->name('front.brand');
Route::get('/special', 'Frontend\HomeController@special')->name('front.special');
Route::get('/logout', 'Frontend\HomeController@logout')->name('front.logout');

// --------------- Cart Routers ---------------
Route::middleware(['auth', 'CheckAuthTOCart'])->group(function () {
    Route::get('cart','Frontend\CartController@index')->name('cart.index');
    Route::post('cart','Frontend\CartController@store')->name('cart.store');
    Route::get('cart/empty','Frontend\CartController@empty')->name('cart.empty');
    Route::delete('cart/{id}/destroy','Frontend\CartController@destroy')->name('cart.destroy');
    Route::post('cart/save/{id}','Frontend\CartController@save')->name('cart.save');
    Route::delete('cart/save/{id}/SaveDestroy','Frontend\CartController@SaveDestroy')->name('cart.SaveDestroy');
    Route::get('cart/SaveEmpty','Frontend\CartController@SaveEmpty')->name('cart.SaveEmpty');
    Route::patch('/cart/{id}','Frontend\CartController@update')->name('cart.update');

        // ------------- CheckOut Cart Pay -------------\\
    Route::get('/checkout','Frontend\CheckoutController@index')->name('checkout.index');
    Route::post('/checkout','Frontend\CheckoutController@store')->name('checkout.store');

});



// --------------- Coupon Routers ---------------
Route::post('/coupon', 'Frontend\CouponController@store')->name('couponCode.store');
Route::delete('/coupon', 'Frontend\CouponController@destroy')->name('couponCode.destroy');

/*
|--------------------------------------------------------------------------
| Multi Language
|--------------------------------------------------------------------------
*/
Route::get('lang/fa','Frontend\HomeController@fa')->name('lang.fa');
Route::get('lang/en','Frontend\HomeController@en')->name('lang.en');



/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::post('register-user','Frontend\RegisterController@register')->name('user.register');


/*
|--------------------------------------------------------------------------
| Backend Site
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware(['check_admin','auth'])->group(function () {
    Route::get('/','Backend\DashboardController@index')->name('dashboard.index');
    Route::resource('/category', 'Backend\CategoryController');
    Route::resource('/brand', 'Backend\BrandController');
    Route::resource('/product', 'Backend\ProductController');
    Route::post('logout', 'Backend\DashboardController@logout')->name('logout');
    Route::resource('/slider', 'Backend\SlideController');
    Route::resource('/social', 'Backend\SocialController')->except(['show']);
    Route::get('settings', 'Backend\SettingsController@index')->name('setting.index');
    Route::post('setting/update/{id}', 'Backend\SettingsController@update')->name('settings.update');
    Route::resource('features', 'Backend\FeatureController');
    Route::get('product/feature/{id}', 'Backend\ProductController@feature')->name('product.feature');
    Route::post('product/feature/saveFeature', 'Backend\ProductController@saveFeature')->name('product.saveFeature');
    Route::resource('coupon', 'Backend\CouponController')->except(['show','edit','update']);
});
