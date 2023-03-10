<?php

namespace App\Services\Admin\Auth;

use App\Enums\RoleEnum;
use App\Models\Employee;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserService.
 */
class AuthService
{
    protected $model;
    /**
     * UserService constructor.
     *
     * @param  Employee  $user
     */
    public function __construct(Employee $user)
    {
        $this->model = $user;
    }

    /**
     * @param  Request  $request
     * Đăng nhập
     * @return rediect
     */
    public function signin($request)
    {
        // dd($request->input());
        $is_remember = $request->input('remember') ? true : false;
        // dd($request->all());
        if (Auth::attempt(
            [
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ],
            $is_remember
        )) {
            if (!auth()->user()->is_first) {
                return redirect()->route('admin.auth.change_password');
            }
            if (auth()->user()->hasRole(RoleEnum::ADMIN)) {
                return redirect()->route('admin.employee.index');
            } else {
                Auth::logout();
                return redirect()->back()->withErrors(['msg' => "Vui lòng đăng nhập bằng tài khoản admin"]);
            }
        } else {
            return redirect()->back()->withErrors(['msg' => 'Đăng nhập thất bại']);
        }
    }

    /**
     * Đăng xuất
     */
    public function logout()
    {
        Auth::logout();
        Artisan::call('cache:clear');
    }

    /**
     * @param  String  $password
     * Xóa thông thin
     * @return User user
     */
    public function updatePassword($password)
    {
        // dd(Auth::user());
        $user = Auth::user();
        $user->is_first = 1;
        $user->password = Hash::make($password);
        $user->save();
        return $user;
    }
}
