<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostActivity;

class PostActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = PostActivity::with('post')->get();

        return response()->json($activites);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'post_id'   => 'required|exists:posts,id',
            'ip'        => 'required|string|max:255',
            'userAgent' => 'required|string|max:255',
        ]);

        $postActivity = PostActivity::create($request->only('post_id','ip','userAgent'));

        return response()->json([
            'message' => 'Post activity created successfully.',
            'data'    => $postActivity
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $postActivity->load('post');

        return rersponse()->json($postactivity);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'post_id'   => 'required|exists:posts,id',
            'ip'        => 'required|string|max:255',
            'userAgent' => 'required|string|max:255'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $postActivity->delete();

        return response()->json([
            'message' => 'Post activity deleted successfully.'
        ]);
    }
}
