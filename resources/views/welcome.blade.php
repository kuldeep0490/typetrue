@extends('layout.master')

@section('content')
    <div class="main" id="cloudsContainer">
        <div class="cloud cloud1">
            @include('assets.cloud')
        </div>
        <div class="cloud cloud2">
            @include('assets.cloud')
        </div>
        <div class="cloud cloud3">
            @include('assets.cloud')
        </div>
        <div class="container">
            <div class="row" v-show="! showForm">
                <div class="col order-sm-2">
                    <div class="tagline">
                        <div v-show="! submitted">
                            <h1>Get <span>the best</span> price on life insurance for T2 diabetics</h1>

                            <p>Imagine getting the same low price as a non-diabetic!</p>

                            <a href="" @click.prevent="showForm = true"> Get your FREE quote</a>
                        </div>

                        <div v-show="submitted">
                            <h1>Thank you for being <span>awesome!</span></h1>

                            <p>One of our colleagues will get back to you shortly. Have a great day!</p>
                        </div>
                    </div>
                </div>
                <div class="col order-sm-1 text-center">
                    @include('assets.banner')
                </div>
            </div>

            <div class="row" v-show="showForm">
                <div class="col">
                    <div class="tagline">
                        <h1>
                            I am <input v-model="fields.age" type="text" maxlength="2" pattern="\d*" placeholder="37" class="input-text"> years old.
                            <br>
                            My last bloodwork showed an A1c of <input v-model="fields.a1c" type="text" maxlength="2" pattern="\d*" placeholder="92" class="input-text">.
                            <br><br>
                            I <span class="not-selected" :class="{ 'active': fields.have }" @click="selectedHave(true)">have</span>/<span class="not-selected"  :class="{ 'active': ! fields.have }" @click="selectedHave(false)">have not</span> been diagnosed with one, or more, of these conditions: Diabetic neuropathy, Chronic kidney disease, Stroke or TIAs, Coronary artery disease (heart disease).
                            <br><br>
                            I'm <input v-model="fields.feet" type="text" maxlength="2" pattern="\d*" placeholder="5" class="input-text"> feet and <input v-model="fields.inches" type="text" maxlength="2" pattern="\d*" placeholder="11" class="input-text"> inches tall and I weight <input v-model="fields.pounds" type="text" maxlength="3" pattern="\d*" placeholder="120" class="input-text"> pounds.
                        </h1>

                        <button class="btn btn-outline-primary float-right" v-show="showSubmit" @click.prevent="submit">Submit</button>
                    </div>
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

@section('footer')
    <script>
        const app = new Vue({
            el: '#app',
            data: {
                showForm: false,
                fields: {
                    age: null,
                    a1c: null,
                    have: false,
                    feet: null,
                    inches: null,
                    pounds: null
                },
                showSubmit: false,
                submitted: false,
            },

            watch: {
                fields: {
                    handler(val, oldVal) {
                        this.showSubmit = true;

                        Object.keys(this.fields).forEach((key) => {
                          if (! this.fields[key]) {
                            if (key != 'have') {
                                this.showSubmit = false;
                            }
                          }
                        });

                        console.log(this.showSubmit);
                    },
                    deep: true
                }
            },

            methods: {
                selectedHave(status) {
                    this.fields.have = status;
                },

                submit() {
                    this.showForm = false;

                    this.submitted = true;
                }
            }
        });

        (function(){
            var allClouds = new TimelineLite();

            function initClouds() {
                for(let i = 1; i < 4; i ++) {
                    let cloud = $('.cloud' + i);
                    
                    TweenLite.set(cloud, { left: Math.random(), top: i * 80, opacity: 0 });

                    let cloudTl = new TimelineMax({ repeat: -1 });

                    cloudTl.to(cloud, 0.5, { opacity: 1 })
                        .to(cloud, 6 + (Math.random() * 50), { left: "100%", ease: Linear.easeNone }, 0)
                        .to(cloud, 0.5, { opacity:0 }, "-=0.5")

                    allClouds.add(cloudTl, Math.random() * 5);
                }
            }

            initClouds();

            setTimeout(function(){ 
                let animations = $('.animated');

                $.each(animations, function() {
                    $(this).attr('class', 'animated');
                });
            }, 10000);
        })();
    </script>
@endsection
