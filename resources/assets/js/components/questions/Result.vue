<template>
    <div class="tw-flex tw-flex-col tw-items-center">
        <h1 class="tw-mb-10 tw-text-2xl tw-text-gray-600 tw-font-thin tw-text-center">Rating: {{ this.rating }}</h1>
    </div>
</template>

<script>
    import { mapMutations, mapGetters } from 'vuex';
    import calculateMixin from '../mixins/calculate';
    import _ from 'lodash';

    export default {
        mixins: [calculateMixin],

        computed: {
            ...mapGetters({
                'fields': 'typetrue/fields',
                'rating': 'typetrue/rating'
            })
        },

        methods: {
            ...mapMutations({
                'setBMI': 'typetrue/setBMI',
                'setRating': 'typetrue/setRating'
            })
        },

        created() {
            this.calculateA1c();

            this.calculateBMI();

            this.calculateRating();
        }
    }
</script>

