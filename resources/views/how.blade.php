@extends('layouts.landing')

@section('title', 'How it work – Mood Journal')

@section('content')
        

<!-- how it works section -->

    <section class="py-24 relative">
        <div class="w-full max-w-7xl px-4 md:px-5 lg:px-5 mx-auto">
            <div class="w-full flex-col justify-start items-center lg:gap-12 gap-10 inline-flex">
                <div class="w-full flex-col justify-start items-center gap-3 flex">
                    <h2 class="w-full text-center text-gray-900 text-4xl font-bold font-manrope leading-normal">How It Works</h2>
                <p class="text-gray-400 text-base font-normal leading-relaxed">Take a moment to pause and notice how you're feeling right now. 
                    Don't overthink it—just observe your emotional state without judgment.</p>
                    <p class="text-gray-400 text-base font-normal leading-relaxed">Consider what physical sensations you're experiencing too.</p>
                </div>
                <div class="w-full justify-start items-start gap-8 grid md:grid-cols-3 grid-cols-1">
                    <!-- Step 1 -->
                    <div class="w-full flex-col justify-start items-start gap-2.5 inline-flex">
                        <div class="w-full flex justify-between relative">
                            <h4 class="text-gray-900 text-xl font-semibold leading-8">Check In With Your Mood</h4>
                            <h3 class="text-gray-100 text-7xl font-extrabold font-manrope leading-[100px] absolute -top-9 right-0">1</h3>
                        </div>
                        <p class="text-gray-400 text-base font-normal leading-relaxed">Take a moment to pause and notice how you're feeling right now. Don't overthink it—just observe your emotional state without judgment. Consider what physical sensations you're experiencing too.</p>
                    </div>

                    <!-- Step 2 -->
                    <div class="w-full flex-col justify-start items-start gap-2.5 inline-flex">
                        <div class="w-full flex justify-between relative">
                            <h4 class="text-gray-900 text-xl font-semibold leading-8">Explore the Why</h4>
                            <h3 class="text-gray-100 text-7xl font-extrabold font-manrope leading-[100px] absolute -top-9 right-0">2</h3>
                        </div>
                        <p class="text-gray-400 text-base font-normal leading-relaxed">Dig deeper into what's influencing your mood. What events, interactions, or thoughts triggered this feeling? Be curious and honest with yourself without being critical.</p>
                    </div>

                    <!-- Step 3 -->
                    <div class="w-full flex-col justify-start items-start gap-2.5 inline-flex">
                        <div class="w-full flex justify-between relative">
                            <h4 class="text-gray-900 text-xl font-semibold leading-8">Write It Out</h4>
                            <h3 class="text-gray-100 text-7xl font-extrabold font-manrope leading-[100px] absolute -top-9 right-0">3</h3>
                        </div>
                        <p class="text-gray-400 text-base font-normal leading-relaxed">Let your thoughts flow freely onto the page. Write without worrying about grammar or being perfect. This is your safe space to express everything you're feeling.</p>
                    </div>

                    <!-- Step 4 -->
                    <div class="w-full flex-col justify-start items-start gap-2.5 inline-flex">
                        <div class="w-full flex justify-between relative">
                            <h4 class="text-gray-900 text-xl font-semibold leading-8">Reflect & Find Meaning</h4>
                            <h3 class="text-gray-100 text-7xl font-extrabold font-manrope leading-[100px] absolute -top-9 right-0">4</h3>
                        </div>
                        <p class="text-gray-400 text-base font-normal leading-relaxed">Step back and reflect on what you've written. Look for insights, patterns, or lessons. What can you learn from this moment about yourself?</p>
                    </div>

                    <!-- Step 5 -->
                    <div class="w-full flex-col justify-start items-start gap-2.5 inline-flex">
                        <div class="w-full flex justify-between relative">
                            <h4 class="text-gray-900 text-xl font-semibold leading-8">Plan Your Next Step</h4>
                            <h3 class="text-gray-100 text-7xl font-extrabold font-manrope leading-[100px] absolute -top-9 right-0">5</h3>
                        </div>
                        <p class="text-gray-400 text-base font-normal leading-relaxed">Decide on one small action you can take to support your wellbeing. This could be self-care, reaching out to someone, or simply letting yourself rest.</p>
                    </div>

                    <!-- Step 6 -->
                    <div class="w-full flex-col justify-start items-start gap-2.5 inline-flex">
                        <div class="w-full flex justify-between relative">
                            <h4 class="text-gray-900 text-xl font-semibold leading-8">Celebrate Your Progress</h4>
                            <h3 class="text-gray-100 text-7xl font-extrabold font-manrope leading-[100px] absolute -top-9 right-0">6</h3>
                        </div>
                        <p class="text-gray-400 text-base font-normal leading-relaxed">Acknowledge that you took time for self-reflection. This act of checking in with yourself is an act of self-love and growth. Remember: progress isn't always linear.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
                                            
<!-- how it work section //end -->

@endsection
