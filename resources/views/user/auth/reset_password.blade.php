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
            <h2>User<br> Login Page</h2>
        </div>
    </div>
    <div class="main">
        <div class="col-md-6 col-sm-12">
            <div class="login-form">
                <form method="POST" action="{{ route('user.auth.reset_password') }}">
                    @csrf
                    <input type="hidden" name="is_reset" value="1">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" required
                            autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-black">Reset</button>
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
