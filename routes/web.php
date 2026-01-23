<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\TermsOfServiceController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\RefundController;
use App\Http\Controllers\ShippingPolicyController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;


// User Routes
Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ar'])) {
        session()->put('locale', $locale);
    }
    return redirect()->back();
})->name('lang.switch');
// Home
Route::get('/', [HomeController::class, 'index'])->name('home');
// Products
Route::get('/products', [ProductsController::class, 'index'])->name('products');
Route::get('/products/{id}', [ProductsController::class, 'show'])->name('products.show');
// About
Route::get('/about', [AboutController::class, 'index'])->name('about');
// Terms of Service
Route::get('/terms-of-service', [TermsOfServiceController::class, 'index'])->name('terms-of-service');
// Privacy Policy
Route::get('/privacy-policy', [PrivacyPolicyController::class, 'index'])->name('privacy-policy');
// Refund Policy
Route::get('/refund-policy', [RefundController::class, 'index'])->name('refund-policy');
// Shipping Policy
Route::get('/shipping-policy', [ShippingPolicyController::class, 'index'])->name('shipping-policy');
// Wishlist Routes
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
Route::post('/wishlist', [WishlistController::class, 'store'])->name('wishlist.store');
Route::delete('/wishlist/{id}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');
Route::get('/wishlist/count', [WishlistController::class, 'count'])->name('wishlist.count');
// Product Review Routes
Route::post('/products/{product}/reviews', [App\Http\Controllers\ProductReviewController::class, 'store'])->name('products.reviews.store');
// Auth Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    // Products Routes
    Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
    Route::delete('products/gallery/{image}', [App\Http\Controllers\Admin\ProductController::class, 'deleteGalleryImage'])->name('products.gallery.destroy');
    // Categories Routes
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
    // Users Routes
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
    // Contacts Routes
    // Route::get('contacts', [App\Http\Controllers\Admin\ContactController::class, 'index'])->name('contacts.index');
    // Route::patch('contacts/{contact}/status', [App\Http\Controllers\Admin\ContactController::class, 'updateStatus'])->name('contacts.update-status');
    // Route::delete('contacts/{contact}', [App\Http\Controllers\Admin\ContactController::class, 'destroy'])->name('contacts.destroy');

    // Landing Image Management
    Route::get('landing-image', [App\Http\Controllers\Admin\LandingImageController::class, 'index'])->name('landing-image.index');
    Route::post('landing-image', [App\Http\Controllers\Admin\LandingImageController::class, 'update'])->name('landing-image.update');
    // Project Video Management
    Route::get('project-video', [App\Http\Controllers\Admin\ProjectVideoController::class, 'index'])->name('project-video.index');
    Route::post('project-video', [App\Http\Controllers\Admin\ProjectVideoController::class, 'update'])->name('project-video.update');
    // Reviews Management
    Route::resource('reviews', App\Http\Controllers\Admin\ReviewController::class);
    // Product Reviews Management
    Route::get('product-reviews', [App\Http\Controllers\Admin\ProductReviewController::class, 'index'])->name('product-reviews.index');
    Route::delete('product-reviews/{review}', [App\Http\Controllers\Admin\ProductReviewController::class, 'destroy'])->name('product-reviews.destroy');
});
// Route for sitemap.xml
Route::get('/sitemap.xml', function () {
    $products = \App\Models\Product::all();
    $categories = \App\Models\Category::all();

    return response()->view('sitemap', [
        'products' => $products,
        'categories' => $categories,
    ])->header('Content-Type', 'text/xml');
});

// Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');



require __DIR__ . '/auth.php';
