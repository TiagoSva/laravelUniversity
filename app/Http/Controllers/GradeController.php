<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GradeController extends Controller
{

    //show all grades
    public function index()
    {

        // $grade = Grade::orderBy('grade', 'asc')->paginate();
        // $grade = DB::table('students')->where('id', 'id_student')->pluck('name');
        $grade = DB::table('grades')
            ->join('students', 'grades.id_student', '=', 'students.id')
            ->join('teachers', 'grades.id_teacher', '=', 'teachers.id')
            ->join('courses', 'grades.id_course', '=', 'courses.id')
            ->select('grades.*', 'teachers.name as teacher_name', 'students.name as student_name', 'courses.name as course_name')
            ->paginate();


        return view('grades.index', ['grades' => $grade]);
    }
    // create grade
    public function create()
    {

        $students = Student::orderBy('name', 'asc')->paginate();
        $teachers = Teacher::orderBy('name', 'asc')->paginate();
        $courses = Course::orderBy('name', 'asc')->paginate();

        return view('grades.create', ['students' => $students, 'teachers' => $teachers, 'courses' => $courses]);
        // return view('grades.create', ['students' => $students, 'teachers' => $teachers, 'courses' => $courses]);
    }
    //add grade to database
    public function insert(Request $request)
    {
        $grade = new Grade();
        $grade->grade = $request->grade;
        $grade->id_course = $request->course_id;
        $grade->id_teacher = $request->teacher_id;
        $grade->id_student = $request->student_id;
        $grade->status = 1;

        $grade->save();
        return redirect()->route('grades.index');
    }
    //update grades
    public function edit(string $grade_id)
    {
        $arrayIdGrades = explode('-', $grade_id);
        $id_course = $arrayIdGrades[0];
        $id_student = $arrayIdGrades[1];
        $id_teacher = $arrayIdGrades[2];

        $students = Student::orderBy('name', 'asc')->paginate();
        $teachers = Teacher::orderBy('name', 'asc')->paginate();
        $courses = Course::orderBy('name', 'asc')->paginate();


        $grade = DB::table('grades')->where("id_course = {$id_course}")

            ->select('grades.*')
            ->paginate();

        error_log($grade[0]->grade);



        return view('grades.edit');
    }
    // update grade in database
    public function save(Request $request, Grade $grade)
    {
        $grade->grade = $request->grade;
        $grade->save();
        return redirect()->route('grades.index');
    }
    // delete grade
    public function delete(Grade $grade)
    {
        $id = $grade->id;
        Grade::table('grades')->where('grade', $id)->delete();
        $grade->delete();
        // delete grades from grades
        return redirect()->route('grades.index');
    }
    // remove grade from database
    public function remove($id)
    {
        $grades = Grade::orderBy('name', 'asc')->paginate();
        return view('grades.index', ['grades' => $grades, 'id' => $id]);
    }
}
