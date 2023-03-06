<?php

namespace App\Services\User\Auth;

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
     * @return array
     */
    public function signin($request)
    {
        // dd($request->input());
        Auth::logout();
        $is_remember = $request->input('remember') ? true : false;
        if (Auth::attempt(
            [
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ],
            $is_remember
        )) {
            if (!auth()->user()->is_first) {
                return redirect()->route('user.auth.change_password');
            }
            if (auth()->user()->hasRole(RoleEnum::USER)) {
                return redirect()->route('user.employee.index');
            } else {
                Auth::logout();
                return redirect()->back()->withErrors(['msg' => "Vui lòng đăng nhập bằng tài khoản user"]);
            }
        } else {
            return redirect()->back()->withErrors(['msg' => 'Đăng nhập thất bại']);
        }
    }

    /**
     * đăng xuất
     */
    public function logout()
    {
        Auth::logout();
        Artisan::call('cache:clear');
    }

    /**
     * @param  Request  $request
     * reset mật khẩu
     *  @return User user
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
