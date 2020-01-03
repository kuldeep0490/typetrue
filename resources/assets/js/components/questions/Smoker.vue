<template>
    <div class="tw-flex tw-flex-col tw-items-center">
        <h1 class="tw-mb-10 tw-text-2xl tw-text-gray-600 tw-font-thin tw-text-center">Have you smoked in the last 12 months?</h1>

        <div>
            <el-button class="btn-lg text-lg" @click="setSmokerStatus('smoker')">Yes</el-button>

            <el-button class="btn-lg text-lg" @click="setSmokerStatus('nonSmoker')">No</el-button>
        </div>
    </div>
</template>

<script>
    import { mapMutations, mapGetters } from 'vuex';
    import updateMixin from '../mixins/update';

    export default {
        mixins: [updateMixin],

        methods: {
            ...mapMutations({
                setBasicField: 'typetrue/setBasicField',
                setProgress: 'typetrue/setProgress'
            }),

            async setSmokerStatus(smoker) {
                this.setBasicField({ field: 'smoker', value: smoker });

                await this.updateLead({ smoker });

                window.scrollTo(0, 0);

                await this.$router.push({ name: 'a1c'});
            }
        },

        mounted() {
            this.setProgress({ value: 40 });
        }
    }
</script>

