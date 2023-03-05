<?php

namespace App\Http\Controllers\User\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Services\User\Employee\EmployeeService;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected $employeeService;
    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }
    public function index()
    {
        return view('user.employee.index', [
            'list' => $this->employeeService->getList()->toArray(),
            'position_selft' => $this->employeeService->getPriorityLevel()
        ]);
    }
    public function detail($id)
    {
        return view('user.employee.detail', ['data' => $this->employeeService->detail($id)]);
    }
}
