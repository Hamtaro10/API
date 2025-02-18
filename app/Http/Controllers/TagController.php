<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Tag::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50|unique:tags',
            'slug' => 'required|string|max:50|unique:tags'
        ]);

        $tag = Tag::create($request->all());
        return response()->json($tag, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return response()->json($tag, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|max:50|unique:tags,name,' . $tag->id,
            'slug' => 'required|max:50|unique:tags,slug,' . $tag->id
        ]);

        $tag->update($request->all());
        return response()->json($tag, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return response()->json(['message' => 'Tag deleted successfully'], 200);
    }

    public function trashed()
    {
        return response()->json(Tag::onlyTrashed()->get(), 200);
    }

    public function restore($id)
    {
        $tag = Tag::onlyTrashed()->where('id', $id)->first();
        if ($tag) {
            $tag->restore();
            return response()->json(['message' => 'Tag Restored Succesfuly'], 200);
        }
        return response()->json(['message' => 'Tag not found'], 404);
    }
}
