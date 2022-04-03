<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Course;
use App\Models\CourseEnroll;
use App\Models\CourseRating;
use App\Models\Event;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $courses = Course::where('status', 'Active')->limit(4)->get();
        $ratings = CourseRating::limit(4)->get();
        $events = Event::limit(4)->get();
        $enrolls = CourseEnroll::count();
        return view('e.index', compact('courses', 'ratings', 'events', 'enrolls'));
    }

    public function course()
    {
        $courses = Course::where('status', 'Active')->get();
        $category = Category::get();
        return view('e.course', compact('courses', 'category'));
    }

    public function courseDetail($id)
    {
        if (Course::where('slug', $id)->exists()) {
            $course = Course::where('slug', $id)->first();
            $ratings = CourseRating::where('course_id', $id)->get();
            if (auth()->user() != NULL) {
                $enrolls = CourseEnroll::where(['course_id' => $course->id, 'user_id' => auth()->user()->id])->count();
                $reviews = CourseRating::where(['course_id' => $course->id, 'user_id' => auth()->user()->id])->count();
                $myreviews = CourseRating::where(['course_id' => $course->id, 'user_id' => auth()->user()->id])->first();
            }
            if (auth()->user() == NULL) {
                $enrolls = 'NULL';
                $reviews = 'NULL';
                $myreviews = 'NULL';
            }
            return view('e.course-detail', compact('course', 'ratings', 'enrolls', 'reviews', 'myreviews'));
        } else {
            return redirect('/course');
        }
    }

    public function event()
    {
        $events = Event::get();
        return view('e.event', compact('events'));
    }

    public function faq()
    {
        return view('e.faq');
    }

    public function about()
    {
        return view('e.about');
    }

    public function contact()
    {
        return view('e.contact');
    }

    public function contactpost(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'message' => 'required',
        ]);

        $contact = new Contact();
        $contact->user_id = $request->user_id;
        $contact->message = $request->message;

        $contact->save();

        return redirect('/contact')->with('success', 'Message Sent Successfully');

    }
}
