<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="{{ route('dashboard') }}">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->
  @if (Auth::user()->hasRole('admin'))
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav0" data-bs-toggle="collapse" href="#">
      <i class="bi bi-app-indicator"></i><span>User Management</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav0" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{ route('registerr') }}">
          <i class="bi bi-circle"></i><span>Create User</span>
        </a>
      </li>
      <li>
        <a href="{{ route('dashboard.userlist') }}">
          <i class="bi bi-circle"></i><span>View Users</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav00" data-bs-toggle="collapse" href="#">
      <i class="bi bi-app-indicator"></i><span>Department</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav00" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{ route('registerdpt') }}">
          <i class="bi bi-circle"></i><span>Create Department</span>
        </a>
      </li>
      <li>
        <a href="{{ route('dashboard.dptlist') }}">
          <i class="bi bi-circle"></i><span>View Departments</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->
  @endif
  
  @if (Auth::user()->hasRole('user'))
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav1" data-bs-toggle="collapse" href="#">
      <i class="bi bi-app-indicator"></i><span>Activities</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{ route('dashboard.newtodo') }}">
          <i class="bi bi-circle"></i><span>Create Activity</span>
        </a>
      </li>
      <li>
        <a href="{{ route('dashboard.todolist') }}">
          <i class="bi bi-circle"></i><span>View Activities</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav11" data-bs-toggle="collapse" href="#">
      <i class="bi bi-app-indicator"></i><span>Report</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav11" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="/reporttodo">
          <i class="bi bi-circle"></i><span>Activities</span>
        </a>
      </li>
      <li>
        <a href="{{ route('getReport') }}" target='blank'>
          <i class="bi bi-circle"></i><span style="color:blue">Get week Report</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->
  @endif

  @if (Auth::user()->hasRole('director'))
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav3" data-bs-toggle="collapse" href="#">
      <i class="bi bi-app-indicator"></i><span>Activities</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav3" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{ route('dashboard.newtodo') }}">
          <i class="bi bi-circle"></i><span>Create Activity</span>
        </a>
      </li>
      <li>
        <a href="{{ route('dashboard.todolist') }}">
          <i class="bi bi-circle"></i><span>View Activities</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav11" data-bs-toggle="collapse" href="#">
      <i class="bi bi-app-indicator"></i><span>Report</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav11" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="/reporttodo">
          <i class="bi bi-circle"></i><span>Activities</span>
        </a>
      </li>
      <li>
        <a href="{{ route('reporttododr') }}">
          <i class="bi bi-circle"></i><span>Submited Reports</span>
        </a>
      </li>
      <li>
        <a href="{{ route('getReport') }}" target='blank'>
          <i class="bi bi-circle"></i><span style="color:blue">Get week Report</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->
  @endif

  @if (Auth::user()->hasRole('dg'))
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav4" data-bs-toggle="collapse" href="#">
      <i class="bi bi-app-indicator"></i><span>Activities</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav4" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{ route('dashboard.newtodo') }}">
          <i class="bi bi-circle"></i><span>Create Activity</span>
        </a>
      </li>
      <li>
        <a href="{{ route('dashboard.todolist') }}">
          <i class="bi bi-circle"></i><span>View Activities</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav11" data-bs-toggle="collapse" href="#">
      <i class="bi bi-app-indicator"></i><span>Report</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav11" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="/reporttodo">
          <i class="bi bi-circle"></i><span>Activities</span>
        </a>
      </li>
      <li>
        <a href="{{ route('reporttododg') }}">
          <i class="bi bi-circle"></i><span>Submited Reports</span>
        </a>
      </li>
      <li>
        <a href="{{ route('getReport') }}" target='blank'>
          <i class="bi bi-circle"></i><span style="color:blue">Get week Report</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->
  @endif
</ul>

</aside><!-- End Sidebar-->