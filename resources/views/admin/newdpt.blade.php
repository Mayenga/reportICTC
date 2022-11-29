<x-app-layout>
<main id="main" class="main">
<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">
    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">

        <!-- Sales Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card sales-card">
            <div class="">
              <a class="" href="#">Departent Registration</a>
            </div>
            <div class="card-body">

              <!-- Validation Errors -->
              <x-auth-validation-errors class="mb-4" :errors="$errors" />
              
              <form method="POST" action="{{ route('registerdpt') }}">
                  @csrf

                  <!-- Name -->
                  <div>
                      <x-label for="name" :value="__('Name')" />

                      <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                  </div>

                  <div class="flex items-center justify-end mt-4">
                      <x-button class="ml-4">
                          {{ __('Register') }}
                      </x-button>
                  </div>
              </form>
            </div>
          </div>
        </div><!-- End Sales Card -->

      </div>
    </div><!-- End Left side columns -->

  </div>
</section>

</main><!-- End #main -->
</x-app-layout>