<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Level;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class InstructorCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::where('user_id', auth()->user()->id)->get();
        return view('instructor.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('id', auth()->user()->id)->get();
        $categorys = Category::all();
        $levels = Level::all();
        return view('instructor.course.create', compact('users', 'categorys', 'levels'));
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
            'category_id' => 'required',
            'level_id' => 'required',
            'user_id' => 'required',
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video' => 'required',
            'price' => 'required',
            'duration' => 'required',
            'status' => 'required',
            'description' => 'required',
        ]);

        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('courses'), $imageName);
        $randomslug = Str::random(10);
        $course = new Course();
        $course->category_id = $request->category_id;
        $course->level_id = $request->level_id;
        $course->user_id = $request->user_id;
        $course->title = $request->title;
        $course->description = $request->description;
        $course->image = $imageName;
        $course->price = $request->price;
        $course->duration = $request->duration;
        $course->status = $request->status;
        $course->video = $request->video;
        $course->slug = Str::slug($request->title, '-') . '-' . $randomslug;
        $course->save();

        return redirect()->route('instructor.course.index')->with('success', 'Course created successfully');
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
        $course = Course::find($id);

        if ($course == NULL) {
            return redirect()->route('instructor.course.index')->with('success', 'Unauthorized Page');
        }

        if ($course->user_id != auth()->user()->id || $course == NULL) {
            return redirect()->route('instructor.course.index')->with('success', 'Unauthorized Page');
        }
        $users = User::where('id', auth()->user()->id)->get();
        $categorys = Category::all();
        $levels = Level::all();
        return view('instructor.course.edit', compact('course', 'users', 'categorys', 'levels'));
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
            'category_id' => 'required',
            'level_id' => 'required',
            'user_id' => 'required',
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video' => 'required',
            'price' => 'required',
            'duration' => 'required',
            'status' => 'required',
            'description' => 'required',
        ]);

        $course = Course::find($id);
        $course->category_id = $request->category_id;
        $course->level_id = $request->level_id;
        $course->user_id = $request->user_id;
        $course->title = $request->title;
        $course->description = $request->description;
        $course->price = $request->price;
        $course->duration = $request->duration;
        $course->status = $request->status;
        $course->video = $request->video;
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('courses'), $imageName);
            $course->image = $imageName;
        }
        $course->save();

        return redirect()->route('instructor.course.index')->with('success', 'Course updated successfully');
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
