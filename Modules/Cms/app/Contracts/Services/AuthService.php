<?php

namespace Modules\Cms\app\Contracts\Services;

use Modules\Cms\app\Http\Requests\Auth\LoginRequest;

interface AuthService
{
    /**
     * @param LoginRequest $request
     * @return void
     */
    public function login(LoginRequest $request): void;
}