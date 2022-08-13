<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|RedirectResponse|Response|\Illuminate\Routing\Redirector
     */
    public function index()
    {
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $image = $request->file('image')->store('images', 'public');
        $request->validate([
            'title' => 'required|max:100',
            'url' => 'max:255',
            'description' => 'required|max:255',
            'image' => 'required',
        ]);
        Post::create([
            'title' => $request->title,
            'url' => $request->url,
            'description' => $request->description,
            'image' => $image,
        ]);

        return back()->with('success', 'Project added successfull');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return Application|Factory|View
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Post $post
     * @return void
     */
    public function update(Request $request, Post $post)
    {

        $validate = $request->validate([
            'title' => 'required|max:100',
            'url' => 'max:255',
            'description' => 'required|max:255',
        ]);

        $post->title = $request->title;
        $post->description = $request->description;
        $post->url = $request->url;

        if($request->hasFile('image')){
            Storage::disk('public')->delete($post->image);
            $image = $request->file('image')->store('images', 'public');
            $post->image = $image;
        }
        $post->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return RedirectResponse
     */
    public function destroy(Post $post)
    {
        $post->destroy($post->id);
        Storage::disk('public')->delete($post->image);
        return back()->with('status', 'Post successfully deleted');
    }
}
