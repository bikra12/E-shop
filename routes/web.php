<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\SubAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ForgotPasswordController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// Route::get('/h', function () {

//     // echo messege('string pass');
//     // return view('welcome');
//     // echo custom::uppercase('hello custom');
// });

Route::get('/', function () {
    return redirect('/home');
});
Route::get('/home', [HomeController::class, 'index']);
Route::get('/search', [HomeController::class, 'search'])->name('search');

// Route::get('view-subcategory/{slug}', [HomeController::class, 'viewsubcategory']);
Route::get('/subcategoryview/{slug}', [HomeController::class, 'viewsubcategory'])->name('viewsubcategory');
Route::get('/productview/{slug}', [HomeController::class, 'viewproduct'])->name('viewproduct');
Route::get('/Categories', [HomeController::class, 'getCategoriesWithSubcategories']);

Route::get('/about', [HomeController::class, 'about']);
Route::get('/contactUs', [ContactController::class, 'contactUs']);
Route::post('/send-messege', [ContactController::class, 'sendEmail'])->name('contact.send');
// Route::get('/call-a', [ContactController::class, 'a']);
// Route::get('/call-b', [ContactController::class, 'b']);
// // For static methods
// Route::get('/call-c',[ ContactController::class,'c']
// );


Route::post('/cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/buy/add/{productId}', [CartController::class, 'addTobuy'])->name('cart.buy');

Route::get('/cart/view', [CartController::class, 'viewCart'])->name('cart.view');
Route::get('/cart/remove/{itemId}', [CartController::class, 'removeFromCart'])->name('cart.remove');


Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/placeOrder', [CheckoutController::class, 'placeOrder'])->name('place-order');
Route::get('/order/confirmation', [CheckoutController::class, 'views'])->name('order.confirmation');

Route::get('/register', [AuthController::class, 'loadRegister'])->name('load.register');
Route::post('/register', [AuthController::class, 'register'])->name('register');


Route::get('/login', [AuthController::class, 'loadLogin'])->name('login');
Route::post('/loginpost', [AuthController::class, 'login'])->name('loginpost');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/forgot/pass', [ForgotPasswordController::class, 'Form'])->name('main.password');
Route::post('/forgot-post/main', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('main.password.forgotpost');
Route::get('/password/reset/main/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('main.password.reset');
Route::post('/password/reset/main', [ForgotPasswordController::class, 'resetPassword'])->name('main.password.update');

// ...



// ********** Super Admin Routes *********
Route::group(['prefix' => 'super-admin', 'middleware' => ['web', 'isSuperAdmin']], function () {
    Route::get('/dashboard', [SuperAdminController::class, 'dashboard']);

    Route::get('/users', [SuperAdminController::class, 'users'])->name('superAdminUsers');
    Route::get('/manage-role', [SuperAdminController::class, 'manageRole'])->name('manageRole');
    Route::post('/update-role', [SuperAdminController::class, 'updateRole'])->name('updateRole');
});

// ********** Sub Admin Routes *********
Route::group(['prefix' => 'sub-admin', 'middleware' => ['web', 'isSubAdmin']], function () {
    Route::get('/dashboard', [SubAdminController::class, 'dashboard']);
});

// ********** Admin Routes *********
Route::group(['prefix' => 'admin', 'middleware' => ['web', 'isAdmin']], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/category/add', [AdminController::class, 'create'])->name('category.create');
    Route::post('/category', [AdminController::class, 'store'])->name('category.store');
    Route::get('/categoryview', [AdminController::class, 'categoryview'])->name('category.view');
    Route::get('category/edit/{id}', [AdminController::class, 'categoryedit'])->name('category.edit');
    Route::post('/category/update/{id}', [AdminController::class, 'categoryupdate'])->name('category.update');
    // Route::get('/category/delete/{id}',[AdminController::class,'categorydestroy'])->name('category.destroy');

    Route::get('/subcategory/add', [AdminController::class, 'subcategorycreate'])->name('subcategory.create');
    Route::post('/subcategory', [AdminController::class, 'subcategorystore'])->name('subcategory.store');
    Route::get('/subcategoryview', [AdminController::class, 'subcategoryview'])->name('subcategory.view');
    Route::get('subcategory/edit/{id}', [AdminController::class, 'subcategoryedit'])->name('subcategory.edit');
    Route::post('/subcategory/update/{id}', [AdminController::class, 'subcategoryupdate'])->name('subcategory.update');


    Route::get('/product/add', [AdminController::class, 'productcreate'])->name('product.create');
    Route::post('/product', [AdminController::class, 'productstore'])->name('product.store');
    Route::get('/product/view', [AdminController::class, 'productview'])->name('product.view');
    Route::get('product/edit/{id}', [AdminController::class, 'productedit'])->name('edit');
    Route::post('/product/update/{id}', [AdminController::class, 'update'])->name('update');
    Route::get('/product/delete/{id}', [AdminController::class, 'destroy'])->name('destroy');


    Route::get('/stock/create', [AdminController::class, 'stockcreate'])->name('stock.create');
    Route::post('/stock/store', [AdminController::class, 'stockstore'])->name('stock.store');
    Route::get('/stock', [AdminController::class, 'stockview'])->name('stock.view');
    Route::post('/products/{product}/decrease-stock', [AdminController::class, 'decreaseStock'])->name('products.decreaseStock');
});

// ********** User Routes *********
Route::group(['prefix' => 'user', 'middleware' => ['web', 'isUser']], function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/password', [UserController::class, 'change'])->name('password');
    Route::post('/password/change', [UserController::class, 'changePassword'])->name('password.change');
    // Route::post('/profile-user', [UserController::class, 'profile'])->name('profile.user');  
    Route::get('/order-user', [UserController::class, 'orders'])->name('order.user');

    Route::get('/editprofile/{id}', [UserController::class, 'editprofile'])->name('profile.edit');
    Route::post('/updateprofile/{id}', [UserController::class, 'updateprofile'])->name('profile.update');


    // Route::get('/forgot-password', [UserController::class, 'forgotPassword'])->name('password.forgot');
    // Route::post('/forgot-post', [UserController::class, 'forgotPasswordpost'])->name('password.forgotpost');
    // Route::get('/password/reset/{token}', [UserController::class, 'showResetForm'])->name('password.reset');
    // Route::post('/password/reset', [UserController::class, 'resetPassword'])->name('password.update');
});
