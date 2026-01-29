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
                                <li><a href="{{ route('home') }}" class="font-semibold text-gray-900 hover:text-blue-600 transition">Home</a></li>
                                <li><a href="{{ route('about') }}" class="font-semibold text-gray-900 hover:text-blue-600 transition">About</a></li>
                                <li><a href="{{ route('how') }}" class="font-semibold text-gray-900 hover:text-blue-600 transition">How it works</a></li>
                                <li><a href="{{ route('features') }}" class="font-semibold text-gray-900 hover:text-blue-600 transition">Features</a></li>
                                <li><a href="{{ route('blog') }}" class="font-semibold text-gray-900 hover:text-blue-600 transition">Blog</a></li>
                                <li><a href="{{ route('contact') }}" class="font-semibold text-gray-900 hover:text-blue-600 transition">Contact Us</a></li>
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

                </div>
            </section>

        <!-- home section //end -->