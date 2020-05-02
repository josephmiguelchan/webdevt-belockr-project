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
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach($confirmrecords as $item)
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
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td>
                        <div class="btn-group">
                          <form action="{{route('transactions_confirm', $item->code)}}">
                            <button class="btn btn-sm btn-green dark-4" onclick="return confirm('Confirm this receipt as valid?');">
                              Confirm
                            </button>
                          </form>
                          <form action="{{route('transactions_reject', $item->code)}}">
                            <button class="btn btn-sm btn-outline-green dark-4" onclick="return confirm('Image too blurry? You may reject the receipt and we will let the student reupload their receipt. Continue?');">
                              Reject
                            </button>
                          </form>
                        </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection