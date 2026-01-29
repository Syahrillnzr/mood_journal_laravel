@extends('layouts.landing')

@section('title', 'Terms and Privacy – Mood Journal')

@section('content')
        

<!-- experience / benefit section -->
<section class="py-16 bg-gray-50" x-data="{ tab: 'privacy' }">
  <div class="max-w-6xl mx-auto px-4 lg:flex lg:space-x-8">

    <!-- Side Menu -->
    <nav class="lg:w-1/4 mb-8 lg:mb-0 sticky top-20">
      <ul class="space-y-4">
        <li>
          <button 
            class="block font-semibold text-gray-700 hover:text-blue-600 transition"
            :class="{'text-blue-600 font-bold': tab === 'privacy'}"
            @click="tab = 'privacy'">
            Privacy Policy
          </button>
        </li>
        <li>
          <button 
            class="block font-semibold text-gray-700 hover:text-blue-600 transition"
            :class="{'text-blue-600 font-bold': tab === 'terms'}"
            @click="tab = 'terms'">
            Terms & Conditions
          </button>
        </li>
      </ul>
    </nav>

    <!-- Content Area -->
    <div class="lg:w-3/4 h-[500px] overflow-y-auto p-4 border border-gray-200 rounded-lg bg-white">

      <!-- Privacy Policy -->
      <div x-show="tab === 'privacy'" x-transition class="space-y-4">
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Privacy Policy</h2>
        <p class="text-gray-600 leading-relaxed">
          We value your privacy. Your personal information is safe and never shared with third parties.
        </p>
        <p class="text-gray-600 leading-relaxed">
          We only collect necessary data to provide our services, like email for account registration and mood entries to track your progress.
        </p>
      </div>

      <!-- Terms & Conditions -->
      <div x-show="tab === 'terms'" x-transition class="space-y-4">
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Terms & Conditions</h2>
        <p class="text-gray-600 leading-relaxed">
          By using this platform, you agree to follow all applicable laws and our usage guidelines.
        </p>
        <p class="text-gray-600 leading-relaxed">
          You are responsible for keeping your account secure. Continued use means acceptance of updated terms.
        </p>
      </div>

    </div>
  </div>
</section>

<!-- experience / benefit section //end -->

@endsection
