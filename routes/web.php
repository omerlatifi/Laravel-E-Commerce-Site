<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;


route::get('/', [HomeController::class, 'home']);



route::get('/dashboard', [HomeController::class, 'login_home'])->
middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

route::get('admin/dashboard', [HomeController::class, 'index'])->
middleware(['auth','admin']);
//category_admin
route::get('view_category', [AdminController::class, 'view_category'])->
middleware(['auth','admin']);
route::post('add_category', [AdminController::class, 'add_category'])->
middleware(['auth','admin']);
route::get('destroy/{id}', [AdminController::class, 'destroy'])->
middleware(['auth','admin']);
route::get('edit_category/{id}', [AdminController::class, 'edit_category'])->
middleware(['auth','admin']);
route::post('update_category/{id}', [AdminController::class, 'update_category'])->
middleware(['auth','admin']);

//product_admin
route::get('add_product', [AdminController::class, 'add_product'])->
middleware(['auth','admin']);
route::post('store_product', [AdminController::class, 'store_product'])->
middleware(['auth','admin']);
route::get('view_product', [AdminController::class, 'view_product'])->
middleware(['auth','admin']);
route::get('destroy_product/{id}', [AdminController::class, 'destroy_product'])->
middleware(['auth','admin']);
route::get('edit_product/{id}', [AdminController::class, 'edit_product'])->
middleware(['auth','admin']);
route::post('update_product/{id}', [AdminController::class, 'update_product'])->
middleware(['auth','admin']);
route::get('product_search', [AdminController::class, 'product_search'])->
middleware(['auth','admin']);

//order_admin
route::get('view_order', [AdminController::class, 'view_order'])->
middleware(['auth','admin']);
route::get('on_the_way/{id}', [AdminController::class, 'on_the_way'])->
middleware(['auth','admin']);
route::get('delivered/{id}', [AdminController::class, 'delivered'])->
middleware(['auth','admin']);
route::get('print/{id}', [AdminController::class, 'print'])->
middleware(['auth','admin']);


//Banner_admin
route::get('banner', [AdminController::class, 'banner'])->
middleware(['auth','admin']);
route::post('store_banner', [AdminController::class, 'store_banner'])->
middleware(['auth','admin']);
route::get('destroy_banner/{id}', [AdminController::class, 'destroy_banner'])->
middleware(['auth','admin']);












route::get('details_product/{id}', [HomeController::class, 'details_product']);

route::get('cart_product/{id}', [HomeController::class, 'cart_product'])->
middleware(['auth', 'verified']);
route::get('my_cart', [HomeController::class, 'my_cart'])->
middleware(['auth', 'verified']);
route::get('destroy_cart/{id}', [HomeController::class, 'destroy_cart'])->
middleware(['auth', 'verified']);
route::get('place_order', [HomeController::class, 'place_order'])->
middleware(['auth', 'verified']);

Route::get('my_order', [HomeController::class, 'my_order'])
->middleware(['auth', 'verified']);
route::get('destroy_order/{id}', [HomeController::class, 'destroy_order'])->
middleware(['auth', 'verified']);
route::get('first_step_order', [HomeController::class, 'first_step_order'])->
middleware(['auth', 'verified']);

//stripe
Route::controller(HomeController::class)->group(function(){

    Route::get('stripe/{value}', 'stripe');

    Route::post('stripe/{value}', 'stripePost')->name('stripe.post');

});
//search product by user
route::get('search', [HomeController::class, 'search']);

route::get('shop', [HomeController::class, 'shop']);
route::get('help', [HomeController::class, 'help']);


route::post('confirm_order', [AdminController::class, 'confirm_order']);

