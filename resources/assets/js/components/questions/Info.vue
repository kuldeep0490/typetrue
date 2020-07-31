<template>
    <div class="tw-flex tw-flex-col tw-items-center">
        <h1 class="tw-mb-10 tw-text-2xl tw-text-gray-600 tw-font-thin tw-text-center">Enter your information and we will instantly email you a free quote.</h1>

        <div class="tw-mb-5 tw-w-full">
            <el-input placeholder="First Name" v-model="info.first_name"></el-input>

            <p class="tw-text-xs tw-text-red-700 tw-font-thin tw-mt-1 tw-text-left" v-if="! info.first_name">First name is required</p>
        </div>

        <div class="tw-mb-5 tw-w-full">
            <el-input placeholder="Last Name" v-model="info.last_name"></el-input>

            <p class="tw-text-xs tw-text-red-700 tw-font-thin tw-mt-1 tw-text-left" v-if="! info.last_name">Last name is required</p>
        </div>

        <div class="tw-mb-5 tw-w-full">
            <el-input placeholder="Email Address":value="info.email" @input="setEmail"></el-input>

            <p class="tw-text-xs tw-text-red-700 tw-font-thin tw-mt-1 tw-text-left" v-if="! deliverableEmail">Please enter a valid email</p>
        </div>

        <div class="tw-mb-5 tw-w-full">
            <el-input class="tw-mb-5" placeholder="Phone Number" v-model="info.phone" type="tel" v-mask="'+1 (###) ###-####'"></el-input>

            <p class="tw-text-xs tw-text-red-700 tw-font-thin tw-mt-1 tw-text-left" v-if="! validPhone">Please enter a valid phone number</p>
        </div>

        <p class="tw-mb-10 tw-text-xs tw-text-gray-600 tw-font-thin tw-text-center">Your information will be kept secure and confidential and will not be shared with anyone.</p>

        <el-button class="custom-button btn-lg text-lg tw-inline-block" @click="setInformation" v-if="hasInfo">Get Quote</el-button>
    </div>
</template>

<script>
    import { mapMutations, mapGetters } from 'vuex';
    import updateMixin from '../mixins/update';
    import { mask } from 'vue-the-mask';
    import debounce from 'lodash/debounce';

    export default {
        mixins: [updateMixin],

        directives: { mask },

        data() {
            return {
                isEmailValid: false,
                info: {
                    first_name: null,
                    last_name: null,
                    email: null,
                    phone: null
                },
                emailReg: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,24}))$/,
                phoneReg: /^\+1 \([1-9][0-9][0-9]\) [1-9][0-9][0-9]-[0-9][0-9][0-9][0-9]$/
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
                        if (! this.validEmail) {
                            status = false;
                        }
                    }

                    if (field === 'phone') {
                        if (! this.validPhone) {
                            status = false;
                        }
                    }
                });

                return status;
            },

            validEmail() {
                return this.emailReg.test(this.info.email);
            },

            deliverableEmail() {
                return this.validEmail && this.isEmailValid;
            },

            validPhone() {
                return this.phoneReg.test(this.info.phone);
            }
        },

        methods: {
            ...mapMutations({
                setInfo: 'typetrue/setInfo',
                setProgress: 'typetrue/setProgress',
            }),

            setEmail(value) {
                this.info.email = value;

                if (this.validEmail) {
                     this.checkEmail();
                }
            },

            checkEmail: debounce(function() {
                axios.get('/email-validate/' + this.info.email).then((result) => {
                   this.isEmailValid = result && result.data && result.data.result === 'deliverable';
                });
            }, 1000),

            async setInformation() {
                this.setInfo(this.info);

                await this.updateLead({ ...this.info });

                window.scrollTo(0, 0);

                await this.$router.push({ name: 'products'});
            }
        },

        mounted() {
            this.setProgress({ value: 95 });
        }
    }
</script>

