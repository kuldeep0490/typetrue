<template>
    <div class="main">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col col-md-8">
                    <div class="tagline formInput">
                        <h1>
                            <img-blood />

                            One last thing...
                        </h1>

                        <h2>
                            I have been diagnosed with <span class="not-selected" :class="{ 'active': ! fields.advanced.hasComplications }" @click="setComplications(false)">none</span> <span class="not-selected" :class="{ 'active': fields.advanced.hasComplications }" @click="setComplications(true)">some</span> of these conditions:
                        </h2>

                        <ul>
                            <li>Diabetic neuropathy</li>
                            <li>Chronic kidney disease</li>
                            <li>Stroke or TIAs</li>
                            <li>Coronary artery disease (heart disease)</li>
                        </ul>

                        <button class="btn btn-primary customBtn" @click.prevent="prevPage">Back</button>

                        <button class="btn btn-primary customBtn" @click.prevent="nextPage">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ImgBlood from '../assets/Blood';
    import {mapGetters, mapMutations} from 'vuex';
    import calculateMixin from '../mixins/calculate.js';
    import redirectMixin from '../mixins/redirect.js';

    export default {
        name: 'OneLastThing',

        mixins: [calculateMixin, redirectMixin],

        data() {
            return {
                fields: null,
                info: null
            }
        },

        components: {
            ImgBlood
        },

        computed: {
            ...mapGetters({
                stateFields: 'typetrue/fields',
                leadID: 'typetrue/leadID',
                bmi: 'typetrue/bmi',
                declined: 'typetrue/declined',
                reason: 'typetrue/reason'
            })
        },

        methods: {
            ...mapMutations({
                setFields: 'typetrue/setFields',
                setDeclineReason: 'typetrue/setDeclineReason'
            }),

            setComplications(status) {
                this.fields.advanced.hasComplications = status;
            },

            prevPage() {
                this.$router.push('/get-started');
            },

            nextPage() {
                this.setFields(this.fields);

                this.validate();

                this.updateLead();
            },

            updateLead() {
                axios.patch('/lead/update', {
                    lead_id: this.leadID,
                    hasComplications: this.fields.advanced.hasComplications,
                    declined: this.declined,
                    declineReason: this.reason,
                }).then((response) => {
                    window.scrollTo(0, 0);

                    if (this.declined) {
                        this.$router.push('/sorry');

                        return;
                    }

                    this.$router.push('/enter-your-info');
                });
            },

            validate() {
                // check if has complications
                if (this.fields.advanced.hasComplications) {
                    this.setDeclineReason({
                        status: true,
                        reason: 'decline-one'
                    });
                    
                    return false;
                }

                // check if newly diagnosed
                if (this.calculateMonthsDiagnosed() < 7) {
                    this.setDeclineReason({
                        status: true,
                        reason: 'decline-two'
                    });

                    return false;
                }

                // check if rating passed

                // check if BMI is above 43
                if (this.bmi >= 43) {
                    this.setDeclineReason({
                        status: true,
                        reason: 'decline-three'
                    });

                    return false;
                }

                // check if a1c is more than 10
                if (parseFloat(this.fields.basic.a1c) > 10) {
                    this.setDeclineReason({
                        status: true,
                        reason: 'decline-three'
                    });

                    return false;
                }

                // check if diagnosed more than 15 years ago fo age below 30
                if (parseInt(this.fields.basic.age) < 30) {
                    if ((this.calculateMonthsDiagnosed() / 12) >= 15) {
                        this.setDeclineReason({
                            status: true,
                            reason: 'decline-three'
                        });

                        return false;
                    }
                }

                return true;
            },
        },

        created() {
            this.fields = _.cloneDeep(this.stateFields);

            this.setDeclineReason({
                status: false,
                reason: null
            });
        }
    }
</script>

