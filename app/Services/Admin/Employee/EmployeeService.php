<?php

namespace App\Services\Admin\Employee;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
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
    public function create()
    {
        return ['positions' => Position::all()->toArray(), 'departments' => Department::all()->toArray()];
    }
    //'roles' => Role::all()->toArray(),
    public function store($request = null)
    {
        try {
            DB::beginTransaction();
            if ($request) {
                $img = $request->file('img')->store('public/employee');
                $img = str_replace("public/employee/", "", $img);
                $attr = $request->except('_token', 'img', 'manager_department');
                $attr['status'] = 1;
                $attr['img'] = $img;
                $employee = $this->model->create($attr);
                if ($request->input('manager_department')) {
                    Department::where('id', $request->input('manager_department'))->update(['manager' => $employee->id]);
                }
                DB::commit();
                return $employee;
            } else throw ValidationException::withMessages(['listId' => 'Không có  dữ liệu, rest thất bại']);
        } catch (Throwable $e) {
            DB::rollBack();
            return null;
        }
    }
    public function edit($id)
    {
        // dd($this->model->where('id', $id)->with('Account', 'ManagerDepartment')->first()->toArray());
        return ['positions' => Position::all()->toArray(), 'departments' => Department::all()->toArray(), 'data' => $this->model->where('id', $id)->with('Account', 'ManagerDepartment')->first()->toArray()];
    }
    public function update($request)
    {
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
            Department::where('manager', $request->input('isedit'))->update(['manager' => null]);
            if ($request->input('manager_department')) {
                Department::where('id', $request->input('manager_department'))->update(['manager' => $request->input('isedit')]);
            }
            $model->update($attr);
            DB::commit();
            return $model;
        } catch (Throwable $e) {
            DB::rollBack();
            return null;
        }
    }
    public function delete($request)
    {
        if ($this->model->find($request->id)->delete())
            return true;
        return false;
    }
}
