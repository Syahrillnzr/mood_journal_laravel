@extends('layouts.landing')

@section('title', 'How it work – Mood Journal')

@section('content')
        

<!-- experience / benefit section -->
    <section class="bg-white py-16">

        <div class="container max-w-screen-xl mx-auto px-4">

            <div class="flex flex-col lg:flex-row justify-between space-x-16">

                <div class="flex justify-center lg:justify-start">
                    <img src="{{ asset('image/landing/feature-img.png') }}" alt="Mood journal illustration">
                </div>

                <div class="mt-16">

                    <!-- Section title -->
                    <h1 class="font-semibold text-gray-900 text-xl md:text-4xl mb-12">
                        Discover and Understand Your Daily Emotions
                    </h1>

                    <!-- Grid of questions -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

                        <!-- 1. What is this? -->
                        <div class="flex flex-col items-center text-center">
                            <div class="w-20 py-6 flex justify-center bg-blue-200 bg-opacity-30 text-blue-700 rounded-xl mb-4">
                                <i data-feather="book-open"></i>
                            </div>
                            <h3 class="font-semibold text-gray-900 text-xl md:text-2xl mb-4">
                                What is this?
                            </h3>
                            <p class="font-light text-gray-500 text-md md:text-lg">
                                A private space to log your moods and thoughts daily.
                            </p>
                        </div>

                        <!-- 2. Why should I care? -->
                        <div class="flex flex-col items-center text-center">
                            <div class="w-20 py-6 flex justify-center bg-green-200 bg-opacity-30 text-green-700 rounded-xl mb-4">
                                <i data-feather="heart"></i>
                            </div>
                            <h3 class="font-semibold text-gray-900 text-xl md:text-2xl mb-4">
                                Why should I care?
                            </h3>
                            <p class="font-light text-gray-500 text-md md:text-lg">
                                Reflecting daily helps you understand your emotions and patterns over time.
                            </p>
                        </div>

                        <!-- 3. Can I trust it? -->
                        <div class="flex flex-col items-center text-center">
                            <div class="w-20 py-6 flex justify-center bg-yellow-200 bg-opacity-30 text-yellow-700 rounded-xl mb-4">
                                <i data-feather="lock"></i>
                            </div>
                            <h3 class="font-semibold text-gray-900 text-xl md:text-2xl mb-4">
                                Can I trust it?
                            </h3>
                            <p class="font-light text-gray-500 text-md md:text-lg">
                                Your journal is private and secure. Only you can view your entries.
                            </p>
                        </div>

                        <!-- 4. What should I do next? -->
                        <div class="flex flex-col items-center text-center">
                            <div class="w-20 py-6 flex justify-center bg-red-200 bg-opacity-30 text-red-700 rounded-xl mb-4">
                                <i data-feather="arrow-right-circle"></i>
                            </div>
                            <h3 class="font-semibold text-gray-900 text-xl md:text-2xl mb-4">
                                What should I do next?
                            </h3>
                            <p class="font-light text-gray-500 text-md md:text-lg">
                                Start your first entry today and take the first step to self-discovery.
                            </p>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
<!-- experience / benefit section //end -->

@endsection
