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
              2. Read and agree to the Terms and Conditions
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


    <div class="z-depth-1 col-md-6" style="margin-top: 3%; margin-left: 23%; margin-bottom: 4%;">
    <!-- Default form subscription -->
    <form class="p-5" action="{{ route('lockers_storeReserve', $lockerid) }}" method="POST">
      {{ csrf_field() }}
    
        <p class="text-center h4">Confirm Locker</p>
    
        <p class="text-center mb-4">You ( {{ Auth::user()->username }} ) have chosen this locker.</p>   
              
        <!-- locker no. -->
        <div class="md-form">
          <a class="text-center form-control btn blue-gradient">Locker No. {{ $lockerid->locker_id }}</a>
        </div>
      
      <!-- T&C -->
      <p class="card-text">
        a.  Locker rental is on a “FIRST COME, FIRST SERVED BASIS” <br/>
        
        b.  Validity of rental is for a period of one (1) term only <br/>
        
        c.  Locker area are located at 4th floor Mutien Buildings, Taft Campus. 6th, 7th, 8th and 9th floors AKIC Campus and 9th and 10th floors SDA Campus <br/>
        
        d.  Only students whose name and signature appear on the Locker Rental Form can use the assigned locker. <br/>
        
        e.  Strictly no sharing of lockers must be observed. Students who allowed somebody to share his/her locker will automatically be suspended in availing a locker the 
          following term. Likewise, the one who shared the locker will get the same sanction. <br/>
        
        f.  Students are advised not to kept valuables and expensive items inside the locker. The College is not responsible for any theft or loss of any personal things 
          inside the locker including valuable or expensive items. <br/>
        
        g.  Item such as firearms, deadly weapon and illegal drugs are strictly prohibited inside the locker. <br/>
        
        h.  User will provide his/her own medium padlock. <br/>
        
        i.  The CLPM-LSO will designate locker number upon submission of official receipt of payment and padlock. <br/>
        
        j.  End user is advised to vacate the locker, three (3) days after the last day of the final examination. <br/>
        
        k.  Failure to vacate/comply will empower the CLPM-LSO to forcibly open locker. <br/>
        
        l.  CLPM-LSO will dispose whatever things left inside the locker after a term. <br/>
        
        m.  Failure to vacate/comply will mean automatically suspend the right to avail a locker the following term. <br/>
        </p>
            
            <input type="hidden" name="locker_id" value="{{ $lockerid->locker_id }}" />
      
      <div class="row">
          <!-- Accept button -->
          <button type="submit" class="btn btn-dark" onclick="return confirm('You can no longer change nor cancel your reservation after this. Continue?');">I agree</button>
      </div>
    
    </form>
    <!-- Default form subscription -->
    
    <a class="float-right mt-4" href="{{route('lockerviewer')}}">Back to List of Available Lockers</a>
  </div>
</body>
</html>