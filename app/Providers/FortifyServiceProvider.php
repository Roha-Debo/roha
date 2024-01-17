<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Contracts\LogoutResponse;
use Laravel\Fortify\Fortify;
use App\Models\Setting;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Route;




class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // $this->configureRoutes();
        $request = request();
        if ($request->is('admin') || $request->is('admin/*')) {
            Config::set('fortify.guard', 'admin');
            Config::set('fortify.prefix', 'admin');
        }

        $this->app->instance(LoginResponse::class, new class implements LoginResponse {
            public function toResponse($request)
            {
                if ($request->user('admin')) {
                    return redirect()->intended('/admin');
                }else {
                    return redirect()->intended('/dashboard');
                }
            }
        });

        $this->app->instance(LogoutResponse::class, new class implements LogoutResponse {
            public function toResponse($request)
            {

                if ($request->is('admin') || $request->is('admin/*')) {
                    return redirect('/admin/login');
                } else {
                    $settings = Setting::with('media')->first();
                    $settings['section1_title'] = optional($settings)->section1_title;
                    $settings['section1_description'] = optional($settings)->section1_description;
                    $settings['title_text'] = optional($settings)->title_text;
                    $settings['mete_description'] = optional($settings)->mete_description;
                    $settings['mete_keywords'] =optional($settings)->mete_keywords;
                    return view('auth.login',compact('settings'));

                   // return redirect('/login');
                }

            }
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::ignoreRoutes();
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        $request = request();
        if ($request->is('admin') || $request->is('admin/*')) {
            Fortify::loginView(function () {
                return view('backend.auth.login');
            });
        }else{
            Fortify::loginView(function () {
                $settings = Setting::with('media')->first();
                $settings['section1_title'] = optional($settings)->section1_title;
                $settings['section1_description'] = optional($settings)->section1_description;
                $settings['title_text'] = optional($settings)->title_text;
                $settings['mete_description'] = optional($settings)->mete_description;
                $settings['mete_keywords'] =optional($settings)->mete_keywords;
                return view('auth.login',compact('settings'));
                //return view('auth.login');
            });
        }
    }
}
