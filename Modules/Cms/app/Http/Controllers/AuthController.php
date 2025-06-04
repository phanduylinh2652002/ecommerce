<?php

namespace Modules\Cms\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Modules\Cms\app\Contracts\Services\AuthService;
use Modules\Cms\app\Http\Requests\Auth\LoginRequest;

class AuthController extends Controller
{
    public function __construct(private readonly AuthService $authService)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('auth/Login');
    }

    /**
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        $this->authService->login($request);

        return to_route('dashboard');
    }
}
