<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index()
    {
        $users = User::latest()->paginate(15);
        $admins = Admin::all();
        return view('admin.users.index', compact('users', 'admins'));
    }

    /**
     * Show the form for creating a new user/admin.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:user,admin',
        ]);

        if ($request->role === 'admin') {
            Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $message = 'Admin created successfully.';
        } else {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $message = 'User created successfully.';
        }

        return redirect()->route('admin.users.index')->with('success', $message);
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(Request $request, $id)
    {
        if ($request->type === 'admin') {
            $admin = Admin::findOrFail($id);

            // Safety: Don't allow deleting the main admin
            if ($admin->email === 'admin@bohofurniture.com') {
                return redirect()->back()->with('error', 'The main administrator account cannot be deleted.');
            }

            $admin->delete();
            $typeLabel = 'Administrator';
        } else {
            $user = User::findOrFail($id);

            // Safety: Don't allow deleting self
            if (auth()->id() === $user->id) {
                return redirect()->back()->with('error', 'You cannot delete your own account.');
            }

            $user->delete();
            $typeLabel = 'Customer';
        }

        return redirect()->route('admin.users.index')->with('success', "$typeLabel deleted successfully.");
    }
}
