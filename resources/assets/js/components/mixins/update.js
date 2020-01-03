import {mapGetters, mapActions} from 'vuex';

export default {
    computed: {
        ...mapGetters({
            leadID: 'typetrue/leadID'
        })
    },

    methods: {
        ...mapActions({
            updateLead: 'typetrue/updateLead'
        })
    },

    beforeMount() {
        if (! this.leadID) {
            this.$router.push({ name: 'gender' });
        }
    }
}
