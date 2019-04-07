<template>
    <div>
        <div class="main">
            <div class="container">
                <div class="row">
                    <div class="col col-12 headline">
                        <div class="tagline text-center">
                            <div>
                                <h1>Get <span>the best</span> price on life insurance for T2 diabetics</h1>

                                <p>Imagine getting the same low price as a non-diabetic!</p>

                                <router-link to="/get-started" class="btn btn-primary btn-custom">Get your FREE quote</router-link>
                            </div>
                        </div>
                    </div>
                    <div class="col col-12 text-center">
                        <img src="/banner.png" alt="" class="banner">
                    </div>
                </div>
            </div>
        </div>

        <div class="sponsors">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <p>As heard on</p>
                        <a href="https://www.thetonic.ca/2018/10/27/51-the-challenges-of-getting-life-insurance-if-youre-type-2-diabetic-the-connection-between-mindfulness-and-grace-the-signs-you-shouldnt-eat-at-that-restaurant-and-health-literacy-month/?fbclid=IwAR2mlGmRUEPi040ifXKwYZkuzcsWcrGWaaHJtnxX-NtTtRyh02cT4O3zmco" target="_blank">
                            <img src="/zoomer.png" alt="" class="grayscale">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="content three-blocks">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h2 class="caption text-center">Why <span>Type</span>True?</h2>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-sm-4">
                        <div class="widgets">
                            <img-phone />

                            <h3>Fast and accurate online quote</h3>

                            <p>Get a personalized price estimate in minutes.</p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="widgets">
                            <img-clock />

                            <h3>Best price guarantee</h3>

                            <p>Find the lowest price for your exact diabetes profile.</p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="widgets">
                            <img-blood />

                            <h3>Trusted providers</h3>

                            <p>Buy your policy from leading Canadian insurance companies.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped lang="scss">
    .three-blocks {
        background: #FFF;
    }
</style>


<script>
    import ImgPhone from './assets/Phone';
    import ImgClock from './assets/Clock';
    import ImgBlood from './assets/Blood';

    export default {
        components: {
            ImgPhone,
            ImgClock,
            ImgBlood
        },
    }
</script>

