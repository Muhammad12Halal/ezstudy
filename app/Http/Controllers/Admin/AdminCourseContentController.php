<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseContent;
use Illuminate\Http\Request;

class AdminCourseContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courseContents = CourseContent::all();
        return view('admin.content.index', compact('courseContents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        return view('admin.content.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required',
            'title' => 'required',
        ]);

        $courseContent = new CourseContent();
        $courseContent->course_id = $request->course_id;
        $courseContent->title = $request->title;
        $courseContent->save();

        return redirect()->route('admin.content.index')->with('success', 'Course Content Created Successfully');
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
        $courseContent = CourseContent::find($id);
        $courses = Course::all();
        return view('admin.content.edit', compact('courseContent', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'course_id' => 'required',
            'title' => 'required',
        ]);

        $courseContent = CourseContent::find($id);
        $courseContent->course_id = $request->course_id;
        $courseContent->title = $request->title;
        $courseContent->save();

        return redirect()->route('admin.content.index')->with('success', 'Course Content Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $courseContent = CourseContent::find($id);
        $courseContent->delete();

        return redirect()->route('admin.content.index')->with('success', 'Course Content Deleted Successfully');
    }
}
