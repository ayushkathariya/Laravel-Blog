<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(User $user)
    {
        return view('admin.user-edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated_input = $request->validate([
            'name' => 'required|string|max:255',
            'is_admin' => 'sometimes:boolean'
        ]);

        try {

            $user->name = $validated_input['name'];
            $user->is_admin = $validated_input['is_admin'] ?? false;
            $user->save();

            return redirect(route('admin.users'))->with('success', 'User updated successfully.');

        } catch (\Exception $e) {
            return redirect(route('admin.users'))->with('error', 'There was an error while updating the user. Please try again later.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect(route('admin.users'))->with('success', 'User deleted successfully.');
        } catch (\Exception $e) {
            return redirect(route('admin.users'))->with('error', 'There was an error while deleting the user. Please try again later.');
        }
    }
}
