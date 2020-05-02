@extends('layouts.main')
@section('title', 'BeLockR | LSO Homepage')
@section('content')
<div class="container">
	<h3 align="center">Benilde Online Locker Reservation</h3><br/><br/>
	@if(isset(Auth::user()->username))
		<div class="alert alert-danger success-block">
			<strong>Welcome {{Auth::User()->username}}</strong>
			<a href="{{url('/webdevt-belockr/logout')}}">Logout</a>
		</div>
	else
	<script>window.location = "/webdevt-belockr";</script>
	@endif
</div>
@endsection