<template>
    <div class="tw-flex tw-flex-col tw-items-center">
        <h1 class="tw-mb-10 tw-text-2xl tw-text-gray-600 tw-font-thin tw-text-center">How much do you weigh (in pounds)?</h1>
        
        <el-input-number class="tw-mb-2" v-model="weight" :min="80" :max="450" :step="5"></el-input-number>

        <p class="tw-mb-10 tw-text-xs tw-text-gray-600 tw-font-thin">Enter your weight or use the plus/minus button.</p>

        <el-button type="primary" @click="setWeight">Next</el-button>
    </div>
</template>

<script>
    import { mapMutations, mapGetters } from 'vuex';
    import range from 'lodash/range';
    import updateMixin from '../mixins/update';

    export default {
        data() {
            return {
                weight: 145
            }
        },

        mixins: [updateMixin],

        methods: {
            ...mapMutations({
                setBasicField: 'typetrue/setBasicField',
                setProgress: 'typetrue/setProgress'
            }),

            setWeight() {
                this.setBasicField({ field: 'pounds', value: this.weight });

                this.updateLead({ weightInPounds: this.weight });

                this.$router.push({ name: 'conditions' });
            }
        },

        mounted() {
            this.setProgress({ value: 75 });
        }
    }
</script>

