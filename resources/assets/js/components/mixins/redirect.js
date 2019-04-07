import {mapGetters} from 'vuex';

export default {
    computed: {
        ...mapGetters({
            leadID: 'typetrue/leadID'
        })
    },

    beforeMount() {
        if (! this.leadID) {
            this.$router.push('/get-started');
        }
    }
}