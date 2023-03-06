@extends('layouts.admin')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/form-style.css') }}">
@endpush
@section('content')
    <div>
        @if ($errors->has('msg'))
            <p class="error">{{ $errors->first('msg') }}</p>
        @endif
    </div>
    <div class="container">
        <form class="row" action="{{ route('admin.department.update') }}" method="POST">
            @csrf
            <input type="hidden" name="isedit" value="{{ $department['id'] }}">
            @method('PUT')
            <h4 class="co-6 checkout__input text-center"> Tạo phòng ban</h4>
            <div class="col-12 form-row">
                <div class="col-6">
                    <div class="checkout__input">
                        <p> Tên phòng<span>*</span></p>
                        <input type="text" name="name" value="{{ $department['name'] }}">
                        <div>
                            @if ($errors->has('name'))
                                <p class="error">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="checkout__input">
                        <p>Người quản lý<span>*</span></p>
                        <select name="manager">
                            <option value="0">--chọn--</option>
                            @foreach ($employees as $item)
                                <option value="{{ $item['id'] }}"
                                    {{ $department['manager'] == $item['id'] ? 'selected' : '' }}>
                                    {{ $item['name'] }} - {{ $item['position']['name'] }} -
                                    {{ $item['email'] }}</option>
                            @endforeach
                        </select>
                        <div>
                            @if ($errors->has('manager'))
                                <p class="error">{{ $errors->first('manager') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group col-12 row justify-content-center btn-group-mto mt-5">
                <div>
                    <a href="{{ route('admin.department.index') }}" class="btn btn-default">
                        <i class="fa fa-arrow-left"></i>
                        Trở lại
                    </a>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Cập nhật</button>

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
