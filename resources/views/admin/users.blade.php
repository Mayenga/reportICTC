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
        <div class="col-xxl-12 col-md-12">
          <div class="card info-card sales-card">
            <div class="">
              <a class="" href="#">Users</a>
            </div>
            <div class="card-body">
              <table class="table table-hover">
                <thead>
                  <th>Username</th>
                  <th>Email</th>
                  <th>User Role</th>
                  <th>Department</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  @foreach($users as $user)
                  <?php 
                    $color = "background-color:#357C3C;color:white";
                    if($user->roles == 'user'){
                      $roles = "Officer";
                    }else{
                      $roles = $user->roles;
                    }
                    if($user->roles == 'dg'){
                      $roles = "Director General";
                    }
                    if($user->roles == 'dg'){
                      $dpt = " - ";
                    }else{
                      $dpt = $user->dpt;
                    }
                  ?>
                    <tr style="{{ $color }}">
                      <td>{{$user->username}} </td>
                      <td>{{$user->email}} </td>
                      <td>{{$roles}} </td>
                      <td>{{$dpt}} </td>
                      <td><a href="">Delete</a> | <a href="">View</a> | <a href="">Suspend</a> </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div><!-- End Sales Card -->

      </div>
    </div><!-- End Left side columns -->

  </div>
</section>

</main><!-- End #main -->
</x-app-layout>