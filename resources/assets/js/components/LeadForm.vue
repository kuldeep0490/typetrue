<template>
    <div>
        <section>
            <div class="row mb-40">
                <div class="col">
                    <div class="product selected">
                        <h1><span>T</span>10 <img src="/heart.png" alt=""></h1>
                    </div>
                </div>
                <div class="col">
                    <div class="product">
                        <h1><span>T</span>20 <img src="/heart.png" alt=""></h1>
                    </div>
                </div> 
                <div class="col">
                    <div class="product">
                        <h1><span>T</span>30 <img src="/heart.png" alt=""></h1>
                    </div>
                </div> 
                <div class="col">
                    <div class="product">
                        <h1><span>T</span>100 <img src="/heart.png" alt=""></h1>
                    </div>
                </div> 
            </div>
        </section>

        <section class="slidecontainer text-center">
            <input type="range" min="1" max="100" value="50" class="slider" id="myRange">

            <h1>
                $ 65.02
            </h1>

            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed ut eum nemo! Pariatur velit nemo quidem autem tenetur magnam quaerat quam molestiae repellendus illo, inventore minus quo doloremque debitis iste!</p>

            <button class="btn btn-primary customBtn">Continue</button>
        </section>
    </div>
</template>

<style scoped lang="scss">
    .product {
        text-align: center;
        padding: 2rem;
        opacity: 0.7;
        cursor: pointer;

        h1 {
            position: relative;
            padding-right: 10px;
            margin: 0;
            width: 100%;

            span {
                color: #538CCF;
                border: none;
            }

            img {
                position: absolute;
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

