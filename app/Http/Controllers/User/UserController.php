<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserInfoRequest;
use App\Models\Employee;
use App\Services\User\Employee\EmployeeService;

class UserController extends Controller
{
    protected $userService;
    public function __construct(EmployeeService $userService)
    {
        $this->userService = $userService;
    }
    public function index()
    {
        return view('user.index');
    }
    public function edit()
    {

        return view('user.info.edit', ['data' => Employee::where('id_account', auth()->user()->id)->first()]);
    }
    public function update(UserInfoRequest $request)
    {
        if ($this->userService->update($request)) {
            return redirect()->back();
        } else {
            dd('loi');
        }
    }
}
