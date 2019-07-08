<template>
    <div class="tw-flex tw-flex-col tw-items-center">
        <h1 class="tw-mb-10 tw-text-2xl tw-text-gray-600 tw-font-thin tw-text-center">How tall are you?</h1>

        <el-select v-model="height" placeholder="Select">
            <el-option
                v-for="item in options"
                :key="item.value"
                :label="item.label"
                :value="item.value">
            </el-option>
        </el-select>
    </div>
</template>

<script>
    import { mapMutations, mapGetters } from 'vuex';
    import updateMixin from '../mixins/update';
    import calculateMixin from '../mixins/calculate';

    export default {
        mixins: [updateMixin, calculateMixin],

        data() {
            return {
                height: null,
                options: [
                    {
                        value: '4.10',
                        label: '4\'10"'
                    },
                    {
                        value: '4.11',
                        label: '4\'11"'
                    },
                    {
                        value: '5.0',
                        label: '5\'0"'
                    },
                    {
                        value:  '5.1',
                        label: '5\'1"'
                    },
                    {
                        value: '5.2',
                        label: '5\'2"'
                    },
                    {
                        value: '5.3',
                        label: '5\'3"'
                    },
                    {
                        value: '5.4',
                        label: '5\'4"'
                    },
                    {
                        value: '5.5',
                        label: '5\'5"'
                    },
                    {
                        value: '5.6',
                        label: '5\'6"'
                    },
                    {
                        value: '5.7',
                        label: '5\'7"'
                    },
                    {
                        value: '5.8',
                        label: '5\'8"'
                    },
                    {
                        value: '5.9',
                        label: '5\'9"'
                    },
                    {
                        value: '5.10',
                        label: '5\'10"'
                    },
                    {
                        value: '5.11',
                        label: '5\'11"'
                    },
                    {
                        value: '6.0',
                        label: '6\'0"'
                    },
                    {
                        value: '6.1',
                        label: '6\'1"'
                    },
                    {
                        value: '6.2',
                        label: '6\'2"'
                    },
                    {
                        value: '6.3',
                        label: '6\'3"'
                    },
                    {
                        value: '6.4',
                        label: '6\'4"'
                    },
                    {
                        value: '6.5',
                        label: '6\'5"'
                    },
                    {
                        value: '6.6',
                        label: '6\'6"'
                    },
                    {
                        value: '6.7',
                        label: 'Other'
                    },
                ]
            }
        },

        watch: {
            height(newVal) {
                const heightArray = newVal.split('.');

                this.setHeight(heightArray[0], heightArray[1]);
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

            setHeight(high, low) {
                this.setBasicField({ field: 'feet', value: high });

                this.setBasicField({ field: 'inches', value: low });

                this.updateLead({ heightInInches: this.calculateHeight() });

                this.$router.push({ name: 'weight' });
            },
        },

        mounted() {
            this.setProgress({ value: 60 });
        }
    }
</script>

