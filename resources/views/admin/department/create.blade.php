@extends('layouts.admin')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/form-style.css') }}">
@endpush
@section('content')
    <div class="container">
        <form class="row" action="{{ route('admin.department.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h4 class="co-6 checkout__input text-center"> Tạo phòng ban</h4>
            <div class="col-12 form-row">
                <div class="col-6">
                    <div class="checkout__input">
                        <p> Tên phòng<span>*</span></p>
                        <input type="text" name="name" value="{{ old('name') }}">
                        <p>
                            @if ($errors->has('name'))
                                <div class="error">{{ $errors->first('name') }}</div>
                            @endif
                        </p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="checkout__input">
                        <p>Người quản lý<span>*</span></p>
                        <select name="manager">
                            <option value="0">--chọn--</option>
                            @foreach ($employees as $item)
                                <option value="{{ $item['id'] }}">{{ $item['name'] }} - {{ $item['position']['name'] }} -
                                    {{ $item['email'] }}</option>
                            @endforeach
                        </select>
                        <p>
                            @if ($errors->has('manager'))
                                <div class="error">{{ $errors->first('manager') }}</div>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <div class="form-group col-12 row justify-content-center btn-group-mto mt-5">
                <div>
                    <a href="{{ route('admin.department.index') }}" class="btn btn-default">
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
