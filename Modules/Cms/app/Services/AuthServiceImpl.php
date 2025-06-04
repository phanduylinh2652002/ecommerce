<?php

namespace Modules\Cms\app\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Modules\Cms\app\Contracts\Services\AuthService;
use Modules\Cms\app\Http\Requests\Auth\LoginRequest;

class AuthServiceImpl implements AuthService
{
    /**
     * @param LoginRequest $request
     * @return void
     */
    public function login(LoginRequest $request): void
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => [__('auth.failed')],
            ]);
        }

        $request->session()->regenerate();
    }
}