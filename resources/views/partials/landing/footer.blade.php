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
                    <a href="{{ route('home') }}" class="block font-light text-gray-400 text-sm md:text-lg hover:text-gray-800 transition ease-in-out duration-300">Home</a>
                    <a href="{{ route('about') }}" class="block font-light text-gray-400 text-sm md:text-lg hover:text-gray-800 transition ease-in-out duration-300">About</a>
                    <a href="{{ route('features') }}" class="block font-light text-gray-400 text-sm md:text-lg hover:text-gray-800 transition ease-in-out duration-300">Features</a>
                    <a href="{{ route('blog') }}" class="block font-light text-gray-400 text-sm md:text-lg hover:text-gray-800 transition ease-in-out duration-300">Blog</a>
                </div>

                {{-- <!-- Company -->
                <div class="text-center lg:text-left space-y-7 mb-10 lg:mb-0">
                    <h4 class="font-semibold text-gray-900 text-lg md:text-2xl">Company</h4>
                    <a href="#" class="block font-light text-gray-400 text-sm md:text-lg hover:text-gray-800 transition ease-in-out duration-300">About Us</a>
                    <a href="#" class="block font-light text-gray-400 text-sm md:text-lg hover:text-gray-800 transition ease-in-out duration-300">Careers</a>
                    <a href="#" class="block font-light text-gray-400 text-sm md:text-lg hover:text-gray-800 transition ease-in-out duration-300">Contact</a>
                </div> --}}

                <!-- Legal -->
                <div class="text-center lg:text-left space-y-7 mb-10 lg:mb-0">
                    <h4 class="font-semibold text-gray-900 text-lg md:text-2xl">Legal</h4>
                    <a href="{{ route('tncpnp') }}" class="block font-light text-gray-400 text-sm md:text-lg hover:text-gray-800 transition ease-in-out duration-300">Privacy Policy</a>
                    <a href="{{ route('tncpnp') }}" class="block font-light text-gray-400 text-sm md:text-lg hover:text-gray-800 transition ease-in-out duration-300">Terms & Conditions</a>
                    <a href="{{ route('faq') }}" class="block font-light text-gray-400 text-sm md:text-lg hover:text-gray-800 transition ease-in-out duration-300">FAQ</a>
                </div>

            </div>

            <!-- Footer bottom -->
            <div class="mt-16 border-t border-gray-200 pt-8 text-center text-gray-400 font-light text-sm md:text-md">
                &copy; 2026 - <span id="currentYear"></span> . All rights reserved. Design and Develop by <a href="https://syahrillnzr.github.io/" target="blank"  class="hover:text-blue-500 transition">Syahrill Norizan</a>
            </div>

        </div>
    </footer>