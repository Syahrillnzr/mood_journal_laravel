<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <section class="py-24 relative">
            <div class="w-full max-w-4xl px-4 md:px-5 lg:px-5 mx-auto">
                <!-- Header -->
                <div class="w-full flex-col justify-center items-center gap-4 flex mb-10">
                <h2 class="text-center text-gray-900 text-4xl font-bold leading-normal">Add Mood Entry</h2>
                <p class="max-w-3xl text-center text-gray-500 text-base leading-relaxed">
                    Share your current mood, describe your day, and upload a photo if you want.
                </p>
                </div>

                <div class="w-full flex-col justify-start items-start gap-8 flex">
                
                <!-- Mood Selection Dropdown -->
                <div class="w-full flex-col justify-start items-start gap-4 flex" x-data="{ open: false, selected: 'Select Your Mood' }">
                <h4 class="text-gray-900 text-xl font-semibold leading-loose">Select Your Mood</h4>

                <div class="relative w-full">
                    <!-- Dropdown button -->
                    <button @click="open = !open" type="button"
                    class="w-full px-5 py-3 bg-gray-100 text-gray-900 font-medium rounded-lg shadow flex justify-between items-center focus:outline-none">
                    <span x-text="selected"></span>
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 9l-7 7-7-7"></path>
                    </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div x-show="open" @click.away="open = false"
                    class="absolute z-10 mt-1 w-full bg-white border border-gray-200 rounded-lg shadow-lg">
                    <ul class="py-1">
                        <li>
                        <button @click="selected='😊 Happy'; open=false"
                            class="w-full text-left px-5 py-2 hover:bg-yellow-100 rounded-lg flex items-center gap-2">
                            😊 Happy
                        </button>
                        </li>
                        <li>
                        <button @click="selected='😢 Sad'; open=false"
                            class="w-full text-left px-5 py-2 hover:bg-blue-100 rounded-lg flex items-center gap-2">
                            😢 Sad
                        </button>
                        </li>
                        <li>
                        <button @click="selected='😡 Angry'; open=false"
                            class="w-full text-left px-5 py-2 hover:bg-red-100 rounded-lg flex items-center gap-2">
                            😡 Angry
                        </button>
                        </li>
                        <li>
                        <button @click="selected='😌 Relaxed'; open=false"
                            class="w-full text-left px-5 py-2 hover:bg-green-100 rounded-lg flex items-center gap-2">
                            😌 Relaxed
                        </button>
                        </li>
                    </ul>
                    </div>
                </div>
                </div>


                <!-- Mood Description -->
                <div class="w-full flex-col justify-start items-start gap-2 flex">
                    <label class="text-gray-600 text-base font-medium leading-relaxed">Description</label>
                    <textarea class="w-full px-5 py-3 rounded-lg border border-gray-200 text-gray-900 placeholder-gray-400 focus:outline-none shadow-sm" rows="4" placeholder="Write about your day..."></textarea>
                </div>

                <!-- Highlights -->
                <div class="w-full flex-col justify-start items-start gap-2 flex">
                    <label class="text-gray-600 text-base font-medium leading-relaxed">Key Moments / Highlights</label>
                    <input type="text" class="w-full px-5 py-3 rounded-lg border border-gray-200 text-gray-900 placeholder-gray-400 focus:outline-none shadow-sm" placeholder="Highlight 1">
                    <input type="text" class="w-full px-5 py-3 rounded-lg border border-gray-200 text-gray-900 placeholder-gray-400 focus:outline-none shadow-sm" placeholder="Highlight 2">
                </div>

                <!-- Image Upload -->
                <div class="w-full flex-col justify-start items-start gap-2 flex">
                    <label class="text-gray-600 text-base font-medium leading-relaxed mb-2">Upload Photo (optional)</label>
                    <label for="upload-file" class="flex flex-col items-center justify-center py-6 w-full border border-gray-300 border-dashed rounded-2xl cursor-pointer bg-gray-50 hover:bg-gray-100 transition">
                    <span class="text-gray-400 text-sm mb-1">PNG, JPG or GIF, smaller than 15MB</span>
                    <span class="text-gray-900 text-base font-medium">Click to upload or drag here</span>
                    <input id="upload-file" type="file" class="hidden" />
                    </label>
                </div>

                <!-- Submit Button -->
                <button class="w-full sm:w-auto px-8 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl shadow transition-all duration-500">
                    Submit Mood Entry
                </button>

                </div>
            </div>
        </section>
    </div>
</x-admin-layout>

                                            