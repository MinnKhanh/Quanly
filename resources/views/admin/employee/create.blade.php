@extends('layouts.admin')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/form-style.css') }}">
@endpush
@section('content')
    <div class="container">
        <div>
            @if ($errors->has('msg'))
                <p class="error">{{ $errors->first('msg') }}</p>
            @endif
        </div>
        <form class="row" action="{{ route('admin.employee.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h4 class="co-6 checkout__input text-center"> Tạo thông tin nhân viên</h4>
            <div class="col-12 form-row">
                <div class="avatar-upload col-6">
                    <div class="avatar-edit">
                        <input type="file" id="imageUpload" name="img">
                        <label for="imageUpload"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-pencil-fill pencil" viewBox="0 0 16 16">
                                <path
                                    d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                            </svg></label>
                    </div>
                    <div class="avatar-preview">
                        <div id="imagePreview" style="width: 100%;height: 100%;" style="overflow: hidden">
                            <img id="output" />
                        </div>
                    </div>
                    <div>
                        @if ($errors->has('img'))
                            <p class="error">{{ $errors->first('img') }}</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-12 form-row">
                <div class="col-6">
                    <div class="checkout__input">
                        <p>Tên<span>*</span></p>
                        <input type="text" name="name" value="{{ old('name') }}">
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
                        <input type="text" name="email" value="{{ old('email') }}">
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
                        <p>Địa chỉ<span>*</span></p>
                        <input type="text" name="home_town" value="{{ old('home_town') }}">
                        <div>
                            @if ($errors->has('home_town'))
                                <p class="error">{{ $errors->first('home_town') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="checkout__input">
                        <p>Ngày sinh<span>*</span></p>
                        <input type="date" name="birth_day" value="{{ old('birth_day') }}">
                        <div>
                            @if ($errors->has('birth_day'))
                                <p class="error">{{ $errors->first('birth_day') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="checkout__input">
                        <p>Giới tính<span>*</span></p>
                        <select class="custom-select" name="gender">
                            <option>--Chọn--</option>
                            <option value=1 {{ old('gender') == 1 ? 'selected' : '' }}>Nam</option>
                            <option value=2 {{ old('gender') == 2 ? 'selected' : '' }}>Nữ</option>
                            <option value=3 {{ old('gender') == 3 ? 'selected' : '' }}>Khác</option>
                        </select>
                        <div>
                            @if ($errors->has('gender'))
                                <p class="error">{{ $errors->first('gender') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 form-row">
                <div class="col-4">
                    <div class="checkout__input">
                        <p>Điện thoại<span>*</span></p>
                        <input type="text" name="phone" value="{{ old('phone') }}">
                        <div>
                            @if ($errors->has('phone'))
                                <p class="error">{{ $errors->first('phone') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="checkout__input">
                        <p>CMTND<span>*</span></p>
                        <input type="text" name="cmtnd" value="{{ old('cmtnd') }}">
                        <div>
                            @if ($errors->has('cmtnd'))
                                <p class="error">{{ $errors->first('cmtnd') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="checkout__input">
                        <p>Ngày vào công ty<span>*</span></p>
                        <input type="date" name="date_entered" value="{{ old('date_entered') }}">
                        <div>
                            @if ($errors->has('date_entered'))
                                <p class="error">{{ $errors->first('date_entered') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 form-row">
                <div class="col-6">
                    <div class="checkout__input">
                        <p>Tên ngân hàng<span>*</span></p>
                        <input type="text" name="bank_name" value="{{ old('bank_name') }}">
                        <div>
                            @if ($errors->has('bank_name'))
                                <p class="error">{{ $errors->first('bank_name') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="checkout__input">
                        <p>Số tài khoản ngân hàng<span>*</span></p>
                        <input type="text" name="bank_number" value="{{ old('bank_number') }}">
                        <div>
                            @if ($errors->has('bank_number'))
                                <p class="error">{{ $errors->first('bank_number') }}</p>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-12 form-row">
                <div class="col-4">
                    <div class="checkout__input">
                        <p>Vị trí<span>*</span></p>
                        <select id="" name="position">
                            <option value=0>--chọn--</option>
                            @forelse ($positions as $item)
                                <option value="{{ $item['id'] }}"
                                    {{ old('position') == $item['id'] ? 'selected' : '' }}>
                                    {{ $item['name'] }}</option>
                            @empty
                            @endforelse
                        </select>
                        <div>
                            @if ($errors->has('position'))
                                <p class="error">{{ $errors->first('position') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="checkout__input">
                        <p>Phòng ban thuộc về<span>*</span></p>
                        <select name="department">
                            <option value=0>--chọn--</option>
                            @forelse ($departments as $item)
                                <option value="{{ $item['id'] }}"
                                    {{ old('department') == $item['id'] ? 'selected' : '' }}>
                                    {{ $item['name'] }}</option>
                            @empty
                            @endforelse
                        </select>
                        <div>
                            @if ($errors->has('department'))
                                <p class="error">{{ $errors->first('department') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="checkout__input">
                        <p>Phòng ban quản lý<span>*</span></p>
                        <select name="manager_department">
                            <option value=0>--không có--</option>
                            @forelse ($departments as $item)
                                @if (empty($item['manager']))
                                    <option value="{{ $item['id'] }}"
                                        {{ old('manager_department') == $item['id'] ? 'selected' : '' }}>
                                        {{ $item['name'] }}</option>
                                @endif

                            @empty
                            @endforelse
                        </select>
                        <div>
                            @if ($errors->has('manager_department'))
                                <p class="error">{{ $errors->first('manager_department') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                {{-- <div class="col-4">
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
                </div> --}}
            </div>
            <div class="form-group col-12 row justify-content-center btn-group-mto mt-5">
                <div>
                    <a href="{{ route('admin.employee.index') }}" class="btn btn-default">
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
