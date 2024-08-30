<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\MusicController;
use App\Http\Controllers\Frontend\ArtistController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Console\Events\ArtisanStarting;
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
Route::get('/', [UserController::class, 'Index'])->name('index');
Route::get('/artist/details/{id}', [ArtistController::class, 'ArtistDetails'])->name('artist.details');
Route::get('/all/albums', [ArtistController::class, 'AllAlbums'])->name('all.albums');
Route::get('/contact/us', [ArtistController::class, 'Contact'])->name('contact');
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/change/password', [AdminController::class, 'AdminPasswordUpdate'])->name('admin.password.update');

    // Admin Music
    Route::controller(MusicController::class)->group(function () {
        Route::get('/admin/all/music', 'AdminAllMusic')->name('all.music');
        Route::get('/admin/add/music', 'AdminAddMusic')->name('add.music');
        Route::post('/admin/store/music', 'AdminStoreMusic')->name('store.music');
        Route::get('/admin/edit/music/{id}', 'AdminEditMusic')->name('edit.music');
        Route::post('/admin/update/music', 'AdminUpdateMusic')->name('update.music');
        Route::get('/admin/delete/music/{id}', 'AdminDeleteMusic')->name('delete.music');
    });
});

require __DIR__.'/auth.php';
