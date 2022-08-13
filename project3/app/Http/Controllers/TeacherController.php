<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function viewteacher()
    {
        $teachers = Teacher::all();
        return view('teacher.teacherView', ['teachers' => $teachers]);
    }

    public function saveTeacher(Request $request)
    {
        $teachers = new Teacher();
        $teachers->teachername = $request->teachername;
        $teachers->college = $request->college;
        $teachers->experience = $request->experience;
        $teachers->save();
        return redirect('/view-teacher');
    }
    public function updateTeacher(Request $request)
    {
        $teacher = Teacher::find($request->id);

        $teacher->teachername = $request->teachername;

        $teacher->college = $request->college;
        $teacher->experience = $request->experience;
        $teacher->save();
        return redirect('/view-teacher');
    }
    public function deleteteacher($id)
    {

        $teacher = Teacher::find($id);
        $teacher->delete();
        return redirect()->back()->with('status', 'teacher deleted successfully');
    }
}
