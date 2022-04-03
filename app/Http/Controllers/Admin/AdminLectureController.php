<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseContent;
use App\Models\Lecture;
use Illuminate\Http\Request;

class AdminLectureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lectures = Lecture::all();
        return view('admin.lecture.index', compact('lectures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contents = CourseContent::all();
        return view('admin.lecture.create', compact('contents'));
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
            'title' => 'required',
            'content_id' => 'required',
            'desc' => 'required',
            'content' => 'nullable',
            'video' => 'nullable',
            'image' => 'nullable',
            'audio' => 'nullable',
            'file' => 'nullable',
        ]);

        $lecture = new Lecture();
        $lecture->title = $request->title;
        $lecture->content_id = $request->content_id;
        $lecture->desc = $request->desc;
        $lecture->content = $request->content;
        $lecture->file = $request->file;
        $lecture->save();
        return redirect()->route('admin.lecture.index');
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
        $lecture = Lecture::find($id);
        $contents = CourseContent::all();
        return view('admin.lecture.edit', compact('lecture', 'contents'));
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
            'title' => 'required',
            'content_id' => 'required',
            'desc' => 'required',
            'content' => 'nullable',
            'video' => 'nullable',
            'image' => 'nullable',
            'audio' => 'nullable',
            'file' => 'nullable',
        ]);

        $lecture = Lecture::find($id);
        $lecture->title = $request->title;
        $lecture->content_id = $request->content_id;
        $lecture->desc = $request->desc;
        $lecture->content = $request->content;
        $lecture->file = $request->file;
        $lecture->save();
        return redirect()->route('admin.lecture.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lecture = Lecture::find($id);
        $lecture->delete();
        return redirect()->route('admin.lecture.index');
    }
}
