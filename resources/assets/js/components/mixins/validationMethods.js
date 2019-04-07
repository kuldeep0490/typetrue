export default {
    methods: {
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

        validateNumber(key, value) {
            if (isNaN(value)) {
                this.errors[key] = key.toUpperCase() + ' is not a number.';

                return false;
            }

            return true;
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
    }
}