<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::paginate(5);
        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'student_id' => 'required',
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'course' => 'required',
            'year_level' => 'required',
            'email' => 'required'
        ]);
        
        $uuid = Str::uuid()->toString();

        $student = new Student;
        $student->student_id = $request->student_id;
        $student->student_code = $uuid;
        $student->first_name = $request->first_name;
        $student->middle_name = $request->middle_name;
        $student->last_name = $request->last_name;
        $student->course = $request->course;
        $student->email = $request->email;
        $student->year_level = $request->year_level;
        $student->save();
        return redirect(route('students_list'))->with('successMsg', 'Student record added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($student_code)
    {
        $student = Student::where('student_code', $student_code)->first();
        return view('student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $student_code)
    {
        $this->validate($request, [
            'student_id' => 'required',
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'course' => 'required',
            'year_level' => 'required',
            'email' => 'required'


        ]);

        $uuid = Str::uuid()->toString();

        $student = Student::where('student_code', $student_code)->first();
        $student->student_code = $uuid;
        $student->student_id= $request->student_id;
        $student->first_name = $request->first_name;
        $student->middle_name = $request->middle_name;
        $student->last_name = $request->last_name;
        $student->course = $request->course;
        $student->email = $request->email;
        $student->year_level = $request->year_level;
        $student->save();
        return redirect(route('students_list'))->with('successMsg', 'Student record has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($student_code)
    {
        $student = Student::where('student_code', $student_code)->first();
        $student->delete();
        return redirect(route('students_list'))->with('successMsg', 'Student record has been deleted!');

    }
}
