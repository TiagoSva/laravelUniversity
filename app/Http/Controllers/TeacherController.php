<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    //show all teachers
    public function index()
    {
        $teachers = Teacher::orderBy('name', 'asc')->paginate();
        return view('teachers.index', ['teachers' => $teachers]);
    }
    // create teacher
    public function create()
    {
        return view('teachers.create');
    }
    //add teacher to database
    public function insert(Request $request)
    {
        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->save();
        return redirect()->route('teachers.index');
    }
    //update teachers
    public function edit(Teacher $teacher)
    {
        return view('teachers.edit', ['teacher' => $teacher]);
    }
    // update teacher in database
    public function save(Request $request, Teacher $teacher)
    {
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->save();
        return redirect()->route('teachers.index');
    }
    // delete teacher
    public function delete(Teacher $teacher)
    {
        $id = $teacher->id;
        $teacher->delete();
        // delete Teachers from teachers
        return redirect()->route('teachers.index');
    }
    // remove teacher from database
    public function remove($id)
    {
        $teachers = Teacher::orderBy('name', 'asc')->paginate();
        return view('teachers.index', ['teachers' => $teachers, 'id' => $id]);
    }
}
