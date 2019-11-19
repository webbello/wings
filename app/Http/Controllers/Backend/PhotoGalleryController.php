<?php

namespace App\Http\Controllers\Backend;

use App\Models\PhotoGallery;
use App\Models\Album;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = PhotoGallery::latest()->paginate(10);
        return view('backend.gallery.index',compact('photos'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        
    }
    public function frontend_index()
    {
        $photos = PhotoGallery::latest()->paginate(50);
        return view('frontend.gallery.index',compact('photos'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $albums = Album::all();
        // dd($albums);
        return view('backend.gallery.create', compact('albums'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        
        $photoGallery = new PhotoGallery;
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // dd($image);
            $name = \Str::slug($request->title).'.'.$image->getClientOriginalExtension();
            $album = \Str::slug($request->album);
            $destinationPath = public_path('/storage/uploads/album/'.$request->album);
            $imagePath = $destinationPath . "/" . $name;
            $image->move($destinationPath, $name);
            $photoGallery->image = $name;
        }
        //dd($request->all());
        $photoGallery->album_id = $request->album;
        $photoGallery->title = $request->title;
        $photoGallery->description = $request->description;
        $photoGallery->href = '/storage/uploads/album/'.$request->album .'/'. $photoGallery->image;
        $photoGallery->save();

        //Album::create($request->all());
        return redirect()->route('admin.gallery.index')->withFlashSuccess('Photo saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PhotoGallery $gallery)
    {
        //dd($gallery);
        $albums = Album::all();
        return view('backend.gallery.edit',compact('gallery', 'albums'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PhotoGallery $gallery)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // dd($image);
            $name = \Str::slug($request->title).'.'.$image->getClientOriginalExtension();
            $album = \Str::slug($request->album);
            $destinationPath = public_path('/storage/uploads/album/'.$request->album);
            $imagePath = $destinationPath . "/" . $name;
            $image->move($destinationPath, $name);
            $gallery->image = $name;
        }
        //dd($request->all());
        $gallery->album_id = $request->album;
        $gallery->title = $request->title;
        $gallery->description = $request->description;
        $gallery->href = '/storage/uploads/album/'.$request->album .'/'. $gallery->image;
        $gallery->save();

        //Album::create($request->all());
        return redirect()->route('admin.gallery.index')->withFlashSuccess('Photo updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, PhotoGallery $gallery)
    {
        $gallery->delete();
        return redirect()->route('admin.gallery.index')
                        ->withFlashSuccess('Photo deleted successfully!');
    }
}
