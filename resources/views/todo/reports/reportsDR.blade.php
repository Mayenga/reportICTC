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
              <div class="card recent-sales">
                <div class="card-body">
                  <h5 class="card-title">Activity List<span>| </h5>
                  <!-- <a href="{{ route('getReport') }}" target="blank" class="badge bg-primary">PDF</a> -->
                  <h6><x-alert /></h6>
                  <form action="/reportdr" method="POST">
                    @csrf
                    <div class="row">
                      <div class="col-3">
                        <?php 
                          $uid = Auth::user()->id;
                          $users = DB::select("SELECT * FROM users WHERE dpt_id IN(SELECT dpt_id FROM users WHERE id = $uid) AND id IN(SELECT user_id FROM role_user WHERE role_id = 4)");
                        ?>
                        <select name="user" class="form-select" aria-label="multiple select example">
                            @foreach($users AS $user)
                                <option value="{{ $user->id }}">{{$user->name}}</option>
                            @endforeach
                        </select>
                        <br />
                        <?php 
                          if(isset($userName)){
                            foreach($userName AS $userNames){
                              echo "<span>$userNames->name 's Activities</span>";
                            }
                          }
                        ?>
                      </div>
                      <div class="col-3">
                        <input name="week" type="week" class="form-control">
                      </div>
                      <div class="col-3">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-search me-1"></i>GET</button>
                        <!-- <button type="button" class="btn btn-info">Export</button> -->
                      </div>
                    </div>
                  </form>
                  <br>
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
                            <th scope="col">Deadline</th>
                            <th scope="col">Progress</th>
                            <th scope="col">Status</th>
                            <th scope="col">Output</th>
                            <th scope="col"></th>
                          </tr>';
                        }
                      }
                    
                    ?>
                    </thead>
                    <tbody>
                      @foreach($todos as $todo)
                        <?php 
                          $status = '';
                          $statuss = '';
                          $statusclass = '';
                          $statusclasss = '';
                          $statusAction = '';
                          $style = "";
                          $style2 = "";
                          if($todo->complited){
                            $statusclass = 'badge bg-success';
                            $status = 'Completed';
                            $statusAction = 'Completed';
                            $style = "pointer-events: none;";
                          }else{
                            $statusclass = 'badge bg-warning';
                            $status = 'Pending';
                            $statusAction = 'Completed';
                          }
                          if($todo->transfered){
                            $statusclasss = 'badge bg-success';
                            $statuss = 'Transfered';
                            $statusActionn = 'Transfered';
                            $style2 = "color:grey";
                            if (Auth::user()->hasRole('dg') || Auth::user()->hasRole('director')){
                              $style = "pointer-events: none;";
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
                          <td><span class="{{ $statusclass }}">{{$status}}</span></td>
                          <td>
                            @if($todo->complited)
                                <span style="text-decoration:line-through">{{$todo->output}}</span>
                            @else
                              {{$todo->output}}
                            @endif
                          </td>
                          <td>
                            @if($todo->complited)
                                <!-- <span style="text-decoration:line-through">{{$todo->output}}</span> -->
                            @else
                            ({{$todo->reason}})
                            @endif
                          </td>
                        </tr>
                        
                        <!-- Disabled Backdrop Modal -->
                        <div class="modal fade" id="disablebackdrop" tabindex="-1" data-bs-backdrop="false">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Comfirm Delete</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                If you delete this task, you can not undo. <br />
                                Are you sure you want to delete?
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                                <a href="{{ asset('/' . $todo->id . '/delete') }}" class="btn btn-danger">Delete</a>
                              </div>
                            </div>
                          </div>
                        </div><!-- End Disabled Backdrop Modal-->

                        <!-- Disabled Backdrop Modal -->
                        <div class="modal fade" id="disablebackdrop1" tabindex="-1" data-bs-backdrop="false">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Please Comfirm</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                If you change status, you can not undo. <br />
                                You will not be able to Edit, Delete, or change into Incomplete
                                <br />
                                Are you sure you want to do this?
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                                <a  href="{{ asset('/' . $todo->id . '/complited') }}" class="btn btn-success">Yes</a>
                              </div>
                            </div>
                          </div>
                        </div><!-- End Disabled Backdrop Modal-->
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