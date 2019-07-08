<template>
    <div class="tw-flex tw-flex-col tw-items-center">
        <h1 class="tw-mb-10 tw-text-2xl tw-text-gray-600 tw-font-thin tw-text-center">What was your A1C from your last bloodwork?</h1>

        <el-select class="tw-mb-10" v-model="a1c" placeholder="Select your A1C range">
            <el-option
                value="6.9"
                label="Less than 7">
            </el-option>
            <el-option
                value="7.5"
                label="Between 7 and 8">
            </el-option>
            <el-option
                value="8.5"
                label="Between 8 and 9">
            </el-option>
            <el-option
                value="9.5"
                label="Between 9 and 10">
            </el-option>
            <el-option
                value="10.1"
                label="Over 10">
            </el-option>
        </el-select>

        <el-button type="primary" v-if="a1c" @click="proceed">Next</el-button>
    </div>
</template>

<script>
    import { mapMutations, mapGetters } from 'vuex';
    import updateMixin from '../mixins/update';
    import calculateMixin from '../mixins/calculate';

    export default {
        data() {
            return {
                a1c: null
            }
        },

        mixins: [calculateMixin, updateMixin],

        watch: {
            a1c(newVal) {
                const a1cArray = newVal.split('.');

                this.setA1c(a1cArray[0], a1cArray[1]);
            }
        },

        computed: {
            ...mapGetters({
                fields: 'typetrue/fields'
            })
        },

        methods: {
            ...mapMutations({
                setBasicField: 'typetrue/setBasicField',
                setProgress: 'typetrue/setProgress'
            }),

            setA1c(high, low) {
                this.setBasicField({ field: 'a1cA', value: high });

                this.setBasicField({ field: 'a1cB', value: low });
            },

            proceed() {
                this.calculateA1c();

                this.updateLead({ a1c: this.fields.basic.a1c });

                this.$router.push({ name: 'height' });
            }
        },

        mounted() {
            this.setProgress({ value: 50 });
        }
    }
</script>

