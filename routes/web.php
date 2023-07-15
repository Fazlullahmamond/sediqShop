<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\UserController as AdminUsersController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\front\FrontController;
use App\Http\Controllers\productController as ControllersProductController;
use App\Http\Controllers\user\WishlistController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('front.index');
// })->name('front.index');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::get('/redirectTo', function () {
    if (Auth::check()) {
        $role = Auth::user()->role;
        if ($role == 1) {
            return Redirect::route('admin.dashboard');
        } elseif ($role == 0) {
            return Redirect::route('user.dashboard');
        } else {
            Auth::logout();
            return redirect('/login');
        }
    } else {
        return redirect(route('login'));
    }
})->name('redirectTo');




// front pages
Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/searchProduct', [FrontController::class, 'search'])->name('front.search');
Route::get('/searchBlog', [FrontController::class, 'searchBlog'])->name('front.searchBlog');

Route::get('/privacy', [FrontController::class, 'privacy'])->name('front.privacy');
Route::get('/terms-condition', [FrontController::class, 'termsCondition'])->name('front.termsCondition');
Route::get('/customer-services', [FrontController::class, 'customerService'])->name('front.customer');
Route::get('/discount-return', [FrontController::class, 'discountReturn'])->name('front.discountReturn');


Route::get('/products', [FrontController::class, 'products'])->name('front.products');
Route::get('/feature-products', [FrontController::class, 'featureProducts'])->name('front.featureProducts');
Route::get('/hot-offers', [FrontController::class, 'hotOffers'])->name('front.hotOffers');
Route::get('/product/{id}', [FrontController::class, 'productDetails'])->name('product.details');
Route::get('/category/{id}', [FrontController::class, 'categoryProducts'])->name('category.products');
Route::get('/blog', [FrontController::class, 'blog'])->name('front.blog');
Route::get('/blog/{id}', [FrontController::class, 'blogDetails'])->name('blog.details');
Route::get('/wishlist', [WishlistController::class, 'index'])->name('front.wishlist');
Route::get('/about-us', [FrontController::class, 'aboutUs'])->name('front.aboutUs');
Route::get('/contact-us', [FrontController::class, 'contactUs'])->name('front.contactUs');
Route::get('/faq', [FrontController::class, 'faq'])->name('front.faq');


Route::get('/category/details/{id}', [ProductController::class, 'categoryDetails'])->name('category.details');
Route::POST('/message-storing', [FrontController::class, 'contactUsStore'])->name('front.contactUsStore');
Route::post('/newsletter/subscribe', [FrontController::class, 'subscribe'])->name('newsletter.subscribe');



//stripe
Route::get('/checkout', [ControllersProductController::class, 'checkout'])->name('checkout');
Route::get('/success', [ControllersProductController::class, 'success'])->name('checkout.success');
Route::get('/cancel', [ControllersProductController::class, 'cancel'])->name('checkout.cancel');
Route::post('/webhook', [ControllersProductController::class, 'webhook'])->name('checkout.webhook');








// Route::get('/contact-us', [FrontController::class, 'contact_us'])->name('contact.create');
// Route::post('/contact-us', [FrontController::class, 'storeContactForm'])->name('contact.store');






// admin pages route here
Route::group(['prefix' => '/admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/contact', [AdminController::class, 'contact'])->name('admin.contact');
    Route::resource('categories', CategoryController::class);
    Route::resource('subcategories', SubCategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('adminUsers', AdminUsersController::class);
    Route::resource('blog', BlogController::class);
    Route::get('/reviews', [ProductController::class, 'product_reviews'])->name('product.reviews');

});





// user pages route here
Route::group(['prefix' => '/user', 'middleware' => ['auth', 'user']], function () {
    Route::get('/dashboard', [AdminUsersController::class, 'dashboard'])->name('user.dashboard');
//     Route::resource('user.addresses', 'UserAddressController');
//     Route::resource('products.reviews', 'ProductReviewController');
//     Route::resource('cart.items', 'CartItemsController');
//     Route::resource('wishlist', 'WishlistController');
});
