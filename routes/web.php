<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AdminAuthController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\Auth\UserAuthController;
use App\Http\Controllers\User\Employee\EmployeeController as EmployeeEmployeeController;
use App\Http\Controllers\User\UserController as UserUserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group([
    'as'     => 'admin.',
    'prefix' => 'admin',
], static function () {

    Route::group([
        'as'     => 'auth.',
        'prefix' => 'auth',
    ], static function () {
        Route::get('/login', [AdminAuthController::class, 'login'])->name('login')->middleware('check.login');
        Route::post('/singin', [AdminAuthController::class, 'signin'])->name('signin');
        Route::get('/logout', [AdminAuthController::class, 'logout'])->name('logout');
        Route::get('/change-password', [AdminAuthController::class, 'changePassword'])->name('change_password');
        Route::put('/update-password', [AdminAuthController::class, 'updatePassword'])->name('update_password');
    });
    Route::group([
        'middleware' => 'check.admin',
    ], static function () {
        Route::group([
            'as'     => 'employee.',
            'prefix' => 'employee',
        ], static function () {
            Route::get('/', [EmployeeController::class, 'index'])->name('index');
            Route::get('/create', [EmployeeController::class, 'create'])->name('create');
            Route::post('/store', [EmployeeController::class, 'store'])->name('store');
            Route::get('{id}/edit', [EmployeeController::class, 'edit'])->name('edit');
            Route::put('/update', [EmployeeController::class, 'update'])->name('update');
            Route::delete('/delete', [EmployeeController::class, 'delete'])->name('delete');
        });
        Route::group([
            'as'     => 'account.',
            'prefix' => 'account',
        ], static function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('{employee}/create', [UserController::class, 'create'])->name('create');
            Route::post('/store', [UserController::class, 'store'])->name('store');
        });
        Route::group([
            'as'     => 'user.',
            'prefix' => 'user',
        ], static function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::delete('/delete', [UserController::class, 'delete'])->name('delete');
            Route::post('/reset-password', [UserController::class, 'resetPassword'])->name('reset_password');
        });
        Route::group([
            'as'     => 'department.',
            'prefix' => 'department',
        ], static function () {
            Route::get('/', [DepartmentController::class, 'index'])->name('index');
            Route::get('/create', [DepartmentController::class, 'create'])->name('create');
            Route::post('/store', [DepartmentController::class, 'store'])->name('store');
            Route::get('{department}/edit', [DepartmentController::class, 'edit'])->name('edit');
            Route::put('/update', [DepartmentController::class, 'update'])->name('update');
            Route::delete('/delete', [DepartmentController::class, 'delete'])->name('delete');
        });
    });
});
Route::group([
    'as'     => 'user.',
    'prefix' => 'user',
], static function () {
    Route::group([
        'as'     => 'auth.',
        'prefix' => 'auth',
    ], static function () {
        Route::get('/login', [UserAuthController::class, 'login'])->name('login')->middleware('check.login');
        Route::post('/signin', [UserAuthController::class, 'signin'])->name('signin');
        Route::get('/logout', [UserAuthController::class, 'logout'])->name('logout');
        Route::get('/change-password', [UserAuthController::class, 'changePassword'])->name('change_password');
        Route::put('/update-password', [UserAuthController::class, 'updatePassword'])->name('update_password');
    });
    Route::group([
        'middleware'     => 'check.user',
    ], static function () {
        Route::group([
            'as'     => 'employee.',
            'prefix' => 'employee',
        ], static function () {
            Route::get('/', [EmployeeEmployeeController::class, 'index'])->name('index');
            Route::get('{id}/detail', [EmployeeEmployeeController::class, 'detail'])->name('detail');
        });
        Route::get('/edit', [UserUserController::class, 'edit'])->name('edit');
        Route::put('/update', [UserUserController::class, 'update'])->name('update');
    });
});
Route::get('/', function () {
    $user = App\Models\User::where('id', 17)->first();
    dd($user, $user->syncRoles([1])); //->syncRoles(1);le(1));
});
