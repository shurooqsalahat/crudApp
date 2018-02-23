<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Eloquent;
use DB;

class StudentController extends Controller
{

    /*
     *Get all students and  redirect user to index page
     * */
    public function index()
    {
        $students = Student::paginate(5);

        return view('welcome', ['students' => $students]);//It creates an array containing variables and their values.

    }

    /*
     * Index Function to redirect user to create page
     * */
    public function create()
    {
        return view('create');
    }
     /*
      * Store new student in DB
      * args : Request object from user inputs
      */
    public function store(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);
        $student = new Student;
        $student->first_name = $request->firstname;
        $student->last_name = $request->lastname;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->save();
        return redirect(route('home'))->with('successMsg', 'Student Successfully Added');
    }
    public function edit($id)
    {
        $student =Student::find($id);
        return view('edit',compact('student'));
    }
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);
        $student = Student::find($id);
        $student->first_name = $request->firstname;
        $student->last_name = $request->lastname;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->save();
        return redirect(route('home'))->with('successMsg','Student Successfully Update');
    }
    public function delete($id)
    {
        Student::find($id)->delete();
        return redirect(route('home'))->with('successMsg','Student Successfully Delete');
    }


}
