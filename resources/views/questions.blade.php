@extends('layout.main')

@section('content')
    <div class="tw-container tw-mx-auto tw-px-10 tw-flex tw-justify-center tw-h-screen tw-items-center">
        <div class="tw-flex tw-flex-col tw-w-full">
            <div class="negative-z-index tw-mb-10">
                <progress-bar />
            </div>

            <div class="tw-flex-1 tw-flex tw-justify-center tw-items-start">
                <router-view></router-view>
            </div>
        </div>
    </div>
@endsection
