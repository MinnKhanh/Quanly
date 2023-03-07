@extends('layouts.admin')
@section('content')
    @if ($errors->has('msg'))
        <div class="error">{{ $errors->first('msg') }}</div>
    @endif
    <div>

        <div class="container-fluid" style="overflow-x: scroll;">
            <table class="table w-100">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="text-center">Tên</th>
                        <th scope="col" class="text-center">Điện thoại</th>
                        <th scope="col" class="text-center">Email</th>
                        <th scope="col" class="text-center">Địa chỉ</th>
                        <th scope="col" class="text-center">Vị trí</th>
                        <th scope="col" class="text-center">Phòng ban</th>
                        <th scope="col" class="text-center">Phòng ban quản lý</th>
                        <th scope="col" class="text-center">Ngày Gia nhập</th>
                        <th scope="col" class="fix text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($list as $item)
                        <tr>
                            <td scope="col" class="text-center align-middle " class="text-center">
                                {{ $item['name'] }}
                            </td>
                            <td scope="col" class="text-center align-middle " class="text-center">
                                {{ $item['phone'] }}
                            </td>
                            <td scope="col" class="text-center align-middle " class="text-center">
                                {{ $item['email'] }}
                            </td>
                            <td scope="col" class="text-center align-middle " class="text-center">
                                {{ $item['home_town'] }}
                            </td>
                            <td scope="col" class="text-center align-middle " class="text-center">
                                {{ $item['position']['name'] }}
                            </td>
                            <td scope="col" class="text-center align-middle " class="text-center">
                                {{ $item['department']['name'] }}
                            </td>
                            <td scope="col" class="text-center align-middle " class="text-center">
                                {{ $item['manager_department'] ? $item['manager_department']['name'] : 'không có' }}
                            </td>
                            <td scope="col" class="text-center align-middle " class="text-center">
                                {{ $item['date_entered'] }}
                            </td>
                            <td scope="col" class="text-center d-flex">
                                <a class="btn btn-info btn-sm rounded-0"
                                    href="{{ route('admin.employee.detail', ['id' => $item['id']]) }}"><i
                                        class="fa-solid fa-eye"></i> Xem</a>
                                <a class="btn btn-warning btn-sm rounded-0 ml-1"
                                    href="{{ route('admin.employee.edit', ['id' => $item['id']]) }}"><i
                                        class="fa fa-pencil"></i>Sửa</a>
                                <form action="{{ route('admin.employee.delete') }}" class=" ml-1" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="id" value="{{ $item['id'] }}">
                                    <button class="btn btn-danger btn-sm rounded-0"><i class="fa fa-trash"></i>Xóa</button>
                                </form>
                                @if (!empty($item['account']))
                                    <div class="btn-secondary btn-sm ml-1">Đã có <i class="fa-solid fa-user"></i></div>
                                @else
                                    <a class="btn btn-success btn-sm rounded-0  ml-1"
                                        href="{{ route('admin.account.create', ['employee' => $item['id']]) }}">
                                        Tạo <i class="fa-solid fa-user"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
