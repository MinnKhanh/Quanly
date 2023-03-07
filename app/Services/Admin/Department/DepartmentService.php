<?php

namespace App\Services\Admin\Department;

use App\Models\Department;
use App\Models\Employee;
use Throwable;

/**
 * Class UserService.
 */
class DepartmentService
{
    protected $model;
    /**
     * UserService constructor.
     *
     * @param  Department  $user
     */
    public function __construct(Department $department)
    {
        $this->model = $department;
    }
    /**
     * @return list Department
     */
    public function getList()
    {
        return $this->model->get();
    }
    public function create()
    {
    }
    /**
     * Lưu thông tin cần tạo
     * @return Department
     */
    public function store($request = null)
    {
        // dd($request->all());
        if ($request) {
            $attr = $request->except('_token');
            $department = $this->model->create($attr);
            return $department;
        }
        return null;
    }

    /**
     * @param  Department  $department
     * Lưu thông tin cần sửa
     * @return array
     */
    public function edit($department)
    {
        // dd($employee->with('Account')->first()->toArray());
        return ['data' => $department->with('Account')->first()->toArray()];
    }

    /**
     * @param  Request  $request
     * Lấy thông tin cần update
     * @return Department
     */
    public function update($request)
    {
        try {
            $model = $this->model->find($request->input('isedit'));
            $attr = $request->except('_token', '_method', 'isedit');
            $this->model->where('manager', $request->input('manager'))->update(['manager' => null]);
            return $model->update($attr);
        } catch (Throwable $e) {
            return null;
        }
    }

    /**
     * @param  Request  $request
     * Xóa thông thin
     * @return boolean
     */
    public function delete($request)
    {
        $department = $this->model->find($request->id);
        $numberOfDepartment = Employee::where('department', $department->id)->count();
        if ($request->id && $numberOfDepartment == 0) {
            $department->delete();
            return true;
        }
        return false;
    }
}
