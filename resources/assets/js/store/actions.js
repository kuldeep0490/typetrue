export const createLead = async ({ commit, state }, payload) => {
    return await axios.post('/lead/store', payload).then((response) => {
        commit('setLeadID', response.data.id);
    });
}

export const updateLead = async ({ commit, state }, payload) => {
    return await axios.patch('/lead/update', {
        ...payload,
        lead_id: state.leadID,
    });
}
