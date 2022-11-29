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
              <a class="" href="#">Departents</a>
            </div>
            <div class="card-body">
              <table class="table table-hover">
                <thead>
                  <th>Departent Name</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  @foreach($dpts as $dpt)
                    <tr>
                      <td>{{$dpt->name}} </td>
                      <td><a href="" style="color:red">Delete</a> | <a href="">Disable</a> </td>
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