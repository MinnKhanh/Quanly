@extends('layouts.layout_login')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Thay đổi mật khẩu') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('update_password') }}">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" readonly
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ auth()->user()->email }}" required autocomplete="email">
                                    @if ($errors->has('email'))
                                        <div class="error">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Mật khẩu mới') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="text"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required value="{{ old('password') }}">

                                    @if ($errors->has('password'))
                                        <div class="error">{{ $errors->first('password') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Xác nhận mật khẩu') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="text" class="form-control"
                                        value="{{ old('password_confirmation') }}" name="password_confirmation" required>
                                    @if ($errors->has('password_confirmation'))
                                        <div class="error">{{ $errors->first('password_confirmation') }}</div>
                                    @endif
                                </div>

                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Cập nhật') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
