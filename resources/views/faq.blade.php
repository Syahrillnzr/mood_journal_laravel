@extends('layouts.landing')

@section('title', 'FAQ – Mood Journal')

@section('content')
        

<!-- FAQ Section -->
  <section class="py-24 bg-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col lg:flex-row items-center lg:justify-between gap-y-10 gap-x-16">

        <!-- Image -->
        <div class="w-full lg:w-1/2">
          <img
            src="https://pagedone.io/asset/uploads/1696230182.png"
            alt="FAQ illustration"
            class="w-full rounded-xl object-cover"
          />
        </div>

        <!-- FAQ Content -->
        <div class="w-full lg:w-1/2">
          <div class="lg:max-w-xl mx-auto lg:mx-0">
            <!-- Title -->
            <div class="mb-6 lg:mb-16 text-center lg:text-left">
              <h6 class="text-lg font-medium text-indigo-600 mb-2">FAQs</h6>
              <h2 class="text-4xl font-bold text-gray-900 leading-snug">Looking for answers?</h2>
            </div>

            <!-- Accordion -->
            <div x-data="{ openItem: 1 }" class="space-y-4">
              <!-- FAQ 1 -->
              <div class="border-b border-gray-200 pb-4">
                <button
                  @click="openItem === 1 ? openItem = null : openItem = 1"
                  class="flex justify-between w-full text-left text-gray-700 font-medium text-lg hover:text-indigo-600 transition"
                >
                  <span>How do I create an account?</span>
                  <svg :class="{'rotate-180': openItem === 1}" class="w-5 h-5 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                  </svg>
                </button>
                <div x-show="openItem === 1" x-collapse class="mt-2 text-gray-600 text-base">
                  To create an account, click 'Sign up', fill in your details, verify your email, and log in.
                </div>
              </div>

              <!-- FAQ 2 -->
              <div class="border-b border-gray-200 pb-4">
                <button
                  @click="openItem === 2 ? openItem = null : openItem = 2"
                  class="flex justify-between w-full text-left text-gray-700 font-medium text-lg hover:text-indigo-600 transition"
                >
                  <span>How do I reset my password?</span>
                  <svg :class="{'rotate-180': openItem === 2}" class="w-5 h-5 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                  </svg>
                </button>
                <div x-show="openItem === 2" x-collapse class="mt-2 text-gray-600 text-base">
                  Click 'Forgot password?', enter your email, and follow the instructions to reset your password.
                </div>
              </div>

              <!-- FAQ 3 -->
              <div class="border-b border-gray-200 pb-4">
                <button
                  @click="openItem === 3 ? openItem = null : openItem = 3"
                  class="flex justify-between w-full text-left text-gray-700 font-medium text-lg hover:text-indigo-600 transition"
                >
                  <span>Is my journal private?</span>
                  <svg :class="{'rotate-180': openItem === 3}" class="w-5 h-5 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                  </svg>
                </button>
                <div x-show="openItem === 3" x-collapse class="mt-2 text-gray-600 text-base">
                  Yes! All entries are private and securely stored. Only you can access your journal.
                </div>
              </div>

              <!-- FAQ 4 -->
              <div class="pb-4">
                <button
                  @click="openItem === 4 ? openItem = null : openItem = 4"
                  class="flex justify-between w-full text-left text-gray-700 font-medium text-lg hover:text-indigo-600 transition"
                >
                  <span>What is the payment process?</span>
                  <svg :class="{'rotate-180': openItem === 4}" class="w-5 h-5 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                  </svg>
                </button>
                <div x-show="openItem === 4" x-collapse class="mt-2 text-gray-600 text-base">
                  Payments are processed securely through our trusted providers. You will receive a confirmation after each transaction.
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>



@endsection
