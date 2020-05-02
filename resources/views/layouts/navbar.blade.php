@if (Auth::user()->userlevel == 'Staff')
<!--Navbar of LSO-->
<nav class="sticky-top navbar navbar-expand-lg navbar-dark elegant-color">

  <!-- Just an image -->
<mdb-navbar SideClass="navbar navbar-dark indigo">
    <mdb-navbar-brand>
        <a class="navbar-brand" href="/">
            <img src="{{ asset('public/assets/img/Logo.png') }}" height="30" alt="">
        </a>
    </mdb-navbar-brand>
</mdb-navbar>

  <!-- Collapse button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Collapsible content -->
  <div class="collapse navbar-collapse" id="basicExampleNav">

    <!-- Links -->
    <ul class="navbar-nav mr-auto">

      <!-- Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">Viewer</a>
        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{ url('/transactions/index') }}">View Transactions</a>
          <a class="dropdown-item" href="{{ url('/lockers/index') }}">View Lockers</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">Pending Actions</a>
        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{ route('transactions_pending') }}">Approve Reservations</a>
          <a class="dropdown-item" href="{{ route('transactions_receipts') }}">Confirm Receipts</a>
        </div>
      </li>

    </ul>

    <ul class="navbar-nav ml-auto nav-flex-icons">
      <span class="navbar-text white-text">
        Welcome {{Auth::user()->username}}
      </span>
      <li class="nav-item">
        <a class="nav-link waves-effect waves-light">
          <i class="fas fa-envelope"></i>
        </a>
      </li>
      <li class="nav-item avatar dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary"
          aria-labelledby="navbarDropdownMenuLink-55">
          <a class="dropdown-item" href="{{url('/webdevt-belockr/logout')}}">Logout</a>
        </div>
      </li>
    </ul>
    <!-- Links -->

  </div>
  <!-- Collapsible content -->

</nav>
<!--/.Navbar-->
@endif


@if (Auth::user()->userlevel == 'Student')
<!--Navbar of Student-->
<nav class="sticky-top navbar navbar-expand-lg green darken-4 navbar-dark elegant-color">

  <!-- Just an image -->
<mdb-navbar SideClass="navbar navbar-dark indigo">
    <mdb-navbar-brand>
        <a class="navbar-brand" href="/">
            <img src="{{ asset('public/assets/img/Logo.png') }}" height="30" alt="">
        </a>
    </mdb-navbar-brand>
</mdb-navbar>

  <!-- Collapse button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Collapsible content -->
  <div class="collapse navbar-collapse" id="basicExampleNav">

    <ul class="navbar-nav ml-auto nav-flex-icons">
      <span class="navbar-text white-text">
        Welcome {{Auth::user()->username}}
      </span>
      <li class="nav-item avatar dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary"
          aria-labelledby="navbarDropdownMenuLink-55">
          <a class="dropdown-item" href="{{url('/webdevt-belockr/logout')}}">Logout</a>
        </div>
      </li>
    </ul>
    <!-- Links -->

  </div>
  <!-- Collapsible content -->

</nav>
<!--/.Navbar-->
@endif

@if (Auth::user()->userlevel == 'Admin')
<!--Navbar of LSO-->
<nav class="sticky-top navbar black navbar-expand-lg navbar-dark elegant-color">

  <!-- Just an image -->
<mdb-navbar SideClass="navbar navbar-dark indigo">
    <mdb-navbar-brand>
        <a class="navbar-brand" href="/">
            <img src="{{ asset('public/assets/img/Logo.png') }}" height="30" alt="">
        </a>
    </mdb-navbar-brand>
</mdb-navbar>

  <!-- Collapse button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Collapsible content -->
  <div class="collapse navbar-collapse" id="basicExampleNav">

    <!-- Links -->
    <ul class="navbar-nav mr-auto">
      <!-- Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">Transactions</a>
        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{ url('/transactions/create') }}">Add a Transaction</a>
          <a class="dropdown-item" href="{{ url('/transactions/index') }}">View Transactions</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">Lockers</a>
        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{ url('/lockers/create/') }}">Add a Locker</a>
          <a class="dropdown-item" href="{{ url('/lockers/index/') }}">View Lockers</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">Students</a>
        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{ url('/students/create/') }}">Add a Student</a>
          <a class="dropdown-item" href="{{ url('/students/index/') }}">View Students</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">Staffs</a>
        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{ url('/staffs/create/') }}">Add a Staff</a>
          <a class="dropdown-item" href="{{ url('/staffs/index/') }}">View Staffs</a>
        </div>
      </li>

    </ul>

    <ul class="navbar-nav ml-auto nav-flex-icons">
      <span class="navbar-text white-text">
        Welcome {{Auth::user()->username}}
      </span>
      <li class="nav-item">
        <a class="nav-link waves-effect waves-light">
          <i class="fas fa-envelope"></i>
        </a>
      </li>
      <li class="nav-item avatar dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary"
          aria-labelledby="navbarDropdownMenuLink-55">
          <a class="dropdown-item" href="{{url('/webdevt-belockr/logout')}}">Logout</a>
        </div>
      </li>
    </ul>
    <!-- Links -->

  </div>
  <!-- Collapsible content -->

</nav>
<!--/.Navbar-->
@endif