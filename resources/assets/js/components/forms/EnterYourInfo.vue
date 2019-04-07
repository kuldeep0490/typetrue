<template>
    <div class="main">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col col-md-8">
                    <div class="tagline formInput">
                        <h1>
                            <img-couple />

                            We need your email so we can send your quote later.
                        </h1>

                        <div class="basicDetails">
                            <form autocomplete="on">
                                <div class="mat-div" :class="{ 'is-active is-completed' : FName }">
                                    <label for="first-name" class="mat-label">First Name</label>
                                    <input id="first-name" class="mat-input" type="text" v-model="info.first_name" @focus="FName = true" @blur="FName = false">
                                </div>

                                <div class="mat-div" :class="{ 'is-active is-completed' : LName }">
                                    <label for="last-name" class="mat-label">Last Name</label>
                                    <input id="last-name" class="mat-input" type="text" v-model="info.last_name" @focus="LName = true" @blur="LName = false">
                                </div>
                                
                                <div class="mat-div" :class="{ 'is-active is-completed' : EMail }">
                                    <label for="email" class="mat-label">Email Address</label>
                                    <input id="email" class="mat-input" type="email" v-model="info.email" @focus="EMail = true" @blur="EMail = false">
                                </div>

                                <div class="mat-div" :class="{ 'is-active is-completed' : Phone }">
                                    <label for="phone" class="mat-label">Phone Number</label>
                                    <input id="phone" class="mat-input" type="text" v-model="info.phone" @focus="Phone = true" @blur="Phone = false">
                                </div>
                            </form>

                            <transition enter-active-class="animated fadeInDown" leave-active-class="animated fadeOutUp">
                                <p class="error" v-if="hasLeadError">All fields are required and email must be in valid format.</p>
                            </transition>
                        </div>

                        <button class="btn btn-primary customBtn" @click.prevent="nextPage" :disabled="disableNextBtn">Get Quote</button>

                        <hr>
                
                        <p>
                            <small>Your information will be kept secure and confidential and will not be shared with anyone.</small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ImgCouple from '../assets/Couple';
    import {mapGetters, mapMutations} from 'vuex';
    import _ from 'lodash';

    export default {
        name: 'EnterYourInfo',

        components: {
            ImgCouple
        },

        watch: {
            info: {
                handler(val, oldVal) {
                    this.disableNextBtn = false;

                    this.hasLeadError = false;

                    Object.keys(this.info).forEach((key) => {
                        if (! this.info[key]) {
                            this.disableNextBtn = true;

                            this.hasLeadError = true;
                        }

                        if (key === 'email') {
                            if (! this.reg.test(val.email)) {
                                this.disableNextBtn = true;

                                this.hasLeadError = true;
                            }
                        }
                    });
                },
                deep: true
            },
        },

        data() {
            return {
                info: null,
                FName: false,
                LName: false,
                EMail: false,
                Phone: false,
                disableNextBtn: true,
                hasLeadError: false,
                reg: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,24}))$/
            }
        },

        computed: {
            ...mapGetters({
                stateInfo: 'typetrue/info',
                leadID: 'typetrue/leadID',
                fields: 'typetrue/fields',
                declined: 'typetrue/declined',
                reason: 'typetrue/reason',
                bmi: 'typetrue/bmi'
            })
        },

        methods: {
            ...mapMutations({
                setDeclineReason: 'typetrue/setDeclineReason'
            }),

            nextPage() {
                this.validate();

                this.updateLead();
            },

            updateLead() {
                axios.patch('lead/update', {
                    lead_id: this.leadID,
                    hasComplications: this.fields.advanced.hasComplications,
                    first_name: this.info.first_name,
                    last_name: this.info.last_name,
                    email: this.info.email,
                    phone: this.info.phone,
                    declined: this.declined,
                    declineReason: this.reason,
                }).then((response) => {
                    if (this.reason == 'decline-one') {

                    }
                });
            },
        },

        created() {
            this.info = _.clone(this.stateInfo);
        }
    }
</script>

