<x-app-layout>
  <main id="main" class="main">

<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
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
        <div class="col-xxl-3 col-md-3">
          <div class="card info-card sales-card">

            <div class="card-body">
              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>
                  <li><button class="week dropdown-item" >This Week</button></li>
                  <li><button class="all dropdown-item">OverAll</button></li>
                </ul>
              </div>
              <h5 class="thisweek card-title">All Activities <span>| This Week</span></h5>
              <h5 class="thisall card-title">All Activities <span>| All</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-github"></i>
                </div>
                <div class="ps-3">
                  <?php 
                    $id = auth()->id();
                    $todoCount = DB::table('todos')->where('user_id',$id)->count();
                    $carbon = \Carbon\Carbon::now();  
                    $weekStartDate = $carbon->startOfWeek()->format('Y-m-d H:i');
                    $weekEndDate = $carbon->endOfWeek()->format('Y-m-d H:i');
                    $todoCountThisWeek =  DB::table('todos')->where('user_id',$id)->whereBetween('created_at',[$weekStartDate,$weekEndDate])->count();
                  ?>
                  <h6 class="weekall">{{$todoCountThisWeek}}</h6>
                  <h6 class="allall">{{$todoCount}}</h6>
                </div>
              </div>
            </div>

          </div>
        </div><!-- End Sales Card -->

        <!-- Revenue Card -->
        <div class="col-xxl-3 col-md-3">
          <div class="card info-card customers-card">

            <div class="card-body">
              <h5 class="card-title">Pending Activities <span>| This Week</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-github"></i>
                </div>
                <div class="ps-3">
                  <?php 
                    $ptodoCount = DB::table('todos')->where('complited',false)->where('user_id',$id)->get();
                    $ptodoCount = $ptodoCount->count();
                  ?>
                  <h6>{{$ptodoCount}}</h6>
                  <?php 
                    if($todoCount == 0){
                      $todoCount = 1;
                    }
                    $pp = ($ptodoCount/$todoCount)*100;
                  ?>
                  <span class="text-danger small pt-1 fw-bold">{{$pp}}%</span> <span class="text-muted small pt-2 ps-1"></span>
                </div>
              </div>
            </div>

          </div>
        </div><!-- End Revenue Card -->

        <!-- Customers Card -->
        <div class="col-xxl-3 col-xl-12 col-md-3">

          <div class="card info-card revenue-card">

            <div class="card-body">
              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>
                  <li><button class="week dropdown-item" >This Week</button></li>
                  <li><button class="all dropdown-item">OverAll</button></li>
                </ul>
              </div>
              <h5 class="thisweek card-title">Completed Activities <span>| This Week</span></h5>
              <h5 class="thisall card-title">Completed Activities <span>| All</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-github"></i>
                </div>
                <div class="ps-3">
                  <?php 
                    $ptodoCount = DB::table('todos')->where('complited',true)->where('user_id',$id)->get();
                    $ptodoCount = $ptodoCount->count();
                    $carbon = \Carbon\Carbon::now();  
                    $weekStartDate = $carbon->startOfWeek()->format('Y-m-d H:i');
                    $weekEndDate = $carbon->endOfWeek()->format('Y-m-d H:i');
                    $todoCountThisWeekk =  DB::table('todos')->where('complited',true)->where('user_id',$id)->whereBetween('created_at',[$weekStartDate,$weekEndDate])->count();
                  ?>
                  <h6 class="weekall">{{$todoCountThisWeekk}}</h6>
                  <h6 class="allall">{{$ptodoCount}}</h6>
                  <?php 
                  if($todoCount == 0){
                    $todoCount = 1;
                  }
                  if($todoCountThisWeek == 0){
                    $todoCountThisWeek = 1;
                  }
                  $p = ($ptodoCount/$todoCount)*100;
                  $pw = ($todoCountThisWeekk/$todoCountThisWeek)*100;
                  ?>
                  <span class="pall text-danger small pt-1 fw-bold">{{$p}}%</span> <span class="text-muted small pt-2 ps-1"></span>
                  <span class="pweek text-danger small pt-1 fw-bold">{{$pw}}%</span> <span class="text-muted small pt-2 ps-1"></span>
                </div>
              </div>

            </div>
          </div>

        </div><!-- End Customers Card -->

      <!-- Revenue Card -->
      <div class="col-xxl-3 col-md-3">
        <div class="card info-card revenue-card">

          <div class="card-body">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>
                <li><button class="week dropdown-item">This Week</button></li>
                <li><button class="all dropdown-item">OverAll</button></li>
              </ul>
            </div>
            <h5 class="thisweek card-title">Transfered Activities <span>| This Week</span></h5>
            <h5 class="thisall card-title">Transfered Activities <span>| All</span></h5>

            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-github"></i>
              </div>
              <div class="ps-3">
              <?php 
                  $id = auth()->id();
                  $todoCount = DB::table('transfers')->where('user_id',$id)->count();
                  $carbon = \Carbon\Carbon::now();  
                  $weekStartDate = $carbon->startOfWeek()->format('Y-m-d H:i');
                  $weekEndDate = $carbon->endOfWeek()->format('Y-m-d H:i');
                  $todoCountweek =  DB::table('transfers')->where('user_id',$id)->whereBetween('created_at',[$weekStartDate,$weekEndDate])->count();
                ?>
                <h6 class="weekall">{{$todoCountweek}}</h6>
                <h6 class="allall">{{$todoCount}}</h6>
              </div>
            </div>
          </div>
        </div>
      </div><!-- End Revenue Card -->

<!-- Reports -->
<div class="col-md-6">
          <div class="card">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Reports <span>/Today</span></h5>

              <!-- Line Chart -->
              <div id="reportsChart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new ApexCharts(document.querySelector("#reportsChart"), {
                    series: [{
                      name: 'ICT',
                      data: [31, 40, 28, 51, 42, 82, 56],
                    }, {
                      name: 'PMU',
                      data: [11, 32, 45, 32, 34, 52, 41]
                    }, {
                      name: 'Legal',
                      data: [15, 11, 32, 18, 9, 24, 11]
                    }],
                    chart: {
                      height: 350,
                      type: 'area',
                      toolbar: {
                        show: false
                      },
                    },
                    markers: {
                      size: 4
                    },
                    colors: ['#4154f1', '#2eca6a', '#ff771d'],
                    fill: {
                      type: "gradient",
                      gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.3,
                        opacityTo: 0.4,
                        stops: [0, 90, 100]
                      }
                    },
                    dataLabels: {
                      enabled: false
                    },
                    stroke: {
                      curve: 'smooth',
                      width: 2
                    },
                    xaxis: {
                      type: 'datetime',
                      categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                    },
                    tooltip: {
                      x: {
                        format: 'dd/MM/yy HH:mm'
                      },
                    }
                  }).render();
                });
              </script>
              <!-- End Line Chart -->

            </div>

          </div>
        </div><!-- End Reports -->
        
              <!-- Recent Activity -->
              <div class="card">
                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>
                      <?php 
                        $dpts = DB::select("SELECT * FROM departments");
                      ?>
                        <li><a class="dropdown-item" href="{{ asset('/' . $id . '/guttdg1') }}">mine</a></li>
                      @foreach($dpts AS $dpt)
                        <li><a class="dropdown-item" href="{{ asset('/' . $dpt->id . '/guttdg2') }}">{{$dpt->name}}</a></li>
                      @endforeach
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Recent Activity <span>| This Week</span></h5>

                  <div class="activity">
                  <?php
                  if(isset($userid)){
                    $id = $userid;
                  }
                  $color = "";
                  $carbon = \Carbon\Carbon::now();  
                  $weekStartDate = $carbon->startOfWeek()->format('Y-m-d H:i');
                  $weekEndDate = $carbon->endOfWeek()->format('Y-m-d H:i');
                  $activities = DB::select("SELECT * FROM todos WHERE user_id = $id AND created_at BETWEEN '$weekStartDate' AND '$weekEndDate'UNION SELECT * FROM todos WHERE id IN(SELECT todo_id FROM transfers WHERE user_id = $id OR dpt_id IN(SELECT dpt_id FROM users WHERE id = $id AND id IN(SELECT user_id FROM role_user WHERE role_id = 3))) AND created_at BETWEEN '$weekStartDate' AND '$weekEndDate'");
                  foreach($activities As $todos){
                      $deadline = $todos->deadline;
                      $title = $todos->title;
                      if($todos->complited == true){
                        $class = 'text-success';
                      }else{
                        $class = 'text-warning';
                      }
                      if($todos->transfered){
                        $color = "color:blue";
                      }
                      if($deadline == date('Y-m-d')){
                        $deadline = 'Today';
                      }
                      echo "<div class='activity-item d-flex'>
                        <div class='activite-label'>$deadline</div>
                        <i class='bi bi-circle-fill activity-badge $class align-self-start'></i>
                        <div class='activity-content' style='$color'>
                          $title
                        </div>
                      </div>";
                  }
                ?>

                  </div>

                </div>
              </div><!-- End Recent Activity -->

      </div>
    </div><!-- End Left side columns -->

  </div>
</section>

</main><!-- End #main -->
</x-app-layout>