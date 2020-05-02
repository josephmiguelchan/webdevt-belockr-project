@extends('layouts.main')
@section('title', 'List of Students - BeLockR')
@section('content')
    <div class="container-fluid">
        @if(session('successMsg'))
            <div class="alert alert-success">
                {{ session('successMsg') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <th>Student No.</th>
                <th>Student First Name</th>
                <th>Student Middle Name</th>
                <th>Student Last Name</th>
                <th>Course</th>
                <th>Email</th>
                <th>Year Level</th>
                <th>Last Edited</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($students as $item)
                    <tr>
                        <td>{{ $item->student_id }}</td>
                        <td>{{ $item->first_name }} </td>  
                        <td>{{ $item->middle_name}}</td>
                        <td>{{ $item->last_name }}</td>
                        <td>{{ $item->course }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->year_level }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td>
                            <div class="btn-group">
                                <form action="{{ route('students_edit', $item->student_code) }}">
                                  <button class="btn btn-sm btn-info">
                                    <i class="fa fa-edit"></i>
                                  </button>
                                </form>
                                <form method="POST" action="{{route('students_delete', $item->student_code)}}">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this student?')">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$students->links()}}
    </div>
@endsection