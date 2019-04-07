export const setFields = (state, payload) => {
    state.fields = payload;
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