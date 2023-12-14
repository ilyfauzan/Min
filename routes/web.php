<?php

use GuzzleHttp\Middleware;
use App\Models\Store\Store;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\Settings\RoleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Seller\ProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Settings\PermissionController;
use App\Http\Controllers\Admin\UserController as adminuser;
use App\Http\Controllers\Settings\UserController as UserSettings;
use App\Http\Controllers\Admin\StoreController as AdminStoreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Settings\BannerController as SettingsBannerController;
use App\Http\Controllers\Settings\CategoryController as SettingsCategoryController;
use App\Http\Controllers\Settings\SettingController;

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

Route::get('/store/list-product', function () {
    // 
});
Route::get('/', HomeController::class)->name('home');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/toko', function () {
    $stores = Store::latest()->fastPaginate(10);
    return view('store.list', compact('stores'));
})->name('store.list');

Route::get('store/list-order', [StoreController::class, 'order'])->name('store.list-order');
Route::resource('user', UserController::class)->middleware('auth');
Route::resource('purchase', PurchaseController::class)->middleware('auth');
Route::post('{purchase}/checkout', [PurchaseController::class, 'checkout'])->name('purchase.checkout')->middleware('auth');
Route::resource('cart', CartController::class)->middleware('auth');
Route::post('produk/add-to-cart', [ProdukController::class, 'addtocart'])->name('produk.addtocart')->middleware('auth');
Route::post('produk/update-to-cart', [CartController::class, 'updatecart'])->name('cart.updatecart')->middleware('auth');
Route::get('produk/delete-to-cart', [CartController::class, 'destroyall'])->name('cart.destroyall')->middleware('auth');
Route::get('store/list-product', [StoreController::class, 'product'])->name('store.product');
Route::resource('produk', ProdukController::class);


require __DIR__ . '/auth.php';

Route::resource('adminuser', adminuser::class)->middleware('auth');
// Route::resource('category', CategoryController::class)->middleware('auth');
// Route::get('/list-store', [AdminStoreController::class, 'index'])->name('store.list')->middleware('auth');

Route::group(['middleware' => ['auth']], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('dashboard/admin', [DashboardController::class, 'admin'])->name('dashboard.admin');
    Route::get('dashboard/penjual', [DashboardController::class, 'penjual'])->name('dashboard.penjual');
    Route::get('dashboard/pembeli', [DashboardController::class, 'pembeli'])->name('dashboard.pembeli');
    Route::resource('permissions', PermissionController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserSettings::class);
    Route::resource('banners', SettingsBannerController::class);
    Route::resource('categories', SettingsCategoryController::class);
    Route::resource('store', StoreController::class, ['except' => 'show']);
    Route::resource('products', ProductController::class);
    Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::post('/adjusment-quantity-produk', [CartController::class, 'adjustment_quantity_cart'])->name('adjustment_quantity');
    Route::post('/delete_photo/{id}', [ProductController::class, 'delete_photo'])->name('delete_photo');
    Route::resource('orders', OrderController::class);
    Route::get('/show-order/{order}', [OrderController::class, 'show_order'])->name('order.show_order');
    Route::get('/order-pembeli', [OrderController::class, 'orderPembeli'])->name('order.pembeli');
    Route::get('/settings', SettingController::class)->name('settings');
    Route::resource('profile', ProfileController::class);
    Route::post('/active-store/{store}', [StoreController::class, 'active'])->name('store.active');
});
Route::resource('store', StoreController::class, ['only' => 'show']);
