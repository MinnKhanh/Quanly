<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Services\Admin\Auth\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if ($this->authService->updatePassword($request->password)->hasRole(RoleEnum::ADMIN)) {

            return redirect()->route('admin.employee.index');
        } else {
            Auth::logout();
            return redirect()->route('admin.auth.login')->withErrors(['msg' => "Vui lòng đăng nhập bằng tài khoản admin"]);
        }
    }
    public function logout()
    {
        $this->authService->logout();
        return redirect()->route('admin.auth.login');
    }
}
