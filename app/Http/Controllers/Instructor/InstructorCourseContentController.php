<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseContent;
use App\Models\Lecture;
use Illuminate\Http\Request;

class InstructorCourseContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($item)
    {
        $course = Course::find($item);

        if ($course == NULL) {
            return redirect()->route('instructor.course.index')->with('success', 'Unauthorized Page');
        }

        if ($course->user_id != auth()->user()->id || $course == NULL) {
            return redirect()->route('instructor.course.index')->with('success', 'Unauthorized Page');
        }

        $courseContents = CourseContent::where('course_id', $item)->get();

        return view('instructor.content.index', compact('courseContents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($item)
    {
        $course = Course::find($item);

        if ($course == NULL) {
            return redirect()->route('instructor.course.index')->with('success', 'Unauthorized Page');
        }

        if ($course->user_id != auth()->user()->id || $course == NULL) {
            return redirect()->route('instructor.course.index')->with('success', 'Unauthorized Page');
        }

        return view('instructor.content.create', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $item)
    {
        $request->validate([
            'course_id' => 'required',
            'title' => 'required',
        ]);

        $courseContent = new CourseContent();
        $courseContent->course_id = $request->course_id;
        $courseContent->title = $request->title;
        $courseContent->save();

        return redirect()->route('instructor.content.index', $item)->with('success', 'Course Content Created Successfully');
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
    public function edit($item, $id)
    {
        $course = Course::find($item);

        if ($course == NULL) {
            return redirect()->route('instructor.course.index')->with('success', 'Unauthorized Page');
        }

        if ($course->user_id != auth()->user()->id || $course == NULL) {
            return redirect()->route('instructor.course.index')->with('success', 'Unauthorized Page');
        }

        $courseContent = CourseContent::find($id);

        $lectures = Lecture::where('content_id', $id)->get();

        return view('instructor.content.edit', compact('courseContent', 'course', 'lectures'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $item, $id)
    {
        $request->validate([
            'course_id' => 'required',
            'title' => 'required',
        ]);

        $courseContent = CourseContent::find($id);
        $courseContent->course_id = $request->course_id;
        $courseContent->title = $request->title;
        $courseContent->save();

        return redirect()->route('instructor.content.index', $item)->with('success', 'Course Content Updated Successfully');
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
