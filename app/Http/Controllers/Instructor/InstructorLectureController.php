<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\CourseContent;
use App\Models\Lecture;
use Illuminate\Http\Request;

class InstructorLectureController extends Controller
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
    public function create($id, $item)
    {
        $content = CourseContent::where('id', $item)->first();
        return view('instructor.lecture.create', compact('content'));
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
            'title' => 'required',
            'content_id' => 'required',
            'desc' => 'required',
            'content' => 'nullable',
            'video' => 'nullable',
            'image' => 'nullable',
            'audio' => 'nullable',
            'file' => 'nullable',
        ]);

        $para1 = $request->para_1;
        $para2 = $request->para_2;

        $lecture = new Lecture();
        $lecture->title = $request->title;
        $lecture->content_id = $request->content_id;
        $lecture->desc = $request->desc;
        $lecture->content = $request->content;
        $lecture->file = $request->file;
        $lecture->save();


        return redirect()->route('instructor.content.edit', [$para1, $para2])->with('success', 'Course Content Created Successfully');
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
    public function edit($id, $new)
    {
        $lecture = Lecture::where('id', $new)->first();
        $content = CourseContent::where('id', $id)->first();
        return view('instructor.lecture.edit', compact('lecture', 'content'));
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
        //
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
