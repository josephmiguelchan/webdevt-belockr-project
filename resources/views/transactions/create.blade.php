@extends('layouts.main')
@section('title', 'BeLockR - Add a Transaction Record')
@section('content')
<div class="container-fluid">
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endforeach
    @endif
    <form class="border border-light p-4" action="{{ route('transactions_store') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    
        <h1 class="text-center">Add a Transaction Record</h1>
        <div class="row">
            <div class="col">
                <div class="md-form">
                    <label>Student ID</label>
                    <input name="student_id" type="number" class="form-control" maxlength="20" placeholder="This is a foreign key with integer input only" />
                </div>
                <div class="md-form">
                    <label>Locker ID</label>
                    <input name="locker_id" type="number" class="form-control" maxlength="20" placeholder="This is a tbl_students foreign key with integer input only" />
                </div>
                <div class="md-form">
                    <label>Step No.</label>
                    <input name="step" type="number" class="form-control" maxlength="2" placeholder="Type i.e. '3' for Payment Pending" />
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01"><i class="fa fa-upload"></i>&nbsp;Receipt</span>
                  </div>
                  <div class="custom-file">
                    <input name="receipt_img" type="file" class="custom-file-input" id="inputGroupFile01"
                      aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file: Max 60kb size (Optional)</label>
                  </div>
                </div>               
            </div>
            <div class="col">
                <div class="md-form">
                    <label>Status</label>
                    <input name="status" type="text" class="form-control" maxlength="50" placeholder="I.e. To be verified, Payment confirmation, etc."/>
                </div>
                <div class="md-form">
                    <label>Comments</label>
                    <input name="comment" type="text" class="form-control" maxlength="500" placeholder="Brief description of this reservation's status" />
                </div>
                <div class="md-form">
                    <label>Staff ID</label>
                    <input name="staff_id" type="number" class="form-control" maxlength="20" placeholder="This is a tbl_staffs foreign key with integer input only" />
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success float-right">
                        Add
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection