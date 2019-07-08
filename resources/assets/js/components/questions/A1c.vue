<template>
    <div class="tw-flex tw-flex-col tw-items-center">
        <h1 class="tw-mb-10 tw-text-2xl tw-text-gray-600 tw-font-thin tw-text-center">What was your A1C from your last bloodwork?</h1>
        
        <div>
            <el-radio-group v-model="a1c">
                <el-radio-button label="6.9">Less than 7</el-radio-button>
                <el-radio-button label="7.5">Between 7 and 8</el-radio-button>
                <el-radio-button label="8.5">Between 8 and 9</el-radio-button>
                <el-radio-button label="9.5">Between 9 and 10</el-radio-button>
                <el-radio-button label="10.1">Over 10</el-radio-button>
            </el-radio-group>
        </div>

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

