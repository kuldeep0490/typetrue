<template>
    <div class="tw-flex tw-flex-col tw-items-center">
        <h1 class="tw-mb-10 tw-text-2xl tw-text-gray-600 tw-font-thin tw-text-center">What is your gender?</h1>

        <div>
            <el-button @click="setGender('male')">Male</el-button>

            <el-button @click="setGender('female')">Female</el-button>
        </div>
    </div>
</template>

<script>
    import { mapMutations, mapGetters, mapActions } from 'vuex';
    export default {
        methods: {
            ...mapActions({
                createLead: 'typetrue/createLead'
            }),

            ...mapMutations({
                setBasicField: 'typetrue/setBasicField',
                setProgress: 'typetrue/setProgress',
            }),

            setGender(gender) {
                this.setBasicField({ field: 'gender', value: gender });

                this.createLead({ gender });

                this.$router.push({ name: 'age'});
            }
        },

        mounted() {
            this.setProgress({ value: 10 });
        }
    }
</script>

