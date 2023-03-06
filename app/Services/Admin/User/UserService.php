<?php

namespace App\Services\Admin\User;

use App\Jobs\ResetPassword;
use App\Jobs\SendAccount as JobsSendAccount;
use App\Mail\SendAccount;
use App\Models\Employee;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Throwable;
use Illuminate\Support\Str;

/**
 * Class UserService.
 */
class UserService
{
    protected $model;
    /**
     * UserService constructor.
     *
     * @param  User  $user
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }
    /**
     * @return array
     */
    public function getList()
    {
        return $this->model->with(['Employee' => function ($query) {
            $query->with(['Position']);
        }, 'Roles'])->get()->toArray();
    }
    /**
     *  @return array
     */
    public function create($employee)
    {
        // dd($employee);
        return ['roles' => Role::all()->toArray(), 'employee' => $employee];
    }

    /**
     * @param  Request  $request
     * Lưu thông tin cần tạo
     *  @return User user
     */
    public function store($request = null)
    {
        // dd('adfas');
        try {
            DB::beginTransaction();
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ];
            $user = $this->model->create($data);
            // $user->syncRoles($request->role);
            DB::table('model_has_roles')->insert([
                'role_id' => $request->role,
                'model_type' => get_class($user),
                'model_id' => $user->id
            ]);
            Employee::find($request->input('id_employee'))->update(['id_account' => $user->id]);
            JobsSendAccount::dispatch($request->email, $request->name, $request->password);
            DB::commit();
            return $user;
        } catch (Throwable $e) {
            DB::rollback();
            // dd($e);
            return null;
        }
    }

    /**
     * @param  Request  $request
     * Xóa tài khoản
     *  @return boolean
     */
    public function delete($request)
    {
        if ($request->input('id')) {
            $user = $this->model->find($request->input('id'));
            Employee::where('id_account', $request->input('id'))->update(['id_account' => null]);
            $user->syncRoles([]);
            $user->delete();
            return true;
        } else return false;
    }

    /**
     * @param  Request  $request
     * reset mật khẩu
     *  @return response json
     */
    public function resetPassword($request)
    {
        try {
            DB::beginTransaction();
            if (count($request->listId)) {
                $data = [];
                foreach ($request->listId as $item) {
                    $password = Str::random(8);
                    $user = $this->model::where('id', $item)->first();
                    $user->update(['password' => Hash::make($password), 'is_first' => null]);
                    $data[] = ['email' => $user->email, 'password' => $password];
                }

                DB::commit();
                ResetPassword::dispatch($data);
                return response()->json(['success' => 'Thành công'], 200);
            } else throw ValidationException::withMessages(['listId' => 'Không có  dữ liệu, rest thất bại']);
        } catch (Throwable $e) {
            DB::rollback();
            return response()->json(['error' => 'Thất bại'], 400);
        }
    }
}
