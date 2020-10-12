<template>
    <div>
        <h1 class="tw-mb-10 tw-text-2xl tw-text-gray-600 tw-font-thin tw-text-center">Enter your information and we will instantly email you a free quote.</h1>

        <div class="tw-flex tw-flex-col md:tw-flex-row tw-mb-5">
            <div class="tw-flex tw-flex-col tw-items-center md:tw-w-2/3">
                <div class="tw-mb-5 tw-w-full">
                    <el-input placeholder="First Name" v-model="info.full_name"></el-input>
                </div>

                <div class="tw-mb-5 tw-w-full">
                    <el-input placeholder="Email Address":value="info.email" @input="setEmail"></el-input>

                    <p class="tw-text-xs tw-text-red-700 tw-font-thin tw-mt-1 tw-text-left" v-if="! deliverableEmail">Please enter a valid email</p>
                </div>

                <div class="tw-w-full">
                    <el-input class="tw-mb-5" placeholder="Phone Number" v-model="info.phone" type="tel" v-mask="'+1 (###) ###-####'"></el-input>
                </div>
            </div>

            <div class="md:tw-w-1/3 tw-justify-center tw-flex tw-items-center tw-flex-col">
                <img alt="30 day money-back guarantee" src="https://typetrue.ca/images/money-back-logo.png" class="tw-inline-block">

                <img alt="Click for the BBB Business Review of this Insurance - Life in North York ON" src="https://typetrue.ca/images/bbb-logo.png" class="tw-inline-block bbb-logo">
            </div>
        </div>

        <p class="tw-mb-10 tw-text-xs tw-text-gray-600 tw-font-thin tw-text-center">Your information will be kept secure and confidential and will not be shared with anyone.</p>

        <p class="tw-text-center"><el-button class="custom-button btn-lg text-lg tw-inline-block" @click="setInformation" v-if="hasInfo">Get Quote</el-button></p>
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
                    full_name: null,
                    first_name: null,
                    last_name: null,
                    email: null,
                    phone: null
                },
                validateFields: ['email'],
                emailReg: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,24}))$/,
                phoneReg: /^\+1 \([1-9][0-9][0-9]\) [1-9][0-9][0-9]-[0-9][0-9][0-9][0-9]$/
            }
        },

        computed: {
            hasInfo() {
                let status = true;

                this.validateFields.forEach((field) => {
                    console.log(field);
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

                console.log(status);

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

