<template>
    <div class="tagline formInput">
        <transition name="slide-fade" appear mode="out-in">
            <div v-if="form == 'basic'" key="basic">
                <h1>
                    <svg class="clock" viewBox="0 0 112 135" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <!-- Generator: Sketch 48.2 (47327) - http://www.bohemiancoding.com/sketch -->
                        <desc>Created with Sketch.</desc>
                        <defs></defs>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="happpy-" transform="translate(2.000000, 0.000000)">
                                <path d="M18.7489,61.7412 C5.9029,53.8972 -0.4821,44.5542 0.8489,33.4192" id="Stroke-1" stroke="#538CCF" stroke-width="5.351" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M99.1444,38.7988 C105.6004,25.2028 105.8304,13.8878 98.6224,5.2978" id="Stroke-3" stroke="#538CCF" stroke-width="5.351" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M108.1278,39.521 C114.3808,66.89 97.2638,94.146 69.8948,100.398 C42.5258,106.651 15.2708,89.534 9.0178,62.165 C2.7648,34.797 19.8818,7.542 47.2498,1.288 C74.6188,-4.965 101.8748,12.152 108.1278,39.521" id="Fill-5" fill="#538CCF"></path>
                                <path d="M93.6092,42.8384 C98.0302,62.1884 85.9272,81.4594 66.5782,85.8804 C47.2272,90.3004 27.9572,78.1984 23.5362,58.8484 C19.1152,39.4984 31.2172,20.2284 50.5672,15.8074 C69.9182,11.3854 89.1882,23.4884 93.6092,42.8384" id="Fill-8" fill="#FFFFFF"></path>
                                <path d="M41.4618,45.876 C41.8148,47.419 40.8498,48.956 39.3058,49.309 C37.7628,49.662 36.2258,48.696 35.8728,47.153 C35.5208,45.609 36.4848,44.073 38.0288,43.72 C39.5718,43.367 41.1088,44.333 41.4618,45.876" id="Fill-10" fill="#000000"></path>
                                <path d="M77.6034,37.6181 C77.9564,39.1611 76.9914,40.6991 75.4474,41.0511 C73.9044,41.4041 72.3674,40.4381 72.0144,38.8951 C71.6624,37.3521 72.6264,35.8151 74.1704,35.4621 C75.7134,35.1101 77.2504,36.0751 77.6034,37.6181" id="Fill-12" fill="#000000"></path>
                                <path d="M53.9842,53.9116 L54.0892,54.3846 C54.8372,57.7306 58.1842,59.8566 61.5312,59.1106 C64.8772,58.3636 67.0032,55.0146 66.2552,51.6686 L66.1502,51.1956" id="Stroke-14" stroke="#000000" stroke-width="2.282" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M51.2919,94.2627 C51.9649,97.6077 51.8059,101.2117 50.2589,104.2517 C48.7119,107.2917 45.6259,109.6517 42.2179,109.7787 L43.9259,113.9187" id="Stroke-16" stroke="#538CCF" stroke-width="5.351" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M89.2919,87.2627 C89.9649,90.6077 89.8059,94.2117 88.2589,97.2517 C86.7119,100.2917 83.6259,102.6517 80.2179,102.7787 L81.9259,106.9187" id="Stroke-18" stroke="#538CCF" stroke-width="5.351" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M96.2587,128.7519 C96.2587,131.7899 82.0437,134.2519 64.5087,134.2519 C46.9737,134.2519 32.7587,131.7899 32.7587,128.7519 C32.7587,125.7149 46.9737,123.2519 64.5087,123.2519 C82.0437,123.2519 96.2587,125.7149 96.2587,128.7519" id="Fill-20" fill="#E6E6E6"></path>
                                <path d="M46.6727,55.7461 C46.6727,58.0311 44.8197,59.8841 42.5337,59.8841 C40.2487,59.8841 38.3967,58.0311 38.3967,55.7461 C38.3967,53.4601 40.2487,51.6081 42.5337,51.6081 C44.8197,51.6081 46.6727,53.4601 46.6727,55.7461" id="Fill-22" fill="#FCD4D4"></path>
                                <path d="M81.8143,48.2485 C81.8143,50.5345 79.9613,52.3865 77.6753,52.3865 C75.3903,52.3865 73.5383,50.5345 73.5383,48.2485 C73.5383,45.9635 75.3903,44.1105 77.6753,44.1105 C79.9613,44.1105 81.8143,45.9635 81.8143,48.2485" id="Fill-24" fill="#FCD4D4"></path>
                            </g>
                        </g>
                    </svg>

                    Let's get started!
                </h1>

                <h2>
                    I am a <span class="not-selected" :class="{ 'active': fields[form].gender === 'male' }" @click="selectGender('male')">male</span> <span class="not-selected" :class="{ 'active': fields[form].gender === 'female' }" @click="selectGender('female')">female</span> and I am <input v-model="fields[form].age" type="text" maxlength="2" pattern="\d*" class="input-text input-bigger" @input="validateAge()" onkeypress="return event.charCode >= 48 && event.charCode <= 57"> years old.

                    <transition enter-active-class="animated fadeInDown" leave-active-class="animated fadeOutUp">
                        <p class="error" v-if="errors.age">{{ errors.age }}</p>
                    </transition>
                </h2>

                <h2>
                    I was diagnosed with Type 2 about <input v-model="fields[form].yearsAgo" type="text" maxlength="2" pattern="\d*" class="input-text input-bigger" onkeypress="return event.charCode >= 48 && event.charCode <= 57"> years and <input v-model="fields[form].monthsAgo" type="text" maxlength="2" pattern="\d*" class="input-text input-bigger" @input="validateMonths()" onkeypress="return event.charCode >= 48 && event.charCode <= 57"> months ago.

                    <transition enter-active-class="animated fadeInDown" leave-active-class="animated fadeOutUp">
                        <p class="error" v-if="errors.monthsAgo">{{ errors.monthsAgo }}</p>
                    </transition>
                </h2>

                <h2>
                    I am a <span class="not-selected" :class="{ 'active': fields[form].smoker === 'smoker' }" @click="isSmoker('smoker')">smoker</span> <span class="not-selected" :class="{ 'active': fields[form].smoker === 'nonSmoker' }" @click="isSmoker('nonSmoker')">non-smoker</span>.
                </h2>

                <h2>
                    My last bloodwork showed an A1c of <input v-model="fields[form].a1cA" type="text" maxlength="2" pattern="\d*" class="input-text input-bigger" @input="validateA1c()" onkeypress="return event.charCode >= 48 && event.charCode <= 57">.<input v-model="fields[form].a1cB" type="text" maxlength="1" pattern="\d*" class="input-text" @input="validateA1c()" onkeypress="return event.charCode >= 48 && event.charCode <= 57"><span class="customDot">.</span>

                    <transition enter-active-class="animated fadeInDown" leave-active-class="animated fadeOutUp">
                        <p class="error" v-if="errors.a1c">{{ errors.a1c }}</p>
                    </transition>
                </h2>

                <h2>
                    I'm <input v-model="fields[form].feet" type="text" maxlength="1" pattern="\d*" class="input-text" @input="validateFeet()" onkeypress="return event.charCode >= 48 && event.charCode <= 57"> feet and <input v-model="fields[form].inches" type="text" maxlength="2" pattern="\d*" class="input-text input-bigger" @input="validateInches()" onkeypress="return event.charCode >= 48 && event.charCode <= 57"> inches tall and I weigh <input v-model="fields[form].pounds" type="text" maxlength="3" pattern="\d*" class="input-text input-bigger" @input="validatePounds()" onkeypress="return event.charCode >= 48 && event.charCode <= 57"> pounds.

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

                <button class="btn btn-primary customBtn" @click.prevent="nextForm('advanced')" :disabled="! showNextBtn">Next</button>
            </div>

            <div v-if="form == 'advanced'" key="advanced">
                <h1>
                    <svg class="blood" viewBox="0 0 104 122" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <!-- Generator: Sketch 48.2 (47327) - http://www.bohemiancoding.com/sketch -->
                        <desc>Created with Sketch.</desc>
                        <defs></defs>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="blood-secured">
                                <path d="M102.3707,115.5625 C102.3707,119.1185 79.8357,121.9995 52.0367,121.9995 C24.2377,121.9995 1.7027,119.1185 1.7027,115.5625 C1.7027,112.0065 24.2377,109.1255 52.0367,109.1255 C79.8357,109.1255 102.3707,112.0065 102.3707,115.5625" id="Fill-1" fill="#E6E6E6"></path>
                                <path d="M90.6588,71.8672 C90.6588,96.9012 70.3638,117.1962 45.3298,117.1962 C20.2948,117.1962 -0.0002,96.9012 -0.0002,71.8672 C-0.0002,47.2592 29.3798,15.4432 40.8338,2.0692 C43.1958,-0.6898 47.4628,-0.6898 49.8248,2.0692 C61.2788,15.4432 90.6588,47.2592 90.6588,71.8672" id="Fill-3" fill="#FF6D80"></path>
                                <path d="M29.9019,63.6299 C29.9019,65.2389 28.5969,66.5439 26.9879,66.5439 C25.3789,66.5439 24.0739,65.2389 24.0739,63.6299 C24.0739,62.0209 25.3789,60.7159 26.9879,60.7159 C28.5969,60.7159 29.9019,62.0209 29.9019,63.6299" id="Fill-6" fill="#000000"></path>
                                <path d="M67.5963,63.6299 C67.5963,65.2389 66.2903,66.5439 64.6813,66.5439 C63.0723,66.5439 61.7673,65.2389 61.7673,63.6299 C61.7673,62.0209 63.0723,60.7159 64.6813,60.7159 C66.2903,60.7159 67.5963,62.0209 67.5963,63.6299" id="Fill-8" fill="#000000"></path>
                                <path d="M56.0123,68.2139 C55.6393,70.5649 54.4653,72.6549 52.7833,74.1979 C52.7083,74.2689 52.6313,74.3379 52.5533,74.4039 C52.3863,74.5479 52.2153,74.6879 52.0363,74.8169 C50.3113,76.1339 48.1583,76.9109 45.8343,76.9109 C43.5113,76.9109 41.3583,76.1299 39.6283,74.8199 C39.3723,74.6259 39.1233,74.4159 38.8863,74.1979 C37.2033,72.6549 36.0313,70.5649 35.6583,68.2139 C35.5523,67.5379 36.0763,66.9279 36.7613,66.9279 L54.9083,66.9279 C55.5923,66.9279 56.1163,67.5379 56.0123,68.2139" id="Fill-10" fill="#FFFFFF"></path>
                                <path d="M52.0367,74.8164 C50.3107,76.1334 48.1587,76.9114 45.8347,76.9114 C43.5117,76.9114 41.3577,76.1294 39.6287,74.8204 C41.0007,72.8694 43.2657,71.5904 45.8347,71.5904 C48.3987,71.5904 50.6647,72.8654 52.0367,74.8164" id="Fill-12" fill="#FCD4D4"></path>
                                <path d="M103.649,96.1543 C103.617,95.3243 103.608,94.4733 103.609,93.6263 L103.639,93.6263 L103.638,87.2853 C103.634,85.2103 103.631,83.0643 103.652,80.9693 C103.681,78.4103 102.223,76.5253 99.753,75.9263 C97.347,75.3433 94.894,74.7303 92.521,74.1363 L91.464,73.8723 C89.67,73.4233 87.815,72.9583 85.988,72.5093 C84.938,72.2513 83.791,72.2493 82.759,72.5043 C80.752,72.9963 78.753,73.4963 76.893,73.9633 C74.59,74.5393 71.723,75.2573 68.994,75.9153 C66.523,76.5103 65.056,78.4153 65.067,81.0093 L65.079,83.2663 C65.101,87.6083 65.126,92.0983 65.062,96.4953 C64.999,101.0123 66.451,105.1043 69.378,108.6593 C72.537,112.4913 76.632,115.4253 82.272,117.8933 C82.895,118.1653 83.607,118.3083 84.332,118.3083 C85.075,118.3083 85.819,118.1573 86.484,117.8723 C91.243,115.8233 95.051,113.2593 98.128,110.0373 C101.988,105.9913 103.845,101.3203 103.649,96.1543" id="Fill-14" fill="#20336F"></path>
                                <path d="M83.8482,101.126 C82.9112,102.331 82.1562,102.318 81.2642,101.097 C79.7882,99.078 78.3132,97.061 76.8412,95.041 C76.3432,94.357 76.3482,93.653 76.8472,93.19 C77.3442,92.729 78.0582,92.774 78.6922,93.322 C79.7742,94.26 80.8492,95.206 81.9292,96.146 C82.1032,96.297 82.2892,96.434 82.6452,96.715 C82.7852,96.49 82.8762,96.255 83.0402,96.09 C85.3152,93.8 87.5952,91.515 89.8892,89.244 C90.1362,88.999 90.4572,88.766 90.7842,88.679 C91.3252,88.533 91.8042,88.746 92.0842,89.257 C92.3752,89.784 92.2682,90.286 91.9102,90.746" id="Fill-17" fill="#FFFFFF"></path>
                            </g>
                        </g>
                    </svg>

                    One last thing...
                </h1>

                <h2>
                    I have been diagnosed with <span class="not-selected" :class="{ 'active': ! fields[form].hasComplications }" @click="haveComplications(false)">none</span> <span class="not-selected" :class="{ 'active': fields[form].hasComplications }" @click="haveComplications(true)">some</span> of these conditions:
                </h2>

                <ul>
                    <li>Diabetic neuropathy</li>
                    <li>Chronic kidney disease</li>
                    <li>Stroke or TIAs</li>
                    <li>Coronary artery disease (heart disease)</li>
                </ul>

                <button class="btn btn-primary customBtn" @click.prevent="nextForm('basic')">Back</button>

                <button class="btn btn-primary customBtn" @click.prevent="nextForm('lead')" :disabled="! showNextBtn">Submit</button>
            </div>

            <div v-if="form == 'declined'" key="declined">
                <tt-decline-one v-if="reason === 'decline-one'"></tt-decline-one>

                <tt-decline-two v-if="reason === 'decline-two'"></tt-decline-two>

                <tt-decline-three v-if="reason === 'decline-three'"></tt-decline-three>
            </div>

            <div v-if="form == 'lead'" key="lead">
                <tt-lead-form></tt-lead-form>

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

                <button class="btn btn-primary customBtn" @click.prevent="nextForm('product')" :disabled="! showNextBtn">Get Quote</button>

                <hr>
        
                <p>
                    <small>Your information will be kept secure and confidential and will not be shared with anyone.</small>
                </p>
            </div>
            
            <div class="text-center" v-if="form == 'product'" key="product">
                <tt-product-form :basic="fields.basic" :rating="rating" :lead="lead"></tt-product-form>

                <button class="btn btn-primary customBtn" @click.prevent="nextForm('thanks')">Email Quote</button>

                <hr>
            
                <p><small>These quotes are based on information you entered. Your actual price will be based on the information in your application.</small></p>
            </div>

            <div v-if="form == 'thanks'" key="thanks">
                <tt-thank-you></tt-thank-you>
            </div>
        </transition>
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
    export default {
        data() {
            return {
                info: {
                    first_name: null,
                    last_name: null,
                    email: null,
                    phone: null,
                },
                
                fields: {
                    basic: {
                        age: null,
                        gender: null,
                        yearsAgo: null,
                        monthsAgo: null,
                        smoker: null,
                        a1c: null,
                        a1cA: null,
                        a1cB: null,
                        feet: null,
                        inches: null,
                        pounds: null
                    }, 
                    advanced: {
                        hasComplications: false,
                    }
                },
                bmi: null,
                rating: null,
                reason: null,
                declined: null,

                form: 'basic',
                // form: 'product',
                showNextBtn: false,
                lead: null,
                doNotValidate: [
                    'yearsAgo',
                    'monthsAgo',
                    'a1c',
                    'a1cB'
                ],

                errors: {
                    age: null,
                    monthsAgo: null,
                    a1c: null,
                    feet: null,
                    inches: null,
                    pounds: null,
                },

                hasLeadError: false,

                hasErrors: false,

                FName: false,
                LName: false,
                EMail: false,
                Phone: false,

                reg: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,24}))$/
            }
        },

        watch: {
            info: {
                handler(val, oldVal) {
                    this.showNextBtn = true;
                    this.hasLeadError = false;

                    Object.keys(this.info).forEach((key) => {
                        if (! this.info[key]) {
                            this.showNextBtn = false;

                            this.hasLeadError = true;
                        }

                        if (key === 'email') {
                            if (! this.reg.test(val.email)) {
                                this.showNextBtn = false;

                                this.hasLeadError = true;
                            }
                        }
                    });
                },
                deep: true
            },

            errors: {
                handler(val, oldVal) {
                    this.hasErrors = false;

                    Object.keys(this.errors).forEach((key) => {
                        if (this.errors[key]) {
                            this.hasErrors = true;

                            this.showNextBtn = false;
                        }
                    });
                },
                deep: true
            },

            fields: {
                handler(val, oldVal) {
                    if (this.hasErrors) {
                        this.showNextBtn = false;

                        return;
                    }

                    this.showNextBtn = true;

                    Object.keys(this.fields[this.form]).forEach((key) => {
                        if (! this.fields[this.form][key]) {
                            if (this.doNotValidate.indexOf(key) >= 0) {
                                return;
                            }

                            this.showNextBtn = false;

                            if (key === 'hasComplications') {
                                if (this.fields[this.form][key] !== null) {
                                    this.showNextBtn = true;
                                }
                            }
                        }
                    });
                },
                deep: true
            }
        },

        methods: {
            isEmailValid: function() {
                return this.reg.test(this.info.email);
            },

            validateAge() {
                let age = this.fields.basic.age;

                if (! this.validateNumber('age', age)) {
                    return;
                }

                if (age == '' || parseInt(age) < 25) {
                    this.errors.age = 'Age must be at least 25 to continue.';

                    return;
                }

                if (parseInt(age) > 80) {
                    this.errors.age = 'Age must be less than 81 to continue.';

                    return;
                }

                this.errors.age = null;
            },

            validateMonths() {
                let monthsAgo = this.fields.basic.monthsAgo;

                if (! this.validateNumber('monthsAgo', monthsAgo)) {
                    return;
                }

                if (parseInt(monthsAgo) > 11) {
                    this.errors.monthsAgo = 'Months must be below 12 to continue.';

                    return;
                }

                this.errors.monthsAgo = null;
            },

            validateA1c() {
                this.calculateA1c();

                let a1c = this.fields.basic.a1c;

                if (! this.validateNumber('a1c', a1c)) {
                    return;
                }

                if (parseFloat(a1c) < 4) {
                    this.errors.a1c = 'A1c can not be lower than 4.';

                    return;
                }

                this.errors.a1c = null;
            },

            validateFeet() {
                let feet = this.fields.basic.feet;

                if (! this.validateNumber('feet', feet)) {
                    return;
                }

                if (parseInt(feet) < 4) {
                    this.errors.feet = 'Feet must be over 3 to continue.';

                    return;
                }

                if (parseInt(feet) > 6) {
                    this.errors.feet = 'Feet must be less than 7 to continue.';

                    return;
                }

                this.errors.feet = null;
            },

            validateInches() {
                let inches = this.fields.basic.inches;

                if (! this.validateNumber('inches', inches)) {
                    return;
                }

                if (parseInt(inches) > 11) {
                    this.errors.inches = 'Inches must be lower than 12.';

                    return;
                }

                this.errors.inches = null;
            },

            validatePounds() {
                let pounds = this.fields.basic.pounds;

                if (! this.validateNumber('pounds', pounds)) {
                    return;
                }

                if (parseInt(pounds) < 80) {
                    this.errors.pounds = 'Pounds must be over 80 to continue.';

                    return;
                }

                if (parseInt(pounds) > 450) {
                    this.errors.pounds = 'Pounds must be less than 450 to continue.';

                    return;
                }

                this.errors.pounds = null;
            },

            validateNumber(key, value) {
                if (isNaN(value)) {
                    this.errors[key] = key.toUpperCase() + ' is not a number.';

                    return false;
                }

                return true;
            },

            updateLead() {
                axios.patch('lead/update', {
                    lead_id: this.lead,
                    hasComplications: this.fields.advanced.hasComplications,
                    first_name: this.info.first_name,
                    last_name: this.info.last_name,
                    email: this.info.email,
                    phone: this.info.phone,
                    declined: this.declined,
                    declineReason: this.reason,
                }).then((response) => {

                });
            },

            createLead() {
                axios.post('lead/store', {
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
                    this.lead = response.data.id;
                });
            },

            haveComplications(status) {
                this.fields[this.form].hasComplications = status;
            },

            isSmoker(status) {
                this.fields[this.form].smoker = status;
            },

            selectGender(gender) {
                this.fields[this.form].gender = gender;
            },

            nextForm(form) {
                let proceed = true;

                if (this.form === 'basic') {
                    this.calculateBMI();

                    this.calculateRating();

                    this.createLead();
                }

                if (this.form === 'advanced') {
                    this.showNextBtn = false;

                    this.updateLead();
                }

                if (this.form === 'lead') {
                    if(! this.validate()) {
                        this.declined = true;
                        
                        proceed = false;
                    }

                    this.updateLead();
                }

                if (this.form === 'product') {
                    axios.post('email-quote', {
                        lead_id: this.lead
                    });
                }

                if (proceed) {
                    this.form = form;
                }

                window.scrollTo(0, 0);

                console.log('current form: ' + form);
            },

            calculateMonthsDiagnosed() {
                return ((parseInt(this.fields.basic.yearsAgo) || 0) * 12) + (parseInt(this.fields.basic.monthsAgo) || 0);
            },

            calculateA1c() {
                let a1cDecimal = this.fields.basic.a1cB ? this.fields.basic.a1cB : 0;

                this.fields.basic.a1c = `${this.fields.basic.a1cA}.${a1cDecimal}`;
            },

            calculateRating() {
                let a1c = parseFloat(this.fields.basic.a1c);
                let age = parseInt(this.fields.basic.age);
                let yearsElapseSinceDiagnosis = this.calculateMonthsDiagnosed() / 12;

                // < 30
                if (age < 30) {
                    if (yearsElapseSinceDiagnosis < 7) {
                        this.rating += 100;
                    }

                    if (yearsElapseSinceDiagnosis >= 7 && yearsElapseSinceDiagnosis < 15) {
                        this.rating += 150;
                    }

                    if (a1c < 7.1) {
                        this.rating -= 25;
                    }

                    if (a1c >= 8.1 && a1c < 9.1) {
                        this.rating += 25;
                    }

                    if (a1c >= 9.1 && a1c < 10.1) {
                        this.rating += 75;
                    }
                }

                // 30 - 39
                if (this.fields.basic.age >= 30 && this.fields.basic.age < 40) {
                    if (yearsElapseSinceDiagnosis < 7) {
                        this.rating += 75;
                    }

                    if (yearsElapseSinceDiagnosis >= 7 && yearsElapseSinceDiagnosis < 15) {
                        this.rating += 100;
                    }

                    if (yearsElapseSinceDiagnosis >= 15 && yearsElapseSinceDiagnosis < 25) {
                        this.rating += 125;
                    }

                    if (yearsElapseSinceDiagnosis >= 25) {
                        this.rating += 150;
                    }

                    if (a1c < 7.1) {
                        this.rating -= 25;
                    }

                    if (a1c >= 8.1 && a1c < 9.1) {
                        this.rating += 25;
                    }

                    if (a1c >= 9.1 && a1c < 10.1) {
                        this.rating += 75;
                    }
                }

                // 40 - 49
                if (this.fields.basic.age >= 40 && this.fields.basic.age < 50) {
                    if (yearsElapseSinceDiagnosis < 7) {
                        this.rating += 50;
                    }

                    if (yearsElapseSinceDiagnosis >= 7 && yearsElapseSinceDiagnosis < 15) {
                        this.rating += 75;
                    }

                    if (yearsElapseSinceDiagnosis >= 15 && yearsElapseSinceDiagnosis < 25) {
                        this.rating += 100;
                    }

                    if (yearsElapseSinceDiagnosis >= 25) {
                        this.rating += 125;
                    }

                    if (a1c < 7.1) {
                        this.rating -= 25;
                    }

                    if (a1c >= 8.1 && a1c < 9.1) {
                        this.rating += 25;
                    }

                    if (a1c >= 9.1 && a1c < 10.1) {
                        this.rating += 75;
                    }
                }

                // 50 - 59
                if (this.fields.basic.age >= 50 && this.fields.basic.age < 60) {
                    if (yearsElapseSinceDiagnosis < 7) {
                        this.rating += 25;
                    }

                    if (yearsElapseSinceDiagnosis >= 7 && yearsElapseSinceDiagnosis < 15) {
                        this.rating += 50;
                    }

                    if (yearsElapseSinceDiagnosis >= 15 && yearsElapseSinceDiagnosis < 25) {
                        this.rating += 75;
                    }

                    if (yearsElapseSinceDiagnosis >= 25) {
                        this.rating += 100;
                    }

                    if (a1c < 7.1) {
                        this.rating -= 25;
                    }

                    if (a1c >= 8.1 && a1c < 9.1) {
                        this.rating += 25;
                    }

                    if (a1c >= 9.1 && a1c < 10.1) {
                        this.rating += 75;
                    }
                }

                // 60 - 69
                if (this.fields.basic.age >= 60 && this.fields.basic.age < 70) {
                    if (yearsElapseSinceDiagnosis < 7) {
                        this.rating += 25;
                    }

                    if (yearsElapseSinceDiagnosis >= 7 && yearsElapseSinceDiagnosis < 15) {
                        this.rating += 25;
                    }

                    if (yearsElapseSinceDiagnosis >= 15 && yearsElapseSinceDiagnosis < 25) {
                        this.rating += 50;
                    }

                    if (yearsElapseSinceDiagnosis >= 25) {
                        this.rating += 100;
                    }

                    if (a1c < 7.1) {
                        this.rating -= 25;
                    }

                    if (a1c >= 8.1 && a1c < 9.1) {
                        this.rating += 25;
                    }

                    if (a1c >= 9.1 && a1c < 10.1) {
                        this.rating += 50;
                    }
                }

                // 70 above
                if (this.fields.basic.age >= 70) {
                    if (yearsElapseSinceDiagnosis >= 7 && yearsElapseSinceDiagnosis < 15) {
                        this.rating += 25;
                    }

                    if (yearsElapseSinceDiagnosis >= 15 && yearsElapseSinceDiagnosis < 25) {
                        this.rating += 25;
                    }

                    if (yearsElapseSinceDiagnosis >= 25) {
                        this.rating += 75;
                    }

                    if (a1c < 7.1) {
                        this.rating -= 25;
                    }

                    if (a1c >= 9.1 && a1c < 10.1) {
                        this.rating += 25;
                    }
                }

                // calculate BMI
                if (this.bmi >= 32 && this.bmi < 34) {
                    this.rating += 25;
                }

                if (this.bmi >= 34 && this.bmi < 36) {
                    this.rating += 50;
                }

                if (this.bmi >= 36) {
                    if (this.bmi >= 36 && this.bmi < 41) {
                        this.rating += 75;
                    }

                    if (this.bmi >= 41 && this.bmi < 43) {
                        this.rating += 100;
                    }

                    if (this.a1c > 8) {
                        this.rating += 25;
                    }
                }

                if (this.fields.basic.smoker == 'smoker') {
                    this.rating += 25;
                }
            },

            calculateHeight() {
                return (parseInt(this.fields.basic.feet) * 12) + parseInt(this.fields.basic.inches)
            },

            calculateBMI() {
                this.bmi = (703 * parseInt(this.fields.basic.pounds)) / (Math.pow(this.calculateHeight(), 2));
            },

            validate() {
                // check if has complications
                if (this.fields.advanced.hasComplications) {
                    this.decline('decline-one');

                    return false;
                }

                // check if newly diagnosed
                if (this.calculateMonthsDiagnosed() < 7) {
                    this.decline('decline-two');

                    return false;
                }

                // check if rating passed

                // check if BMI is above 43
                if (this.bmi >= 43) {
                    this.decline('decline-three');

                    return false;
                }

                // check if a1c is more than 10
                if (parseFloat(this.fields.basic.a1c) > 10) {
                    this.decline('decline-three');

                    return false;
                }

                // check if diagnosed more than 15 years ago
                if ((this.calculateMonthsDiagnosed() / 12) >= 15) {
                    this.decline('decline-three');

                    return false;
                }

                return true;
            },

            decline(reason) {
                this.form = 'declined';

                this.reason = reason;
            }
        },
    }
</script>

