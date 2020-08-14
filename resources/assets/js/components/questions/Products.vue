<template>
    <div class="tw-flex tw-flex-col tw-items-center" v-show="false">
        <h1 class="tw-mb-10 tw-text-5xl tw-font-bold tw-text-center price">
            {{ monthlyPremium | formatNum }}
        </h1>

        <div class="tw-mb-10 tw-text-center">
            <p class="tw-mb-10 tw-text-xl tw-text-gray-600 tw-font-thin">
                per month for <b class="tw-underline tw-text-black tw-text-2xl text-light-blue" style="font-weight: 900;">{{ faceAmount | formatNum }}</b> in <br>
                <el-select @change="selectProduct" v-model="selectedProduct" placeholder="Select">
                    <el-option 
                        v-if="showT10"
                        label="10-year term"
                        value="t10">
                    </el-option>
                    <el-option 
                        v-if="showT20"
                        label="20-year term"
                        value="t20">
                    </el-option>
                    <el-option 
                        v-if="showT30"
                        label="30-year term"
                        value="t30">
                    </el-option>
                    <el-option 
                        v-if="showT100"
                        label="100-year term"
                        value="t100">
                    </el-option>
                </el-select> <br>
                life coverage
            </p>
            
            <transition name="el-fade-in">
                <div v-if="showMaxFaceAmountMessage">
                    <p class="tw-text-gray-600 tw-text-2xl tw-cursor-pointer tw-underline tw-mb-10">
                        <a @click.prevent="increaseFaceAmount">Need more than $1M in coverage?</a>
                    </p>
                </div>
            </transition>

            <div class="tw-flex tw-items-center">
                <button @click="decrementSlider" class="tw-text-gray-600 tw-text-3xl no-outline">
                    <i class="el-icon-remove"></i>
                </button>

                <progress class="tw-mx-5" id="faceAmount" :max="maxFaceAmount" :value="faceAmount" :min="minFaceAmount">
                    {{ faceAmount | formatNum }}
                </progress>

                <button @click="incrementSlider" class="tw-text-gray-600 tw-text-3xl no-outline">
                    <i class="el-icon-circle-plus"></i>
                </button>
            </div>
        </div>

        <div class="tw-mb-10">
            <el-button class="custom-button btn-lg text-lg tw-inline-block" @click.prevent="nextPage">Email Quote</el-button>
        </div>
    
        <p class="tw-text-xs tw-text-gray-600 tw-font-thin tw-text-center">These quotes are based on information you entered. Your actual price will be based on the information in your application.</p>
    </div>
</template>

<script>
    import t10 from '../Products/Term10';
    import t20 from '../Products/Term20';
    import t30 from '../Products/Term30';
    import t100 from '../Products/Term100';
    import RatedAge from '../Products/RatedAge';
    import Dinero from 'dinero.js';
    import {mapGetters, mapMutations} from 'vuex';
    import updateMixin from '../mixins/update';
    import calculateMixin from '../mixins/calculate';
    import declineMixin from '../mixins/decline';
    import debounce from 'lodash/debounce';

    export default {
        name: 'SelectProduct',

        mixins: [updateMixin, calculateMixin, declineMixin],

        data() {
            return {
                allProducts: {
                    t10: 0,
                    t20: 0,
                    t30: 0,
                    t100: 0
                },

                selectedProduct: 't10',

                oldFaceAmount: 450000,
                minFaceAmount: 25000,
                maxFaceAmount: 1000000,
                stepFaceAmount: 50000,

                faceAmount: 250000,
                monthlyPremium: 0,
                faceAmount2: 500000,
                monthlyPremium2: 0,

                bandBracket: 100000,

                policyFee: 50,

                products: {
                    t10,
                    t20,
                    t30,
                    t100,
                    RatedAge
                },

                showMaxFaceAmountMessage: false
            }
        },

        filters: {
            formatNum(num) {
                if (typeof num === 'string') {
                    return num;
                }

                return Dinero({ amount: parseInt(num.toFixed(2) * 100), currency: 'USD', precision: 2 }).toFormat('$0,0.00');
            }
        },

        computed: {
            ...mapGetters({
                fields: 'typetrue/fields',
                rating: 'typetrue/rating',
                bmi: 'typetrue/bmi',
                leadID: 'typetrue/leadID',
                declined: 'typetrue/declined',
                reason: 'typetrue/reason',
            }),

            showT10() {
                return this.fields.basic.age >= 25 && this.fields.basic.age <=75;
            },

            showT20() {
                return this.fields.basic.age >= 25 && this.fields.basic.age <=65;
            },

            showT30() {
                return this.fields.basic.age >= 25 && this.fields.basic.age <=55;
            },

            showT100() {
                return this.fields.basic.age >= 56 && this.fields.basic.age <=80;
            }
        },

        methods: {
            ...mapMutations({
                setProgress: 'typetrue/setProgress',
                setBMI: 'typetrue/setBMI',
                setRating: 'typetrue/setRating'
            }),

            async nextPage() {
                await axios.post('email-quote', {
                    lead_id: this.leadID
                });

                window.scrollTo(0, 0);

                await this.$router.push({ name: 'thanks' });
            },

            increaseFaceAmount() {
                this.maxFaceAmount = 5000000;

                this.showMaxFaceAmountMessage = false;
            },

            incrementSlider() {
                this.calculateFaceAmount();
            },

            decrementSlider() {
                this.calculateFaceAmount('subtract');
            },

            calculateFaceAmount(action = 'add') {
                if (this.faceAmount === this.minFaceAmount && action === 'subtract') {
                    return;
                }

                if (action === 'add' && this.faceAmount === this.maxFaceAmount) {
                    return;
                }

                let tempFaceAmount = 0;

                if (action === 'add') {
                    tempFaceAmount = this.faceAmount + this.stepFaceAmount;
                } else {
                    tempFaceAmount = this.faceAmount - this.stepFaceAmount;
                }

                if (this.faceAmount <= 100000) {
                    if (this.faceAmount == 100000 && action == 'add') {
                        this.stepFaceAmount = 50000;
                    } else {
                        this.stepFaceAmount = 25000;
                    }
                }

                if (this.faceAmount > 100001 && this.faceAmount < 950000) {
                    this.stepFaceAmount = 50000;
                }

                if (this.faceAmount >= 1000000 && this.faceAmount < 1900000) {
                    this.stepFaceAmount = 100000;
                }

                if (this.faceAmount >= 2000000 && this.faceAmount < 4750000) {
                    this.stepFaceAmount = 250000;
                }

                if (tempFaceAmount > this.faceAmount) {
                    this.faceAmount += this.stepFaceAmount;
                } else {
                    this.faceAmount -= this.stepFaceAmount;
                }

                this.setAndCalculate();

                if (this.maxFaceAmount == 1000000) {
                    if (this.faceAmount >= 1000000) {
                        this.showMaxFaceAmountMessage = true;
                    }
                }
            },

            setAndCalculate() {
                this.setBandBracket();

                this.calculatePremium(this.selectedProduct, this.faceAmount, this.monthlyPremium);

                this.update();
            },

            update: debounce(function() {
                this.updateLead({
                    lead_id: this.leadID,
                    // product: this.selectedProduct,
                    faceAmount: this.faceAmount,
                    monthlyPremium: this.monthlyPremium,
                    // Add another faceAmount and monthlyPremium
                    product: 't10',
                    product2: 't20',
                    faceAmount2: this.faceAmount2,
                    monthlyPremium2: this.monthlyPremium2,
                });
            }, 1000),

            selectProduct() {
                this.setAndCalculate();
            },

            calculatePremium(product, faceAmount, monthlyPremium) {
                let rate = this.calculatedRate(product);
                let calculatedMonthlyPremium = 0;

                if (rate !== undefined) {
                    if (this.selectedProduct !== 't100') {
                        calculatedMonthlyPremium = 0.09 * (((parseInt(faceAmount) / 1000) * rate * (1 + (parseInt(this.rating) / 100))) + this.policyFee);
                    } else {
                        calculatedMonthlyPremium = (((parseInt(faceAmount) / 1000) * rate) + 144) / 12;
                    }
                } else {
                    calculatedMonthlyPremium = '--';
                }

                console.log(calculatedMonthlyPremium);

                // TODO: fix this in the future
                if (monthlyPremium === 'monthlyPremium') {
                    this.monthlyPremium = calculatedMonthlyPremium;
                } else {
                    this.monthlyPremium2 = calculatedMonthlyPremium;
                }
            },

            setBandBracket() {
                this.bandBracket = 0;

                if (this.faceAmount >= 25000 && this.selectedProduct === 't100') {
                    this.bandBracket = 25000;
                } 

                if (this.faceAmount >= 50000 && this.selectedProduct === 't10') {
                    this.bandBracket = 50000;
                }

                if (this.faceAmount >= 100000) {
                    this.bandBracket = 100000;
                }

                if (this.faceAmount >= 250000) {
                    this.bandBracket = 250000;
                }

                if (this.faceAmount >= 500000) {
                    this.bandBracket = 500000;
                }

                if (this.faceAmount >= 1000000) {
                    this.bandBracket = 1000000;
                }
            },

            getRate(row, column, product) {
                if (this.products[product].hasOwnProperty([column])) {
                    if (this.products[product][column][this.fields.basic.gender][this.fields.basic.smoker].hasOwnProperty([row])) {
                        let key = product !== 'RatedAge' ? 'rate' : 'age';

                        return this.products[product][column][this.fields.basic.gender][this.fields.basic.smoker][row][key];
                    }
                }
            },

            calculatedRate(product) {
                let number = this.fields.basic.age;

                if (this.selectedProduct === 't100') {
                    let result = this.calculateInterpolationT100();

                    if (result !== undefined) {
                        number = result;
                    }
                }

                return this.calculateInterpolation(number, product);
            },

            calculateInterpolationT100() {
                let number = this.fields.basic.age;
                let min = Math.floor(number / 5) * 5;
                let max = min + 5;
                
                let w = (number - min)/(max - min);

                let minResult = this.getRate(this.rating, min, 'RatedAge');
                let maxResult = this.getRate(this.rating, max, 'RatedAge');

                if (minResult && maxResult) {
                    let result = Math.round(((1 - w) * minResult) + (w * maxResult));

                    return result;
                }
            },

            calculateInterpolation(number, product) {
                let min = Math.floor(number / 5) * 5;
                let max = min + 5;
                
                let w = (number - min)/(max - min);

                let minResult = this.getRate(min, this.bandBracket, product);
                let maxResult = this.getRate(max, this.bandBracket, product);

                if (minResult && maxResult) {
                    return Math.exp((1 - w) * Math.log(minResult) + (w * Math.log(maxResult)));
                }
            },
        },

        async created() {
            if (! this.leadID) {
                return;
            }

            this.calculateBMI();

            this.calculateRating();

            this.checkIfDecline();

            await this.updateLead({
                lead_id: this.leadID,
                bmi: this.bmi,
                rating: this.rating,
                declineReason: this.reason,
                declined: this.declined
            });

            if (this.declined) {
                window.scrollTo(0, 0);

                this.$router.push({ name: 'sorry' });
            } else {
                // Calculate for static values and just update lead and redirect to thank you page
                this.calculatePremium(this.selectedProduct, this.faceAmount, 'monthlyPremium');

                this.selectedProduct = 't20';

                this.calculatePremium(this.selectedProduct, this.faceAmount2, 'monthlyPremium2');

                await this.update();

                this.$router.push({ name: 'thanks' });
            }
        },

        mounted() {
            if (! this.leadID) {
                return;
            }

            this.setProgress({ value: 100 });

            if (this.fields.basic.age > 75) {
                this.selected = 't100';
            }

            if (this.fields.basic.age > 35 && this.fields.basic.age < 56) {
                this.selectedProduct = 't20';
            }

            if (this.fields.basic.age > 55) {
                this.selectedProduct = 't100';
            }

            this.setAndCalculate();
        }
    }
</script>


<style scoped lang="scss">
    .price {
        color: #20336f;
    }

    .no-outline {
        outline: none;
    }

    .text-light-blue {
        color: #538CCF;
    }

    #faceAmount {
        appearance: none;
        width: 75%;

        &::-webkit-progress-value {
            background-color: #538CCF;
            border-radius: 0.25rem;
        }

        &::-webkit-progress-bar {
            background-color: rgba(0, 0, 0, 0.1);
            border-radius: 0.25rem;
        }
    }
</style>

