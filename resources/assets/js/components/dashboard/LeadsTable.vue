<template>
    <div class="tw-flex tw-flex-col tw-items-center">
        <el-table :data="data" class="tw-w-full">
            <el-table-column type="expand">
                <template slot-scope="props">
                    <div class="tw-flex tw-w-full">
                        <div class="tw-flex-grow">
                            <h3 class="tw-text-lg tw-mb-4">Customer Details</h3>
                            <p class="tw-mb-2 tw-ml-4">Gender: <span class="tw-uppercase tw-font-bold">{{ props.row.gender }}</span></p>
                            <p class="tw-mb-2 tw-ml-4">Age: <span class="tw-uppercase tw-font-bold">{{ props.row.age }} years old</span></p>
                            <p class="tw-mb-2 tw-ml-4">Diagnosis: <span class="tw-uppercase tw-font-bold">{{ props.row.diagnosedMonthsAgo }} months ago</span></p>
                            <p class="tw-mb-2 tw-ml-4">Gender: <span class="tw-uppercase tw-font-bold">{{ props.row.gender }}</span></p>
                            <p class="tw-mb-2 tw-ml-4">Smoker: <span class="tw-uppercase tw-font-bold">{{ props.row.smoker | formatSmoker }}</span></p>
                            <p class="tw-mb-2 tw-ml-4">A1C: <span class="tw-uppercase tw-font-bold">{{ props.row.a1c }} mmol/l range</span></p>
                            <p class="tw-mb-2 tw-ml-4">Height: <span class="tw-uppercase tw-font-bold">{{ props.row.heightInInches | formatHeight }} cm</span></p>
                            <p class="tw-mb-2 tw-ml-4">Weight: <span class="tw-uppercase tw-font-bold">{{ props.row.weightInPounds }} lbs</span></p>
                            <p class="tw-mb-2 tw-ml-4">BMI: <span class="tw-uppercase tw-font-bold">{{ props.row.bmi }}</span></p>
                            <p class="tw-mb-2 tw-ml-4">Has Complications?: <span class="tw-uppercase tw-font-bold">{{ props.row.hasComplications | formatBoolean }}</span></p>
                        </div>

                        <div class="tw-flex-grow">
                            <h3 class="tw-text-lg tw-mb-4">Customer Info</h3>
                            <p class="tw-mb-2 tw-ml-4">First Name: <span class="tw-uppercase tw-font-bold">{{ props.row.first_name }}</span></p>
                            <p class="tw-mb-2 tw-ml-4">Last Name: <span class="tw-uppercase tw-font-bold">{{ props.row.last_name }}</span></p>
                            <p class="tw-mb-2 tw-ml-4">Email: <span class="tw-uppercase tw-font-bold">{{ props.row.email }}</span></p>
                            <p class="tw-mb-2 tw-ml-4">Phone: <span class="tw-uppercase tw-font-bold">{{ props.row.phone }}</span></p>
                        </div>

                        <div class="tw-flex-grow">
                            <div class="tw-mb-4">
                                <h3 class="tw-text-lg tw-mb-4">Rating</h3>
                                <p class="tw-mb-2 tw-ml-4">Declined?: <span class="tw-uppercase tw-font-bold">{{ props.row.declined | formatBoolean }}</span></p>
                                <p class="tw-mb-2 tw-ml-4">Rating: <span class="tw-uppercase tw-font-bold">{{ props.row.rating }}</span></p>
                            </div>

                            <div class="tw-mb-4">
                                <h3 class="tw-text-lg tw-mb-4">Product 1</h3>
                                <p class="tw-mb-2 tw-ml-4">Product: <span class="tw-uppercase tw-font-bold">{{ props.row.product }}</span></p>
                                <p class="tw-mb-2 tw-ml-4">Face Amount: <span class="tw-uppercase tw-font-bold">{{ props.row.faceAmount | formatNum }}</span></p>
                                <p class="tw-mb-2 tw-ml-4">Premium: <span class="tw-uppercase tw-font-bold">{{ props.row.monthlyPremium | formatNum }} / mo</span></p>
                            </div>

                            <div class="tw-mb-4">
                                <h3 class="tw-text-lg tw-mb-4">Product 2</h3>
                                <p class="tw-mb-2 tw-ml-4">Product: <span class="tw-uppercase tw-font-bold">{{ props.row.product2 }}</span></p>
                                <p class="tw-mb-2 tw-ml-4">Face Amount: <span class="tw-uppercase tw-font-bold">{{ props.row.faceAmount2 | formatNum }}</span></p>
                                <p class="tw-mb-2 tw-ml-4">Premium: <span class="tw-uppercase tw-font-bold">{{ props.row.monthlyPremium2 | formatNum }} /mo</span></p>
                            </div>
                        </div>
                    </div>
                </template>
            </el-table-column>
            <el-table-column label="Date">
                <template slot-scope="props">
                    {{ props.row.created_at | formatDate }}
                </template>
            </el-table-column>
            <el-table-column
                    label="Rating"
                    prop="rating">
            </el-table-column>
            <el-table-column
                    label="Email"
                    prop="email">
            </el-table-column>
        </el-table>
    </div>
</template>

<script>
    import moment from 'moment';
    import Dinero from 'dinero.js';

    export default {
        data() {
            return {
                data: null
            }
        },

        filters: {
            formatDate(dateString) {
                return moment(dateString).format('MMMM D, YYYY');
            },

            formatSmoker(smokerStatus) {
                return smokerStatus === 'nonSmoker' ? 'No' : 'Yes';
            },

            formatHeight(heightInInches) {
                return heightInInches * 2.54;
            },

            formatBoolean(booleanAnswer) {
                if (booleanAnswer === 1) {
                    return 'Yes';
                }

                if (booleanAnswer === 0) {
                    return 'No';
                }

                return 'N/A';
            },

            formatNum(num) {
                if (typeof num === 'string') {
                    return num;
                }

                return Dinero({ amount: parseInt(num.toFixed(2) * 100), currency: 'USD', precision: 2 }).toFormat('$0,0.00');
            }
        },

        created() {
            axios.get('leads').then((result) => {
               if (result && result.data) {
                   this.data = result.data;

                   console.log(this.data);
               }
            });
        }
    }
</script>

