@extends('layouts.main')
@section('title', 'Add Locker Record')
@section('content')
<div class="container-fluid">
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endforeach
    @endif
    <form action="{{ route('staffs_store') }}" method="POST">
      {{csrf_field()}}
        <div class="container">
          <h1 class="text-center mt-5 mb-3">Add a Staff Record</h1>
          <!-- Default input -->
          <div class="form-group">
              <div class="form-row">
                <!-- Default input -->
                <div class="form-group col-md-4">
                  <label>First name</label>
                  <input type="text" required="" class="form-control" name="fn" placeholder="e.g. Juan" maxlength="50">
                </div>
                <!-- Default input -->
                <div class="form-group col-md-4">
                  <label>Middle name</label>
                  <input type="text" required="" class="form-control" name="mn" placeholder="" maxlength="50">
                </div>
                <!-- Default input -->
                <div class="form-group col-md-4">
                  <label>Last name</label>
                  <input type="text" required="" class="form-control" name="ln" placeholder="e.g. Dela Cruz" maxlength="50">
                </div>
              </div>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="email" placeholder="firstname.lastname@benilde.edu.ph">
          </div>
          <!-- Grid row -->

       <div class="form-group">
      <!-- Grid row -->
      <button type="submit" class="btn btn-primary btn-md">Add</button>
      </form>
    </div>
  </div>
</div>
@endsection

