<?php

namespace App\Http\Controllers\Backend;

use App\Models\Album;
use App\Models\PhotoGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::latest()->paginate(10);
        return view('backend.album.index',compact('albums'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function frontend_index()
    {
        $albums = Album::latest()->paginate(10);
        return view('frontend.album.index',compact('albums'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.album.create');
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
        
        $album = new Album;
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // dd($image);
            $name = \Str::slug($request->title).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/uploads/album');
            $imagePath = $destinationPath . "/" . $name;
            $image->move($destinationPath, $name);
            $album->image = $name;
        }
        //dd($request->all());
        $album->title = $request->title;
        $album->description = $request->description;
        $album->save();

        //Album::create($request->all());
        return redirect()->route('admin.album.index')
                        ->with('success','Album created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        return view('backend.album.show',compact('album'));
    }
    public function frontend_show($id)
    {
        $photos = PhotoGallery::where('album_id', $id)->get();
        return view('frontend.gallery.index',compact('photos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        return view('backend.album.edit',compact('album'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // dd($image);
            $name = \Str::slug($request->title).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/uploads/album');
            $imagePath = $destinationPath . "/" . $name;
            $image->move($destinationPath, $name);
            $album->image = $name;
        }
        $album->update($request->all());
        return redirect()->route('admin.album.index')
                        ->with('success','Album updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        $album->delete();

        return redirect()->route('backend.album.index')

                        ->with('success','Album deleted successfully');
    }
}
