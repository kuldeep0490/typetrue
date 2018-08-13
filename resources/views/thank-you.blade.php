@extends('layout.master')

@section('content')
    <div class="main">
        <tt-clouds></tt-clouds>

        <div class="container">
            <div class="row" v-show="! showForm">
                <div class="col col-md-12 headline">
                    <div class="tagline text-center">
                        <div v-show="submitted">
                            <h1>Thank you for being <span>awesome!</span></h1>

                            <p>One of our colleagues will get back to you shortly. Have a great day!</p>
                        </div>
                    </div>
                </div>
                <div class="col col-md-12 text-center">
                    @include('assets.banner')
                </div>
            </div>
        </div>
    </div>
@endsection