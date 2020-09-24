@extends('layouts.app')

@section('content')
<div class="tw-container tw-mx-auto tw-pt-32 tw-flex tw-justify-center">
    <div class="tw-border tw-border-solid tw-rounded tw-border-gray tw-p-10 md:tw-w-1/2">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="tw-flex tw-flex-col tw-mb-4">
                <label for="email" class="tw-mb-2">E-Mail Address</label>

                <div class="tw-flex tw-flex-col">
                    <div class="el-input tw-mb-2">
                        <input id="email" type="email" class="el-input__inner {{ $errors->has('email') ? ' tw-border-red' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                    </div>

                    @if ($errors->has('email'))
                        <span class="tw-text-xs tw-text-primary">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="tw-flex tw-flex-col tw-mb-4">
                <label for="password" class="tw-mb-2">Password</label>

                <div class="tw-flex tw-flex-col">
                    <div class="el-input tw-mb-2">
                        <input id="password" type="password" class="el-input__inner {{ $errors->has('password') ? ' tw-border-red' : '' }}" name="password" value="{{ old('email') }}" required>
                    </div>

                    @if ($errors->has('password'))
                        <span class="tw-text-xs tw-text-primary">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="tw-flex">
                <button type="submit" class="el-button el-button--primary">
                    Login
                </button>

                <a class="el-button el-button--text" href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
