<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PucketController;
use App\Http\Controllers\Admin\PucketServiceController;
use App\Http\Controllers\publicsite\SettingsiteController as PublicsiteSettingsiteController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Models\Cases;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;


use Laravel\Fortify\Features;
use Laravel\Fortify\Http\Controllers\ConfirmablePasswordController;
use Laravel\Fortify\Http\Controllers\ConfirmedPasswordStatusController;
use Laravel\Fortify\Http\Controllers\ConfirmedTwoFactorAuthenticationController;
use Laravel\Fortify\Http\Controllers\EmailVerificationNotificationController;
use Laravel\Fortify\Http\Controllers\EmailVerificationPromptController;
use Laravel\Fortify\Http\Controllers\NewPasswordController;
use Laravel\Fortify\Http\Controllers\PasswordController;
use Laravel\Fortify\Http\Controllers\PasswordResetLinkController;
use Laravel\Fortify\Http\Controllers\ProfileInformationController;
use Laravel\Fortify\Http\Controllers\RecoveryCodeController;
use Laravel\Fortify\Http\Controllers\TwoFactorAuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\TwoFactorAuthenticationController;
use Laravel\Fortify\Http\Controllers\TwoFactorQrCodeController;
use Laravel\Fortify\Http\Controllers\TwoFactorSecretKeyController;
use Laravel\Fortify\Http\Controllers\VerifyEmailController;
use Laravel\Fortify\RoutePath;



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

// require __DIR__ . '/auth.php';

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {

        // Route::get('/main',function(){
        //     return view('frontend.main');
        // });
        Route::resource('/', PublicsiteSettingsiteController::class);
//         Route::get('register', [RegisteredUserController::class, 'create'])
//         ->name('register');

// Route::post('register', [RegisteredUserController::class, 'store']);

//         Route::get('login', [AuthenticatedSessionController::class, 'create'])
//         ->name('login');

// Route::post('login', [AuthenticatedSessionController::class, 'store']);

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

        Route::resource('/puckets', PucketController::class);
        Route::get('/api-puckets', [PucketController::class, 'puckets_api'])->name('puckets.api');
        Route::resource('/pucketServices', PucketServiceController::class);
        Route::get('/api-pucketServices', [PucketServiceController::class, 'pucketServices_api'])->name('pucketServices.api');




        // Route::get('/api-cases', [SettingController::class, 'cases_api'])->name('cases.api');

    });

});
// require __DIR__ . '\fortify.php';
