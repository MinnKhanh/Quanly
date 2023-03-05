@extends('layouts.admin')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .checkout__input select {
            height: 50px;
            width: 100%;
            border: 1px solid #e1e1e1;
            font-size: 14px;
            color: #b7b7b7;
            padding-left: 20px;
            margin-bottom: 20px;
            color: black;
        }

        .checkout__input textarea {
            height: 50px;
            width: 100%;
            border: 1px solid #e1e1e1;
            font-size: 14px;
            color: #b7b7b7;
            padding-left: 20px;
            margin-bottom: 20px;
            color: black;
        }

        .checkout__input input {
            color: black;
        }

        .error strong {
            color: red;
        }

        .icon-trash {
            position: absolute;
            left: 0px;
            top: 0px;
            margin: 0px;
            margin-left: 15px;
        }

        body {
            background: whitesmoke;
            font-family: 'Open Sans', sans-serif;
        }

        .select2-container--default .select2-selection--single {
            background-color: #fff;
            border: 1px solid #aaa;
            height: 36px;
            border-radius: 0px;
        }

        .container {
            max-width: 960px;
            margin: 30px auto;
            padding: 20px;
        }

        h1 {
            font-size: 20px;
            text-align: center;
            margin: 20px 0 20px;

        }

        h1 small {
            display: block;
            font-size: 15px;
            padding-top: 8px;
            color: gray;
        }

        .avatar-upload {
            position: relative;
            max-width: 205px;
            margin: 50px auto;


        }

        .avatar-upload .avatar-edit {
            position: absolute;
            right: 12px;
            z-index: 1;
            top: 10px;

        }

        .avatar-upload .avatar-edit input {
            display: none;

        }

        .avatar-upload .avatar-edit input+label {
            display: inline-block;
            width: 34px;
            height: 34px;
            margin-bottom: 0;
            border-radius: 100%;
            background: #FFFFFF;
            border: 1px solid transparent;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
            cursor: pointer;
            font-weight: normal;
            transition: all .2s ease-in-out;

        }

        .avatar-upload .avatar-edit input+label:hover {
            background: #f1f1f1;
            border-color: #d6d6d6;
        }

        .avatar-upload .avatar-edit input+label .pencil {
            font-family: 'FontAwesome';
            color: #757575;
            position: absolute;
            top: 10px;
            left: 0;
            right: 0;
            text-align: center;
            margin: auto;
        }

        .avatar-upload .avatar-preview {
            width: 192px;
            height: 192px;
            position: relative;
            border-radius: 100%;
            border: 6px solid #F8F8F8;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);

        }

        .avatar-upload .avatar-preview>div {
            width: 100%;
            height: 100%;
            border-radius: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>
@endpush
@section('content')
    <div class="container">
        <div>
            @if ($errors->has('msg'))
                <div class="error">{{ $errors->first('msg') }}</div>
            @endif
        </div>
        <form class="row" action="{{ route('user.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="hidden" name="isedit" value="{{ $data['id'] }}">
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
                        <div id="imagePreview" style="overflow: hidden">
                            <img id="output" src="{{ asset('/storage/employee/' . $data['img']) }}" />
                        </div>
                    </div>
                    <p class="error">
                        @if ($errors->has('img'))
                            <div class="error">{{ $errors->first('img') }}</div>
                        @endif
                    </p>
                </div>
            </div>

            <div class="col-12 form-row">
                <div class="col-6">
                    <div class="checkout__input">
                        <p>Tên<span>*</span></p>
                        <input type="text" name="name" value="{{ $data['name'] }}">
                        <p class="error">
                            @if ($errors->has('name'))
                                <div class="error">{{ $errors->first('name') }}</div>
                            @endif
                        </p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="checkout__input">
                        <p>Email<span>*</span></p>
                        <input type="text" name="email" value="{{ $data['email'] }}">
                        <p class="error">
                            @if ($errors->has('email'))
                                <div class="error">{{ $errors->first('email') }}</div>
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-12 form-row">
                <div class="col-6">
                    <div class="checkout__input">
                        <p>Địa chỉ<span>*</span></p>
                        <input type="text" name="home_town" value="{{ $data['home_town'] }}">
                        <p class="error">
                            @if ($errors->has('home_town'))
                                <div class="error">{{ $errors->first('home_town') }}</div>
                            @endif
                        </p>
                    </div>
                </div>
                <div class="col-3">
                    <div class="checkout__input">
                        <p>Ngày sinh<span>*</span></p>
                        <input type="date" name="birth_day" value="{{ $data['birth_day'] }}">
                        <p class="error">
                            @if ($errors->has('birth_day'))
                                <div class="error">{{ $errors->first('birth_day') }}</div>
                            @endif
                        </p>
                    </div>
                </div>
                <div class="col-3">
                    <div class="checkout__input">
                        <p>Giới tính<span>*</span></p>
                        <select class="custom-select" name="gender">
                            <option>--Chọn--</option>
                            <option value=1 {{ $data['gender'] == 1 ? 'selected' : '' }}>Nam</option>
                            <option value=2 {{ $data['gender'] == 2 ? 'selected' : '' }}>Nữ</option>
                            <option value=3 {{ $data['gender'] == 3 ? 'selected' : '' }}>Khác</option>
                        </select>
                        <p class="error">
                            @if ($errors->has('gender'))
                                <div class="error">{{ $errors->first('gender') }}</div>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 form-row">
                <div class="col-4">
                    <div class="checkout__input">
                        <p>Điện thoại<span>*</span></p>
                        <input type="text" name="phone" value="{{ $data['phone'] }}">
                        <p class="error">
                            @if ($errors->has('phone'))
                                <div class="error">{{ $errors->first('phone') }}</div>
                            @endif
                        </p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="checkout__input">
                        <p>CMTND<span>*</span></p>
                        <input type="text" name="cmtnd" value="{{ $data['cmtnd'] }}">
                        <p class="error">
                            @if ($errors->has('cmtnd'))
                                <div class="error">{{ $errors->first('cmtnd') }}</div>
                            @endif
                        </p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="checkout__input">
                        <p>Ngày vào công ty<span>*</span></p>
                        <input type="date" name="date_entered" value="{{ $data['date_entered'] }}">
                        <p class="error">
                            @if ($errors->has('date_entered'))
                                <div class="error">{{ $errors->first('date_entered') }}</div>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 form-row">
                <div class="col-6">
                    <div class="checkout__input">
                        <p>Tên ngân hàng<span>*</span></p>
                        <input type="text" name="bank_name" value="{{ $data['bank_name'] }}">
                        <p class="error">
                            @if ($errors->has('bank_name'))
                                <div class="error">{{ $errors->first('bank_name') }}</div>
                            @endif
                        </p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="checkout__input">
                        <p>Số tài khoản ngân hàng<span>*</span></p>
                        <input type="text" name="bank_number" value="{{ $data['bank_number'] }}">
                        <p class="error">
                            @if ($errors->has('bank_number'))
                                <div class="error">{{ $errors->first('bank_number') }}</div>
                            @endif
                        </p>
                    </div>
                </div>

            </div>

            <div class="form-group col-12 row justify-content-center btn-group-mto mt-5">
                <div>
                    <a href="{{ route('admin.employee.index') }}" class="btn btn-default">
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
