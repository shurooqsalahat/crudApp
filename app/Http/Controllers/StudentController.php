<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreBlogPost ;
use App\Student;
class StudentController extends Controller
{

    /*
     *Get all students and  redirect user to index page
     * */
    public function index()
    {
        $students = Student::paginate(4);

        return view('welcome', ['students' => $students]);//It creates an array containing variables and their values.

    }

    /*
     * Index Function to redirect user to create page
     * */
    public function create()
    {
        $student =new Student;
        return view('create',compact('student'));
    }
     /*
      * Store new student in DB
      * args : Request object from user inputs
      */
    public function store(StoreBlogPost  $request)
    {
        $student = new Student;
        $student->first_name = $request->firstname;
        $student->last_name = $request->lastname;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->save();
        return redirect(route('home'))->with('successMsg', 'Student Successfully Added');
    }
    /*get user data , redirect him to edit page with data
     * args : user ID
     * */
    public function edit($id)
    {
        if($student =Student::find($id)){
            return view('edit',compact('student'));
        }
        else{
            return redirect(route('home'))->with('errorMsg', 'This ID is not exist please try again');
        }

    }
    /*Update user data with specific id
     * args : ID
     * */
    public function update(StoreBlogPost $request,$id)
    {

        $student = Student::find($id);
        $student->first_name = $request->firstname;
        $student->last_name = $request->lastname;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->save();
        return redirect(route('home'))->with('successMsg','Student Successfully Update');
    }
    /*delete user data with specific id use soft delete
   * args : ID
   * */
    public function delete($id)
    {
        if(Student::find($id)->delete()){
            return redirect(route('home'))->with('successMsg','Student Successfully Delete');
        }
        else{
            return redirect(route('home'))->with('errorMsg','Something Error please try again');
        }


    }


}
