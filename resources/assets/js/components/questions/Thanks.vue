<template>
    <div class="tw-flex tw-flex-col tw-items-center">
        <h1 class="tw-mb-10 tw-text-2xl tw-text-gray-600 tw-font-thin md:tw-w-1/2">Thank you for taking the time to build your quote</h1>
        
        <p class="tw-mb-10 tw-text-gray-600 tw-font-thin md:tw-w-1/2">Based on the information you provided, we have emailed you a quote to get life insurance coverage for your loved ones.</p>

        <p class="tw-mb-10 tw-text-gray-600 tw-font-thin md:tw-w-1/2">TypeTrue uses cutting edge technology to help type 2 diabetics buy insurance faster, easier and at a lower cost than any other alternative. You’ve already experienced how easy it is to get a quote. We optimized all of the next steps in a similar fashion.</p>

        <p class="tw-mb-10 tw-text-gray-600 tw-font-thin md:tw-w-1/2">For more information on how to obtain the best price on life insurance for type 2 diabetics, contact us at</p>

        <address class="md:tw-w-1/2 tw-text-lg text-blue tw-font-thin tw-font-bold">
            1-877-TYPE-TRU<br>
            1-877-897-3878<br>
            <a href="mailto:info@typetrue.com">info@typetrue.com</a>
        </address>
    </div>
</template>

<script>
    import { mapMutations, mapGetters } from 'vuex';

    export default {
        methods: {
            ...mapMutations({
                setProgress: 'typetrue/setProgress'
            }),
        },

        computed: {
            ...mapGetters({
                leadID: 'typetrue/leadID',
            }),
        },

        created() {
            if (! this.leadID) {
                this.$router.push({ name: 'gender' });
            }

            this.setProgress({ value: 100 });

            setTimeout(() => {
                axios.post('email-quote', {
                    lead_id: this.leadID
                });
            }, 2000);
        }
    }
</script>

