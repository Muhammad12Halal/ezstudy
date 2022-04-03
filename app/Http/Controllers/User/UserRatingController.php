<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CourseRating;
use Illuminate\Http\Request;

class UserRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        return redirect()->back()->with('success', 'Course Rating Created Successfully');
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
        //
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

        return redirect()->back()->with('success', 'Course Rating Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
