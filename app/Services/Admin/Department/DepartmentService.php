<?php

namespace App\Services\Admin\Department;

use App\Models\Department;
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
     * @return mixed
     */
    public function getList()
    {
        return $this->model->get();
    }
    public function create()
    {
    }
    //'roles' => Role::all()->toArray(),
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
    public function edit($department)
    {
        // dd($employee->with('Account')->first()->toArray());
        return ['data' => $department->with('Account')->first()->toArray()];
    }
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
    public function delete($request)
    {
        if ($request->id) {
            $this->model->find($request->id)->delete();
            return true;
        }
        return false;
    }
}
