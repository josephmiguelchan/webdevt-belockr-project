@extends('layouts.main')
@section('title', 'View Locker Records')
@section('content')
    <div class="container-fluid">
        @if(session('successMsg'))
            <div class="alert alert-success">
                {{ session('successMsg') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <th>Locker No.</th>
                <th>Location</th>
                <th>Status</th>
                @if(Auth::user()->userlevel == 'Admin')
                    <th>Date Added</th>
                    <th>Last Update</th>
                    <th>Actions</th>
                @endif
            </thead>
            <tbody>
                @foreach($lockers as $item)
                    <tr>
                        <td>{{ $item->locker_id }}</td>
                        <td>{{ $item->location }}</td>
                        <td>{{ $item->status }}</td>
                        @if(Auth::user()->userlevel == 'Admin')
                            <td>{{ $item->created_at->format('Y-m-d g:i a') }}</td>
                            <td>{{ $item->updated_at }}</td>
                            <td>
                                <div class="btn-group">
                                    <form action="{{ route('lockers_edit', $item->locker_id) }}">
                                        <button class="btn btn-sm btn-info">
                                           <i class="fa fa-edit"></i>
                                        </button>
                                    </form>
                                    <form method="delete" action="{{ route('lockers_delete', $item->locker_id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this locker?');">
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
    </div>
@endsection