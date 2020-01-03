<template>
    <div class="tw-flex tw-flex-col tw-items-center">
        <h1 class="tw-mb-10 tw-text-2xl tw-text-gray-600 tw-font-thin tw-text-center">Do you have any of the following conditions?</h1>

        <ul class="tw-mb-10 tw-text-center">
            <li class="tw-text-gray-600 text-lg">Diabetic neuropathy</li>
            <li class="tw-text-gray-600 text-lg">Chronic kidney disease</li>
            <li class="tw-text-gray-600 text-lg">Stroke or TIAs</li>
            <li class="tw-text-gray-600 text-lg">Coronary artery disease (heart disease)</li>
        </ul>

        <div>
            <el-button class="btn-lg text-lg" @click="setConditionStatus(true)">Yes</el-button>

            <el-button class="btn-lg text-lg" @click="setConditionStatus(false)">No</el-button>
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
                setAdvancedField: 'typetrue/setAdvancedField',
                setProgress: 'typetrue/setProgress'
            }),

            async setConditionStatus(status) {
                this.setAdvancedField({ field: 'hasComplications', value: status });

                await this.updateLead({ hasComplications: status });

                window.scrollTo(0, 0);

                await this.$router.push({ name: 'info'});
            }
        },

        mounted() {
            this.setProgress({ value: 90 });
        }
    }
</script>

