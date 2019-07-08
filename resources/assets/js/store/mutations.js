export const setFields = (state, payload) => {
    state.fields = payload;
}

export const setBasicField = (state, payload) => {
    state.fields.basic[payload.field] = payload.value;
}

export const setAdvancedField = (state, payload) => {
    state.fields.advanced[payload.field] = payload.value;
}

export const setInfo = (state, payload) => {
    state.info = payload;
}

export const setBMI = (state, payload) => {
    state.bmi = payload;
}

export const setRating = (state, payload) => {
    state.rating = payload;
}

export const setLeadID = (state, payload) => {
    state.leadID = payload;
}

export const setDeclineReason = (state, payload) => {
    state.reason = payload.reason;

    state.declined = payload.status;
}

export const setProgress = (state, payload) => {
    state.progress = payload.value;
}