@extends('layout.main')

@section('banner')
    <div class="tw-mb-10 banner tw-bg-fixed tw-bg-center sm:tw-bg-left-top tw-bg-no-repeat tw-bg-cover tw-h-screen">
        <div class="tw-h-screen tw-bg-opacity-75 sm:tw-bg-opacity-0 tw-bg-white sm:tw-bg-transparent tw-flex tw-items-center">
            <div class="tw-container tw-mx-auto tw-px-4 sm:tw-px-0">
                <h1 class="text-blue tw-text-2xl sm:tw-text-3xl tw-font-semibold tw-mb-4">Get the best price on life<br> insurance for type 2 diabetics</h1>

                <a plain class="custom-button btn-lg text-lg tw-inline-block" href="{{ url('/questions#/what-is-your-gender') }}">
                    Get your FREE quote
                </a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="tw-container tw-mx-auto tw-px-4 sm:tw-px-0">
        <h2 class="tw-mb-10 text-blue tw-text-2xl sm:tw-text-4xl tw-font-semibold tw-text-center">Why <span class="text-light-blue">Type</span>True?</h2>

        <div class="sm:tw-flex tw-justify-between">
            <div class="tw-text-center sm:tw-w-1/3 tw-mb-4">
                <img class="tw-mb-4 tw-w-10 sm:tw-w-16 tw-inline-block" src="{{ url('images/icon-1.png') }}" alt="Fast and accurate online quote">

                <h3 class="tw-uppercase tw-mb-4 tw-font-semibold tw-text-md sm:tw-text-xl text-blue">Fast and accurate<br> online quote</h3>

                <p>Get a personalized price estimate in minutes.</p>
            </div>
            <div class="tw-text-center sm:tw-w-1/3 tw-mb-4">
                <img class="tw-mb-4 tw-w-10 sm:tw-w-16 tw-inline-block" src="{{ url('images/icon-2.png') }}" alt="Best price guarantee<">

                <h3 class="tw-uppercase tw-mb-4 tw-font-semibold tw-text-md sm:tw-text-xl text-blue">Best price<br> guarantee</h3>

                <p>Find the lowest price for your diabetes profile. Get a personalized price estimate in minutes.</p>
            </div>

            <div class="tw-text-center sm:tw-w-1/3 tw-mb-4">
                <img class="tw-mb-4 tw-w-10 sm:tw-w-16 tw-inline-block" src="{{ url('images/icon-3.png') }}" alt="Trusted providers">

                <h3 class="tw-uppercase tw-mb-4 tw-font-semibold tw-text-md sm:tw-text-xl text-blue">Trusted<br> providers</h3>

                <p>Buy your policy from leading Canadian insurance companies.</p>
            </div>

        </div>
    </div>

    <div class="gray-bg tw-py-10 tw-mb-10">
        <div class="tw-container tw-mx-auto tw-px-4 sm:tw-px-0 tw-flex tw-flex-wrap tw-justify-between tw-items-center">
            <div class="tw-text-center tw-w-1/2 sm:tw-w-1/4 tw-px-4">
                <img class="tw-inline-block home-sub-icons" src="{{ url('images/best-price-logo.png')  }}" alt="">
            </div>

            <div class="tw-text-center tw-w-1/2 sm:tw-w-1/4 tw-px-4">
                <img class="tw-inline-block home-sub-icons" src="{{ url('images/zoomer-radio-logo.png')  }}" alt="">
            </div>

            <div class="tw-text-center tw-w-1/2 sm:tw-w-1/4 tw-px-4">
                <img class="tw-inline-block home-sub-icons" src="{{ url('images/mcafee-logo.png')  }}" alt="">
            </div>

            <div class="tw-text-center tw-w-1/2 sm:tw-w-1/4 tw-px-4">
                <img class="tw-inline-block home-sub-icons" src="{{ url('images/ssl-logo.png')  }}" alt="">
            </div>
        </div>
    </div>

    <div class="tw-container tw-mx-auto tw-px-4 sm:tw-px-0 tw-mb-10">
        <h2 class="tw-mb-10 text-blue tw-text-2xl sm:tw-text-4xl tw-font-semibold tw-text-center">What people are saying about TypeTrue</h2>

        <div class="sm:tw-flex tw-mb-10">
            <div class="sm:tw-w-1/3 tw-px-4 tw-mb-4">
                <div class="light-gray-bg tw-p-4 tw-mb-4 tw-relative comment-box">
                    <p class="tw-italic light-font-color">I was able to compare prices for different coverage and it was awesome! The real value was knowing i have the information and confidence when purchasing term insurance. This has been a life saver for Type 2 Diabetics like me.</p>

                    <img src="{{ url('images/arrow-down.png') }}" alt="" class="testimonial-arrow">
                </div>

                <div class="tw-flex">
                    <img class="tw-mr-4 tw-w-4 " src="{{ url('images/user-icon.png') }}" alt="">

                    <span>Arkhe Sorde Salcedo</span>
                </div>
            </div>

            <div class="sm:tw-w-1/3 tw-px-4 tw-mb-4">
                <div class="light-gray-bg tw-p-4 tw-mb-4 tw-relative comment-box">
                    <p class="tw-italic light-font-color">Options for diabetics are VERY expensive. This business gave me better rates (still high for my budget), but I appreciate they didn’t take my information and sell it to sleazy salesmen.</p>

                    <img src="{{ url('images/arrow-down.png') }}" alt="" class="testimonial-arrow">
                </div>

                <div class="tw-flex">
                    <img class="tw-mr-4 tw-w-4 " src="{{ url('images/user-icon.png') }}" alt="">

                    <span>Anne Sutter</span>
                </div>
            </div>

            <div class="sm:tw-w-1/3 tw-px-4 tw-mb-4">
                <div class="light-gray-bg tw-p-4 tw-mb-4 tw-relative comment-box">
                    <p class="tw-italic light-font-color">When my father turned 60, I was put in charge of helping him get his retirement plan in order - which included his life insurance. My pops opted out of ever finding something for himself, since most agents wouldn’t even consider a type-2 diabetic with spotty health.</p>

                    <img src="{{ url('images/arrow-down.png') }}" alt="" class="testimonial-arrow">
                </div>

                <div class="tw-flex">
                    <img class="tw-mr-4 tw-w-4 " src="{{ url('images/user-icon.png') }}" alt="">

                    <span>Alan Rooke</span>
                </div>
            </div>
        </div>

        <div class="tw-text-center">
            <a plain class="custom-button btn-lg text-lg tw-inline-block" href="{{ url('/questions#/what-is-your-gender') }}">
                Get your FREE quote
            </a>
        </div>
    </div>

    <div class="gray-bg tw-py-10">
        <div class="tw-container tw-mx-auto tw-px-4 sm:tw-px-0">
            <h3 class="tw-mb-4 tw-text-white tw-text-2xl tw-text-center tw-font-semibold">We work with trusted Canadian insurers!</h3>
            
            <div class="tw-flex tw-flex-wrap md:tw-flex-no-wrap tw-justify-between tw-items-center">
                <div class="home-company-icons tw-text-center tw-mb-4 tw-px-2">
                    <img class="tw-inline-block" src="{{ url('images/canada-life-logo.png') }}" alt="">
                </div>
                <div class="home-company-icons tw-text-center tw-mb-4 tw-px-2">
                    <img class="tw-inline-block" src="{{ url('images/empire-life-logo.png') }}" alt="">
                </div>
                <div class="home-company-icons tw-text-center tw-mb-4 tw-px-2">
                    <img class="tw-inline-block" src="{{ url('images/manulife-logo.png') }}" alt="">
                </div>
                <div class="home-company-icons tw-text-center tw-mb-4 tw-px-2">
                    <img class="tw-inline-block" src="{{ url('images/assumption-life-logo.png') }}" alt="">
                </div>
                <div class="home-company-icons tw-text-center tw-mb-4 tw-px-2">
                    <img class="tw-inline-block" src="{{ url('images/canada-protection-plan-logo.png') }}" alt="">
                </div>
                <div class="home-company-icons tw-text-center tw-mb-4 tw-px-2">
                    <img class="tw-inline-block" src="{{ url('images/equitable-life-logo.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="footer-banner tw-bg-fixed tw-bg-cover tw-bg-center sm:tw-bg-center sm:tw-bg-top tw-bg-no-repeat">
        <div class="tw-bg-opacity-75 sm:tw-bg-opacity-0 tw-bg-white tw-py-10">
            <div class="tw-container tw-mx-auto tw-px-4 sm:tw-px-0">
                <div class="tw-flex tw-justify-end">
                    <div class="tw-w-full sm:tw-w-1/2">
                        <h4 class="text-blue tw-text-2xl sm:tw-text-4xl tw-font-semibold tw-mb-10">ABOUT US</h4>

                        <div class="tw-mb-10">
                            <p class="tw-mb-4">People with diabetes often think they won’t qualify for life insurance – or that it won’t be affordable.</p>

                            <p class="tw-mb-4">The truth is that most Diabetics do pay too much for life insurance.</p>

                            <p class="tw-mb-4">TypeTrue works with life insurance professionals to get you the guaranteed best deal on life insurance.</p>

                            <p class="tw-mb-4">We do that first by understanding your diabetic condition. Everyone is unique.</p>

                            <p class="tw-mb-4">With that information, we can select the right life insurance product for your specific needs, and the insurance company that can give you the lowest possible available price.</p>

                            <p class="tw-mb-4">So, contact us before you contact an agent or insurance company to find out if you qualify for the lowest possible price.</p>

                            <p class="tw-mb-4">To get the best deal, you only need to take 3 steps:</p>

                            <ol class="tw-mb-4">
                                <li class="tw-mb-4 tw-ml-10">1. First, take 5 minutes to fill out our online diabetic assessment tool.</li>

                                <li class="tw-mb-4 tw-ml-10">2. Based on your assessment, our team of experts will work with you to determine the best insurance product for your particular situation.</li>

                                <li class="tw-mb-4 tw-ml-10">3. Our team will then work with you to find the best insurance provider to secure you and your family's financial future.</li>
                            </ol>

                            <p class="tw-mb-4"><span class="tw-font-semibold">Our Guarantee:</span> We will, over the years, monitor your life insurance. If we or you can find a better deal, we will switch you to that offering. And, if you are not satisfied in any way, you may cancel your plan at any time – with no penalties whatsoever.</p>
                        </div>

                        <h4 class="text-blue tw-text-2xl sm:tw-text-4xl tw-font-semibold tw-mb-10">FAQ’S</h4>

                        <el-collapse>
                            <el-collapse-item title="Why should I choose TypeTrue?">
                                <p>
                                    TypeTrue’s mission is to help type 2 diabetics avoid overpaying for life insurance. While other insurance providers may offer insurance to diabetics, they consider all diabetics to be in the same high-risk category, and charge heavy premiums as a result. Our approach takes into consideration your specific diabetes profile (such as A1C) to get you the lowest possible rate for life insurance. Our insurance advisors understand the challenges diabetics face when trying to find great life insurance coverage. They work with you to get an insurance policy comparable to policies for non-diabetics from leading Canadian providers.
                                </p>
                            </el-collapse-item>
                            <el-collapse-item title="Feedback">
                                <div>Operation feedback: enable the users to clearly perceive their operations by style updates and interactive effects;</div>
                                <div>Visual feedback: reflect current state by updating or rearranging elements of the page.</div>
                            </el-collapse-item>
                            <el-collapse-item title="Efficiency">
                                <div>Simplify the process: keep operating process simple and intuitive;</div>
                                <div>Definite and clear: enunciate your intentions clearly so that the users can quickly understand and make decisions;</div>
                                <div>Easy to identify: the interface should be straightforward, which helps the users to identify and frees them from memorizing and recalling.</div>
                            </el-collapse-item>
                            <el-collapse-item title="Controllability">
                                <div>Decision making: giving advices about operations is acceptable, but do not make decisions for the users;</div>
                                <div>Controlled consequences: users should be granted the freedom to operate, including canceling, aborting or terminating current operation.</div>
                            </el-collapse-item>
                        </el-collapse>

                        <div class="tw-text-right">
                            <a plain class="custom-button btn-lg text-lg tw-inline-block" href="{{ url('/questions#/what-is-your-gender') }}">
                                Get your FREE quote
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
