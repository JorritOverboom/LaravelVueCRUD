<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\forumusers;

class forumusersController extends Controller
{
    public function index()
    {
        return forumusers::all();
    }

    public function show($id)
    {
        return forumusers::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:forumuserss|max:255',
            'password' => 'required',
        ]);

        return forumusers::create($validatedData);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'requred|unique:forumuserss|max:255',
            'password' => 'required',
        ]);

        try {
            $forumusers = forumusers::findOrFail($id);
            $forumusers->update($validatedData);

            return response()->json(['message' => 'User updated successfully', 'user'=> $forumusers], 200);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update user'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $forumusers = forumusers::findOrFail($id);
            $forumusers->delete();

            return response()->json(['message' => 'User deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete user'], 500);
        }
    }
}
