@extends('layout.main')

@section('banner')
    <div class="tw-mb-10 banner sm:tw-bg-fixed tw-bg-center sm:tw-bg-left-top tw-bg-no-repeat tw-bg-cover tw-h-screen">
        <div class="tw-h-screen tw-bg-opacity-75 sm:tw-bg-opacity-0 tw-bg-white sm:tw-bg-transparent tw-flex tw-items-center">
            <div class="tw-container tw-mx-auto tw-px-4">
                <h1 class="text-blue tw-text-2xl sm:tw-text-3xl tw-font-semibold tw-mb-4">Get the best price on life<br> insurance for type 2 diabetics</h1>

                <a plain class="custom-button btn-lg text-lg tw-inline-block" href="{{ url('/questions#/what-is-your-gender') }}">
                    Get your FREE quote
                </a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="tw-container tw-mx-auto tw-px-4">
        <h2 class="tw-mb-10 text-blue tw-text-2xl sm:tw-text-4xl tw-font-semibold tw-text-center">Why <span class="text-light-blue">Type</span>True?</h2>

        <div class="sm:tw-flex tw-justify-between">
            <div class="tw-text-center sm:tw-w-1/3 tw-mb-4">
                <div class="tw-mb-4 tw-min-h-150">
                    <img class="tw-mb-4 tw-w-10 sm:tw-w-16 tw-inline-block tw-min-h-64" src="{{ url('images/icon-1.png') }}" alt="Fast and accurate online quote">

                    <h3 class="tw-uppercase tw-font-semibold tw-text-md sm:tw-text-xl text-blue">Fast and accurate<br> online quote</h3>
                </div>

                <p>Get a personalized price estimate in minutes.</p>
            </div>
            <div class="tw-text-center sm:tw-w-1/3 tw-mb-4">
                <div class="tw-mb-4 tw-min-h-150">
                    <img class="tw-mb-4 tw-w-10 sm:tw-w-16 tw-inline-block tw-min-h-64" src="{{ url('images/icon-2.png') }}" alt="Best price guarantee<">

                    <h3 class="tw-uppercase tw-font-semibold tw-text-md sm:tw-text-xl text-blue">Best price<br> guarantee</h3>
                </div>

                <p>Find the lowest price for your diabetes profile. Get a personalized price estimate in minutes.</p>
            </div>

            <div class="tw-text-center sm:tw-w-1/3 tw-mb-4">
                <div class="tw-mb-4 tw-min-h-150">
                    <img class="tw-mb-4 tw-w-10 sm:tw-w-16 tw-inline-block tw-min-h-64" src="{{ url('images/icon-3.png') }}" alt="Trusted providers">

                    <h3 class="tw-uppercase tw-font-semibold tw-text-md sm:tw-text-xl text-blue">Trusted<br> providers</h3>
                </div>

                <p>Buy your policy from leading Canadian insurance companies.</p>
            </div>

        </div>
    </div>

    <div class="gray-bg tw-py-6 tw-mb-10">
        <div class="tw-container tw-mx-auto tw-px-4 tw-flex tw-flex-wrap tw-justify-between tw-items-center">
            <div class="tw-text-center tw-w-1/2 sm:tw-w-1/4 tw-px-4">
                <img class="tw-inline-block home-sub-icons" src="{{ url('images/best-price-logo.png')  }}" alt="">
            </div>

            <div class="tw-text-center tw-w-1/2 sm:tw-w-1/4 tw-px-4">
                <a href="https://www.zoomerradio.ca/show/tonic/the-tonic-show-podcast/tonic-podcast-october-27th/" target="_blank">
                    <img class="tw-inline-block home-sub-icons" src="{{ url('images/zoomer-radio-logo.svg')  }}" alt="">
                </a>
            </div>

            <div class="tw-text-center tw-w-1/2 sm:tw-w-1/4 tw-px-4">
                <a href="https://www.mcafeesecure.com/for-consumers" target="_blank">
                    <img class="tw-inline-block home-sub-icons" src="{{ url('images/mcafee-logo.svg')  }}" alt="">
                </a>
            </div>

            <div class="tw-text-center tw-w-1/2 sm:tw-w-1/4 tw-px-4">
                <img class="tw-inline-block home-sub-icons" src="{{ url('images/ssl-logo.png')  }}" alt="">
            </div>
        </div>
    </div>

    <div class="tw-container tw-mx-auto tw-px-4 tw-mb-10">
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
                    <p class="tw-italic light-font-color">I worked with TypeTrue and found them very helpful and responsive. I would highly recommend them for your diabetic life insurance needs!</p>

                    <img src="{{ url('images/arrow-down.png') }}" alt="" class="testimonial-arrow">
                </div>

                <div class="tw-flex">
                    <img class="tw-mr-4 tw-w-4 " src="{{ url('images/user-icon.png') }}" alt="">

                    <span>Tina</span>
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

    <div class="gray-bg tw-py-6">
        <div class="tw-container tw-mx-auto tw-px-4">
            <h3 class="tw-mb-4 tw-text-white tw-text-2xl tw-text-center tw-font-semibold">We work with trusted Canadian insurers!</h3>
            
            <div class="tw-flex tw-flex-wrap md:tw-flex-no-wrap tw-justify-between tw-items-center">
                <div class="home-company-icons tw-text-center tw-mb-4 tw-px-2">
                    <img class="tw-inline-block" src="{{ url('images/canada-life-logo.svg') }}" alt="">
                </div>
                <div class="home-company-icons tw-text-center tw-mb-4 tw-px-2">
                    <img class="tw-inline-block" src="{{ url('images/empire-life-logo.svg') }}" alt="">
                </div>
                <div class="home-company-icons tw-text-center tw-mb-4 tw-px-2">
                    <img class="tw-inline-block" src="{{ url('images/manulife-logo.svg') }}" alt="">
                </div>
                <div class="home-company-icons tw-text-center tw-mb-4 tw-px-2">
                    <img class="tw-inline-block" src="{{ url('images/assumption-life-logo.svg') }}" alt="">
                </div>
                <div class="home-company-icons tw-text-center tw-mb-4 tw-px-2">
                    <img class="tw-inline-block" src="{{ url('images/canada-protection-plan-logo.svg') }}" alt="">
                </div>
                <div class="home-company-icons tw-text-center tw-mb-4 tw-px-2">
                    <img class="tw-inline-block" src="{{ url('images/equitable-life-logo.svg') }}" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="footer-banner sm:tw-bg-fixed tw-bg-cover tw-bg-center sm:tw-bg-center sm:tw-bg-top tw-bg-no-repeat">
        <div class="tw-bg-opacity-75 sm:tw-bg-opacity-0 tw-bg-white tw-py-6">
            <div class="tw-container tw-mx-auto tw-px-4">
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

                        <el-collapse class="tw-mb-10">
                            <el-collapse-item>
                                <template slot="title">
                                    <div class="tw-flex tw-items-center">
                                        <i class="el-icon-plus tw-mr-4 tw-bg-black tw-p-1 tw-text-white"></i>

                                        <i class="el-icon-minus tw-mr-4 tw-bg-black tw-p-1 tw-text-white"></i>

                                        <span class="tw-font-semibold tw-text-lg tw-leading-none">Why should I choose TypeTrue?</span>
                                    </div>
                                </template>

                                <p>
                                    TypeTrue’s mission is to help type 2 diabetics avoid overpaying for life insurance. While other insurance providers may offer insurance to diabetics, they consider all diabetics to be in the same high-risk category, and charge heavy premiums as a result. Our approach takes into consideration your specific diabetes profile (such as A1C) to get you the lowest possible rate for life insurance. Our insurance advisors understand the challenges diabetics face when trying to find great life insurance coverage. They work with you to get an insurance policy comparable to policies for non-diabetics from leading Canadian providers.
                                </p>
                            </el-collapse-item>

                            <el-collapse-item>
                                <template slot="title">
                                    <div class="tw-flex tw-items-center">
                                        <i class="el-icon-plus tw-mr-4 tw-bg-black tw-p-1 tw-text-white"></i>

                                        <i class="el-icon-minus tw-mr-4 tw-bg-black tw-p-1 tw-text-white"></i>

                                        <span class="tw-font-semibold tw-text-lg tw-leading-none">What companies does TypeTrue represent?</span>
                                    </div>
                                </template>

                                <p>
                                    TypeTrue works with all of the leading Canadian insurance providers including Manulife, Sun Life, RBC Life Insurance, ScotiaLife, Standard Life, TD Life, Canada Life, etc. This is all facilitated by registered
                                    <a href="https://www.ibac.ca/" target="_blank">Insurance Brokers</a>.
                                </p>
                            </el-collapse-item>

                            <el-collapse-item>
                                <template slot="title">
                                    <div class="tw-flex tw-items-center">
                                        <i class="el-icon-plus tw-mr-4 tw-bg-black tw-p-1 tw-text-white"></i>

                                        <i class="el-icon-minus tw-mr-4 tw-bg-black tw-p-1 tw-text-white"></i>

                                        <span class="tw-font-semibold tw-text-lg tw-leading-none">How confidential is my information?</span>
                                    </div>
                                </template>

                                <p>
                                    Your information will remain completely confidential. No one will have access to your information other than TypeTrue and the insurer you decide to use. We never sell your name, address, or personal information. Click here to view our <a href="{{ url('/privacy-policy') }}">Privacy Policy</a>.
                                </p>
                            </el-collapse-item>

                            <el-collapse-item>
                                <template slot="title">
                                    <div class="tw-flex tw-items-center">
                                        <i class="el-icon-plus tw-mr-4 tw-bg-black tw-p-1 tw-text-white"></i>

                                        <i class="el-icon-minus tw-mr-4 tw-bg-black tw-p-1 tw-text-white"></i>

                                        <span class="tw-font-semibold tw-text-lg tw-leading-none">Do you just give price quotes?</span>
                                    </div>
                                </template>

                                <p>
                                    TypeTrue does far more than just give you a price quote. We handle every step of the buying process and do it all at your convenience. Unlike some online insurance services, which simply generate leads and sell your contact information to the highest-bidding agents, we are a full-service agency that helps you throughout the process.
                                </p>
                            </el-collapse-item>

                            <el-collapse-item>
                                <template slot="title">
                                    <div class="tw-flex tw-items-center">
                                        <i class="el-icon-plus tw-mr-4 tw-bg-black tw-p-1 tw-text-white"></i>

                                        <i class="el-icon-minus tw-mr-4 tw-bg-black tw-p-1 tw-text-white"></i>

                                        <span class="tw-font-semibold tw-text-lg tw-leading-none">How does TypeTrue pick the companies it represents?</span>
                                    </div>
                                </template>

                                <p>
                                    TypeTrue regularly monitors the products, prices and services of highly rated insurance companies. Different insurance companies have different standards for their underwriting classifications. Each company can be more or less competitive depending upon such factors as policy size, age range, health factors and lifestyle. TypeTrue selects those insurers who have the most competitive products for the widest range of underwriting factors for type 2 diabetics.
                                </p>
                            </el-collapse-item>

                            <el-collapse-item>
                                <template slot="title">
                                    <div class="tw-flex tw-items-center">
                                        <i class="el-icon-plus tw-mr-4 tw-bg-black tw-p-1 tw-text-white"></i>

                                        <i class="el-icon-minus tw-mr-4 tw-bg-black tw-p-1 tw-text-white"></i>

                                        <span class="tw-font-semibold tw-text-lg tw-leading-none">How much life insurance do I need?</span>
                                    </div>
                                </template>

                                <p>
                                    Since life insurance replaces lost income if something happens to you, the proceeds from your policy should be enough to cover immediate expenses as well as to provide continuous income for your beneficiaries. Most financial planners recommend coverage that’s 5 to 10 times your annual income. For example, if you make $50,000, you might consider coverage between $250,000 and $500,000. If you’re younger and just starting a family, you might need as much as 15 times your income to provide you with sufficient coverage. Since individual needs vary, we recommend that you speak to one of our licensed agents to help you determine what’s right for you.
                                </p>
                            </el-collapse-item>

                            <el-collapse-item>
                                <template slot="title">
                                    <div class="tw-flex tw-items-center">
                                        <i class="el-icon-plus tw-mr-4 tw-bg-black tw-p-1 tw-text-white"></i>

                                        <i class="el-icon-minus tw-mr-4 tw-bg-black tw-p-1 tw-text-white"></i>

                                        <span class="tw-font-semibold tw-text-lg tw-leading-none">What’s the difference between term and whole life insurance?</span>
                                    </div>
                                </template>

                                <p>
                                    Term life insurance is the most affordable type of life insurance, which is why it is the only type of policy we recommend. It covers you for a particular period of time, typically 10, 15, 20, or 30 years. A whole life insurance policy covers you for your whole life and has a cash value. Part of the premium you pay covers your insurance, and some of it goes into the policy’s cash value.
                                </p>
                            </el-collapse-item>

                            <el-collapse-item>
                                <template slot="title">
                                    <div class="tw-flex tw-items-center">
                                        <i class="el-icon-plus tw-mr-4 tw-bg-black tw-p-1 tw-text-white"></i>

                                        <i class="el-icon-minus tw-mr-4 tw-bg-black tw-p-1 tw-text-white"></i>

                                        <span class="tw-font-semibold tw-text-lg tw-leading-none">How do I apply for a policy?</span>
                                    </div>
                                </template>

                                <p>
                                    You can call one of our personal representatives toll-free at <span class="tw-font-semibold text-blue">1-877-897-3878</span>, or you can fill out our online life insurance application request form. A personal representative will then review your profile and get your application started.
                                </p>
                            </el-collapse-item>

                            <el-collapse-item>
                                <template slot="title">
                                    <div class="tw-flex tw-items-center">
                                        <i class="el-icon-plus tw-mr-4 tw-bg-black tw-p-1 tw-text-white"></i>

                                        <i class="el-icon-minus tw-mr-4 tw-bg-black tw-p-1 tw-text-white"></i>

                                        <span class="tw-font-semibold tw-text-lg tw-leading-none">Do I have to take a medical exam?</span>
                                    </div>
                                </template>

                                <p>
                                    A brief paramedic exam is required in order to qualify for the best possible price on life insurance. The exam is at no cost to you and can take place at your home or office at your convenience. It usually takes less than 20 minutes. We also offer an express underwriting policy that does not entail a medical exam but has a somewhat higher cost than that of a fully underwritten policy.
                                </p>
                            </el-collapse-item>

                            <el-collapse-item>
                                <template slot="title">
                                    <div class="tw-flex tw-items-center">
                                        <i class="el-icon-plus tw-mr-4 tw-bg-black tw-p-1 tw-text-white"></i>

                                        <i class="el-icon-minus tw-mr-4 tw-bg-black tw-p-1 tw-text-white"></i>

                                        <span class="tw-font-semibold tw-text-lg tw-leading-none">I already have a life insurance policy. What should I do with it?</span>
                                    </div>
                                </template>

                                <p>
                                    If you wish to replace an existing life insurance policy with new one through TypeTrue, you should not cancel your old coverage until you have received, reviewed and accepted your new policy. Cancel your old policy after all final requirements for the new one are complete and you have received notification from the insurance company that your policy is in force. It’s wise to consult an advisor if you are considering cancelling a whole life policy that has a cash value as its surrender may involve  penalties and tax consequences.
                                </p>
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
