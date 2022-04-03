<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Level;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AdminLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Level::all();
        return view('admin.level.index', compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.level.create');
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
            'name' => 'required',
        ]);

        $category = new Level();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name, '-');
        $category->save();

        return redirect()->route('admin.level.index')->with('success', 'Level created successfully');
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
        $level = Level::find($id);
        return view('admin.level.edit', compact('level'));
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
            'name' => 'required',
        ]);

        $level = Level::find($id);
        $level->name = $request->name;
        $level->slug = Str::slug($request->name, '-');
        $level->save();

        return redirect()->route('admin.level.index')->with('success', 'Level updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $level = Level::find($id);
        $level->delete();

        return redirect()->route('admin.level.index')->with('success', 'Level deleted successfully');
    }
}
