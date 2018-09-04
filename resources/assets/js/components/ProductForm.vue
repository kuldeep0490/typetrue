<template>
    <div>
        <section>
            <div class="row mb-40 justify-content-center">
                <div class="col-4" v-if="showT10">
                    <div class="product" @click="selectProduct('t10')" :class="{ 'selected' : product == 't10' }">
                        <h1><span>Term</span>10 <img src="/heart.png" alt=""></h1>
                    </div>
                </div>
                <div class="col-4" v-if="showT20">
                    <div class="product" @click="selectProduct('t20')" :class="{ 'selected' : product == 't20' }">
                        <h1><span>Term</span>20 <img src="/heart.png" alt=""></h1>
                    </div>
                </div> 
                <div class="col-4" v-if="showT30">
                    <div class="product" @click="selectProduct('t30')" :class="{ 'selected' : product == 't30' }">
                        <h1><span>Term</span>30 <img src="/heart.png" alt=""></h1>
                    </div>
                </div> 
                <div class="col-4" v-if="showT100">
                    <div class="product" @click="selectProduct('t100')" :class="{ 'selected' : product == 't100' }">
                        <h1><span>Term</span>100 <img src="/heart.png" alt=""></h1>
                    </div>
                </div> 
            </div>
        </section>

        <section class="slidecontainer text-center premium">
            <div class="faceAmount mb-20">
                <h5>Face Amount: $ <span>{{ faceAmount }}</span></h5>
            </div>

            <input type="range" :min="minFaceAmount" :step="stepFaceAmount" :max="maxFaceAmount" value="150000" class="slider" id="myRange" v-model="faceAmount">

            <h1>
                <span>Premium:</span> $ <span>{{ monthlyPremium.toFixed(2) }}</span>/mo
            </h1>

            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed ut eum nemo! Pariatur velit nemo quidem autem tenetur magnam quaerat quam molestiae repellendus illo, inventore minus quo doloremque debitis iste!</p>

            <button class="btn btn-primary customBtn">Continue</button>
        </section>
    </div>
</template>

<script>
    import t10 from './Products/Term10';

    export default {
        data() {
            return {
                product: 't10',
                faceAmount: 150000,
                minFaceAmount: 25000,
                maxFaceAmount: 5000000,
                stepFaceAmount: 25000,

                monthlyPremium: 0,
                bandBracket: 100000,

                policyFee: 50,

                products: {
                    t10
                }
            }
        },

        props: ['basic', 'rating'],

        watch: {
            faceAmount: {
                handler(val, oldVal) {
                    if (val < 100000) {
                        this.stepFaceAmount = 25000;
                    }

                    if (val >= 100000 && val < 1000000) {
                        this.stepFaceAmount = 50000;
                    }

                    if (val >= 1000000 && val < 2000000) {
                        this.stepFaceAmount = 100000;
                    }

                    if (val >= 2000000 && val < 5000000) {
                        this.stepFaceAmount = 250000;
                    }

                    this.calculatePremium();

                    this.setBandBracket();
                }
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
            selectProduct(code) {
                this.product = code;
            },

            calculatePremium() {
                this.monthlyPremium =  0.09 * (((parseInt(this.faceAmount) / 1000) * this.calculatedRate() * (1 + (parseInt(this.rating) / 100))) + this.policyFee);
            },

            setBandBracket() {
                // if (this.faceAmount >= 25000) {
                //     this.bandBracket = 25000;
                // }

                if (this.faceAmount >= 100000) {
                    this.bandBracket = 100000;
                }

                // if (this.faceAmount >= 250000) {
                //     this.bandBracket = 250000;
                // }

                // if (this.faceAmount >= 500000) {
                //     this.bandBracket = 500000;
                // }

                // if (this.faceAmount >= 1000000) {
                //     this.bandBracket = 1000000;
                // }
            },

            getRate(age) {
                return this.products[this.product][this.bandBracket][this.basic.gender][this.basic.smoker][age].rate;
            },

            calculatedRate() {
                return this.calculateInterpolation(this.basic.age);
            },

            calculateInterpolation(number) {
                let min = Math.floor(number / 5) * 5;
                let max = min + 5;
                
                let w = (number - min)/(max - min);

                return Math.exp((1 - w) * Math.log(this.getRate(min)) + (w * Math.log(this.getRate(max))));
            }
        },

        mounted() {
            if (this.basic.age > 75) {
                this.selected = 't100';
            }

            this.calculatePremium();
        }
    }
</script>


<style scoped lang="scss">
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
        padding: 2rem;
        opacity: 0.7;
        cursor: pointer;

        h1 {
            position: relative;
            padding-right: 10px;
            margin: 0 !important;
            width: 100%;

            span {
                color: #538CCF;
                border: none;
            }

            img {
                display: none;
                position: absolute;
                right: 0;
                top: 0.5rem;
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
        height: 25px;
        background: #ccc;
        outline: none;
        opacity: 0.7;
        transition: opacity .2s;
        border-radius: 0.25rem;
    }

    .slider:hover {
        opacity: 1;
    }

    .slider::-webkit-slider-thumb {
        appearance: none;
        width: 25px;
        height: 25px;
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

