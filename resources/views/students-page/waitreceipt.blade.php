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
              5. Wait for the LSO to verify and confirm your status
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

    <div class="z-depth-1 col-md-4" style="margin-top: 14%; margin-left: 32.5%; margin-bottom: 4%;">
    <!-- Default form subscription -->
    <form class="p-5">
    
        <p class="text-center h4 text-success">Success!</p>
    
        <p class="text-center mb-4">You have submitted a receipt recently. Please wait within 24 hours for the LSO to check your receipt before you can use your locker</p>
      
      <div class="row">
          <!-- Sign out button -->
          <a class="btn btn-dark" style="margin-left:38.75%;" href="{{url('/webdevt-belockr/logout')}}">Sign Out</a>
      </div>
    
    </form>
    <!-- Default form subscription -->
    </div>
    <p class="grey-text text-center">Sign out and log back in to refresh this page.</p>
  </div>
   
</body>
</html>