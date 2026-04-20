<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Create User
    public function create(Request $request)
    {
        // Validate request...
        // Creating user...
        return response()->json(['message' => 'User created successfully'], 201);
    }

    // List Users
    public function index()
    {
        // Retrieving users...
        return response()->json(User::all(), 200);
    }

    // Update User
    public function update(Request $request, $id)
    {
        // Find user by $id...
        // Updating user...
        return response()->json(['message' => 'User updated successfully'], 200);
    }

    // Delete User
    public function destroy($id)
    {
        // Finding and deleting user by $id...
        return response()->json(['message' => 'User deleted successfully'], 200);
    }
}