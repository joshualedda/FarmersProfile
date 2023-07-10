<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function users()
    {
        $users = User::all();
        return view('admin.users', ['users' => $users]);
    }


    public function store(Request $request)
    {

    // Check if username or email is duplicate
    if (User::where('username', $request->username)->exists() || User::where('email', $request->email)->exists()) {
        session()->flash('error', 'Username or email is already taken.');
        return redirect()->back();
    }

    // Add the user to the database
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone_number' => 'required',
            'status' => 'required',
            'user_type' => 'required'
        ]);

        User::create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'phone_number' => $request->input('phone_number'),
            'status' => $request->input('status'),
            'user_type' => $request->input('user_type')
        ]);


        return redirect('admin/users')->with('message', 'Form submitted successfully!');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
