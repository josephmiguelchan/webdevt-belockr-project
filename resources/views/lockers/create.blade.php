@extends('layouts.main')
@section('title', 'Add Locker Record')
@section('content')
<h1 class="text-center mt-5">Add a Locker</h1>
<div class="container-fluid">
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endforeach
    @endif
    <form action="{{ route('lockers_store') }}" method="POST">
      {{csrf_field()}}
        <div class="container">
          <!-- Default input -->
          <div class="form-group">
              <label>Locker No.</label>
              <input type="number" value="" required="" class="form-control" name="locker_id" maxlength="3" placeholder="e.g. 103">
          </div>
            <!-- Grid row -->
                <div class="form-row">
                  <!-- Default input -->
                  <div class="form-group col-md-8">
                    <label>Locker Location</label>
                    <select name="location" class="form-control">
                      <option selected="" disabled="" hidden="" value="">Select location...</option>
                      <option value="TAFT 4th">TAFT 4th (Mutien M. Hall)</option>
                      <option value="AKIC 6th">AKIC 6th</option>
                      <option value="AKIC 8th">AKIC 8th</option>
                      <option value="AKIC 9th">AKIC 9th</option>
                      <option value="SDA 9th">SDA 9th</option>
                      <option value="SDA 10th">SDA 10th</option>
                    </select>
                  </div>
                  <!-- Default input -->
                  <div class="form-group col-md-4">
                    <label>Availability</label>
                    <select name="status" class="form-control">
                      <option selected="" disabled="" hidden="" value="">Select status...</option>
                      <option value="Open">Open</option>
                      <option value="Pending">Pending</option>
                      <option value="Closed">Closed</option>
                    </select>
                  </div>    
               </div>

       <div class="form-group">
      <!-- Grid row -->
      <button type="submit" class="btn btn-primary btn-md">Add</button>
    </div> 
    </div>

    </form>
</div>

@endsection
