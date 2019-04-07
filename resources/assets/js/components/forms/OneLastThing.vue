<template>
    <div class="main">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col col-md-8">
                    <div class="tagline formInput">
                        <h1>
                            <img-blood />

                            One last thing...
                        </h1>

                        <h2>
                            I have been diagnosed with <span class="not-selected" :class="{ 'active': ! fields.advanced.hasComplications }" @click="setComplications(false)">none</span> <span class="not-selected" :class="{ 'active': fields.advanced.hasComplications }" @click="setComplications(true)">some</span> of these conditions:
                        </h2>

                        <ul>
                            <li>Diabetic neuropathy</li>
                            <li>Chronic kidney disease</li>
                            <li>Stroke or TIAs</li>
                            <li>Coronary artery disease (heart disease)</li>
                        </ul>

                        <button class="btn btn-primary customBtn" @click.prevent="prevPage">Back</button>

                        <button class="btn btn-primary customBtn" @click.prevent="nextPage">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ImgBlood from '../assets/Blood';
    import {mapGetters, mapMutations} from 'vuex';

    export default {
        name: 'OneLastThing',

        data() {
            return {
                fields: null
            }
        },

        components: {
            ImgBlood
        },

        computed: {
            ...mapGetters({
                stateFields: 'typetrue/fields',
            })
        },

        methods: {
            ...mapMutations({
                setFields: 'typetrue/setFields'
            }),

            setComplications(status) {
                this.fields.advanced.hasComplications = status;
            },

            prevPage() {
                this.setFields(this.fields);

                this.$router.push('/get-started');
            },

            nextPage() {
                this.setFields(this.fields);

                this.$router.push('/');
            },
        },

        created() {
            this.fields = _.cloneDeep(this.stateFields);
        }
    }
</script>

