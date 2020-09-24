@extends('layouts.app')

@section('content')
    <div class="tw-container tw-mx-auto tw-pt-32 tw-flex tw-justify-center">
        <div class="tw-border tw-border-solid tw-rounded tw-border-gray tw-p-10 md:tw-w-1/2">
            <h1 class="tw-text-3xl tw-mb-10">Reset Password</h1>

            @if (session('status'))
                <div class="tw-mb-4">
                    <div class="el-alert el-alert--success is-light">
                        {{ session('status') }}
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
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

                <div class="tw-flex">
                    <button type="submit" class="el-button el-button--primary">
                        Send Password Reset Link
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
