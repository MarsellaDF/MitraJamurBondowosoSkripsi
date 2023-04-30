<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FirstClickController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Frontend\DashboardController as FrontendDashboardController;
use App\Http\Controllers\Frontend\GalleryController as FrontendGalleryController;
use App\Http\Controllers\Frontend\KontakController as FrontendKontakController;
use App\Http\Controllers\Frontend\ProdukController as FrontendProdukController;
use App\Http\Controllers\Frontend\TentangController as FrontendTentangController;

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

    Route::post('first-click', [FirstClickController::class, 'save'])->name('test.post');

    Route::get('/', [FrontendDashboardController::class,'index'])->name('dashboard');

    Route::post('/', [FrontendDashboardController::class, 'store'])->name('feedback-front');

    Route::get('/produk', [FrontendProdukController::class,'index'])->name('produk');

    Route::get('/produk/detail-produk/{slug}', [FrontendProdukController::class,'detail'])->name('detail-produk');

    Route::get('/gallery', [FrontendGalleryController::class,'index'])->name('gallery');

    Route::get('/tentang', [FrontendTentangController::class,'index'])->name('tentang');

    Route::get('/kontak', [FrontendKontakController::class,'index'])->name('kontak');

Route::middleware('visitor')->group(function() {
    Route::post('first-click', [FirstClickController::class, 'save'])->name('test.post');

    Route::get('/', [FrontendDashboardController::class,'index'])->name('dashboard');

    Route::post('/', [FrontendDashboardController::class, 'store'])->name('feedback-front');

    Route::get('/produk', [FrontendProdukController::class,'index'])->name('produk');

    Route::get('/produk/detail-produk/{slug}', [FrontendProdukController::class,'detail'])->name('detail-produk');

    Route::get('/gallery', [FrontendGalleryController::class,'index'])->name('gallery');

    Route::get('/tentang', [FrontendTentangController::class,'index'])->name('tentang');

    Route::get('/kontak', [FrontendKontakController::class,'index'])->name('kontak');
});




Route::middleware(['auth'])->group(function () {
    Route::prefix('administrator')->group(function () {
        Route::get('/',[HomeController::class,'index'])->name('home');

        Route::resource('/profile',UserController::class);

        Route::resource('/produk',ProdukController::class);

        Route::resource('/gallery',GalleryController::class);

        Route::resource('/dashboard',DashboardController::class);

        Route::resource('/feedback',FeedbackController::class);

    });
});



// Route::resource('riwayat','RiwayatController');

// Route::resource('admin', 'UsersController')
//     ->middleware('auth');
// Route::group(['middleware' => 'auth'], function () {

// });

require __DIR__.'/auth.php';
