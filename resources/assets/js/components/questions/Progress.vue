<template>
    <div class="tw-mx-auto tw-w-full" v-if="progress != 100">
        <el-progress :percentage="progress" color="#FB5975" :show-text="false"></el-progress>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex';

    export default {
        name: 'Progress',

        computed: {
            ...mapGetters({
                'progress': 'typetrue/progress'
            })
        }
    }
</script>

