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
                <div class="card-body">
                  <h5 class="card-title">Activity List<span>| </h5>
                  <!-- <a href="{{ route('getReport') }}" target="blank" class="badge bg-primary">PDF</a> -->
                  <h6><x-alert /></h6>
                  <form action="/report" method="POST">
                    @csrf
                    <div class="row">
                      <div class="col-3">
                        <select name="category" class="form-select" aria-label="Default select example">
                          <option value="1">All Activities</option>
                          <option value="2">Completed Activities</option>
                          <option value="3">Pending</option>
                          <option value="4">Transfered Activities</option>
                        </select>
                      </div>
                      <div class="col-3">
                        <?php
                          $uid = Auth::user()->id;
                          $dpts = DB::select("SELECT * FROM departments");
                          $users = DB::select("SELECT * FROM users WHERE dpt_id IN(SELECT dpt_id FROM users WHERE id = $uid) AND id IN(SELECT user_id FROM role_user WHERE role_id = 4)");
                          if (Auth::user()->hasRole('dg')){
                            echo "<select name='dpt' class='form-select' aria-label='Default select example'>
                            <option value=0>Select Department</option>
                            <option value=-1>All Departments</option>";
                            foreach($dpts as $dpt){
                              echo "<option value='$dpt->id'>$dpt->name</option>";
                            }
                            echo '</select>';
                          }
                          if (Auth::user()->hasRole('director')){
                            echo '<select name="user" class="form-select" aria-label="Default select example">
                            <option value=0>Select User</option>';
                            foreach($users as $user){
                              echo "<option value='$user->id'>$user->name</option>";
                            }
                            echo '</select>';
                          }
                        ?>
                      </div>
                      <div class="col-2">
                        From <input name="datefrom" type="date" class="form-control">
                      </div>
                      <div class="col-2">
                        To <input name="dateto" type="date" class="form-control">
                      </div>
                      <div class="col-2">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-search me-1"></i>Search</button>
                        <!-- <button type="button" class="btn btn-info">Export</button> -->
                      </div>
                      <!-- <div class="col-1">
                      <button type="button" class="btn btn-info">Export</button>
                      </div> -->
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
                            <th scope="col">Process</th>
                            <th scope="col">Deadline</th>
                            <th scope="col">Progress</th>
                            <th scope="col">Output</th>
                            <th scope="col">Transfered</th>
                            <th scope="col">Status</th>
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
                        </tr>';
                        }
                      }
                    
                    ?>
                    </thead>
                    <tbody>
                      @foreach($todos as $todo)
                        <?php 
                          $d1 = date_create(date("Y-m-d"));
                          $d2 = date_create($todo->deadline);
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
                          if($d2 >= $d1){
                          }else{
                            if($todo->complited){
                              $status = 'Completed';
                              $statusclass = 'badge bg-success';
                            }else{
                              if($todo->reason == 'No reason'){
                                $status = 'Pending And Delayed';
                                $statusclass = 'badge bg-danger'; 
                              }else{
                                $status = 'Delayed but Sorted';
                                $statusclass = 'badge bg-danger';
                              }
                            }
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