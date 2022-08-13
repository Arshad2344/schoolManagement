<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;

class StudentController extends Controller
{
    public function viewstudent()
    {
        $students = Student::all();
        $teachers = Teacher::all();
        return view('student.studentView', ['students' => $students,'teachers' => $teachers]);
    }
    public function savestudent(Request $request)
    {
        $students = new Student();
        $students->studentname = $request->studentname;
        $students->college = $request->college;
        $students->department = $request->department;
        $students->save();
        return redirect('/view-student');
    }
    public function updatestudent(Request $request)
    {
        $students = Student::find($request->id);

        $students->studentname = $request->studentname;

        $students->college = $request->college;
        $students->department = $request->department;
        $students->save();
        return redirect('/view-student');
    }
    public function deletestudent($id)
    {

        $students = Student::find($id);
        $students->delete();
        return redirect()->back()->with('status', 'students deleted successfully');
    }
}
