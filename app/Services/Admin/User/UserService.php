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
     * @return mixed
     */
    public function getList()
    {
        return $this->model->with('Employee', 'Roles')->get()->toArray();
    }
    public function create($employee)
    {
        // dd($employee);
        return ['roles' => Role::all()->toArray(), 'employee' => $employee];
    }
    public function store($request = null)
    {
        dd('adfas');
        try {
            DB::beginTransaction();
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ];
            $user = $this->model->create($data);
            $user->syncRoles($request->role);
            Employee::find($request->input('id_employee'))->update(['id_account' => $user->id]);
            JobsSendAccount::dispatch($request->email, $request->name, $request->password);
            DB::commit();
            return true;
        } catch (Throwable $e) {
            DB::rollback();
            dd($e)
            return false;
        }
    }
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
