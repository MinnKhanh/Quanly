<?php

namespace App\Services\User;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Throwable;

/**
 * Class UserService.
 */
class UserService
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
     * @return mixed
     */
    public function getList()
    {
    }
    /**
     * @param $type
     * @param  bool|int  $perPage
     * @return mixed
     */
    public function update($request)
    {
        // dd($request->input('isedit'));
        try {
            DB::beginTransaction();
            $model = $this->model->find($request->input('isedit'));
            $attr = $request->except('_token', '_method', 'isedit', 'manager_department');
            if ($request->file('img')) {
                $image_path = public_path() . '\storage\employee' . "\\" . $model->img;
                if (file_exists($image_path) && $model->img)
                    unlink($image_path);
                $img = $request->file('img')->store('public/employee');
                $img = str_replace("public/employee/", "", $img);
                $attr['img'] = $img;
            }
            $model->update($attr);
            DB::commit();
            dd($model);
            return $model;
        } catch (Throwable $e) {
            DB::rollBack();
            dd($e);
            return null;
        }
    }
}
