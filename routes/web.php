<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminUserProfileController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\ProductController as ProductResource;

use App\Http\Controllers\user\UserController;
use App\Http\Controllers\user\WishlistController;

use App\Http\Controllers\front\FrontController;
use App\Http\Controllers\productController as ControllersProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;



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
Route::get('/searchProduct', [FrontCopntroller::class, 'search'])->name('front.search');
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





// admin pages route here
Route::group(['prefix' => '/admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/contact', [AdminController::class, 'contact'])->name('admin.contact');
    Route::post('/markasread', [AdminController::class, 'markasread'])->name('admin.markasread');
    Route::resource('categories', CategoryController::class);
    Route::resource('subcategories', SubCategoryController::class);
    Route::get('/get_subcategories', [SubCategoryController::class, 'get_subcategories'])->name('get_subcategories');
    Route::resource('admin_products', ProductResource::class);
    Route::resource('adminUsers', AdminController::class);
    Route::resource('blog', BlogController::class);
    Route::get('/reviews', [ProductResource::class, 'product_reviews'])->name('product.reviews');
    Route::get('UserUpdate',[AdminUserProfileController::class,'showpage'])->name('showpage');
    Route::post('UserUpdate',[AdminUserProfileController::class,'userupdate'])->name('userupdate');
    Route::post('changePassword',[AdminUserProfileController::class,'passwordUpdate'])->name('passwordUpdate');
});





// user pages route here
Route::group(['prefix' => '/user', 'middleware' => ['auth', 'user']], function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');

    Route::post('/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('/historypage', [UserController::class, 'historypage'])->name('historypage');
    Route::get('/historyDetails/{id}', [UserController::class, 'historyDetails'])->name('history.details');
    Route::get('/wishlistpage', [UserController::class, 'wishlistpage'])->name('wishlistpage');
    Route::get('/addToWishlist/{id}', [UserController::class, 'addToWishlist'])->name('wishlist.addToWishlist');
    Route::get('/wishlistRemove/{id}', [UserController::class, 'wishlistRemove'])->name('wishlist.remove');
    Route::get('/wishlistAddToCart/{id}', [UserController::class, 'wishlistAddToCart'])->name('wishlist.addToCart');
    Route::get('/cardpage', [UserController::class, 'cardpage'])->name('cardpage');
    Route::get('/trackorderpage', [UserController::class, 'trackorderpage'])->name('trackorderpage');
    Route::get('/invoicepage', [UserController::class, 'invoicepage'])->name('invoicepage');

    Route::post('/changePassword', [UserController::class, 'userPassword'])->name('userPassword');
    Route::get('/addToCart', [UserController::class, 'addToCart'])->name('user.addToCart');
    Route::get('/removeFromCart', [UserController::class, 'removeFromCart'])->name('user.removeFromCart');
    Route::post('/updateAddress', [UserController::class, 'updateAddress'])->name('updateAddress');


//     Route::resource('user.addresses', 'UserAddressController');
//     Route::resource('products.reviews', 'ProductReviewController');
//     Route::resource('cart.items', 'CartItemsController');
//     Route::resource('wishlist', 'WishlistController');
});
