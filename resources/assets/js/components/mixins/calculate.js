export default {
    methods: {
        calculateHeight() {
            return (parseInt(this.fields.basic.feet) * 12) + parseInt(this.fields.basic.inches)
        },

        calculateBMI() {
            this.setBMI((703 * parseInt(this.fields.basic.pounds)) / (Math.pow(this.calculateHeight(), 2)));
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
            let rating = _.clone(this.rating);

            // < 30
            if (age < 30) {
                if (yearsElapseSinceDiagnosis < 7) {
                    this.setRating(rating += 100);
                }

                if (yearsElapseSinceDiagnosis >= 7 && yearsElapseSinceDiagnosis < 15) {
                    this.setRating(rating += 150);
                }

                if (a1c < 7.1) {
                    this.setRating(rating -= 25);
                }

                if (a1c >= 8.1 && a1c < 9.1) {
                    this.setRating(rating += 25);
                }

                if (a1c >= 9.1 && a1c < 10.1) {
                    this.setRating(rating += 75);
                }
            }

            // 30 - 39
            if (this.fields.basic.age >= 30 && this.fields.basic.age < 40) {
                if (yearsElapseSinceDiagnosis < 7) {
                    this.setRating(rating += 75);
                }

                if (yearsElapseSinceDiagnosis >= 7 && yearsElapseSinceDiagnosis < 15) {
                    this.setRating(rating += 100);
                }

                if (yearsElapseSinceDiagnosis >= 15 && yearsElapseSinceDiagnosis < 25) {
                    this.setRating(rating += 125);
                }

                if (yearsElapseSinceDiagnosis >= 25) {
                    this.setRating(rating += 150);
                }

                if (a1c < 7.1) {
                    this.setRating(rating -= 25);
                }

                if (a1c >= 8.1 && a1c < 9.1) {
                    this.setRating(rating += 25);
                }

                if (a1c >= 9.1 && a1c < 10.1) {
                    this.setRating(rating += 75);
                }
            }

            // 40 - 49
            if (this.fields.basic.age >= 40 && this.fields.basic.age < 50) {
                if (yearsElapseSinceDiagnosis < 7) {
                    this.setRating(rating += 50);
                }

                if (yearsElapseSinceDiagnosis >= 7 && yearsElapseSinceDiagnosis < 15) {
                    this.setRating(rating += 75);
                }

                if (yearsElapseSinceDiagnosis >= 15 && yearsElapseSinceDiagnosis < 25) {
                    this.setRating(rating += 100);
                }

                if (yearsElapseSinceDiagnosis >= 25) {
                    this.setRating(rating += 125);
                }

                if (a1c < 7.1) {
                    this.setRating(rating -= 25);
                }

                if (a1c >= 8.1 && a1c < 9.1) {
                    this.setRating(rating += 25);
                }

                if (a1c >= 9.1 && a1c < 10.1) {
                    this.setRating(rating += 75);
                }
            }

            // 50 - 59
            if (this.fields.basic.age >= 50 && this.fields.basic.age < 60) {
                if (yearsElapseSinceDiagnosis < 7) {
                    this.setRating(rating += 25);
                }

                if (yearsElapseSinceDiagnosis >= 7 && yearsElapseSinceDiagnosis < 15) {
                    this.setRating(rating += 50);
                }

                if (yearsElapseSinceDiagnosis >= 15 && yearsElapseSinceDiagnosis < 25) {
                    this.setRating(rating += 75);
                }

                if (yearsElapseSinceDiagnosis >= 25) {
                    this.setRating(rating += 100);
                }

                if (a1c < 7.1) {
                    this.setRating(rating -= 25);
                }

                if (a1c >= 8.1 && a1c < 9.1) {
                    this.setRating(rating += 25);
                }

                if (a1c >= 9.1 && a1c < 10.1) {
                    this.setRating(rating += 75);
                }
            }

            // 60 - 69
            if (this.fields.basic.age >= 60 && this.fields.basic.age < 70) {
                if (yearsElapseSinceDiagnosis < 7) {
                    this.setRating(rating += 25);
                }

                if (yearsElapseSinceDiagnosis >= 7 && yearsElapseSinceDiagnosis < 15) {
                    this.setRating(rating += 25);
                }

                if (yearsElapseSinceDiagnosis >= 15 && yearsElapseSinceDiagnosis < 25) {
                    this.setRating(rating += 50);
                }

                if (yearsElapseSinceDiagnosis >= 25) {
                    this.setRating(rating += 100);
                }

                if (a1c < 7.1) {
                    this.setRating(rating -= 25);
                }

                if (a1c >= 8.1 && a1c < 9.1) {
                    this.setRating(rating += 25);
                }

                if (a1c >= 9.1 && a1c < 10.1) {
                    this.setRating(rating += 50);
                }
            }

            // 70 above
            if (this.fields.basic.age >= 70) {
                if (yearsElapseSinceDiagnosis >= 7 && yearsElapseSinceDiagnosis < 15) {
                    this.setRating(rating += 25);
                }

                if (yearsElapseSinceDiagnosis >= 15 && yearsElapseSinceDiagnosis < 25) {
                    this.setRating(rating += 25);
                }

                if (yearsElapseSinceDiagnosis >= 25) {
                    this.setRating(rating += 75);
                }

                if (a1c < 7.1) {
                    this.setRating(rating -= 25);
                }

                if (a1c >= 9.1 && a1c < 10.1) {
                    this.setRating(rating += 25);
                }
            }

            // calculate BMI
            if (this.bmi >= 32 && this.bmi < 34) {
                this.setRating(rating += 25);
            }

            if (this.bmi >= 34 && this.bmi < 36) {
                this.setRating(rating += 50);
            }

            if (this.bmi >= 36) {
                if (this.bmi >= 36 && this.bmi < 41) {
                    this.setRating(rating += 75);
                }

                if (this.bmi >= 41 && this.bmi < 43) {
                    this.setRating(rating += 100);
                }

                if (a1c > 8) {
                    this.setRating(rating += 25);
                }
            }

            if (this.fields.basic.smoker == 'smoker') {
                this.setRating(rating += 25);
            }
        },
    }
}