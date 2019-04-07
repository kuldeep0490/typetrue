<template>
    <div class="main">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col col-md-8">
                    <div class="tagline formInput">
                        <h1>
                            <img-clock />

                            Let's get started!
                        </h1>

                        <h2>
                            I am a <span class="not-selected" :class="{ 'active': fields.basic.gender === 'male' }" @click="selectGender('male')">male</span> <span class="not-selected" :class="{ 'active': fields.basic.gender === 'female' }" @click="selectGender('female')">female</span> and I am <input v-model="fields.basic.age" type="text" maxlength="2" pattern="\d*" class="input-text input-bigger" @input="validateAge()" onkeypress="return event.charCode >= 48 && event.charCode <= 57"> years old.

                            <transition enter-active-class="animated fadeInDown" leave-active-class="animated fadeOutUp">
                                <p class="error" v-if="errors.age">{{ errors.age }}</p>
                            </transition>
                        </h2>

                        <h2>
                            I was diagnosed with Type 2 about <input v-model="fields.basic.yearsAgo" type="text" maxlength="2" pattern="\d*" class="input-text input-bigger" onkeypress="return event.charCode >= 48 && event.charCode <= 57"> years and <input v-model="fields.basic.monthsAgo" type="text" maxlength="2" pattern="\d*" class="input-text input-bigger" @input="validateMonths()" onkeypress="return event.charCode >= 48 && event.charCode <= 57"> months ago.

                            <transition enter-active-class="animated fadeInDown" leave-active-class="animated fadeOutUp">
                                <p class="error" v-if="errors.monthsAgo">{{ errors.monthsAgo }}</p>
                            </transition>
                        </h2>

                        <h2>
                            I am a <span class="not-selected" :class="{ 'active': fields.basic.smoker === 'smoker' }" @click="selectSmokerStatus('smoker')">smoker</span> <span class="not-selected" :class="{ 'active': fields.basic.smoker === 'nonSmoker' }" @click="selectSmokerStatus('nonSmoker')">non-smoker</span>.
                        </h2>

                        <h2>
                            My last bloodwork showed an A1c of <input v-model="fields.basic.a1cA" type="text" maxlength="2" pattern="\d*" class="input-text input-bigger" @input="validateA1c()" onkeypress="return event.charCode >= 48 && event.charCode <= 57">.<input v-model="fields.basic.a1cB" type="text" maxlength="1" pattern="\d*" class="input-text" @input="validateA1c()" onkeypress="return event.charCode >= 48 && event.charCode <= 57"><span class="customDot">.</span>

                            <transition enter-active-class="animated fadeInDown" leave-active-class="animated fadeOutUp">
                                <p class="error" v-if="errors.a1c">{{ errors.a1c }}</p>
                            </transition>
                        </h2>

                        <h2>
                            I'm <input v-model="fields.basic.feet" type="text" maxlength="1" pattern="\d*" class="input-text" @input="validateFeet()" onkeypress="return event.charCode >= 48 && event.charCode <= 57"> feet and <input v-model="fields.basic.inches" type="text" maxlength="2" pattern="\d*" class="input-text input-bigger" @input="validateInches()" onkeypress="return event.charCode >= 48 && event.charCode <= 57"> inches tall and I weigh <input v-model="fields.basic.pounds" type="text" maxlength="3" pattern="\d*" class="input-text input-bigger" @input="validatePounds()" onkeypress="return event.charCode >= 48 && event.charCode <= 57"> pounds.

                            <transition enter-active-class="animated fadeInDown" leave-active-class="animated fadeOutUp">
                                <p class="error" v-if="errors.feet">{{ errors.feet }}</p>
                            </transition>

                            <transition enter-active-class="animated fadeInDown" leave-active-class="animated fadeOutUp">
                                <p class="error" v-if="errors.inches">{{ errors.inches }}</p>
                            </transition>

                            <transition enter-active-class="animated fadeInDown" leave-active-class="animated fadeOutUp">
                                <p class="error" v-if="errors.pounds">{{ errors.pounds }}</p>
                            </transition>
                        </h2>
                        
                        <button class="btn btn-primary customBtn" :disabled="disableNextBtn" @click="nextPage">Next</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
    small {
        font-size: 0.7rem;
    }

    .text-input {
        margin-bottom: 1rem;
    }

    .error {
        color: indianred !important;
        font-size: 0.8rem !important;
        display: block;
        padding: 0px;
        margin: 0px !important;
    }

    span.customDot {
        cursor: none !important;
        padding: 0 !important;
        position: relative;
        top: 11px;
        left: 10px;
    }
</style>

<script>
    import ImgClock from '../assets/Clock';
    import {mapGetters, mapMutations} from 'vuex';
    import validationMethodsMixin from '../mixins/validationMethods.js';
    import calculateMixin from '../mixins/calculate.js';
    import _ from 'lodash';

    export default {
        name: 'GetStarted',

        mixins: [validationMethodsMixin, calculateMixin],

        components: {
            ImgClock
        },

        data() {
            return {
                fields: null,
                errors: {
                    age: null,
                    monthsAgo: null,
                    a1c: null,
                    feet: null,
                    inches: null,
                    pounds: null,
                },
                disableNextBtn: true
            }
        },

        watch: {
            fields: {
                handler(val, oldVal) {
                    if (this.hasErrors) {
                        this.disableNextBtn = true;

                        return;
                    }

                    this.disableNextBtn = false;
                    
                    if (this.fields) {
                        Object.keys(this.fields.basic).forEach((key) => {
                            if (! this.fields.basic[key]) {
                                if (this.doNotValidateFields.indexOf(key) >= 0) {
                                    return;
                                }

                                this.disableNextBtn = true;
                            }
                        });
                    }
                },
                deep: true
            }
        },

        computed: {
            ...mapGetters({
                stateFields: 'typetrue/fields',
                doNotValidateFields: 'typetrue/doNotValidateFields',
                bmi: 'typetrue/bmi',
                rating: 'typetrue/rating'
            }),

            hasErrors() {
                let status = false;

                Object.keys(this.errors).forEach((key) => {
                    if (this.errors[key]) {
                        status = true;
                    }
                });

                return status;
            }
        },

        methods: {
            ...mapMutations({
                setFields: 'typetrue/setFields',
                setBMI: 'typetrue/setBMI',
                setRating: 'typetrue/setRating',
                setLeadID: 'typetrue/setLeadID'
            }),

            nextPage() {
                this.setFields(this.fields);

                this.calculateBMI();

                this.calculateRating();

                this.createLead();
            },

            selectGender(gender) {
                this.fields.basic.gender = gender;
            },

            selectSmokerStatus(status) {
                this.fields.basic.smoker = status;
            },

            createLead() {
                axios.post('/lead/store', {
                    age: this.fields.basic.age,
                    gender: this.fields.basic.gender,
                    diagnosedMonthsAgo: this.calculateMonthsDiagnosed(),
                    smoker: this.fields.basic.smoker,
                    heightInInches: this.calculateHeight(),
                    weightInPounds: this.fields.basic.pounds,
                    a1c: this.fields.basic.a1c,
                    bmi: this.bmi,
                    rating: this.rating
                }).then((response) => {
                    window.scrollTo(0, 0);
                    
                    this.setLeadID(response.data.id);

                    this.$router.push('/one-last-thing');
                });
            },
        },

        created() {
            this.fields = _.cloneDeep(this.stateFields);
        }
    }
</script>