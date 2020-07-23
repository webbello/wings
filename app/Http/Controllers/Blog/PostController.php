<?php

namespace App\Http\Controllers\Blog;

use App\Models\Category;
use App\Models\Blog\Post;
use App\Models\Tag;
use App\Events\Backend\Blog\PostDeleted;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Blog\ManagePostRequest;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allPost(ManagePostRequest $request)
    {
        $search = $request->search;
        $sort = $request->sort ?? 'created_at';
        $sortOrder = $request->sortOrder ?? 'asc';
        //toggle the sort order for next time
        $sortOrder = $sortOrder == 'desc' ? 'asc': 'desc';
        $posts = Post::orderBy($sort, $sortOrder)->paginate(25);
        $query = Post::orderBy($sort, $sortOrder);
        if(!empty($request->search)){
            $searchFields = ['title','summary','body'];
            $query = $query->where(function($query) use($request, $searchFields){
                $searchWildcard = '%' . $request->search . '%';
                foreach($searchFields as $field){
                    $query = $query->orWhere($field, 'LIKE', $searchWildcard);
                }
            });
            $posts = $query->paginate(25);
            // $posts = $query->dd();
            $posts->appends(['search' => $search])->links();
            $posts->withPath('posts?search='.$search);
        }
        $posts->appends(['sort' => $sort, 'sortOrder' => $request->sortOrder ])->links();
        return view('backend.blog.index', compact('posts', 'search', 'sortOrder'))->with('i', (request()->input('page', 1) - 1) * 25);
    }

    public function index()
    {
        return PostResource::collection(Post::latest()->paginate(5));
    }

    public function blog()
    {
        $posts = Post::all();
        return view('frontend.blog.index', compact('posts'));
    }

    public function all(Request $request, Category $category)
    {
        
        // $category = Category::where('slug', $request->category)->get();
        
        if ($request->category === null) {
            $category->id = 1;
            $category->slug = 'blog';
        }
        // dd($category);
        $posts = Post::where('category_id', $category->id)->latest()->simplePaginate(6);
        $postsList = Post::where('category_id', $category->id)->latest()->pluck('title', 'slug');
        return view('frontend.blog.index', [
            'posts' => $posts,
            'postsList' => $postsList,
            'category' => $category
        ]);
    }

    public function single(Request $request, Category $category, $slug)
    {
        $categorySlug = $category->slug;
        $post = Post::where('slug', $slug)->latest()->first();
        // dd($category->slug);

        $postsList = Post::where('category_id', $post->category_id)->latest()->pluck('title', 'slug');
        
        // dd($post->category_id);
        return view('frontend.blog.show', compact('categorySlug','post', 'postsList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentCategories = Category::where('parent_id',NULL)->get();
        return view('backend.blog.create', compact('parentCategories'));
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
            'title' => ['required', 'unique:posts'],
            'summary' => 'required',
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

        $post->author = $request->author;
        $post->user_id = $request->user_id;
        $post->title = $request->title;
        $post->slug = \Str::slug($request->title);
        $post->summary = $request->summary;
        $post->body = $request->body;
        $post->lang = $request->lang;
        $post->category_id = $request->category;
        $post->status = 0;
        $post->save();

        if($post)
        {        
            $tagNames = explode(',',$request->get('tags'));
            $tagIds = [];
            foreach($tagNames as $tagName)
            {
                //$post->tags()->create(['name'=>$tagName]);
                //Or to take care of avoiding duplication of Tag
                //you could substitute the above line as
                $tag = Tag::firstOrCreate(['name'=>$tagName]);
                if($tag)
                {
                $tagIds[] = $tag->id;
                }

            }
            $post->tags()->sync($tagIds);
        }

        //return new PostResource($post);
        return redirect('admin/blog/posts')->withFlashSuccess('Post saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('frontend.blog.show', compact('post'));
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
        
        $parentCategories = Category::where('parent_id',NULL)->get();
        //return view('backend.blog.edit', compact('post', 'parentCategories'));
        return view('backend.blog.edit')
            ->withPost($post)
            ->withParentCategories($parentCategories);
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
        // dd($post->title);
        $this->validate($request, [
            'title' => 'exclude_if:title,'.$post->title.'|required|string|unique:posts',
            'summary' => 'required',
            'body' => 'required',           
            //'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ]);
        //dd($request->all());
        // $post = new Post;
        

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            
            $name = \Str::slug($request->title).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/uploads/posts');
            $imagePath = $destinationPath . "/" . $name;
            $image->move($destinationPath, $name);
            $post->image = $name;
        }

        $post->author = $request->author;
        $post->user_id = $request->user_id;
        $post->title = $request->title;
        $post->slug = \Str::slug($request->title);
        $post->summary = $request->summary;
        $post->body = $request->body;
        $post->lang = $request->lang;
        $post->category_id = $request->category;
        $post->status = 0;
        $post->save();

        if($post)
        {        
            $tagNames = explode(',',$request->get('tags'));
            $tagIds = [];
            foreach($tagNames as $tagName)
            {
                //$post->tags()->create(['name'=>$tagName]);
                //Or to take care of avoiding duplication of Tag
                //you could substitute the above line as
                $tag = Tag::firstOrCreate(['name'=>$tagName]);
                if($tag)
                {
                $tagIds[] = $tag->id;
                }

            }
            $post->tags()->sync($tagIds);
        }

        //return new PostResource($post);
        return redirect('admin/blog/posts')->withFlashSuccess('Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(ManagePostRequest $request, Post $post)
    {

        //$this->roleRepository->deleteById($post->id);
        $post->delete();

        event(new PostDeleted($post));

        return redirect()->route('admin.blog.posts.index')->withFlashSuccess(__('alerts.backend.posts.deleted'));
    }
}
