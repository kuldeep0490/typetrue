import {mapGetters} from 'vuex';

export default {
    computed: {
        ...mapGetters({
            leadID: 'typetrue/leadID'
        })
    },

    beforeMount() {
        console.log('asdfasd');
        if (! this.leadID) {
            this.$router.push('/get-started');
        }
    }
}