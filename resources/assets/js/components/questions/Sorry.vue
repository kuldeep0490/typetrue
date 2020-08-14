<template>
    <div class="tw-flex tw-flex-col tw-items-center">
        <h1 class="tw-mb-10 tw-text-2xl tw-text-gray-600 tw-font-thin md:tw-w-1/2">{{ title }}</h1>
        
        <p class="tw-mb-10 tw-text-gray-600 tw-font-thin md:tw-w-1/2">{{ description }}</p>
    </div>
</template>

<script>
    import { mapGetters, mapMutations } from 'vuex';

    export default {
        data() {
            return {
                results: {
                    'decline-one': {
                        'title': 'Sorry. Your diabetic complications would very likely lead to a decline if you applied for medical exam life insurance.',
                        'description': 'You are likely a good candidate for no-medical-exam life insurance or guaranteed issue life insurance. Over time it may well be possible to lower your cost by improving your type two control or lifestyle. We’re glad to help you with your life insurance now and in the future.'
                    },

                    'decline-two': {
                        'title': 'Sorry. Your diabetes diagnosis is too recent for you to apply for a medical exam life insurance.',
                        'description': 'You are likely a good candidate for no-medical-exam life insurance or guaranteed issue life insurance. Once you diagnosis is definite an you can should improvement in your T2 control and lifestyle, changing to a medical exam policy may be a good option to lower your cost. After that, over time it may well be possible to lower your cost even more by improving your type two control or lifestyle. We’re glad to help you with your life insurance now and in the future.'
                    },

                    'decline-three': {
                        'title': 'Sorry. Your diabetes control or build would likely lead to a decline if you applied for medical exam life insurance.',
                        'description': 'You are likely a good candidate for no-medical-exam life insurance or guaranteed issue life insurance. After that, over time it may well be possible to lower your cost by improving your type two control or lifestyle. We’re glad to help you with your life insurance now and in the future.'
                    },
                }
            }
        },

        methods: {
            ...mapMutations({
                setProgress: 'typetrue/setProgress'
            })
        },

        computed: {
            ...mapGetters({
                reason: 'typetrue/reason'
            }),

            title() {
                return this.results[this.reason].title
            },

            description() {
                return this.results[this.reason].description
            }
        },

        created() {
            if (! this.reason) {
                this.$router.push({ name: 'gender' });
            }
            
            this.setProgress({ value: 100 });
        }
    }
</script>

