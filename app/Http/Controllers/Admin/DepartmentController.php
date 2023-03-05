<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use App\Models\Employee;
use App\Services\Admin\Department\DepartmentService;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    protected $departmentService;
    public function __construct(DepartmentService $departmentService)
    {
        $this->departmentService = $departmentService;
    }
    public function index()
    {
        return view('admin.department.index', ['departments' => $this->departmentService->getlist()]);
    }
    public function create()
    {
        return view('admin.department.create', ['employees' => Employee::with('Position')->get()->toArray()]);
    }
    public function store(DepartmentRequest $request)
    {
        if ($this->departmentService->store($request))
            return redirect()->route('admin.department.index');
        return redirect()->back()->withErrors(['msg' => 'Thêm thất bại']);
    }
    public function edit(Department $department)
    {
        return view('admin.department.edit', ['employees' => Employee::with('Position')->get()->toArray(), 'department' => $department, 'isedit' => 1]);
    }
    public function update(DepartmentRequest $request)
    {
        if ($this->departmentService->update($request))
            return redirect()->route('admin.department.index');
        return redirect()->back()->withErrors(['msg' => 'Cập nhật thất bại']);
    }
    public function delete(Request $request)
    {
        return redirect()->back()->with($this->departmentService->delete($request) ? ['success' => 'Xóa thành công'] : ['msg' => 'Xóa thất bại']);
    }
}
