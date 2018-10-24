<template>
    <div>
        <h1 class="text-center monthlyPremium">
            {{ monthlyPremium | formatNum }}/mo
        </h1>

        <section class="slidecontainer text-center premium">
            <div class="faceAmount mb-20">
                <h5>
                    <p class="product-desc">
                        per month for <b>{{ faceAmount | formatNum }}</b> in 
                        <select class="custom-select" @change="selectProduct" v-model="selectedProduct">
                            <option v-if="showT10" value="t10">10-year term</option>
                            <option v-if="showT20" value="t20">20-year term</option>
                            <option v-if="showT30" value="t30">30-year term</option>
                            <option v-if="showT100" value="t100">100-year term</option>
                        </select>
                        life coverage
                    </p>
                </h5>
            </div>
            
            <transition enter-active-class="animated fadeInDown" leave-active-class="animated fadeOutUp">
                <div v-if="showMaxFaceAmountMessage">
                    <p class="increase-faceamount">
                        <a @click.prevent="increaseFaceAmount">Need more than $1M in coverage?</a>
                    </p>
                </div>
            </transition>

            <div id="progressContainer">

                <button @click="decrementSlider" class="buttonController">
                    <font-awesome-icon icon="minus-circle" />
                </button>

                <progress id="faceAmount" name="faceAmount" :max="maxFaceAmount" :value="faceAmount" :min="minFaceAmount">
                    {{ faceAmount | formatNum }}
                </progress>

                <button @click="incrementSlider" class="buttonController">
                    <font-awesome-icon icon="plus-circle" />
                </button>

            </div>
        </section>
    </div>
</template>

<script>
    import t10 from './Products/Term10';
    import t20 from './Products/Term20';
    import t30 from './Products/Term30';
    import t100 from './Products/Term100';
    import RatedAge from './Products/RatedAge';
    import Dinero from 'dinero.js';

    export default {
        data() {
            return {
                allProducts: {
                    t10: 0,
                    t20: 0,
                    t30: 0,
                    t100: 0
                },

                selectedProduct: 't10',
                faceAmount: 500000,
                oldFaceAmount: 450000,
                minFaceAmount: 25000,
                maxFaceAmount: 1000000,
                stepFaceAmount: 50000,

                monthlyPremium: 0,
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

        props: ['basic', 'rating', 'lead'],

        filters: {
            formatNum(num) {
                if (typeof num === 'string') {
                    return num;
                }

                return Dinero({ amount: parseInt(num.toFixed(2) * 100), currency: 'USD', precision: 2 }).toFormat('$0,0.00');
            }
        },

        computed: {
            showT10() {
                return this.basic.age >= 25 && this.basic.age <=75;
            },

            showT20() {
                return this.basic.age >= 25 && this.basic.age <=65;
            },

            showT30() {
                return this.basic.age >= 25 && this.basic.age <=55;
            },

            showT100() {
                return this.basic.age >= 56 && this.basic.age <=80;
            }
        },

        methods: {
            increaseFaceAmount() {
                this.maxFaceAmount = 5000000;

                this.showMaxFaceAmountMessage = false;
            },

            updateLead() {
                axios.patch('lead/update', {
                    lead_id: this.lead,
                    product: this.selectedProduct,
                    faceAmount: this.faceAmount,
                    monthlyPremium: this.monthlyPremium,
                }).then((response) => {
                    console.log(response);
                });
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

                this.calculatePremium(this.selectedProduct);

                this.updateLead();
            },

            selectProduct() {
                this.setAndCalculate();
            },

            calculatePremium(product) {
                let rate = this.calculatedRate(product);

                if (rate !== undefined) {
                    if (this.selectedProduct !== 't100') {
                        this.monthlyPremium = 0.09 * (((parseInt(this.faceAmount) / 1000) * rate * (1 + (parseInt(this.rating) / 100))) + this.policyFee);
                    } else {
                        this.monthlyPremium = (((parseInt(this.faceAmount) / 1000) * rate) + 144) / 12;
                    }
                } else {
                    this.monthlyPremium = '--';
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
                    if (this.products[product][column][this.basic.gender][this.basic.smoker].hasOwnProperty([row])) {
                        let key = product !== 'RatedAge' ? 'rate' : 'age';

                        return this.products[product][column][this.basic.gender][this.basic.smoker][row][key];
                    }
                }
            },

            calculatedRate(product) {
                let number = this.basic.age;

                if (this.selectedProduct === 't100') {
                    let result = this.calculateInterpolationT100();

                    if (result !== undefined) {
                        number = result;
                    }
                }

                return this.calculateInterpolation(number, product);
            },

            calculateInterpolationT100() {
                let number = this.basic.age;
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

        mounted() {
            if (this.basic.age > 75) {
                this.selected = 't100';
            }

            if (this.basic.age > 35 && this.basic.age < 56) {
                this.selectedProduct = 't20';
            }

            if (this.basic.age > 55) {
                this.selectedProduct = 't100';
            }

            this.setAndCalculate();
        }
    }
</script>


<style scoped lang="scss">
    .main {
        .tagline {
            h1.monthlyPremium {
                font-size: 3rem;
                margin-bottom: 2rem;
                color: #FB5975;
            }
        }
    }

    .premium {
        h1 {
            span {
                border-bottom: none;
            }
        }

        h5 {
            font-size: 1.5rem;
            line-height: 80%;
        }

        p.product-desc {
            line-height: 150%;

            .custom-select {
                width: auto;
            }
        }

        p.increase-faceamount {
            margin: 0;

            a {
                font-weight: bold;
                color: #20336F;
                cursor: pointer;
                text-decoration: underline;
            }
        }

        small {
            font-size: 0.7rem;
            color: indianred;
        }

        #progressContainer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 2rem 0;

            .buttonController {
                background: none;
                border: none;
                outline: none;
                cursor: pointer;
                font-size: 3rem;
                padding: 0 0.5rem;
                
                path {
                    color: #20336F;
                }
            }

            #faceAmount {
                appearance: none;
                width: 75%;

                &::-webkit-progress-value {
                    background-color: #FB5975;
                    border-radius: 0.25rem;
                }

                &::-webkit-progress-bar {
                    background-color: rgba(0, 0, 0, 0.1);
                    border-radius: 0.25rem;
                }
            }
        }
    }
    
    .product {
        text-align: center;
        padding: 1rem;
        opacity: 0.7;
        cursor: pointer;
        position: relative;

        p {
            margin: 0;
            color: #20336F;
        }

        h1 {
            position: relative;
            width: 100%;
            margin: 0 !important;

            span {
                color: #538CCF;
                border: none;
            }
        }

        svg {
            position: absolute;
            top: 5px;
            right: 5px;
            font-size: 1rem;

            path {
                color: #D35400;
            }
        }

        &.selected {
            opacity: 1;
            background: rgba(0,0,0,0.1);
            border-radius: 0.25rem;
        }
    }
    .slidecontainer {
        width: 100%;
    }

    .slider {
        appearance: none;
        width: 100%;
        height: 10px;
        background: #ccc;
        outline: none;
        opacity: 0.7;
        transition: opacity .2s;
        border-radius: 0.25rem;
        pointer-events: none;

        &::-webkit-slider-thumb {
            pointer-events: auto;
        }
    }

    .slider:hover {
        opacity: 1;
    }

    .slider::-webkit-slider-thumb {
        appearance: none;
        width: 30px;
        height: 30px;
        background: #538CCF;
        cursor: pointer;
        border-radius: 0.25rem;
    }

    .slider::-moz-range-thumb {
        width: 25px;
        height: 25px;
        background: #538CCF;
        cursor: pointer;
        border-radius: 0.25rem;
    }
</style>

