<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class AdminEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('admin.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.event.create');
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'location' => 'required',
            'date' => 'required',
            'time' => 'required',
            'desc' => 'required',
        ]);

        $event = new Event();
        $event->title = $request->title;
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('event'), $imageName);
            $event->image = $imageName;
        }
        $event->location = $request->location;
        $event->date = $request->date;
        $event->time = $request->time;
        $event->desc = $request->desc;
        $event->save();

        return redirect()->route('admin.event.index')->with('success', 'Event created successfully');
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
        $event = Event::find($id);
        return view('admin.event.edit', compact('event'));
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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'location' => 'required',
            'date' => 'required',
            'time' => 'required',
            'desc' => 'required',
        ]);

        $event = Event::find($id);
        $event->title = $request->title;
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('event'), $imageName);
            $event->image = $imageName;
        }
        $event->location = $request->location;
        $event->date = $request->date;
        $event->time = $request->time;
        $event->desc = $request->desc;
        $event->save();

        return redirect()->route('admin.event.index')->with('success', 'Event updated successfully');
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
