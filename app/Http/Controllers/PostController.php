<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('blog.index', [
            'posts' => Post::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create', [
            "categories" => Category::all(),
            "tags" => Tag::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => "required|min:3",
            'content' => "required|min:3",
            'category' => "required",
        ]);

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category,
            'user_id' => Auth::user()->id
        ]);

        foreach($request->tags as $id) {
            $post->tags()->attach($id);
        }

        return redirect()->back()->with('success', 'Blog published successfully.');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('blog.show', [ "post" => Post::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        // $this->authorize('update', [Auth::user(), Post::find($id)]);
        if (!Auth::user()->can('update', [$post])) {
            abort(403);
        }
        return view('blog.edit', [
            'post' => $post,
            'categories' => Category::all(),
            'tags' => Tag::all()
             ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $request->validate([
            'title' => "required|min:3",
            'content' => "required|min:3",
            'category' => "required",
        ]);

       $post = Post::find($id);

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category,
        ]);

        if ($request->has('tags')) {
            foreach($request->tags as $id) {
                $post->tags()->attach($id);
            }
        }

        return redirect()->back()->with('success', 'Blog updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        if ($post) {
            $post->delete();
        } else {
            return redirect()->back()->with('failed', 'Blog not found.');
        }

        return redirect()->route('post.index')->with('success', 'Blog deleted successfully.');
    }
}
