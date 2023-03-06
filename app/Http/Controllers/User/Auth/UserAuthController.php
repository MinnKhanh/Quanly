<?php

namespace App\Http\Controllers\User\Auth;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Services\User\Auth\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    protected $authService;
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
    public function login()
    {
        return view('user.auth.login');
    }
    public function signin(AuthRequest $request)
    {
        return $this->authService->signin($request);
    }
    public function changePassword()
    {
        return view('user.auth.change_password');
    }
    public function updatePassword(ChangePasswordRequest $request)
    {

        if ($this->authService->updatePassword($request->password)->hasRole(RoleEnum::USER)) {
            return redirect()->route('user.employee.index');
        } else {
            Auth::logout();
            return redirect()->route('user.auth.login')->withErrors(['msg' => "Vui lòng đăng nhập bằng tài khoản user"]);
        }
    }
    public function logout()
    {
        $this->authService->logout();
        return redirect()->route('user.auth.login');
    }
}
