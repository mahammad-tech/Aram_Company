<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    // Method to create a new admin
    public function createAdmin(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Create a new admin
        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return response()->json($admin, 201);
    }

    // Method to list all admins
    public function listAdmins()
    {
        $admins = Admin::all();
        return response()->json($admins);
    }

    // Method to update an existing admin
    public function updateAdmin(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|max:255|unique:admins,email,' . $id,
            'password' => 'sometimes|string|min:6|confirmed',
        ]);

        // Find the admin by ID
        $admin = Admin::findOrFail($id);

        // Update admin details
        if ($request->has('name')) {
            $admin->name = $request->name;
        }
        if ($request->has('email')) {
            $admin->email = $request->email;
        }
        if ($request->has('password')) {
            $admin->password = bcrypt($request->password);
        }

        $admin->save();

        return response()->json($admin);
    }
}