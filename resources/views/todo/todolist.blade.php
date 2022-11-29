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

        <!-- Recent Sales -->
        <div class="col-12">
              <div class="card recent-sales">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>
                    <li><a class="dropdown-item" href="{{ route('todolistall') }}">All Activities</a></li>
                    <li><a class="dropdown-item" href="{{ route('todolistThisWeek') }}">This Week</a></li>
                  </ul>
                </div>
                <div class="card-body">
                  <?php 
                    $weak = '';
                    if($week){
                      $weak = 'This Week';
                    }else{
                      $weak = 'All';
                    }
                  ?>
                  <h5 class="card-title">Activity List<span>| <?php echo $weak ?></span></h5>
                  <!-- <a href="{{ route('getReport') }}" target="blank" class="badge bg-primary">PDF</a> -->
                  <h6>
                  <x-alert />
                </h6>
                  <table id="example" style="width:100%" class="display">
                    <thead>
                    <?php 
                      if($todos == ''){
                        echo '<h5>You havent register any Activity at the moment.</h5><br />
                        To register New Activity click \'Create Activity\' under \'Activities\' menu.';
                      }else{
                        if (Auth::user()->hasRole('dg') || Auth::user()->hasRole('director')){
                          echo '<tr>
                            <th scope="col">#</th>
                            <th scope="col">Activity</th>
                            <th scope="col">Process</th>
                            <th scope="col">Deadline</th>
                            <th scope="col">Progress</th>
                            <th scope="col">Output</th>
                            <th scope="col">Transfered</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                          </tr>';
                        }else{
                          echo '<tr>
                          <th scope="col">#</th>
                          <th scope="col">Activity</th>
                          <th scope="col">Process</th>
                          <th scope="col">Deadline</th>
                          <th scope="col">Progress</th>
                          <th scope="col">Output</th>
                          <th scope="col">Status</th>
                          <th scope="col">Action</th>
                        </tr>';
                        }
                      }
                    
                    ?>
                    </thead>
                    <tbody>
                      @foreach($todos as $todo)
                        <?php 
                        // $date1=date_create("2022-05-15");
                        // $date2=date_create("2013-12-12");
                        // $diff=date_diff($date1,$date2);
                        // echo $diff->format("%R%a days");

                        $d1 = date_create(date("Y-m-d"));
                        $d2 = date_create($todo->deadline);
                        // echo date_diff($d1,$d2);
                          
                          $status = '';
                          $statuss = '';
                          $statusclass = '';
                          $statusclasss = '';
                          $statusAction = '';
                          $sorted = '';
                          $reason = '';
                          $style = "";
                          $style2 = "";
                          $style3 = "";
                          $report = 'display:none;';
                          
                          if($todo->complited){
                            $statusclass = 'badge bg-success';
                            $status = 'Completed';
                            $statusAction = 'Completed';
                            $style = "pointer-events: none;";
                            $style2 = "pointer-events: none;";
                          }else{
                            $statusclass = 'badge bg-warning';
                            $status = 'Pending';
                            $statusAction = 'Completed';
                          }
                          if($d2 >= $d1){
                            $items = "display:block;";
                            $report = 'display:none;';
                            $sorted = 'display:none;';
                            $reason = 'display:none;';
                          }else{
                            if($todo->complited){
                              $items = "display:block;";
                              $report = 'display:none;';
                              $status = 'Completed';
                              $sorted = 'display:none;';
                              $reason = 'display:none;';
                              $statusclass = 'badge bg-success';
                            }else{
                              if($todo->reason == 'No reason'){
                                if (Auth::user()->hasRole('dg') || Auth::user()->hasRole('director') && $todo->transfered && $todo->reason == 'No reason'){
                                  $items = "display:none;";
                                  $report = 'display:none;';
                                  $sorted = 'display:none;';
                                  $reason = 'display:block;';
                                  $status = 'Pending And Delayed';
                                  $statusclass = 'badge bg-danger'; 
                                }else{
                                  $items = "display:none;";
                                  $report = 'display:block;';
                                  $sorted = 'display:none;';
                                  $reason = 'display:none;';
                                  $status = 'Pending And Delayed';
                                  $statusclass = 'badge bg-danger'; 
                                }
                              }else{
                                $items = "display:none;";
                                $report = 'display:none;';
                                $reason = 'display:none;';
                                $sorted = 'display:block; color:green;';
                                $status = 'Delayed but Sorted';
                                $statusclass = 'badge bg-warning';
                              }
                            }
                          }
                          if($todo->transfered){
                            $statusclasss = 'badge bg-success';
                            $statuss = 'Transfered';
                            $statusActionn = 'Transfered';
                            $style2 = "color:grey";
                            if (Auth::user()->hasRole('dg')){
                              if($todo->transferedWho == 1){
                                $style3 = "pointer-events: none;";
                              }
                              if($todo->transferedWho == 2){
                                $style = "pointer-events: none;";
                              }
                            }
                            if(Auth::user()->hasRole('director')){
                              if($todo->transferedWho == 1 && $todo->reason == 'No reason'){
                                $style = "pointer-events: none;";
                                $reason = 'display:none;';
                                $report = 'display:none;';
                                if($d2 >= $d1){
                                }else{
                                  $report = 'display:block;';  
                                }
                              }
                              if($todo->transferedWho == 2){
                                $style3 = "pointer-events: none;";
                              }
                            }
                            if (Auth::user()->hasRole('user')){
                              $style = "pointer-events: none;";
                              $style3 = "";
                            }
                            if($todo->complited){
                              if (Auth::user()->hasRole('director')){
                                $items = "display:block;";
                                $report = 'display:none;';
                                $status = 'Completed';
                                $sorted = 'display:none;';
                                $reason = 'display:none;';
                                $statusclass = 'badge bg-success';
                                $style3 = "pointer-events: none;";
                                $style = "pointer-events: none;";
                              }else{
                                $items = "display:block;";
                                $report = 'display:none;';
                                $status = 'Completed';
                                $sorted = 'display:none;';
                                $reason = 'display:none;';
                                $statusclass = 'badge bg-success';
                                $style3 = "pointer-events: none;";
                                $style = "pointer-events: none;";
                              }
                            }
                          }
                        ?>
                        <tr style="{{$style2}}">
                          <th scope="row"><a href="#">#</a></th>
                          <td>
                            @if($todo->complited)
                              <span style="text-decoration:line-through">{{$todo->title}}</span>
                            @else
                              {{$todo->title}}
                            @endif
                          </td>
                          <td>
                            @if($todo->complited)
                                <span style="text-decoration:line-through">{{$todo->process}}</span>
                            @else
                              {{$todo->process}}
                            @endif
                          </td>
                          <td>
                            @if($todo->complited)
                                <span style="text-decoration:line-through">{{$todo->deadline}}</span>
                            @else
                              {{$todo->deadline}}
                            @endif
                          </td>
                          <td>
                            @if($todo->complited)
                                <span style="text-decoration:line-through">{{$todo->progress}}</span>
                            @else
                              {{$todo->progress}}
                            @endif
                          </td>
                          <td>
                            @if($todo->complited)
                                <span style="text-decoration:line-through">{{$todo->output}}</span>
                            @else
                              {{$todo->output}}
                            @endif
                          </td>
                          @if (Auth::user()->hasRole('dg') || Auth::user()->hasRole('director'))
                          <td><span class="{{ $statusclasss }}">{{$statuss}}</span></td>
                          @endif
                          <td><span class="{{ $statusclass }}">{{$status}}</span></td>
                          <td><div style="{{ $items }}"><a style="{{ $style }}" href="{{ asset('/' . $todo->id . '/edit') }}">Edit</a><div style="margin-left:5px;margin-right:5px;border-left: 2px solid black;display:inline;";></div><a style="{{ $style }}" onclick="return confirm('If you delete this task, you can not undo. \n Are you sure you want to delete?')" href="{{ asset('/' . $todo->id . '/delete') }}"><span style="color:red;$style">Delete</span></a><div style="margin-left:5px;margin-right:5px;border-left: 2px solid black;display:inline;";></div><a style="{{ $style3 }}" onclick="return confirm('If you change status, you can not undo. \n You will not be able to Edit, Delete, or change into Incomplete \n Are you sure you want to do this?')" href="{{ asset('/' . $todo->id . '/complited') }}">{{ $statusAction }}</a></div><div style="{{ $report }}"><form class="form-inline" action="/sendDelaymessage" method="post">@csrf<input type="hidden" name="id" value=" {{ $todo->id }}"/><input class="form-control-sm" type="text" placeholder="Why not completed ontime" name="Reason"> <button type="submit" class="btn btn-primary mb-2">Send</button></form></div><div style="{{ $sorted }}"><button onclick="taggleReason()" class="tb btn btn-primary mb-1">View Reason</button><span class="reason">{{ $todo->reason }}</span></div><div style="{{ $reason }}">Pending Reason</div></td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->

      </div>
    </div><!-- End Left side columns -->

  </div>
</section>

</main><!-- End #main -->
</x-app-layout>