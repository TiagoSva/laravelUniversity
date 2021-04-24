<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Grade;

class CourseController extends Controller
{
    //show all courses
    public function index()
    {

        $courses = Course::orderBy('name', 'asc')->paginate();
        return view('courses.index', ['courses' => $courses]);
    }
    // create course
    public function create()
    {
        return view('courses.create');
    }
    //add course to database
    public function insert(Request $request)
    {

        $course = new Course();
        $course->name = $request->name;
        $course->description = $request->description;
        $course->credits = $request->credits;
        $course->save();
        return redirect()->route('courses.index');
    }
    //update courses
    public function edit(Course $course)
    {

        return view('courses.edit', ['course' => $course]);
    }
    // update course in database
    public function save(Request $request, Course $course)
    {
        $course->name = $request->name;
        $course->description = $request->description;
        $course->credits = $request->credits;
        $course->save();
        return redirect()->route('courses.index');
    }
    // delete course
    public function delete(Course $course)
    {
        $id = $course->id;
        $course->delete();
        // delete grades from courses
        return redirect()->route('courses.index');
    }
    // remove course from database
    public function remove($id)
    {
        $courses = Course::orderBy('name', 'asc')->paginate();
        return view('courses.index', ['courses' => $courses, 'id' => $id]);
    }
}
