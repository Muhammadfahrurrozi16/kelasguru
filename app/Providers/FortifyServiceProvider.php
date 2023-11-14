<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Contracts\ProfileInformationUpdatedResponse;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Laravel\Fortify\Contracts\VerifyEmailResponse;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->instance(
            LoginResponse::class,
            new class implements LoginResponse{
                public function toResponse($request)
                {
                    if (Auth::user()->roles_id == 1) {
                        notify()->success('Welcome to Laravel Notify ⚡️');
                        return $request->wantsJson()
                            ? response()->json(['two_factor' => false])
                            : redirect()->intended(config('fortify.Dashboard'));
                    }elseif (Auth::user()->roles_id == 2) {
                        notify()->success('Welcome to Laravel Notify ⚡️');
                        return $request->wantsJson()
                            ? response()->json(['two_factor' => false])
                            : redirect()->intended(config('fortify.home'));
                    }else {
                        return redirect()->back();
                    }
                }
            }
        );
        $this->app->instance(
            VerifyEmailResponse::class,
            new class implements VerifyEmailResponse{
                public function toResponse($request)
                {
                    return redirect('/Login');
                }

            }
        );

        $this->app->instance(
            ProfileInformationUpdatedResponse::class,

            new class implements ProfileInformationUpdatedResponse{
                public function toResponse($request)
                {
                    // notify()->success('profile berhasil di update');
                    return redirect()->back();
                }
            }
        );
    }

    /**
     * Bootstrap any application services.
     */


    public function boot(): void
    {
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


        Fortify::loginView(function(){
            return view('auth.login');
        });
        Fortify::registerView(function(){
            return view('auth.signup');
        });
        Fortify::verifyEmailView(function(){
            return view('auth.verify');
        });
    }
}
