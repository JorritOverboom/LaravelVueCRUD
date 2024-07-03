<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\forumposts;
use Illuminate\Support\Facades\Log;

class forumpostsController extends Controller
{
    public function index()
    {
        try {
            $posts = forumposts::all();
            return response()->json($posts, 200);
        } catch (\Exception $e) {
            Log::error('Failed to fetch posts: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to fetch posts'], 500);
        }
    }

    public function show($id)
    {
        try {
            $post = forumposts::findOrFail($id);
            return response()->json($post, 200);
        } catch (\Exception $e) {
            Log::error('Failed to find post: ' . $e->getMessage());
            return response()->json(['error' => 'Post not found'], 404);
        }
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'content' => 'required',
            ]);
            
            $post = forumposts::create($validatedData);
            return response()->json(['message' => 'Post created successfully', 'post' => $post], 201);
        } catch (\Exception $e) {
            Log::error('Failed to create post: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to create post'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'content' => 'required',
            ]);
            
            $post = forumposts::findOrFail($id);
            $post->update($validatedData);
            
            return response()->json(['message' => 'Post updated successfully', 'post' => $post], 200);
        } catch (\Exception $e) {
            Log::error('Failed to update post: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to update post'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $post = forumposts::findOrFail($id);
            $post->delete();
            
            return response()->json(['message' => 'Post deleted successfully'], 200);
        } catch (\Exception $e) {
            Log::error('Failed to delete post: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to delete post'], 500);
        }
    }
}
