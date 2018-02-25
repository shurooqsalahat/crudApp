<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreBlogPost ;
use App\Http\Controllers\Request ;

use App\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $students = Student::paginate(4);
        return view('welcome', ['students' => $students]);//It creates an array containing variables and their values.
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $student =new Student;
        return view('create',compact('student'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogPost  $request)
    {
        $student = new Student;
        $student->first_name = $request->firstname;
        $student->last_name = $request->lastname;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->save();
        return redirect(route('students.index'))->with('successMsg', 'Student Successfully Added');
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
    public function edit($id)
    {
        if($student =Student::find($id)){
            return view('edit',compact('student'));
        }
        else{
            return redirect(route('students.index'))->with('errorMsg', 'This ID is not exist please try again');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBlogPost $request,$id)
    {
        $student = Student::find($id);
        $student->first_name = $request->firstname;
        $student->last_name = $request->lastname;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->save();
        return redirect(route('students.index'))->with('successMsg','Student Successfully Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Student::find($id)->delete()){
            return redirect(route('students.index'))->with('successMsg','Student Successfully Delete');
        }
        else{
            return redirect(route('students.index'))->with('errorMsg','Something Error please try again');
        }

    }
}
