<x-app-layout>
<main id="main" class="main">
<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">
    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">

        <!-- Users Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card revenue-card">

            <div class="card-body">
              <h5 class="card-title">Users <span>| Total</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                  <?php 
                    $usersCount = DB::table('users')->count();
                  ?>
                  <h6>{{$usersCount}}</h6>

                </div>
              </div>
            </div>

          </div>
        </div><!-- End Sales Card -->

        <!-- Revenue Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card revenue-card">

          <div class="card-body">
              <h5 class="card-title">Active Users <span>| Total</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                  <?php 
                    $usersCount = DB::table('users')->count();
                  ?>
                  <h6>{{$usersCount}}</h6>

                </div>
              </div>
            </div>

          </div>
        </div><!-- End Revenue Card -->

        <!-- Customers Card -->
        <div class="col-xxl-4 col-xl-12">

          <div class="card info-card revenue-card">
            <div class="card-body">
              <h5 class="card-title">Suspanded Users <span>| Total</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                  <?php 
                    $usersCount = DB::table('users')->count();
                  ?>
                  <h6>0</h6>

                </div>
              </div>
            </div>
          </div>

        </div><!-- End Customers Card -->

        <!-- Customers Card -->
        <div class="col-xxl-4 col-xl-12">

          <div class="card info-card customers-card">
            <div class="card-body">
              <h5 class="card-title">Departments <span>| Total</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-bricks"></i>
                </div>
                <div class="ps-3">
                  <?php 
                    $dpt = DB::table('departments')->count();
                  ?>
                  <h6>{{$dpt}}</h6>

                </div>
              </div>
            </div>
          </div>

        </div><!-- End Customers Card -->

        <!-- Customers Card -->
        <div class="col-xxl-4 col-xl-12">

          <div class="card info-card customers-card">
            <div class="card-body">
              <h5 class="card-title">Active Departments <span>| Total</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-bricks"></i>
                </div>
                <div class="ps-3">
                  <?php 
                    $dptCount = DB::table('departments')->count();
                  ?>
                  <h6>{{$dptCount}}</h6>

                </div>
              </div>
            </div>
          </div>

        </div><!-- End Customers Card -->

        <!-- Customers Card -->
        <div class="col-xxl-4 col-xl-12">

          <div class="card info-card customers-card">
            <div class="card-body">
              <h5 class="card-title">De-active Departments <span>| Total</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-bricks"></i>
                </div>
                <div class="ps-3">
                  <?php 
                    $dptCount = DB::table('departments')->count();
                  ?>
                  <h6>0</h6>

                </div>
              </div>
            </div>
          </div>

        </div><!-- End Customers Card -->

      </div>
    </div><!-- End Left side columns -->

  </div>
</section>

</main><!-- End #main -->
</x-app-layout>