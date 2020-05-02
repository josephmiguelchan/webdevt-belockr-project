@extends('layouts.main')
@section('title', 'BeLockR - Edit Student Record')
@section('content')

</br>
<h1 class="text-center">Edit a Student Record</h1>
</br>
@if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endforeach
    @endif
<!-- Extended default form grid -->
<form action="{{ route('students_update', $student->student_code) }}" method="POST">
  {{csrf_field()}}
 	<div class="container">
 		 <!-- Default input -->
  <div class="form-group">
      <label>Student ID No.</label>
      <input type="number" class="form-control" name="student_id" maxlength="8" value="{{$student->student_id}}">
    </div>
       <!-- Grid row -->
    <div class="form-row">
      <!-- Default input -->
      <div class="form-group col-md-4">
        <label>First name</label>
        <input type="text" class="form-control" name="first_name" maxlength="50" value="{{$student->first_name}}">
      </div>
      <!-- Default input -->
      <div class="form-group col-md-4">
        <label>Middle name</label>
        <input type="text" class="form-control" name="middle_name" maxlength="50" value="{{$student->middle_name}}">
      </div>
      <!-- Default input -->
      <div class="form-group col-md-4">
        <label>Last name</label>
        <input type="text" class="form-control" name="last_name" maxlength="50" value="{{$student->last_name}}">
      </div>
    </div>
    <!-- Grid row -->

  <!-- Default input -->
    <div class="form-group">
          <label>Course</label>
              <select required="" name="course" class="form-control">
                <option selected="" hidden="" value="{{$student->course}}">{{$student->course}}</option>
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
      <input type="text" class="form-control" name="email" value="{{$student->email}}">
    </div>
    <!-- Default input -->
    <div class="form-group col-md-6">
     <label>Year Level</label>
              <select required="" name="year_level" class="form-control">
                <option value="{{$student->year_level}}" hidden="" selected="">{{$student->year_level}}</option>
                <option value="1">FROSH (1)</option>
                <option value="2">SOPHOMORE (2)</option>
                <option value="3">JUNIOR (3)</option>
                <option value="4">SENIOR (4)</option>
              </select>
    </div>
  </div>
   <div class="form-group">
      <!-- Grid row -->
      <button type="submit" class="btn btn-primary btn-md">Update</button>
    </div> 
</div>

</form>
<!-- Extended default form grid -->
</br>
@endsection