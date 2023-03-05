<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Services\Admin\Auth\AuthService;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    protected $authService;
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
    public function login()
    {
        return view('admin.auth.login');
    }
    public function signin(AuthRequest $request)
    {
        return $this->authService->signin($request);
    }
    public function changePassword()
    {
        return view('admin.auth.change_password');
    }
    public function updatePassword(ChangePasswordRequest $request)
    {
        return $this->authService->updatePassword($request->password);
    }
    public function logout()
    {
        $this->authService->logout();

        return redirect()->route('admin.auth.login');
    }
}
