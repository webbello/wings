<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::latest()->paginate(10);
        return view('backend.events.index',compact('events'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function frontend_index()
    {
        $events = Event::all();
        return view('frontend.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.events.create');
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
            'title'=>'required',
            'summary'=>'required',
            'description'=>'required'
        ]);
        $event = new Event;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // dd($image);
            $name = \Str::slug($request->title).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/uploads/events');
            $imagePath = $destinationPath . "/" . $name;
            $image->move($destinationPath, $name);
            $event->image = $name;
        }
        $event->title = $request->get('title');
        $event->summary = $request->get('summary');
        $event->description = $request->get('description');
        $event->venue = $request->get('venue');
        $event->city = $request->get('city');
        $event->country = $request->get('country');
        $event->save();
        return redirect('/admin/events')->with('success', 'Event saved!');
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
    public function edit(Event $event)
    {
        return view('backend.events.edit',compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title'=>'required',
            'summary'=>'required',
            'description'=>'required'
        ]);
        // $event = new Event;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // dd($image);
            $name = \Str::slug($request->title).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/uploads/events');
            $imagePath = $destinationPath . "/" . $name;
            $image->move($destinationPath, $name);
            $event->image = $name;
        }
        $event->title = $request->get('title');
        $event->summary = $request->get('summary');
        $event->description = $request->get('description');
        $event->venue = $request->get('venue');
        $event->city = $request->get('city');
        $event->country = $request->get('country');
        $event->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
