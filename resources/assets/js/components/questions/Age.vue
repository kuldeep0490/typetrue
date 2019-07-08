<template>
    <div class="tw-flex tw-flex-col tw-items-center">
        <h1 class="tw-mb-10 tw-text-2xl tw-text-gray-600 tw-font-thin tw-text-center">How old are you?</h1>
        
        <el-select class="tw-mb-10" v-model="age">
            <el-option
                v-for="number in generateAge"
                :key="`age_${number}`"
                :label="number"
                :value="number">
            </el-option>
        </el-select>

        <el-button type="primary" @click="setAge">Next</el-button>
    </div>
</template>

<script>
    import { mapMutations, mapGetters } from 'vuex';
    import range from 'lodash/range';
    import updateMixin from '../mixins/update';

    export default {
        data() {
            return {
                age: 35,
            }
        },

        mixins: [updateMixin],

        computed: {
            generateAge() {
                return range(25, 82)
            }
        },

        methods: {
            ...mapMutations({
                setBasicField: 'typetrue/setBasicField',
                setProgress: 'typetrue/setProgress'
            }),

            setAge() {
                this.setBasicField({ field: 'age', value: this.age });

                this.updateLead({ age: this.age})

                this.$router.push({ name: 'diagnosed' });
            },
        },

        mounted() {
            this.setProgress({ value: 25 });
        }
    }
</script>

