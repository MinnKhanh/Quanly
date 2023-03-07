<?php

namespace App\Services\User\Auth;

use App\Enums\RoleEnum;
use App\Jobs\ResetPassword;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Throwable;

/**
 * Class UserService.
 */
class AuthService
{
    protected $model;
    /**
     * UserService constructor.
     *
     * @param  Userx  $user
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    /**
     * @param Request $request
     * Đăng nhập dựa vào thông tin đã nhập
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
     * đăng xuất tài khoản hiện tại
     */
    public function logout()
    {
        Auth::logout();
        Artisan::call('cache:clear');
    }

    /**
     *  @param  Request  $request
     *  cập nhật mật khẩu
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

    /**
     *  @param  Request  $request
     *  reset mật khẩu
     *  @return boolean
     */
    public function resetPassword($request)
    {
        try {
            DB::beginTransaction();
            $data = [];
            $password = Str::random(8);
            $user = $this->model::where('email', $request->input('email'))->first();
            $user->update(['password' => Hash::make($password), 'is_first' => null]);
            $data[] = ['email' => $user->email, 'password' => $password];
            DB::commit();
            ResetPassword::dispatch($data);
            return true;
        } catch (Throwable $e) {
            dd($e);
            DB::rollback();
            return false;
        }
    }
}
