<template>
    <div class="tw-fixed help-container tw-hidden">
        <el-popover
            placement="top-end"
            width="400"
            trigger="click">
            <div class="tw-text-right">
                <el-input
                class="tw-mb-5"
                type="textarea"
                :rows="4"
                placeholder="Please enter your comments/suggestions."
                v-model="message">
                </el-input>

                <el-button type="primary" @click="submit">Submit</el-button>
            </div>

            <img slot="reference" class="tw-cursor-pointer tw-w-10 tw-h-10" :src="image" alt="">
        </el-popover>
    </div>
</template>

<style scoped lang="scss">
    .help-container {
        bottom: 20px;
        right: 20px;
    }
</style>

<script>
    export default {
        props: ['image'],

        data() {
            return {
                message: null,
            }
        },

        methods: {
            submit() {
                console.log('submitted');
            }
        }
    }
</script>

