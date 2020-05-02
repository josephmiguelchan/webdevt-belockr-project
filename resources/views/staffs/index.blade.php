@extends('layouts.main')
@section('title', 'View Students Record')
@section('content')
    <div class="container-fluid">
        @if(session('successMsg'))
            <div class="alert alert-success">
                {{ session('successMsg') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Date Added</th>
                <th>Last Update</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach($staffs as $item)
                    <tr>
                        <td>{{ $item->first_name }}</td>
                        <td>{{ $item->middle_name }}</td>
                        <td>{{ $item->last_name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->status }}</td>
                        <td>{{ $item->created_at->format('Y-m-d g:i a') }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td>
                            <div class="btn-group">
                                <form action="{{ route('staffs_edit', $item->staff_code) }}">
                                  <button class="btn btn-sm btn-info">
                                    <i class="fa fa-edit"></i>
                                  </button>
                                </form>
                                <form method="delete" action="{{ route('staffs_delete', $item->staff_code) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Demote this staff?');">
                                        <i class="fa fa-trash"></i>
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