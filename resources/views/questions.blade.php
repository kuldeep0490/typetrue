@extends('layout.main')

@section('content')
    <div class="tw-container tw-mx-auto tw-px-10 tw-flex tw-justify-center tw-items-start">
        <div class="tw-flex tw-flex-col tw-w-full tw-mt-40 tw-mb-10">
            <div class="negative-z-index tw-mb-4">
                <progress-bar />
            </div>

            <div class="tw-flex-1 tw-flex tw-justify-center tw-items-start">
                <router-view></router-view>
            </div>
        </div>
    </div>
@endsection
