import {mapGetters, mapMutations} from 'vuex';
import calculateMixin from '../mixins/calculate';

export default {
    mixins: [calculateMixin],

    computed: {
        ...mapGetters({
            fields: 'typetrue/fields',
            bmi: 'typetrue/bmi',
        })
    },

    methods: {
        ...mapMutations({
            'setDeclineReason': 'typetrue/setDeclineReason'
        }),

        checkIfDecline() {
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
    }
}