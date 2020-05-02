@extends('layouts.main')
@section('title', 'Edit Staff Record')
@section('content')
<div class="container-fluid">
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endforeach
    @endif
    <form class="border border-light p-4" action="{{ route('staffs_update', $staff->staff_code) }}" method="POST">
    {{ csrf_field() }}
        <h1 class="text-center mb-3">Edit Staff Record</h1>
        <div class="container">
          <!-- Default input -->
          <div class="form-group">
              <div class="form-row">
                <!-- Default input -->
                <div class="form-group col-md-4">
                  <label>First name</label>
                  <input type="text" required="" class="form-control" name="fn" value="{{ $staff->first_name }}" maxlength="50">
                </div>
                <!-- Default input -->
                <div class="form-group col-md-4">
                  <label>Middle name</label>
                  <input type="text" required="" class="form-control" name="mn" value="{{ $staff->middle_name }}" maxlength="50">
                </div>
                <!-- Default input -->
                <div class="form-group col-md-4">
                  <label>Last name</label>
                  <input type="text" required="" class="form-control" name="ln" value="{{ $staff->last_name }}" maxlength="50">
                </div>
              </div>
          </div>
          <div class="form-group">
            <div class="form-row">
                <!-- Default input -->
                <div class="form-group col-md-4">
                  <label>Status</label>
                  <select name="status" class="form-control">
                      <option selected="" hidden="" value="{{ $staff->status }}">{{ $staff->status }}</option>
                      <option value="Active">Active</option>
                      <option value="Inactive">Inactive</option>
                    </select>
                </div>
                <div class="form-group col-md-8">
                   <label>Email</label>
                   <input type="email" required="" class="form-control" name="email" value="{{ $staff->email }}">
                </div>
            </div>
          </div>
          <!-- Grid row -->

           <div class="form-group">
          <!-- Grid row -->
          <button type="submit" class="btn btn-primary btn-md">Save</button>
        </form>
        </div>
    </div>
</div>
@endsection

