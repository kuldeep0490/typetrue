<template>
    <div>
        <h1 class="text-center monthlyPremium">
            {{ monthlyPremium | formatNum }}/mo
        </h1>

        <section>
            <div class="row mb-40 justify-content-center">
                <div class="col-4" v-if="showT10">
                    <div class="product" @click="selectProduct('t10')" :class="{ 'selected' : selectedProduct == 't10' }">
                        <h1><span>T</span>10</h1>
                        <font-awesome-icon icon="star" v-if="selectedProduct == 't10'" />
                    </div>
                </div>
                <div class="col-4" v-if="showT20">
                    <div class="product" @click="selectProduct('t20')" :class="{ 'selected' : selectedProduct == 't20' }">
                        <h1><span>T</span>20</h1>
                        <font-awesome-icon icon="star" v-if="selectedProduct == 't20'" />
                    </div>
                </div> 
                <div class="col-4" v-if="showT30">
                    <div class="product" @click="selectProduct('t30')" :class="{ 'selected' : selectedProduct == 't30' }">
                        <h1><span>T</span>30</h1>
                        <font-awesome-icon icon="star" v-if="selectedProduct == 't30'" />
                    </div>
                </div> 
                <div class="col-4" v-if="showT100">
                    <div class="product" @click="selectProduct('t100')" :class="{ 'selected' : selectedProduct == 't100' }">
                        <h1><span>T</span>100</h1>
                        <font-awesome-icon icon="star" v-if="selectedProduct == 't100'" />
                    </div>
                </div> 
            </div>
        </section>

        <section class="slidecontainer text-center premium">
            <div class="faceAmount mb-20">
                <h5>
                    <span>{{ faceAmount | formatNum }}</span>
                </h5>

                <small>Face Amount</small>
            </div>

            <input type="range" :min="minFaceAmount" :step="stepFaceAmount" :max="maxFaceAmount" class="slider" ref="slider" :value="faceAmount" @input="validateSlider">

            <button @click="decrementSlider">-</button>
            <button @click="incrementSlider">+</button>

            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed ut eum nemo! Pariatur velit nemo quidem autem tenetur magnam quaerat quam molestiae repellendus illo, inventore minus quo doloremque debitis iste!</p>

            <button class="btn btn-primary customBtn">Continue</button>
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
                faceAmount: 150000,
                minFaceAmount: 25000,
                maxFaceAmount: 5250000,
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
                }
            }
        },

        props: ['basic', 'rating'],

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
            incrementSlider() {
                console.log(this.$refs.slider.value);
                this.$refs.slider.value += this.stepFaceAmount;
                console.log(this.$refs.slider.value);
            },

            decrementSlider() {
                this.$refs.slider.value -= this.stepFaceAmount;
                console.log(this.$refs.slider.value);
            },

            validateSlider(e) {
                let value = e.target.value;
                let oldVal = this.faceAmount;

                if (oldVal < 100000) {
                    this.stepFaceAmount = 25000;
                }

                if (oldVal >= 100000 && oldVal < 950000) {
                    this.stepFaceAmount = 50000;
                }

                if (oldVal >= 1000000 && oldVal < 1900000) {
                    this.stepFaceAmount = 100000;
                }

                if (oldVal >= 2000000 && oldVal < 4750000) {
                    this.stepFaceAmount = 250000;
                }

                if (value > oldVal) {
                    this.faceAmount += this.stepFaceAmount;
                } else {
                    this.faceAmount -= this.stepFaceAmount;
                }

                this.setAndCalculate();
            },

            setAndCalculate() {
                this.setBandBracket();

                this.calculatePremium(this.selectedProduct);
            },

            selectProduct(code) {
                this.selectedProduct = code;

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
            top: 10px;
            right: 10px;
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

