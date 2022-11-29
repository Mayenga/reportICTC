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

    <div class="card">
            <div class="card-body">
              <?php 
                $carbon = \Carbon\Carbon::now();  
                $d1 = date('d');
                $to = 0;
                $leo = $carbon->dayOfWeek;
                if($leo < 7){
                  $cd = 6 - $leo;
                  $to = $d1 + $cd;
                }
                $d2 = $to;
              ?>
              <h5 class="card-title">Create New Activity</h5><span> {{$carbon->format('l')}} Day {{$carbon->dayOfWeek}} Of this week. Deadline shall be from todays date {{$d1}}. </span>
              <!-- and {{$d2}} -->
              
              @if (Session::has('success'))
                <div class="alert alert-success alert-dismissable" role="alert">
                  <button type="button" class="close" data-dismiss="alert">
                    <i class="fa fa-times"></i>
                  </button>
                  <strong>Success !</strong> {{session('success')}}
                </div>
              @endif
              
              @if (Session::has('error'))
                <div class="alert alert-success alert-dismissable" role="alert">
                  <button type="button" class="close" data-dismiss="alert">
                    <i class="fa fa-times"></i>
                  </button>
                  <strong>Success !</strong> {{session('error')}}
                </div>
              @endif

              @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
              @endif

              <!-- Floating Labels Form -->
              <form class="row g-3" action="/upload" method="get">
                @csrf
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" name="title" class="form-control" id="" placeholder="Activity As Per Action Plan">
                    <label for="floatingName">Activity</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-floating">
                    <textarea cols="40" rows="5" class="form-control" name="process" placeholder="Activity Progress" id="floatingTextarea" style="height: 100px;"></textarea>
                    <label for="floatingTextarea">Process</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-floating">
                    <textarea class="form-control" name="progress" placeholder="Activity Progress" id="floatingTextarea" style="height: 100px;"></textarea>
                    <label for="floatingTextarea">Progress</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="inputDate" class="col-sm-2 col-form-label">Deadline</label>
                  <div class="col-sm-10">
                    <input type="date" name="deadline" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" name="output" class="form-control" id="floatingZip" placeholder="Zip">
                    <label for="floatingZip">Output</label>
                  </div>
                </div>
                @if (Auth::user()->hasRole('dg'))
                <div class="row mb-3 col-md-6">
                  <label class="col-sm-2 col-form-label">Transfer Activity</label>
                  <div class="col-sm-10">
                  <?php 
                    $dpts = DB::select('SELECT * FROM departments');
                  ?>
                    <select name="transfer" class="form-select" multiple aria-label="multiple select example">
                      <option value="" selected>Select Department or Section</option>
                      @foreach($dpts AS $dpt)
                        <option value="{{ $dpt->id }}">{{$dpt->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                @endif
                @if (Auth::user()->hasRole('director'))
                <div class="row mb-3 col-md-6">
                  <label class="col-sm-2 col-form-label">Transfer Activity</label>
                  <div class="col-sm-10">
                  <?php 
                    $id = Auth::user()->id;
                    $dg =  DB::select("SELECT id FROM users WHERE id IN(SELECT user_id FROM role_user WHERE role_id = 2)");
                    $dptidDir = DB::select("SELECT dpt_id FROM users WHERE id = $id");
                    $iddd = 0;
                    foreach($dptidDir As $dpid){
                      $iddd = $dpid->dpt_id;
                    }
                    foreach($dg As $dgid){
                      $dg = $dgid->id;
                    }
                    $users = DB::select("SELECT * FROM users WHERE dpt_id = $iddd AND id != $id AND id != $dg");
                  ?>
                    <select name="transferUser" class="form-select" multiple aria-label="multiple select example">
                      <option value="" selected>Select Candidate</option>
                      @foreach($users AS $user)
                        <option value="{{ $user->id }}">{{$user->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                @endif
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Create</button>
                </div>
              </form><!-- End floating Labels Form -->

            </div>
          </div>
  </div>
</section>

</main><!-- End #main -->
</x-app-layout>