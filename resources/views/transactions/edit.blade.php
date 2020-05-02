@extends('layouts.main')
@section('title', 'Add a Student Record')
@section('content')
<div class="container-fluid">
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endforeach
    @endif
    <form class="border border-light p-4" action="{{ route('transactions_update', $record->code) }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    
        <h1 class="text-center">Edit a Transaction Record</h1>
        <div class="row">
            <div class="col">
                <div class="md-form">
                    <label>Student's ID No.</label>
                    <input name="student_id" type="number" class="form-control" maxlength="20" value="{{ $record->student_id }}" />
                </div>
                <div class="md-form">
                    <label>Locker No.</label>
                    <input name="locker_id" type="number" class="form-control" maxlength="20" value="{{ $record->locker_id }}"/>
                </div>
                <div class="md-form">
                    <label>Step</label>
                    <input name="step" type="number" class="form-control" maxlength="2" value="{{ $record->step }}"/>
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Proof of Receipt</span>
                  </div>
                  <div class="custom-file">
                    <input name="receipt_img" type="file" class="custom-file-input" id="inputGroupFile01"
                      aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                  </div>
                </div>               
            </div>
            <div class="col">
                <div class="md-form">
                    <label>Status</label>
                    <input name="status" type="text" class="form-control" maxlength="50" value="{{ $record->status }}"/>
                </div>
                <div class="md-form">
                    <label>Comments</label>
                    <input name="comment" type="text" class="form-control" maxlength="500" value="{{ $record->comment }}"/>
                </div>
                <div class="md-form">
                    <label>Staff ID (Foreign Key)</label>
                    <input name="staff_id" type="number" class="form-control" maxlength="20"  value="{{ $record->staff_id }}"/>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success float-right">
                        Update
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection