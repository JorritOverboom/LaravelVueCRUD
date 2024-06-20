<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ForumUser;

class ForumUserController extends Controller
{
    public function index()
    {
        return ForumUser::all();
    }

    public function show($id)
    {
        return ForumUser::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:forumUsers|max:255',
            'password' => 'required',
        ]);

        return ForumUser::create($validatedData);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'requred|unique:forumUsers|max:255',
            'password' => 'required',
        ]);

        try {
            $forumUser = ForumUser::findOrFail($id);
            $forumUser->update($validatedData);

            return response()->json(['message' => 'User updated successfully', 'user'=> $forumUser], 200);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update user'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $forumUser = ForumUser::findOrFail($id);
            $forumUser->delete();

            return response()->json(['message' => 'User deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete user'], 500);
        }
    }
}
