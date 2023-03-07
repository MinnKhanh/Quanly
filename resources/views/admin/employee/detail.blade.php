@extends('layouts.admin')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/form-style.css') }}">
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <h4 class="co-6 checkout__input text-center"> Thông tin nhân viên</h4>
            <div class="col-12 form-row">
                <div class="avatar-upload col-6">
                    <div class="avatar-preview">
                        <div id="imagePreview" style="overflow: hidden">
                            <img id="output" style="width: 100%;height: 100%;"
                                src="{{ asset('/storage/employee/' . $data['img']) }}" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 form-row">
                <div class="col-6">
                    <div class="checkout__input">
                        <strong class="text-center text-black-50 d-inline-block mb-3">Tên</strong>
                        <input type="text" name="name" readonly value="{{ $data['name'] }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="checkout__input">
                        <strong class="text-center text-black-50 d-inline-block mb-3">Email</strong>
                        <input type="text" name="email" readonly value="{{ $data['email'] }}">
                    </div>
                </div>
            </div>

            <div class="col-12 form-row">
                <div class="col-6">
                    <div class="checkout__input">
                        <strong class="text-center text-black-50 d-inline-block mb-3">Địa chỉ</strong>
                        <input type="text" name="home_town" readonly value="{{ $data['home_town'] }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="checkout__input">
                        <strong class="text-center text-black-50 d-inline-block mb-3">Ngày sinh</strong>
                        <input type="date" name="birth_day" readonly value="{{ $data['birth_day'] }}">
                    </div>
                </div>
            </div>
            <div class="col-12 form-row">
                <div class="col-6">
                    <div class="checkout__input">
                        <strong class="text-center text-black-50 d-inline-block mb-3">Giới tính</strong>
                        <select class="custom-select" name="gender">
                            <option>--Chọn--</option>
                            <option value=1 {{ $data['gender'] == 1 ? 'selected' : '' }}>Nam</option>
                            <option value=2 {{ $data['gender'] == 2 ? 'selected' : '' }}>Nữ</option>
                            <option value=3 {{ $data['gender'] == 3 ? 'selected' : '' }}>Khác</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="checkout__input">
                        <strong class="text-center text-black-50 d-inline-block mb-3">Điện thoại</strong>
                        <input type="text" name="phone" readonly value="{{ $data['phone'] }}">
                    </div>
                </div>
            </div>
            <div class="col-12 form-row">
                <div class="col-6">
                    <div class="checkout__input">
                        <strong class="text-center text-black-50 d-inline-block mb-3">CMTND</strong>
                        <input type="text" name="cmtnd" readonly value="{{ $data['cmtnd'] }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="checkout__input">
                        <strong class="text-center text-black-50 d-inline-block mb-3">Ngày vào công ty</strong>
                        <input type="date" name="date_entered" readonly value="{{ $data['date_entered'] }}">
                    </div>
                </div>
            </div>
            <div class="col-12 form-row">
                <div class="col-6">
                    <div class="checkout__input">
                        <strong class="text-center text-black-50 d-inline-block mb-3">Tên ngân hàng</strong>
                        <input type="text" name="bank_name" readonly value="{{ $data['bank_name'] }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="checkout__input">
                        <strong class="text-center text-black-50 d-inline-block mb-3">Số tài khoản ngân hàng</strong>
                        <input type="text" name="bank_number" readonly value="{{ $data['bank_number'] }}">
                    </div>
                </div>

            </div>
            <div class="col-12 form-row">
                <div class="col-4">
                    <div class="checkout__input">
                        <strong class="text-center text-black-50 d-inline-block mb-3">Vị trí</strong>
                        <p>{{ $data['position']['name'] }}</p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="checkout__input">
                        <strong class="text-center text-black-50 d-inline-block mb-3">Phòng ban thuộc về</strong>
                        <p>{{ $data['department']['name'] }}</p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="checkout__input">
                        <strong class="text-center text-black-50 d-inline-block mb-3">Phòng ban quản lý</strong>
                        <p>{{ isset($data['manager_department']['name']) ? $data['manager_department']['name'] : '' }}</p>
                    </div>
                </div>
            </div>

        </div>
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
