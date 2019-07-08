<template>
    <div class="tw-flex tw-flex-col tw-items-center">
        <h1 class="tw-mb-10 tw-text-2xl tw-text-gray-600 tw-font-thin tw-text-center">Do you have any of the following conditions?</h1>

        <ul class="tw-mb-10 tw-list-disc">
            <li class="tw-text-gray-600">Diabetic neuropathy</li>
            <li class="tw-text-gray-600">Chronic kidney disease</li>
            <li class="tw-text-gray-600">Stroke or TIAs</li>
            <li class="tw-text-gray-600">Coronary artery disease (heart disease)</li>
        </ul>

        <div>
            <el-button @click="setConditionStatus(true)">Yes</el-button>

            <el-button @click="setConditionStatus(false)">No</el-button>
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

            setConditionStatus(status) {
                this.setAdvancedField({ field: 'hasComplications', value: status });

                this.updateLead({ hasComplications: status });

                this.$router.push({ name: 'info'});
            }
        },

        mounted() {
            this.setProgress({ value: 90 });
        }
    }
</script>

