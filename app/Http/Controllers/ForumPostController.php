<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ForumPost;

class ForumPostController extends Controller
{
    public function index()
    {
        return ForumPost::all();
    }

    public function show($id)
    {
        return ForumPost::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'postName' => 'required|unique:forum_posts|max:255',
            'postContent' => 'required',
        ]);

        return ForumPost::create($validatedData);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'postName' => 'required|unique:forum_posts|max:255',
            'postContent' => 'required',
        ]);

        try {
            $forumPost = ForumPost::findOrFail($id);
            $forumPost->update($validatedData);

            return response()->json(['message' => 'Post updated successfully', 'post' => $forumPost], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update post'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $forumPost = ForumPost::findOrFail($id);
            $forumPost->delete();

            return response()->json(['message' => 'Post deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete post'], 500);
        }
    }
}
