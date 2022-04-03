<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseEnroll;
use App\Models\User;
use Illuminate\Http\Request;

class AdminCourseEnrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enrolls = CourseEnroll::all();
        return view('admin.enroll.index', compact('enrolls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $courses = Course::all();
        return view('admin.enroll.create', compact('users', 'courses'));
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
            'user_id' => 'required',
            'course_id' => 'required',
            'status' => 'required',
        ]);

        $enroll = new CourseEnroll();
        $enroll->user_id = $request->user_id;
        $enroll->course_id = $request->course_id;
        $enroll->status = $request->status;
        $enroll->save();

        return redirect()->route('admin.enroll.index')->with('success', 'Enroll created successfully.');
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
        $enroll = CourseEnroll::find($id);
        $users = User::all();
        $courses = Course::all();
        return view('admin.enroll.edit', compact('enroll', 'users', 'courses'));
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
            'user_id' => 'required',
            'course_id' => 'required',
            'status' => 'required',
        ]);

        $enroll = CourseEnroll::find($id);
        $enroll->user_id = $request->user_id;
        $enroll->course_id = $request->course_id;
        $enroll->status = $request->status;
        $enroll->save();

        return redirect()->route('admin.enroll.index')->with('success', 'Enroll updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $enroll = CourseEnroll::find($id);
        $enroll->delete();

        return redirect()->route('admin.enroll.index')->with('success', 'Enroll deleted successfully.');
    }
}
