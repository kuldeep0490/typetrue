@extends('layout.main')

@section('content')
    <div class="tw-container tw-mx-auto tw-p-10 custom-mockup">
        <div class="tw-mb-10">
            <a href="{{ url('/') }}">@include('assets.logo_v3')</a>
        </div>

        <div class="tw-mb-10">
            <el-steps :align-center="true" :active="active" finish-status="success">
                <el-step title="Step 1" description="Answer some basic questions"></el-step>
                <el-step title="Step 2" description="Provide some health info"></el-step>
                <el-step title="Step 3" description="Give us your personal details"></el-step>
            </el-steps>
        </div>

        <div class="tw-mb-10">
            <div class="tw-flex tw-flex-col tw-items-center" v-if="currentQ == 1">
                <p class="tw-mb-5 tw-text-2xl">I am a</p>

                <el-select class="tw-w-64 tw-mb-5" v-model="gender" placeholder="Select Gender">
                    <el-option
                        v-for="item in genderSelect"
                        :key="item.value"
                        :label="item.label"
                        :value="item.value">
                    </el-option>
                </el-select>

                <p class="tw-mb-5 tw-text-2xl">and I am</p>

                <div class="tw-w-64 tw-mb-5">
                    <el-input placeholder="Please enter your age" v-model="age"></el-input>
                </div>

                <p class="tw-mb-10 tw-text-2xl">years old.</p>

                <el-button type="danger" @click="nextQ(2)">Next</el-button>
            </div>

            <div class="tw-flex tw-flex-col tw-items-center" v-if="currentQ == 2">
                <p class="tw-mb-5 tw-text-2xl">I was diagnosed with Type 2 about</p>

                <div class="tw-w-64 tw-mb-5">
                    <el-input placeholder="Please enter number of years" v-model="year"></el-input>
                </div>

                <p class="tw-mb-5 tw-text-2xl">years and</p>

                <div class="tw-w-64 tw-mb-5">
                    <el-input placeholder="Please enter number of months" v-model="month"></el-input>
                </div>

                <p class="tw-mb-10 tw-text-2xl">months ago.</p>

                <el-button type="danger" @click="nextQ(3)">Next</el-button>
            </div>

            <div class="tw-flex tw-flex-col tw-items-center" v-if="currentQ == 3">
                <p class="tw-mb-5 tw-text-2xl">I am a</p>

                <el-select class="tw-w-64 tw-mb-5" v-model="smoker" placeholder="Select Smoking Status">
                    <el-option
                        v-for="item in smokerSelect"
                        :key="item.value"
                        :label="item.label"
                        :value="item.value">
                    </el-option>
                </el-select>

                <el-button type="danger" @click="nextQ(4)">Next</el-button>
            </div>

            <div class="tw-flex tw-flex-col tw-items-center" v-if="currentQ == 4">
                <p class="tw-mb-5 tw-text-2xl">My last bloodwork showed an A1c of </p>

                <div class="tw-w-64 tw-mb-5 tw-text-center">
                    <el-input-number v-model="a1c" size="large" :precision="1" :step="0.1" :max="15" :min="3"></el-input-number>
                </div>

                <el-button type="danger" @click="nextQ(5)">Next</el-button>
            </div>

            <div class="tw-flex tw-flex-col tw-items-center" v-if="currentQ == 5">
                <p class="tw-mb-5 tw-text-2xl">I'm </p>

                <div class="tw-w-64 tw-mb-5 tw-text-center">
                    <el-input-number v-model="height" size="large" :precision="1" :step="0.1" :max="15" :min="3"></el-input-number>
                </div>

                <p class="tw-mb-5 tw-text-2xl">feet and tall and I weigh</p>

                <div class="tw-w-64 tw-mb-5 tw-text-center">
                    <el-input-number v-model="weight" size="large" :step="5" :max="500" :min="60"></el-input-number>
                </div>

                <p class="tw-mb-5 tw-text-2xl">pounds</p>

                <el-button type="danger" @click="next(6)">Next</el-button>
            </div>

            <div class="tw-flex tw-flex-col tw-items-center" v-if="currentQ == 6">
                <p class="tw-mb-5 tw-text-2xl">I have been diagnosed with </p>

                <el-select class="tw-w-64 tw-mb-5" v-model="diagnosed" placeholder="Select Option">
                    <el-option
                        v-for="item in diagnosedSelect"
                        :key="item.value"
                        :label="item.label"
                        :value="item.value">
                    </el-option>
                </el-select>

                <p class="tw-mb-1 tw-text-xs">Diabetic neuropathy</p>
                <p class="tw-mb-1 tw-text-xs">Chronic kidney disease</p>
                <p class="tw-mb-1 tw-text-xs">Stroke or TIAs</p>
                <p class="tw-mb-5 tw-text-xs">Coronary artery disease (heart disease)</p>

                <el-button type="danger" @click="next(7)">Next</el-button>
            </div>

            <div class="tw-flex tw-flex-col tw-items-center" v-if="currentQ == 7">
                <p class="tw-mb-5 tw-text-2xl">We need your email so we can send your quote later.</p>

                <div class="tw-w-64 tw-mb-5">
                    <el-input placeholder="Please enter your first name" v-model="age"></el-input>
                </div>

                <div class="tw-w-64 tw-mb-5">
                    <el-input placeholder="Please enter your last name" v-model="age"></el-input>
                </div>

                <div class="tw-w-64 tw-mb-5">
                    <el-input placeholder="Please enter your email address" v-model="age"></el-input>
                </div>

                <div class="tw-w-64 tw-mb-5">
                    <el-input placeholder="Please enter your phone number" v-model="age"></el-input>
                </div>

                <el-button type="danger" @click="next(8)">Next</el-button>
            </div>

            <div class="tw-flex tw-flex-col tw-items-center" v-if="currentQ == 8">
                <h1>Product form here</h1>
            </div>
        </div>

        <div class="tw-mx-auto tw-w-1/2">
            <el-progress :percentage="percentage" color="#FFECCA"></el-progress>
        </div>
    </div>
@endsection
