@extends('layouts.main')
@section('title', 'BeLockR - Add Student Record')
@section('content')

</br>
<h1 class="text-center">Add a Student Record</h1>
@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{ $error }}
        </div>
    @endforeach
@endif
<!-- Extended default form grid -->
<form action="{{ route('students_store') }}" method="POST">
  {{csrf_field()}}
 	<div class="container">
 		 <!-- Default input -->
  <div class="form-group">
      <label>Student No.</label>
      <input type="number" required="" class="form-control" name="student_id" maxlength="8" placeholder="e.g. 11818118">
    </div>
    <!-- Grid row -->
    <div class="form-row">
      <!-- Default input -->
      <div class="form-group col-md-4">
        <label>First name</label>
        <input type="text" required="" class="form-control" name="first_name" placeholder="e.g. Juan" maxlength="50">
      </div>
      <!-- Default input -->
      <div class="form-group col-md-4">
        <label>Middle name</label>
        <input type="text" required="" class="form-control" name="middle_name" placeholder="" maxlength="50">
      </div>
      <!-- Default input -->
      <div class="form-group col-md-4">
        <label>Last name</label>
        <input type="text" required="" class="form-control" name="last_name" placeholder="e.g. Dela Cruz" maxlength="50">
      </div>
    </div>
    <!-- Grid row -->

  <!-- Default input -->
    <div class="form-group">
          <label>Course</label>
              <select name="course" class="form-control">
                <option selected="" disabled="" hidden="" value="">Select one...</option>
                <option>Bachelor of Arts (AB) Major in Consular and Diplomatic Affairs</option>
                <option>Bachelor of Science in Business Administration (BSBA) major in Computer Applications</option>
                <option>Bachelor of Science in Business Administration (BSBA) major in Business Intelligence and Analytics</option>
                <option>Bachelor of Science in Information Systems</option>
              </select>
    </div>

  <div class="form-row">
    <!-- Default input -->
    <div class="form-group col-md-6">
      <label>Email</label>
      <input type="text" class="form-control" name="email" placeholder="firstname.lastname@benilde.edu.ph">
    </div>
    <!-- Default input -->
    <div class="form-group col-md-6">
     <label>Year Level</label>
        <select required="" name="year_level" class="form-control">
          <option selected="" hidden="" disabled="" value="">Select one...</option>
          <option value="1">FROSH</option>
          <option value="2">SOPHOMORE</option>
          <option value="3">JUNIOR</option>
          <option value="4">SENIOR</option>
        </select>
    </div>
  </div>
   <div class="form-group">
      <!-- Grid row -->
      <button type="submit" class="btn btn-primary btn-md">Add</button>
    </div> 
</div>

</form>
<!-- Extended default form grid -->
</br>
@endsection