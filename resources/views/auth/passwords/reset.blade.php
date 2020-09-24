@extends('layouts.app')

@section('content')
    <div class="tw-container tw-mx-auto tw-pt-32 tw-flex tw-justify-center">
        <div class="tw-border tw-border-solid tw-rounded tw-border-gray tw-p-10 md:tw-w-1/2">
            <h1 class="tw-text-3xl tw-mb-10">Reset Password</h1>

            <form method="POST" action="{{ route('password.request') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="tw-flex tw-flex-col tw-mb-4">
                    <label for="email" class="tw-mb-2">E-Mail Address</label>

                    <div class="tw-flex tw-flex-col">
                        <div class="el-input tw-mb-2">
                            <input id="email" type="email" class="el-input__inner {{ $errors->has('email') ? ' tw-border-red' : '' }}" name="email" value="{{ $email or old('email') }}" required autofocus>
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
                            <input id="password" type="password" class="el-input__inner {{ $errors->has('password') ? ' tw-border-red' : '' }}" name="password" value="{{ old('password') }}" required>
                        </div>

                        @if ($errors->has('password'))
                            <span class="tw-text-xs tw-text-primary">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="tw-flex tw-flex-col tw-mb-4">
                    <label for="password" class="tw-mb-2">Confirm Password</label>

                    <div class="tw-flex tw-flex-col">
                        <div class="el-input tw-mb-2">
                            <input id="password-confirm" type="password" class="el-input__inner {{ $errors->has('password_confirmation') ? ' tw-border-red' : '' }}" name="password_confirmation" value="{{ old('password_confirmation') }}" required>
                        </div>

                        @if ($errors->has('password_confirmation'))
                            <span class="tw-text-xs tw-text-primary">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="tw-flex">
                    <button type="submit" class="el-button el-button--primary">
                        Reset Password
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
