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
              <h5 class="card-title">Edit Todo</h5>
              <form class="row g-3" action="/update" method="POST">
                @csrf
                <!-- @method('patch') -->
                <input style="display:none" name="id" value="{{$todo->id}}" />
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" name="title" value="{{ $todo->title }}" class="form-control" id="" placeholder="Activity As Per Action Plan">
                    <label for="floatingName">Activity</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-floating">
                    <textarea class="form-control" name="progress" placeholder="Activity Progress" id="floatingTextarea" style="height: 100px;">{{ $todo->process }}</textarea>
                    <label for="floatingTextarea">Process</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-floating">
                    <textarea class="form-control" name="progress" placeholder="Activity Progress" id="floatingTextarea" style="height: 100px;">{{ $todo->progress }}</textarea>
                    <label for="floatingTextarea">Progress</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="inputDate" class="col-sm-2 col-form-label">Deadline</label>
                  <div class="col-sm-10">{{ $todo->deadline }}
                    <input type="date" value="{{ $todo->deadline }}" name="deadline" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" name="output" value="{{ $todo->output }}" class="form-control" id="floatingZip" placeholder="Zip">
                    <label for="floatingZip">Output</label>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Edit</button>
                </div>
              </form><!-- End floating Labels Form -->

            </div>
          </div>
  </div>
</section>

</main><!-- End #main -->
</x-app-layout>