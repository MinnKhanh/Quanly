@extends('layouts.admin')
@section('content')
    @if ($errors->has('msg'))
        <div class="error">{{ $errors->first('msg') }}</div>
    @endif
    <div>
        {{-- <div class="d-flex mb-5">
            <div class="mr-3">
                <label for="" class="d-block">Tên</label>
                <input class="form-control" id="name" placeholder="Tên khách hàng">
            </div>
            <div class="mr-3">
                <label for="" class="d-block">Số điện thoại</label>
                <input class="form-control" id="name" placeholder="Tên khách hàng">
            </div>
            <div class="mr-3">
                <label for="" class="d-block">Email</label>
                <input class="form-control" id="name" placeholder="Tên khách hàng">
            </div>
            <div class="mr-3">
                <label for="" class="d-block">Thời gian gia nhập</label>
                <input type="date" class="end form-control ml-1" style="height: 35px" class="">
            </div>

        </div> --}}
        <div class="container-fluid" style="overflow-x: scroll;">
            <table class="table w-100">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="text-center">Tên</th>
                        <th scope="col" class="text-center">Ngày tạo</th>
                        <th scope="col" class="fix text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($departments as $item)
                        <tr>
                            <td scope="col" class="text-center align-middle " class="text-center">
                                {{ $item['name'] }}
                            </td>
                            <td scope="col" class="text-center align-middle " class="text-center">
                                {{ $item['created_at']->format('d/m/Y') }}
                            </td>
                            <td scope="col" class="text-center d-flex justify-content-center">
                                <a class="btn btn-warning btn-sm rounded-0"
                                    href="{{ route('admin.department.edit', ['department' => $item['id']]) }}"><i
                                        class="fa fa-pencil"></i></a>
                                <form action="{{ route('admin.department.delete') }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="id" value="{{ $item['id'] }}">
                                    <button class="btn btn-danger btn-sm rounded-0"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="row mb-5">
            <div class="col-lg-12">
                {{-- @if (count($customers) > 0)
                    {{ $customers->links() }}
                @endif --}}

            </div>
        </div>
    </div>
@endsection
