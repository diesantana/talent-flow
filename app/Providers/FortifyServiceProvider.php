<?php

namespace App\Providers;

use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Contracts\FailedPasswordResetLinkRequestResponse;
use Laravel\Fortify\Contracts\SuccessfulPasswordResetLinkRequestResponse;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class); // Alterar senha
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class); // recuperar senha


        // Definir o limite de tentativas de login (5 tentativas por minuto por IP e usuario)
        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())) . '|' . $request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        // Prefine a falha de segurança UserEnumeration
        // Quando o email NÃO existe
        $this->app->singleton(FailedPasswordResetLinkRequestResponse::class, function () {
            return new class implements FailedPasswordResetLinkRequestResponse {
                public function toResponse($request)
                {
                    return back()->with('status', __('passwords.sent'));
                }
            };
        });
        // Quando o email EXISTE (mantém a mesma mensagem)
        $this->app->singleton(SuccessfulPasswordResetLinkRequestResponse::class, function () {
            return new class implements SuccessfulPasswordResetLinkRequestResponse {
                // o Fortify passa $status no construtor, precisamos aceitar
                public function __construct(public $status = null) {}

                public function toResponse($request)
                {
                    return back()->with('status', __('passwords.sent'));
                }
            };
        });

        // view de login
        Fortify::loginView(function () {
            return view('auth.login');
        });

        // view de esqueci minha senha
        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.forgot-password');
        });

        // view de resetar a senha
        Fortify::resetPasswordView(function ($request) {
            return view('auth.reset-password', ['request' => $request]);
        });
    }
}
