<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseRating;
use App\Models\User;
use Illuminate\Http\Request;

class AdminCourseRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        $courseRatings = CourseRating::all();
        return view('admin.rating.index', compact('courses', 'courseRatings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        $users = User::all();
        return view('admin.rating.create', compact('courses', 'users'));
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
            'user_id' => 'required',
            'rating' => 'required',
            'comment' => 'required',
        ]);

        $courseRating = new CourseRating();
        $courseRating->course_id = $request->course_id;
        $courseRating->user_id = $request->user_id;
        $courseRating->rating = $request->rating;
        $courseRating->comment = $request->comment;
        $courseRating->save();

        return redirect()->route('admin.rating.index')->with('success', 'Course Rating Created Successfully');
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
        $courseRating = CourseRating::find($id);
        $courses = Course::all();
        $users = User::all();
        return view('admin.rating.edit', compact('courseRating', 'courses', 'users'));
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
            'user_id' => 'required',
            'rating' => 'required',
            'comment' => 'required',
        ]);

        $courseRating = CourseRating::find($id);
        $courseRating->course_id = $request->course_id;
        $courseRating->user_id = $request->user_id;
        $courseRating->rating = $request->rating;
        $courseRating->comment = $request->comment;
        $courseRating->save();

        return redirect()->route('admin.rating.index')->with('success', 'Course Rating Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $courseRating = CourseRating::find($id);
        $courseRating->delete();

        return redirect()->route('admin.rating.index')->with('success', 'Course Rating Deleted Successfully');
    }
}
