@extends('layouts.landing')

@section('title', 'Features – Mood Journal')

@section('content')
        

<!-- experience / benefit section -->

<section class="py-24">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="mb-10 lg:mb-16 flex justify-center items-center flex-col gap-x-0 gap-y-6 lg:gap-y-0 lg:flex-row lg:justify-between max-md:max-w-lg max-md:mx-auto">
                    <div class="relative w-full text-center lg:text-left lg:w-2/4">
                        <h2 class="text-4xl font-bold text-gray-900 leading-[3.25rem] lg:mb-6 mx-auto max-w-max lg:max-w-md lg:mx-0">Unlock the Power of Mood Journaling</h2>
                    </div>
                    <div class="relative w-full text-center lg:text-left lg:w-2/4">
                        <p class="text-lg font-normal text-gray-500 mb-5">Transform your emotional wellness with our guided journaling practice. Gain clarity, process emotions, and nurture your mental health daily.</p>
                        <a href="http://127.0.0.1:8000/login" class="flex flex-row items-center justify-center gap-2 text-base font-semibold text-indigo-600 lg:justify-start hover:text-indigo-700">Get Started <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.5 15L11.0858 11.4142C11.7525 10.7475 12.0858 10.4142 12.0858 10C12.0858 9.58579 11.7525 9.25245 11.0858 8.58579L7.5 5" stroke="#4F46E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="flex justify-center items-center gap-x-5 gap-y-8 lg:gap-y-0 flex-wrap md:flex-wrap lg:flex-nowrap lg:flex-row lg:justify-between lg:gap-x-8">
                    <!-- Feature 1 -->
                    <div class="group relative w-full bg-gray-100 rounded-2xl p-4 transition-all duration-500 max-md:max-w-md max-md:mx-auto md:w-2/5 md:h-64 xl:p-7 xl:w-1/4 hover:bg-indigo-600">
                        <div class="bg-white rounded-full flex justify-center items-center mb-5 w-14 h-14">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 5H8C6.34315 5 5 6.34315 5 8V24C5 25.6569 6.34315 27 8 27H22C23.6569 27 25 25.6569 25 24V8C25 6.34315 23.6569 5 22 5H20M10 5V3M10 5H20M20 5V3" stroke="#4F46E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </div>
                        <h4 class="text-xl font-semibold text-gray-900 mb-3 capitalize transition-all duration-500 group-hover:text-white">Structured Practice</h4>
                        <p class="text-sm font-normal text-gray-500 transition-all duration-500 leading-5 group-hover:text-white">
                            Follow a proven 6-step framework that guides you through emotional exploration and self-discovery.
                        </p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="group relative w-full bg-gray-100 rounded-2xl p-4 transition-all duration-500 max-md:max-w-md max-md:mx-auto md:w-2/5 md:h-64 xl:p-7 xl:w-1/4 hover:bg-indigo-600">
                        <div class="bg-white rounded-full flex justify-center items-center mb-5 w-14 h-14">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15 27.5C8.09644 27.5 2.5 21.9036 2.5 15C2.5 8.09644 8.09644 2.5 15 2.5C21.9036 2.5 27.5 8.09644 27.5 15C27.5 21.9036 21.9036 27.5 15 27.5ZM15 10V15L19.375 17.1875" stroke="#4F46E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </div>
                        <h4 class="text-xl font-semibold text-gray-900 mb-3 capitalize transition-all duration-500 group-hover:text-white">Take Your Time</h4>
                        <p class="text-sm font-normal text-gray-500 transition-all duration-500 leading-5 group-hover:text-white">
                            Move through each step at your own pace. There's no rush—emotional work happens on your timeline.
                        </p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="group relative w-full bg-gray-100 rounded-2xl p-4 transition-all duration-500 max-md:max-w-md max-md:mx-auto md:w-2/5 md:h-64 xl:p-7 xl:w-1/4 hover:bg-indigo-600">
                        <div class="bg-white rounded-full flex justify-center items-center mb-5 w-14 h-14">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 14.7875L13.0959 17.8834C13.3399 18.1274 13.7353 18.1275 13.9794 17.8838L20.625 11.25M15 27.5C8.09644 27.5 2.5 21.9036 2.5 15C2.5 8.09644 8.09644 2.5 15 2.5C21.9036 2.5 27.5 8.09644 27.5 15C27.5 21.9036 21.9036 27.5 15 27.5Z" stroke="#4F46E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </div>
                        <h4 class="text-xl font-semibold text-gray-900 mb-3 capitalize transition-all duration-500 group-hover:text-white">Real Growth</h4>
                        <p class="text-sm font-normal text-gray-500 transition-all duration-500 leading-5 group-hover:text-white">
                            Track emotional patterns and celebrate progress as you deepen your self-awareness over time.
                        </p>
                    </div>

                    <!-- Feature 4 -->
                    <div class="group relative w-full bg-gray-100 rounded-2xl p-4 transition-all duration-500 max-md:max-w-md max-md:mx-auto md:w-2/5 md:h-64 xl:p-7 xl:w-1/4 hover:bg-indigo-600">
                        <div class="bg-white rounded-full flex justify-center items-center mb-5 w-14 h-14">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15 2.5C8.09644 2.5 2.5 8.09644 2.5 15C2.5 21.9036 8.09644 27.5 15 27.5C21.9036 27.5 27.5 21.9036 27.5 15C27.5 8.09644 21.9036 2.5 15 2.5ZM15 10V20M10 15H20" stroke="#4F46E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </div>
                        <h4 class="text-xl font-semibold text-gray-900 mb-3 capitalize transition-all duration-500 group-hover:text-white">Self-Compassion</h4>
                        <p class="text-sm font-normal text-gray-500 transition-all duration-500 leading-5 group-hover:text-white">
                            Practice gentle, judgment-free reflection that honors your feelings and supports your wellbeing journey.
                        </p>
                    </div>
                </div>
            </div>
</section>

<!-- experience / benefit section //end -->

@endsection
