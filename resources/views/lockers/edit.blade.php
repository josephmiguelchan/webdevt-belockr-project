@extends('layouts.main')
@section('title', 'Edit Locker Record')
@section('content')
<div class="container-fluid">
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endforeach
    @endif
    <form class="border border-light p-4" action="{{ route('lockers_update', $locker->locker_id) }}" method="POST">
    {{ csrf_field() }}
        <h1 class="text-center">Edit Locker Record</h1>
        <div class="container">
            <div class="form-group">
                  <label>Locker No.</label>
                  <input type="number" value="{{$locker->locker_id}}" required="" class="form-control" name="locker_id" maxlength="3" placeholder="e.g. 103">
              </div>
                <!-- Grid row -->
                <div class="form-row">
                  <!-- Default input -->
                  <div class="form-group col-md-8">
                    <label>Locker Location</label>
                    <select required="" name="location" class="form-control">
                      <option value="{{$locker->location}}" selected="" hidden="">{{$locker->location}}</option>
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
                    <select required="" name="status" class="form-control">
                      <option selected="" hidden="" value="{{$locker->status}}">{{$locker->status}}</option>
                      <option value="Open">Open</option>
                      <option value="Pending">Pending</option>
                      <option value="Closed">Closed</option>
                    </select>
                  </div>
                <!-- Grid row -->
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">
                    Save
                </button>
            </div>
       </div>
    </form>
</div>

@endsection
