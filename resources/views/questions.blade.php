@extends('layout.main')

@section('content')
    <div class="tw-container tw-mx-auto tw-p-10 tw-flex tw-flex-col tw-h-screen">
        <div>
            <p class="tw-mb-10">
                <a href="{{ url('/') }}">@include('assets.logo_v3')</a>
            </p>

            <progress-bar />
        </div>

        <div class="tw-flex-1 tw-flex tw-justify-center tw-items-start">
            <transition name="el-fade-in-linear" appear mode="out-in">
                <router-view></router-view>
            </transition>
        </div>

        <p style="position: fixed; bottom: 20px; left: 20px;" class="tw-text-xs tw-text-gray-600 tw-font-thin">{{ date('Y') }} Type True.</p>

        <p style="position: fixed; bottom: 20px; right: 20px;" class="tw-text-xs tw-text-gray-600 tw-font-thin">All Rights Reserved.</p>

        <true-help image="{{ asset('question.png') }}" />
    </div>
@endsection
