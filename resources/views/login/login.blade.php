@extends('layouts.main-login')
@section('title', 'BeLockR|Login Page')

<div class="container-sm" >
    <br/><br/><br/><br/>
    <div class="container-fluid">
        <h3 align="center">Benilde Online Locker Reservation</h3>

        @if(isset(Auth::user()->username))
            <script>window.location="/successlogin";</script>
        @endif

        @if($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert"></button>
                <strong>{{ $message }}</strong>
            </div>

        @endif

        
<!-- Default form login -->
<form class="text-center border border-light p-5" method="post" action="{{ url('/checklogin') }}" >
    {{ csrf_field() }}
<i class="fas fa-users fa-5x" ></i>
    <p class="h4 mb-4 ">Sign-in</p>

    <!-- Email -->
    <input type="text" name="username" class="form-control mb-4" placeholder="Username">

    <!-- Password -->
    <input type="password" name="password" class="form-control mb-4" placeholder="Password">

    <div class="d-flex justify-content-around">
        <div>
            <!-- Remember me -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
            </div>
        </div>
        <div>
            <!-- Forgot password -->
            <a href="http://intranet.benilde.edu.ph/passReset/login.php">Forgot password?</a>
        </div>
    </div>
<br/>
<div>
    @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
</div>
    <!-- Sign in button -->
    <button  class="btn btn-block btn-dark-green" type="submit">Login</button>
</form>
<!-- Default form login -->
</div>
  
</div>
