<template>
    <div class="tw-flex tw-flex-col tw-items-center">
        <h1 class="tw-mb-10 tw-text-2xl tw-text-gray-600 tw-font-thin tw-text-center">We need your email so we can send your quote later.</h1>

        <el-input class="tw-mb-5" placeholder="First Name" v-model="info.first_name"></el-input>

        <el-input class="tw-mb-5" placeholder="Last Name" v-model="info.last_name"></el-input>

        <el-input class="tw-mb-5" placeholder="Email Address" v-model="info.email"></el-input>

        <el-input class="tw-mb-5" placeholder="Phone Number" v-model="info.phone"></el-input>

        <p class="tw-mb-10 tw-text-xs tw-text-gray-600 tw-font-thin tw-text-center">Your information will be kept secure and confidential and will not be shared with anyone.</p>

        <el-button type="primary" @click="setInformation" v-if="hasInfo">Get Quote</el-button>
    </div>
</template>

<script>
    import { mapMutations, mapGetters } from 'vuex';
    import updateMixin from '../mixins/update';

    export default {
        mixins: [updateMixin],

        data() {
            return {
                info: {
                    first_name: null,
                    last_name: null,
                    email: null,
                    phone: null,
                },
                reg: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,24}))$/
            }
        },

        computed: {
            hasInfo() {
                let status = true;

                Object.keys(this.info).forEach((field) => {
                    if (! this.info[field]) {
                        status = false;
                    }

                    if (field === 'email') {
                        if (! this.reg.test(this.info[field])) {
                            status = false;
                        }
                    }
                });

                return status;
            }
        },

        methods: {
            ...mapMutations({
                setInfo: 'typetrue/setInfo',
                setProgress: 'typetrue/setProgress',
            }),

            setInformation() {
                this.setInfo(this.info);

                this.updateLead({ ...this.info });

                this.$router.push({ name: 'products'});
            }
        },

        mounted() {
            this.setProgress({ value: 95 });
        }
    }
</script>

