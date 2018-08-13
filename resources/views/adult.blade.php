@extends('layout.master')

@section('content')
    <div class="main">
        <tt-clouds></tt-clouds>

        <div class="container">
            <div class="row">
                <div class="col col-md-12 headline">
                    <div class="tagline text-center">
                        <div v-show="! submitted">
                            <h1>Get <span>the best</span> price on life insurance for T2 diabetics</h1>

                            <p>Imagine getting the same low price as a non-diabetic!</p>

                            <a href="/get-started" class="btn btn-primary btn-custom"> Get your FREE quote</a>
                        </div>
                    </div>
                </div>
                <div class="col col-md-12 text-center">
                    <img src="/banner.png" alt="" class="banner">
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="caption text-center">Why <span>Type</span>True?</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-4">
                    <div class="widgets">
                        @include('assets.phone')

                        <h3>Fast and accurate online quote</h3>

                        <p>Get a personalized price estimate in minutes.</p>
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="widgets">
                        @include('assets.clock')

                        <h3>Best price guarantee</h3>

                        <p>Find the lowest price for your exact diabetes profile.</p>
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="widgets">
                        @include('assets.blood')

                        <h3>Trusted providers</h3>

                        <p>Buy your policy from leading Canadian insurance companies.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
