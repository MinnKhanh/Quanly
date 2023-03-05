<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Employee;
use App\Services\Admin\User\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function index()
    {
        // dd($this->userService->getList());
        return view('admin.user.index', ['users' => $this->userService->getList()]);
    }
    public function create(Employee $employee)
    {
        return view('admin.user.create', $this->userService->create($employee));
    }
    public function store(UserRequest $request)
    {
        if ($this->userService->store($request)) {
            return redirect()->route('admin.employee.index');
        }
        return redirect()->back()->withErrors(['msg' => "Tạo thất bại"]);
    }
    public function delete(Request $request)
    {
        return redirect()->back()->with($this->userService->delete($request) ? ['success' => 'Xóa thành công'] : ['msg' => 'Xóa thất bại']);
    }
    public function resetPassword(Request $request)
    {

        return $this->userService->resetPassword($request);
    }
}
