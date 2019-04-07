<template>
    <div class="main">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col col-md-8">
                    <div class="tagline formInput">
                        <decline-one v-if="reason === 'decline-one'" />

                        <decline-two v-if="reason === 'decline-two'" />

                        <decline-three v-if="reason === 'decline-three'" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';
    import DeclineOne from './DeclineOne';
    import DeclineTwo from './DeclineTwo';
    import DeclineThree from './DeclineThree';
    
    export default {
        name: 'Sorry',

        components: {
            DeclineOne,
            DeclineTwo,
            DeclineThree
        },

        computed: {
            ...mapGetters({
                reason: 'typetrue/reason'
            })
        }
    }
</script>

