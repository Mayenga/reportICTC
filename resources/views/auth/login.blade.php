
<x-guest-layout>
        <x-slot name="logo">
        
        </x-slot>

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                <div class="d-flex justify-content-center py-4">
                  <a href="/" class="logo d-flex align-items-center w-auto">
                    <img src="assets/img/logo.png" alt="">
                    <span class="d-none d-lg-block">ICT Commission Reporter</span>
                  </a>
                </div><!-- End Logo -->

                <div class="card mb-3">

                  <div class="card-body">

                    <div class="pt-4 pb-2">
                      <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                      <p class="text-center small">Enter your email & password to login</p>
                    </div>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('login') }}" class="row g-3 needs-validation" novalidate>
                      @csrf
                      <div class="col-12">
                        <x-label for="email" :value="__('Email')" />
                        <div class="input-group has-validation">
                          <x-input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required autofocus />
                          <div class="invalid-feedback">Please enter your email.</div>
                        </div>
                      </div>

                      <div class="col-12">
                        <x-label for="password" :value="__('Password')" />
                        <x-input id="password" class="block mt-1 w-full form-control"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
                        <div class="invalid-feedback">Please enter your password!</div>
                      </div>

                      <!-- Remember Me -->
                      <div class="block mt-4">
                          <label for="remember_me" class="inline-flex items-center">
                              <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                              <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                          </label>
                      </div>
            
                      <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <x-button class="btn btn-primary ml-3">
                            {{ __('Log in') }}
                        </x-button>
                      </div>
                    </form>
  
                  </div>
                </div>

              </div>
            </div>
          </div>

      </section>
</x-guest-layout>