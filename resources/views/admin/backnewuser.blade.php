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
              <a class="" href="#">User Registration</a>
            </div>
            <div class="card-body">

              <!-- Validation Errors -->
              <x-auth-validation-errors class="mb-4" :errors="$errors" />
              
              <form method="POST" action="{{ route('backregisterr') }}">
                  @csrf

                  <!-- Name -->
                  <div>
                      <x-label for="name" :value="__('Name')" />

                      <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                  </div>

                  <!-- Email Address -->
                  <div class="mt-4">
                      <x-label for="email" :value="__('Email')" />

                      <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                  </div>

                  <!-- select option role type -->
                  <div class="mt-4">
                      <x-label for="role_id" value="{{ __('Register As : ') }}" />
                      <select name="role_id" class="block mt-1 w-full border-grey-300 focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                          <option value="admin">Admin</option>
                          <option value="dg">DG</option>
                          <option value="director">Director</option>
                          <option value="user">User</option>
                      </select>
                  </div>

                  <!-- select option departent type -->
                  <div class="mt-4">
                      <x-label for="dpt_id" value="{{ __('From : ') }}" />
                      <?php 
                        $dpts = DB::select('SELECT * FROM departments');
                      ?>
                      <select name="dpt_id" class="block mt-1 w-full border-grey-300 focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        @foreach($dpts AS $dpt)
                          <option value="{{ $dpt->id }}">{{$dpt->name}}</option>
                        @endforeach
                      </select>
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