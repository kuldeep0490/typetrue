export const createLead = ({ commit, state }, payload) => {
    axios.post('/lead/store', payload).then((response) => {
        commit('setLeadID', response.data.id);
    });
}

export const updateLead = ({ commit, state }, payload) => {
    axios.patch('/lead/update', {
        ...payload,
        lead_id: state.leadID,
    });
}