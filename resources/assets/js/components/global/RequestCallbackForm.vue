<template>
    <div>
        <div class="tw-mb-5" v-if="requestACallbackSent">
            <el-alert
                    title="Thank you for your feedback!"
                    type="success"
                    description="We'll get in touch with you as soon as possible."
                    show-icon>
            </el-alert>
        </div>

        <div class="tw-flex tw-flex-col md:tw-flex-row tw--mx-2">
            <div class="md:tw-w-1/2 tw-mx-2">
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
                    <el-input placeholder="Phone Number" v-model="info.phone" type="tel" v-mask="'+1 (###) ###-####'"></el-input>

                    <p class="tw-text-xs tw-text-red-700 tw-font-thin tw-mt-1 tw-text-left" v-if="! validPhone">Please enter a valid phone number</p>
                </div>
            </div>

            <div class="md:tw-w-1/2 tw-mx-2">
                <div class="tw-w-full">
                    <el-input class="tw-mb-5" placeholder="(Optional) Enter addiotional notes" v-model="info.comment" type="textarea" rows="8"></el-input>
                </div>

                <p class="tw-mb-6 tw-text-xs tw-text-gray-600 tw-font-thin tw-text-center">Your information will be kept secure and confidential and will not be shared with anyone.</p>

                <p class="tw-text-right">
                    <el-button class="custom-button-blue btn-lg text-lg tw-inline-block" :disabled="sending" @click="send" v-if="hasInfo">Submit</el-button>
                </p>
            </div>
        </div>
    </div>
</template>

<script>
    import debounce from 'lodash/debounce';
    import { mask } from 'vue-the-mask';

    export default {
        name: 'RequestCallbackForm',

        directives: { mask },

        data() {
            return {
                requestACallbackSent: false,
                sending: false,
                isEmailValid: false,
                info: {
                    first_name: null,
                    last_name: null,
                    email: null,
                    phone: null,

                },
                emailReg: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,24}))$/,
                phoneReg: /^\+1 \([1-9][0-9][0-9]\) [1-9][0-9][0-9]-[0-9][0-9][0-9][0-9]$/
            }
        },

        computed: {
            hasInfo() {
                let status = true;

                Object.keys(this.info).forEach((field) => {
                    if (! this.info[field] && field !== 'comment') {
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
            send() {
                this.sending = true;

                axios.post('/request-callback', this.info).then((result) => {
                    if(result && result.data && result.data.status === 'success') {
                        this.requestACallbackSent = true;

                        this.info.first_name = null;
                        this.info.last_name = null;
                        this.info.email = null;
                        this.info.phone = null;
                        this.info.comment = '';
                    }
                }).finally(() => this.sending = false);
            },

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
        }
    }
</script>

