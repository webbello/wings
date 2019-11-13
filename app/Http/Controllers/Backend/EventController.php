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
        $sort = 'event_date';
        $sortOrder = 'desc';
        $events = Event::orderBy($sort, $sortOrder)->paginate(10);
        // dd($events);
        return view('backend.events.index',compact('events'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function frontend_index($sort = 'event_date', $sortOrder = 'desc')
    {
        $events = Event::orderBy($sort, $sortOrder)->get()
        ->groupBy(function($event) {
            return $event->event_date >= now() ? 'upcoming' : 'past';
        });
        // dd($events);
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
            // 'summary'=>'required',
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
        // dd($request->get('event_date'));
        $event->title = $request->get('title');
        $event->summary = 'Summary';
        $event->description = $request->get('description');
        $event->event_date = $request->get('event_date');
        $event->venue = $request->get('venue');
        $event->city = $request->get('city');
        $event->country = $request->get('country');
        $event->status = 0;
        $event->created_by = $request->get('user_id');
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function frontend_show($id)
    {
        $event = Event::find($id);
        return view('frontend.events.show', compact('event'));
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
            // 'summary'=>'required',
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
        $event->summary = 'summary';
        $event->description = $request->get('description');
        $event->event_date = $request->get('event_date');
        $event->venue = $request->get('venue');
        $event->city = $request->get('city');
        $event->country = $request->get('country');
        $event->status = 0;
        $event->created_by = $request->get('user_id');
        $event->save();
        return redirect('/admin/events')->with('success', 'Event Updated!');
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
