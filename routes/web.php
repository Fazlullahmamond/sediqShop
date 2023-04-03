<?php

use App\Http\Controllers\back\AdminController;
use App\Http\Controllers\front\FrontController;
use App\Http\Controllers\user\UserController;
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
});





Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/contact-us', [FrontController::class, 'contact_us'])->name('contact.create');
Route::post('/contact-us', [FrontController::class, 'storeContactForm'])->name('contact.store');






// admin pages route here
Route::group(['prefix' => '/admin', 'middleware' => ['auth', 'admin']], function () {
    Route::resource('categories', 'CategoryController');
    Route::resource('subcategories', 'SubCategoryController');
    Route::resource('products', 'ProductController');
    Route::resource('blogs', 'BlogController');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});





// user pages route here
Route::group(['prefix' => '/user', 'middleware' => ['auth', 'user']], function () {
    Route::resource('user.addresses', 'UserAddressController');
    Route::resource('products.reviews', 'ProductReviewController');
    Route::resource('cart.items', 'CartItemsController');
    Route::resource('wishlist', 'WishlistController');
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    // Subscribe to newsletter
    Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
    // Unsubscribe from newsletter
    Route::post('/newsletter/unsubscribe', [NewsletterController::class, 'unsubscribe'])->name('newsletter.unsubscribe');
});


