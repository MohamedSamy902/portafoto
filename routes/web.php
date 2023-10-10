<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\GovernorateController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\Site\paymentController;
use App\Http\Controllers\Site\ProductCartController;
use App\Http\Controllers\Site\ProductFavoriteController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SliderController;
use App\Models\Category;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {


        Auth::routes();

        Route::group(
            [
                'prefix' => 'dashboard',
                'middleware' => ['auth'],
            ],

            function () {
                /** Start Route Users **/
                Route::resource('users', UserController::class);
                Route::get('/', function () {
                    return view('dashbord.home');
                })->name('index');
                /** End Route Users **/


                /** Start Route Roles **/
                Route::resource('roles', RoleController::class)->except(['show']);
                /** End Route Roles **/

                /** Start Route Roles **/
                Route::resource('categories', CategoryController::class)->except(['show']);
                /** End Route Roles **/

                /** Start Route Roles **/
                Route::resource('invoices', InvoiceController::class);

                Route::get('approved/invoice/{id}', [InvoiceController::class, 'approvedChengStatus'])->name('invoice.approved');
                Route::get('refusal/invoice/{id}',  [InvoiceController::class, 'refusal'])->name('invoice.refusal');
                Route::get('invoice/pending',       [InvoiceController::class, 'pendingList'])->name('invoice.pendingList');
                Route::get('invoice/approved',      [InvoiceController::class, 'approvedList'])->name('invoice.approvedList');
                /** End Route Roles **/


                /** Start Route Customers **/
                Route::resource('customers', CustomerController::class)->except(['show']);
                /** End Route Customers **/

                /** Start Route Category **/
                Route::resource('category', CategoryController::class)->except(['show']);
                /** End Route Category **/

                /** Start Route Cities **/
                Route::controller(CityController::class)->group(function () {
                    Route::get('cities', 'index')->name('cities.index');
                    Route::get('city/cheng/status/{slug}', 'chengStatus')->name('city.chengStatus');
                    Route::get('/getCities/{governorateId}', 'getCities')->name('getCities');
                });

                /** End Route Cities **/

                /** Start Route Governorate **/
                Route::controller(GovernorateController::class)->group(function () {

                    Route::get('governorates', 'index')->name('governorates.index');
                    Route::get('governorates/cheng/status/{slug}', 'chengStatus')->name('governorates.chengStatus');
                    Route::get('governorates/edit/{id}', 'edit')->name('governorates.edit');
                    Route::post('governorates/update/{id}', 'update')->name('governorates.update');
                });

                /** End Route Governorate **/

                /** Start Route Products **/
                Route::resource('products', ProductController::class)->except(['show']);
                Route::delete('product/{productId}/images/{media}', [ProductController::class, 'deleteImage'])->name('products.images.delete');
                Route::controller(SizeController::class)->group(function () {
                    Route::post('product/size/update/{id}', 'update')->name('size.update');
                    Route::get('product/size/delete/{id}', 'delete')->name('size.delete');
                });
                /** End Route Products **/
            }

        );


        // Site Route List
        Route::group(['middleware' => 'customerId'], function () {
            Route::controller(SiteController::class)->group(function () {
                Route::get('/', 'index')->name('site');
                Route::get('/get-products-ajax', 'getProductsAjax');
                Route::get('/product/{slug}', 'showProduct')->name('showProduct');

            });

            Route::controller(ProductFavoriteController::class)->group(function () {
                Route::post('/favorites/add/{product}', 'addToFavorites')->name('favorites.add');
                Route::get('/favorites', 'showFavorites')->name('favorites.show');
                Route::post('/remove/product/favorite{id}', 'removeFromCookies')->name('remove.product');
            });

            Route::controller(ProductCartController::class)->group(function () {
                Route::post('/product/add/cart/{slug}', 'addToCart')->name('product.add.cart');
                Route::get('/product/remove/cart/{id}', 'removeToCart')->name('product.remove.cart');
            });

            Route::controller(paymentController::class)->group(function () {
                Route::post('payment/store', 'storePayment')->name('customers.payment.store');
                Route::get('payment', 'showPayment')->name('customers.payment.show');
                Route::get('getCities/{governorateId}', 'getCities')->name('customers.getCitiesInSite');
            });
        });
    }
);
