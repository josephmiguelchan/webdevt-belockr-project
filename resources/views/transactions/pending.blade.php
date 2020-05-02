@extends('layouts.main')
@section('title', 'View Transactions Record')
@section('content')
    <div class="container-fluid">
        @if(session('successMsg'))
            <div class="alert alert-success">
                {{ session('successMsg') }}
            </div>
        @endif
        <table class="table table-striped table-hover">
            <thead>
                <th>Student ID</th>
                <th>Locker No</th>
                <th>Step</th>
                <th>Status</th>
                <th>Comments</th>
                <th>Staff ID</th>
                <th>Date Created</th>
                <th>Last Edited</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach($pendingrecords as $item)
                    <tr>
                        <td>{{ $item->student_id }}</td>
                        <td>{{ $item->locker_id }}</td>
                        <td>{{ $item->step }}</td>
                        <td>{{ $item->status }}</td>
                        <td>{{ $item->comment }}</td>
                        <td>{{ $item->staff_id }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td>
                            @if (Auth::user()->userlevel == 'Staff')
                            <div class="btn-group">
                              <form action="{{route('transactions_approve', $item->code)}}">
                                <button class="btn btn-sm btn-dark" onclick="return confirm('Approve this reservation?');">
                                  Approve
                                </button>
                              </form>
                              <form action="{{route('transactions_decline', $item->code)}}">
                                <button class="btn btn-sm btn-outline-dark" onclick="return confirm('If the student had been found violating locker usage conditions before, you may decline this reservation. Continue?');">
                                  Decline
                                </button>
                              </form>
                            </div>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <!-- <div class="card mb-4">

          <img class="card-img-top" src="{{ asset('public/assets/img/banner.jpg') }}" alt="Card image cap">

          <blockquote class="blockquote ml-5 pl-5 mr-5">
            <p class="bq-title">Fields Legend</p>
            <dl class="row">
              <dt class="col-sm-2">Student ID</dt>
              <dd class="col-sm-9">Foreign key of the student involved in this reservation transaction.</dd>

              <dt class="col-sm-2">Locker ID</dt>
              <dd class="col-sm-9">The locker's foreign key chosen by the student's interest.</dd>

              <dt class="col-sm-2">Step</dt>
              <dd class="col-sm-9">There are observed (not finalized yet) 4-5 steps before completing a reservation of locker online. Step field displays the progress of </dd>
              <dd class="col-sm-9 offset-sm-2">the current transaction.</dd>

              <dt class="col-sm-2">Receipt ID</dt>
              <dd class="col-sm-9">Foreign Key of the receipt's details for verification purpose of this transaction.</dd>

              <dt class="col-sm-2">Status</dt>
              <dd class="col-sm-9">Similar to Step field, this displays the current remarks of the locker reservation but in text characters.</dd>

              <dt class="col-sm-2">Comments</dt>
              <dd class="col-sm-9">A 500-character details describing the status of the transaction and/or why such locker reservation is denied.</dd>

              <dt class="col-sm-2">Staff ID</dt>
              <dd class="col-sm-9">Foreign key of the LSO staff who reviewed/edited the reservation transaction.</dd>

              <dt class="col-sm-2">Date Created</dt>
              <dd class="col-sm-9">The date when the student started/created an application for locker reservation online.</dd>

              <dt class="col-sm-2">Last Edited</dt>
              <dd class="col-sm-9">The date when the LSO staff/student made edits or have progressed.</dd>
            </dl>
          </blockquote>
        </div> -->
    </div>
@endsection