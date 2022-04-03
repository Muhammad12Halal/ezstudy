<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.profile.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin.profile.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'user_id' => 'required|unique:profiles',
            'phone' => 'required',
            'address' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'about' => 'required',
        ]);

        $user = User::find($request->user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        $profile = new Profile();
        $profile->user_id = $request->user_id;
        $profile->phone = $request->phone;
        $profile->address = $request->address;
        $profile->facebook = $request->facebook;
        $profile->twitter = $request->twitter;
        $profile->instagram = $request->instagram;
        $profile->youtube = $request->youtube;
        $profile->about = $request->about;
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('profile'), $imageName);
            $profile->image = $imageName;
        }
        $profile->save();

        return redirect()->route('admin.profile.index')->with('success', 'User created successfully');
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
        $user = User::find($id);
        $users = User::all();
        $profile = Profile::where('user_id', $id)->first();
        return view('admin.profile.edit', compact('user', 'users', 'profile'));
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'user_id' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'about' => 'required',
        ]);

        $user = User::find($request->user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        $profile = Profile::where('user_id', $request->user_id)->first();
        $profile->user_id = $request->user_id;
        $profile->phone = $request->phone;
        $profile->address = $request->address;
        $profile->facebook = $request->facebook;
        $profile->twitter = $request->twitter;
        $profile->instagram = $request->instagram;
        $profile->youtube = $request->youtube;
        $profile->about = $request->about;
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('profile'), $imageName);
            $profile->image = $imageName;
        }
        $profile->save();

        return redirect()->route('admin.profile.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile = Profile::where('user_id', $id)->first();
        $profile->delete();

        return redirect()->route('admin.profile.index')->with('success', 'User deleted successfully');
    }
}
