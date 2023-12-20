<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\publicsite\SettingsiteController as PublicsiteSettingsiteController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Models\Cases;

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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//require __DIR__ . '/auth.php';

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {

        // Route::get('/main',function(){
        //     return view('frontend.main');
        // });
        Route::resource('/main', PublicsiteSettingsiteController::class);

    Route::middleware(['auth:admin'])->prefix('admin')->as('admin.')->group(function () {

        Route::get('/', [AdminController::class, 'index'])->name('dashboard');
        Route::resource('/users', UserController::class);
        Route::get('/api-users', [UserController::class, 'users_api'])->name('users.api');
        Route::get('/profile', [UserController::class, 'edit_profile'])->name('users.profile.edit');
        Route::post('/profile', [UserController::class, 'update_profile'])->name('users.profile.update');
        Route::get('/profile-security', [UserController::class, 'edit_security'])->name('users.profile.edit-password');
        Route::post('/profile-security', [UserController::class, 'update_security'])->name('users.profile.update-password');

        Route::get('/social', [SettingController::class, 'social_index'])->name('social.index');
        Route::post('/social/store', [SettingController::class, 'social_store'])->name('social.store');
        Route::resource('/settings', SettingController::class);
        Route::resource('/services', ServiceController::class);
        Route::get('/api-services', [ServiceController::class, 'services_api'])->name('services.api');


        // Route::get('/api-cases', [SettingController::class, 'cases_api'])->name('cases.api');

    });

});
