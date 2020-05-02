<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Reserve a Locker - BeLockR</title>
  <!-- MDB icon -->
  <link rel="icon" href="{{ asset('public/assets/img/mdb-favicon.ico') }}" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="{{ asset('public/assets/css/bootstrap.min.css') }}">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="{{ asset('public/assets/css/mdb.min.css') }}">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
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

        <!-- Links -->
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link">
              1. Select the locker you wish to reserve
            </a>
          </li>
        </ul>

        <ul class="navbar-nav ml-auto nav-flex-icons">
          <span class="navbar-text white-text">
            Welcome {{Auth::user()->username}}
          </span>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/webdevt-belockr/logout')}}"><i class="fas fa-user"></i> Sign Out</a>
          </li>
        </ul>
        <!-- Links -->

      </div>
      <!-- Collapsible content -->

    </nav>
    <!--/.Navbar-->


    <div class="container">
        @if(session('successMsg'))
            <div class="alert alert-success">
                {{ session('successMsg') }}
            </div>
        @endif
        <table class="mt-5 table table-hover table-bordered">
            <thead>
                <th>Locker No.</th>
                <th>Location</th>
                <th>Status</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach($openlockers as $item)
                    <tr>
                        <td>{{ $item->locker_id }}</td>
                        <td>{{ $item->location }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <form action="{{ route('lockers_reserve', $item->locker_id) }}">
                                <button class="btn btn-sm btn-primary">
                                   <i class="fa fa-key"></i> Reserve
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>