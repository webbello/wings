<?php

namespace App\Http\Controllers\Blog;

use App\Models\Blog\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Blog\ManagePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('backend.blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',           
            //'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ]);
        //dd($request->all());
        $post = new Post;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            
            $name = \Str::slug($request->title).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/uploads/posts');
            $imagePath = $destinationPath . "/" . $name;
            $image->move($destinationPath, $name);
            $post->image = $name;
        }

        $post->author = 1;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->summary = $request->summary;
        $post->save();

        //return new PostResource($post);
        return redirect('admin/blog/posts')->with('success', 'Post saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * @param ManagePostRequest $request
     * @param Post              $post
     *
     * @return mixed
     */
    public function edit(ManagePostRequest $request, Post $post)
    {
        //$post = Post::find($post);
        //dd($post);
        //return view('backend.blog.edit', compact('post'));
        return view('backend.blog.edit')
            ->withPost($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
