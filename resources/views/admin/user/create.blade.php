@extends('layouts.admin')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/form-style.css') }}">
@endpush
@section('content')
    <div class="container">
        <form class="row" action="{{ route('admin.account.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id_employee" value="{{ $employee['id'] }}">
            <h4 class="co-6 checkout__input text-center"> Tạo tài khoản</h4>
            <div class="col-12 form-row">
                <div class="col-6">
                    <div class="checkout__input">
                        <p> Tên tài khoản<span>*</span></p>
                        <input type="text" name="name" value="{{ $employee['name'] }}">
                        <div>
                            @if ($errors->has('name'))
                                <p class="error">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="checkout__input">
                        <p>Email<span>*</span></p>
                        <input type="text" name="email" value="{{ $employee['email'] }}">
                        <div>
                            @if ($errors->has('email'))
                                <p class="error">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 form-row">
                <div class="col-6">
                    <div class="checkout__input">
                        <p>Password<span>*</span></p>
                        <input type="text" name="password">
                        <div>
                            @if ($errors->has('password'))
                                <p class="error">{{ $errors->first('password') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="checkout__input">
                        <p>Quyền<span>*</span></p>
                        <select name="role">
                            <option>--chọn--</option>
                            @forelse ($roles as $item)
                                <option value="{{ $item['id'] }}" {{ old('role') == $item['id'] ? 'selected' : '' }}>
                                    {{ $item['name'] }}</option>
                            @empty
                            @endforelse
                        </select>
                        <div>
                            @if ($errors->has('role'))
                                <p class="error">{{ $errors->first('role') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group col-12 row justify-content-center btn-group-mto mt-5">
                <div>
                    <a href="{{ route('admin.employee.edit', ['id' => $employee['id']]) }}" class="btn btn-default">
                        <i class="fa fa-arrow-left"></i>
                        Trở lại
                    </a>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Tạo
                        mới</button>

                </div>
            </div>

        </form>
    </div>
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            console.log('chay')
            $('#imageUpload').on('change', function() {
                console.log('co chay')
                var output = document.getElementById('output');
                output.src = URL.createObjectURL(event.target.files[0]);
                output.onload = function() {
                    URL.revokeObjectURL(output.src) // free memory
                }
            })
        });
    </script>
@endpush
