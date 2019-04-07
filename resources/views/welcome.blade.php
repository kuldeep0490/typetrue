@extends('layout.master')

@section('content')
    <div class="main">
        <tt-clouds></tt-clouds>
        
        <transition name="slide-fade" appear mode="out-in">
            <router-view></router-view>
        </transition>
    </div>
@endsection
