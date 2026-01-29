<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mercy - Tailwind Template</title>
        @vite(['resources/css/mercy_tailwind.css', 'resources/js/app.js'])
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" integrity="sha512-7x3zila4t2qNycrtZ31HO0NnJr8kg2VI67YLoRSyi9hGhRN66FHYWr7Axa9Y1J9tGYHVBPqIjSE1ogHrJTz51g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> 
    </head>

    <body class="font-body">

        <!-- home section -->
        
            <section class="bg-white py-6">
                <div class="container max-w-screen-xl mx-auto px-4">
                    {{-- NAVIGATION BAR --}}
                    <nav class="flex items-center justify-between flex-wrap" x-data="{ navbarOpen: false }">
                        {{-- LEFT: LOGO --}}
                        <div class="flex items-center space-x-4">
                            <a href="/">
                                <img src="{{ asset('image/landing/navbar-logo.png') }}" alt="Logo" class="h-10">
                            </a>
                        </div>

                        {{-- TOGGLE BUTTON (MOBILE) --}}
                        <div class="lg:hidden">
                            <button @click="navbarOpen = !navbarOpen" class="text-blue-600 border border-blue-600 p-2 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"/>
                                </svg>
                            </button>
                        </div>

                        {{-- CENTER + RIGHT: NAV LINKS & AUTH --}}
                        <div class="w-full lg:flex lg:items-center lg:justify-between lg:w-auto mt-4 lg:mt-0"
                            :class="{ 'block': navbarOpen, 'hidden': !navbarOpen }">
                            {{-- CENTER NAVIGATION LINKS --}}
                            <ul class="flex flex-col lg:flex-row lg:items-center lg:space-x-8 xl:space-x-14 mb-4 lg:mb-0">
                                <li><a href="#" class="font-semibold text-gray-900 hover:text-blue-600 transition">Home</a></li>
                                <li><a href="#" class="font-semibold text-gray-900 hover:text-blue-600 transition">About</a></li>
                                <li><a href="#" class="font-semibold text-gray-900 hover:text-blue-600 transition">How it works</a></li>
                                <li><a href="#" class="font-semibold text-gray-900 hover:text-blue-600 transition">Features</a></li>
                                <li><a href="#" class="font-semibold text-gray-900 hover:text-blue-600 transition">Contact Us</a></li>
                            </ul>

                            {{-- AUTH LINKS --}}
                            <div class="flex flex-col lg:flex-row lg:items-center gap-3 ml-0 lg:ml-10">
                                @if (Route::has('login'))
                                    @auth
                                        <a href="{{ url('/dashboard') }}"
                                        class="px-5 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-800 hover:bg-gray-100 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700">
                                            Dashboard
                                        </a>
                                    @else
                                        <a href="{{ route('login') }}"
                                        class="px-5 py-3 border border-transparent rounded-md text-sm font-medium text-blue-600 hover:border-blue-500">
                                            Log in
                                        </a>

                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}"
                                            class="px-5 py-2 border border-blue-500 text-blue-500 rounded-md text-sm font-medium hover:bg-blue-500 hover:text-white transition">
                                                Register
                                            </a>
                                        @endif
                                    @endauth
                                @endif
                            </div>
                        </div>
                    </nav>

                    {{-- HERO SECTION --}}
                    <div class="flex flex-col lg:flex-row justify-between items-center space-y-12 lg:space-y-0 lg:space-x-20 mt-20">
                        {{-- TEXT --}}
                        <div class="text-center lg:text-left">
                            <h1 class="font-bold text-gray-900 text-3xl md:text-6xl leading-snug mb-6">
                                Reflect Your Mood <br> Understand Yourself
                            </h1>
                            <p class="text-gray-500 text-md md:text-lg leading-relaxed mb-10">
                                A personal space to track your emotions, reflect on your day, <br>
                                and discover patterns that help you grow emotionally.
                            </p>

                            <button class="px-6 py-4 bg-blue-500 font-semibold text-white text-lg rounded-xl hover:bg-blue-700 transition">
                                Get Started
                            </button>
                        </div>

                        {{-- IMAGE --}}
                        <div>
                            <img src="{{ asset('image/landing/home-img.png') }}" alt="Hero Image" class="w-full max-w-md mx-auto lg:mx-0">
                        </div>
                    </div>
                </div>
            </section>

        <!-- home section //end -->

        <!-- feature section -->
            <section class="bg-white py-16 md:mt-10">

                <div class="container max-w-screen-xl mx-auto px-4">

                    <p class="font-light text-gray-500 text-lg md:text-xl text-center uppercase mb-6">
                        Our Features
                    </p>

                    <h1 class="font-semibold text-gray-900 text-xl md:text-4xl text-center leading-normal mb-10">
                        Build Awareness Through Daily Mood Tracking
                    </h1>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-20">

                        <!-- Feature 1 -->
                        <div class="text-center">
                            <div class="flex justify-center mb-6">
                                <div class="w-20 py-6 flex justify-center bg-blue-200 bg-opacity-30 text-blue-700 rounded-xl">
                                    <i data-feather="smile"></i>
                                </div>
                            </div>

                            <h4 class="font-semibold text-lg md:text-2xl text-gray-900 mb-6">
                                Track Your Mood
                            </h4>

                            <p class="font-light text-gray-500 text-md md:text-xl mb-6">
                                Log your emotions daily and reflect on how you feel over time.
                            </p>
                        </div>

                        <!-- Feature 2 -->
                        <div class="text-center">
                            <div class="flex justify-center mb-6">
                                <div class="w-20 py-6 flex justify-center bg-blue-200 bg-opacity-30 text-blue-700 rounded-xl">
                                    <i data-feather="edit-3"></i>
                                </div>
                            </div>

                            <h4 class="font-semibold text-lg md:text-2xl text-gray-900 mb-6">
                                Write Your Journal
                            </h4>

                            <p class="font-light text-gray-500 text-md md:text-xl mb-6">
                                Express your thoughts, highlight moments, and add personal notes.
                            </p>
                        </div>

                        <!-- Feature 3 -->
                        <div class="text-center">
                            <div class="flex justify-center mb-6">
                                <div class="w-20 py-6 flex justify-center bg-blue-200 bg-opacity-30 text-blue-700 rounded-xl">
                                    <i data-feather="bar-chart-2"></i>
                                </div>
                            </div>

                            <h4 class="font-semibold text-lg md:text-2xl text-gray-900 mb-6">
                                Mood Insights
                            </h4>

                            <p class="font-light text-gray-500 text-md md:text-xl mb-6">
                                Discover patterns and trends to better understand your emotional well-being.
                            </p>
                        </div>

                    </div>

                </div>

            </section>
        <!-- feature section //end -->

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


        <!-- join volunters section -->
        <section class="bg-white py-16">

            <div class="container max-w-screen-xl mx-auto px-4">

                <div class="w-full h-full bg-blue-500 rounded-2xl md:rounded-3xl relative lg:flex items-center">
                    <div class="hidden lg:block">
                        
                        <img src="{{ asset('image/landing/humans.png') }}" alt="image" class="relative z-10">

                        <img src="{{ asset('image/landing/pattern-2.png') }}" alt="image" class="absolute top-14 left-40">

                        <img src="{{ asset ('image/landing/pattern.png') }}" alt="Image" class="absolute top-0 z-0">
                        
                    </div>

                    <div class="lg:relative py-4 lg:py-0">
                        <h1 class="font-semibold text-white text-xl md:text-4xl text-center lg:text-left leading-normal md:mb-5 lg:mb-10">Interested in volunteering? Join <br> with us now</h1>

                        <div class="hidden md:block flex items-center text-center lg:text-left space-x-5">
                            <input type="text" placeholder="Email" class="px-4 py-4 w-96 bg-gray-50 placeholder-gray-400 rounded-xl outline-none">

                            <button class="px-6 py-4 font-semibold bg-gray-50 text-info text-lg rounded-xl hover:bg-blue-500 hover:text-white transition ease-in-out duration-500">Join</button>
                        </div>
                    </div>
                </div>

            </div> <!-- container.// -->

        </section>
        <!-- join volunters section //end -->

        <!-- footer section -->
            <footer class="bg-gray-50 py-16 border-t border-gray-200">
                <div class="container max-w-screen-xl mx-auto px-4">
                    <div class="flex flex-col lg:flex-row lg:justify-between">

                        <!-- Logo & Social -->
                        <div class="space-y-7 mb-10 lg:mb-0">
                            <div class="flex justify-center lg:justify-start">
                                <img src="{{ asset('image/landing/footer-logo.png') }}" alt="Mood Journal Logo">
                            </div>
                            
                            <p class="font-light text-gray-400 text-md md:text-lg text-center lg:text-left">
                                Track your moods, reflect on your thoughts, and understand yourself better.
                            </p>

                            <div class="flex items-center justify-center lg:justify-start space-x-5">
                                <a href="#" class="px-3 py-3 bg-gray-200 text-gray-700 rounded-full hover:bg-blue-500 hover:text-white transition ease-in-out duration-500">
                                    <i data-feather="facebook"></i>
                                </a>

                                <a href="#" class="px-3 py-3 bg-gray-200 text-gray-700 rounded-full hover:bg-blue-500 hover:text-white transition ease-in-out duration-500">
                                    <i data-feather="twitter"></i>
                                </a>

                                <a href="#" class="px-3 py-3 bg-gray-200 text-gray-700 rounded-full hover:bg-blue-500 hover:text-white transition ease-in-out duration-500">
                                    <i data-feather="linkedin"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Quick links -->
                        <div class="text-center lg:text-left space-y-7 mb-10 lg:mb-0">
                            <h4 class="font-semibold text-gray-900 text-lg md:text-2xl">Quick links</h4>
                            <a href="#" class="block font-light text-gray-400 text-sm md:text-lg hover:text-gray-800 transition ease-in-out duration-300">Home</a>
                            <a href="#" class="block font-light text-gray-400 text-sm md:text-lg hover:text-gray-800 transition ease-in-out duration-300">About</a>
                            <a href="#" class="block font-light text-gray-400 text-sm md:text-lg hover:text-gray-800 transition ease-in-out duration-300">Features</a>
                            <a href="#" class="block font-light text-gray-400 text-sm md:text-lg hover:text-gray-800 transition ease-in-out duration-300">Blog</a>
                        </div>

                        <!-- Company -->
                        <div class="text-center lg:text-left space-y-7 mb-10 lg:mb-0">
                            <h4 class="font-semibold text-gray-900 text-lg md:text-2xl">Company</h4>
                            <a href="#" class="block font-light text-gray-400 text-sm md:text-lg hover:text-gray-800 transition ease-in-out duration-300">About Us</a>
                            <a href="#" class="block font-light text-gray-400 text-sm md:text-lg hover:text-gray-800 transition ease-in-out duration-300">Careers</a>
                            <a href="#" class="block font-light text-gray-400 text-sm md:text-lg hover:text-gray-800 transition ease-in-out duration-300">Contact</a>
                        </div>

                        <!-- Legal -->
                        <div class="text-center lg:text-left space-y-7 mb-10 lg:mb-0">
                            <h4 class="font-semibold text-gray-900 text-lg md:text-2xl">Legal</h4>
                            <a href="#" class="block font-light text-gray-400 text-sm md:text-lg hover:text-gray-800 transition ease-in-out duration-300">Privacy Policy</a>
                            <a href="#" class="block font-light text-gray-400 text-sm md:text-lg hover:text-gray-800 transition ease-in-out duration-300">Terms & Conditions</a>
                            <a href="#" class="block font-light text-gray-400 text-sm md:text-lg hover:text-gray-800 transition ease-in-out duration-300">FAQ</a>
                        </div>

                    </div>

                    <!-- Footer bottom -->
                    <div class="mt-16 border-t border-gray-200 pt-8 text-center text-gray-400 font-light text-sm md:text-md">
                        &copy; 2026 - <span id="currentYear"></span> . All rights reserved. Design and Develop by <a href="https://syahrillnzr.github.io/" target="blank"  class="hover:text-blue-500 transition">Syahrill Norizan</a>
                    </div>

                </div>
            </footer>

        <script>
            feather.replace()
            document.getElementById('currentYear').textContent = new Date().getFullYear();
        </script>

        <script src="//unpkg.com/alpinejs" defer></script>
    </body>
</html>