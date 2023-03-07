@extends('layouts.layout_login')
@push('css')
    <link rel="stylesheet" href="{{ asset('/css/form-layout.css') }}">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@endpush
@section('content')
    <!------ Include the above in your HEAD tag ---------->

    <div class="sidenav">
        <div class="login-main-text">
            <h2>Admin<br> Login Page</h2>
        </div>
    </div>
    <div class="main">
        <div class="col-md-6 col-sm-12">
            <div class="login-form">
                <form method="POST" action="{{ route('admin.auth.update_password') }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Email</label>
                        <input id="email" type="email" readonly
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ auth()->user()->email }}" required autocomplete="email">
                        @if ($errors->has('email'))
                            <div class="error">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required value="{{ old('password') }}">

                        @if ($errors->has('password'))
                            <div class="error">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Password Confirm</label>
                        <input id="password-confirm" type="password" class="form-control"
                            value="{{ old('password_confirmation') }}" name="password_confirmation" required>
                        @if ($errors->has('password_confirmation'))
                            <div class="error">{{ $errors->first('password_confirmation') }}</div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-black">Login</button>
                    <div class="rowd d-flex mt-3 justify-content-center text-center">
                        @if ($errors->has('msg'))
                            <div class="error">{{ $errors->first('msg') }}</div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
