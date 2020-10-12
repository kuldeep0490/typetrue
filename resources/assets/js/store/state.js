export default {
    info: {
        first_name: null,
        last_name: null,
        full_name: null,
        email: null,
        phone: null,
    },
    
    fields: {
        basic: {
            age: null,
            gender: null,
            yearsAgo: 1,
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

    doNotValidateFields: [
        'yearsAgo',
        'monthsAgo',
        'a1c',
        'a1cB'
    ],

    leadID: null,

    bmi: null,

    rating: null,

    reason: null,

    declined: false,

    progress: 0,
};
