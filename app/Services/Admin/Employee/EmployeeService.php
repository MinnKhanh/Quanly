<?php

namespace App\Services\Admin\Employee;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Role;
use App\Models\User;
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
     * @return Employee employee
     */
    public function getList()
    {
        return $this->model->with('Position', 'Department', 'ManagerDepartment', 'Account')->get();
    }

    /**
     * @return array
     */
    public function create()
    {
        return ['positions' => Position::all()->toArray(), 'departments' => Department::all()->toArray()];
    }

    /**
     * @param  Request  $request
     * Lưu thông tin cần tạo
     *  @return Employee employee
     */
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

    /**
     * @param  int  $id
     * lấp thông tin cần cập nhật
     *  @return array
     */
    public function edit($id)
    {
        // dd($this->model->where('id', $id)->with('Account', 'ManagerDepartment')->first()->toArray());
        return ['positions' => Position::all()->toArray(), 'departments' => Department::all()->toArray(), 'data' => $this->model->where('id', $id)->with('Account', 'ManagerDepartment')->first()->toArray()];
    }

    /**
     * @param  Request  $request
     * Lưu thông tin cần cập nhật
     *  @return Employee employee
     */
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

    /**
     * @param  Request  $request
     * Xóa nhân viên
     *  @return boolean
     */
    public function delete($request)
    {
        try {
            DB::beginTransaction();
            $employ = $this->model->find($request->id);
            $user = User::where('id', $employ->id_account)->first();
            $user->syncRoles([]);
            $user->delete();
            Department::where('manager', $employ->id)->update(['manager' => null]);
            $employ->delete();
            DB::commit();
            return true;
        } catch (Throwable $e) {
            DB::rollBack();
            return false;
        }
    }
    /**
     * @param  int  $id
     * Lấy thông tin nhân viên
     *  @return Employee
     */
    public function detail($id)
    {
        return  $this->model->where('id', $id)->with('Position', 'Department', 'ManagerDepartment')->first()->toArray();
    }
}
