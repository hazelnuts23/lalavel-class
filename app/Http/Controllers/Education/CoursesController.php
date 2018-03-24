<?php

namespace App\Http\Controllers\Education;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Course;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courseList = Course::courseList();
        return view('education.courses.index', compact('courseList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('education.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $courses['course_name'] = $request->post('course_name');
        $courses['course_hour'] = $request->post('course_hour');
        $courses['course_desc'] = $request->post('course_desc');
        $saveCourse = Course::saveCourse($courses);
        if($saveCourse){
            return redirect()->route('courses.index');
        }else{
            abort(500);
        }

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($course)
    {
        $courseDetail = Course::find($course);
        return view('education.courses.edit', compact('courseDetail', 'course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $course)
    {
        $courses['course_name'] = $request->post('course_name');
        $courses['course_hour'] = $request->post('course_hour');
        $courses['course_desc'] = $request->post('course_desc');
        $update = Course::updateCourse($course, $courses);
        if($update){
            return redirect()->route('courses.edit', compact('course'));
        }else{
            abort(500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($course)
    {
        Course::removeCourse($course);
        return redirect()->route('courses.index');
    }
}
