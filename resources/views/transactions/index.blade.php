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
                <th>Receipt</th>
                <th>Status</th>
                <th>Comments</th>
                <th>Staff ID</th>
                <th>Date Created</th>
                <th>Last Edited</th>
                @if (Auth::user()->userlevel == 'Admin')
                  <th>Actions</th>
                @endif
            </thead>
            <tbody>
                @foreach($records as $item)
                    <tr>
                        <td>{{ $item->student_id }}</td>
                        <td>{{ $item->locker_id }}</td>
                        <td>{{ $item->step }}</td>
                        <td>
                          @if($item->receipt_img)  
                            <img class="img-fluid" src="{{ asset('/public/receiptImages/' . $item->receipt_img) }}" alt="receipt" width="150px"></td>
                          @else
                            <p>No receipts yet</p>
                          @endif
                        </td>
                        <td>{{ $item->status }}</td>
                        <td>{{ $item->comment }}</td>
                        <td>{{ $item->staff_id }}</td>
                        <td>{{ $item->created_at->format('Y-m-d g:i a') }}</td>
                        <td>{{ $item->updated_at }}</td>
                        @if (Auth::user()->userlevel == 'Admin')
                          <td>
                            <div class="btn-group">
                                <form action="{{route('transactions_edit', $item->code)}}">
                                  <button class="btn btn-sm btn-info">
                                    <i class="fa fa-edit"></i>
                                  </button>
                                </form>
                                <form method="POST" action="{{ route('transactions_delete', $item->code) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Do you want to delete this transaction?');">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                      @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-center">
          {{ $records->links() }}
        </div>
        
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