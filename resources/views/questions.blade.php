@extends('layout.main')

@section('content')
    <div class="tw-container tw-mx-auto tw-px-10 tw-flex tw-flex-col">
        <div class="tw-mt-20 negative-z-index">
            <progress-bar />
        </div>

        <div class="tw-flex-1 tw-flex tw-justify-center tw-items-start">
            <router-view></router-view>
        </div>

        <div class="tw-w-full tw-fixed tw-flex tw-justify-between tw-items-center tw-px-10 tw-bg-white" style="bottom: 0px; left: 0px; height: 40px;">
            <p class="tw-text-xs tw-text-gray-600 tw-font-thin">{{ date('Y') }} Type True.</p>

            <p class="tw-text-xs tw-text-gray-600 tw-font-thin">All Rights Reserved.</p>
        </div>
    </div>
@endsection
