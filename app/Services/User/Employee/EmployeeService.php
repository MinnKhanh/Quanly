<?php

namespace App\Services\User\Employee;

use App\Models\Employee;
use App\Models\Position;
use Illuminate\Support\Facades\DB;
use Throwable;

/**
 * Class UserService.
 */
class EmployeeService
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
        return $this->model->with('Position', 'Department', 'ManagerDepartment')->get();
    }
    public function getPriorityLevel()
    {
        $position = Position::pluck('priority_level', 'id');
        return $position[Employee::where('id_account', auth()->user()->id)->first()->position];
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
            return $model;
        } catch (Throwable $e) {
            DB::rollBack();
            return null;
        }
    }
    public function detail($id)
    {
        return  $this->model->where('id', $id)->with('Position', 'Department', 'ManagerDepartment')->first()->toArray();
    }
}
