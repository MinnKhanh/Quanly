<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Services\Admin\Employee\EmployeeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EmployeeController extends Controller
{
    protected $employeeService;
    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }
    public function index()
    {
        // dd($this->employeeService->getList()->toArray());
        return view('admin.employee.index', ['list' => $this->employeeService->getList()->toArray()]);
    }
    public function create()
    {
        return view('admin.employee.create', $this->employeeService->create());
    }
    public function store(EmployeeRequest $request)
    {
        // dd($request->all());
        if ($this->employeeService->store($request)) {
            return redirect()->route('admin.employee.index')->with('success', 'Tạo thành công');
        }
        return redirect()->back()->withErrors(['msg' => 'Tạo thất bại']);
    }
    public function edit($id)
    {
        return view('admin.employee.edit', $this->employeeService->edit($id));
    }
    public function update(EmployeeRequest $request)
    {
        // dd($request);
        if ($this->employeeService->update($request)) {
            return Redirect::route('admin.employee.index');
        }
        return Redirect::back()->withInput($request->input())->withErrors(['msg' => 'Cập nhật thất bại']);
    }
    public function delete(Request $employee)
    {
        if ($this->employeeService->delete($employee))
            return Redirect::route('admin.employee.index')->with('success', 'Tạo thành công');
        return Redirect::route('admin.employee.index')->withErrors(['msg' => 'Xóa thất bại']);
    }
}
