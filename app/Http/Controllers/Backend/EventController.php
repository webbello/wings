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
    public function index(Request $request)
    {
        $search = $request->search;
        $filter = $request->filter;
        $sort = $request->sort ?? 'created_at';
        $sortOrder = $request->sortOrder ?? 'desc';
        //toggle the sort order for next time
        if ( (isset($filter) && isset($request->sort)) || isset($request->sort)) {
            $sortOrder = $sortOrder == 'desc' ? 'asc': 'desc';
        }
        
        $events = Event::orderBy($sort, $sortOrder)->paginate(20);
        $query = Event::orderBy($sort, $sortOrder);
        if ($filter === 'upcoming') {
            $query->whereDate('event_date', '>=', now());
            // $events = $query->paginate(25);
        } else if ($filter === 'past') {
            $query->whereDate('event_date', '<=', now());
        }
        if(!empty($request->search)){
            $searchFields = ['title','summary','description', 'venue', 'city', 'country'];
            $query = $query->where(function($query) use($request, $searchFields){
                $searchWildcard = '%' . $request->search . '%';
                foreach($searchFields as $field){
                    $query = $query->orWhere($field, 'LIKE', $searchWildcard);
                }
            });
            // $events = $query->paginate(25);
            // $events = $query->dd();
            // dd($events);
            $events->appends(['search' => $search])->links();
            $events->withPath('events?search='.$search);
        }
        $events = $query->paginate(25);
        $events->appends(['sort' => $sort, 'sortOrder' => $request->sortOrder ])->links();
        // dd($events);
        return view('backend.events.index',compact('events', 'search', 'filter', 'sort', 'sortOrder'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function frontend_index(Request $request, $sort = 'event_date', $sortOrder = 'desc')
    {
        $search = $request->search;
        $filter = $request->filter;
        $sort = $request->sort ?? 'created_at';
        $sortOrder = $request->sortOrder ?? 'desc';
        //toggle the sort order for next time
        if ( (isset($filter) && isset($request->sort)) || isset($request->sort)) {
            $sortOrder = $sortOrder == 'desc' ? 'asc': 'desc';
        }
        $upcomingEvents = Event::whereDate('event_date', '>=', now())->orderBy($sort, $sortOrder)->get();
        
        $events = Event::orderBy($sort, $sortOrder)->paginate(20);
        $query = Event::orderBy($sort, $sortOrder);
        if ($filter === 'upcoming') {
            $query->whereDate('event_date', '>=', now());
            // $events = $query->paginate(25);
        } else if ($filter === 'past') {
            $query->whereDate('event_date', '<=', now());
        }
        if(!empty($request->search)){
            $searchFields = ['title','summary','description', 'venue', 'city', 'country'];
            $query = $query->where(function($query) use($request, $searchFields){
                $searchWildcard = '%' . $request->search . '%';
                foreach($searchFields as $field){
                    $query = $query->orWhere($field, 'LIKE', $searchWildcard);
                }
            });
            // $events = $query->paginate(25);
            // $events = $query->dd();
            // dd($events);
            $events->appends(['search' => $search])->links();
            $events->withPath('events?search='.$search);
        }
        $events = $query->paginate(25);
        $events->appends(['sort' => $sort, 'sortOrder' => $request->sortOrder ])->links();
        // dd($events);
        return view('frontend.events.index', compact('events', 'upcomingEvents', 'search', 'filter', 'sort', 'sortOrder'))->with('i', (request()->input('page', 1) - 1) * 20);

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
            'title'=>'required|string|unique:events',
            'summary'=>'string',
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
        $event->slug = \Str::slug($request->title);
        $event->summary = $request->get('summary');
        $event->description = $request->get('description');
        $event->event_date = $request->get('event_date');
        $event->venue = $request->get('venue');
        $event->city = $request->get('city');
        $event->country = $request->get('country');
        $event->status = 0;
        $event->created_by = $request->get('user_id');
        $event->save();
        return redirect('/admin/events')->withFlashSuccess('Event saved successfully!');
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
        $sort = 'created_at';
        $sortOrder = 'desc';
        $event = Event::find($id);
        $upcomingEvents = Event::whereDate('event_date', '>=', now())->orderBy($sort, $sortOrder)->get();
        $pastEvents = Event::whereDate('event_date', '<=', now())->orderBy($sort, $sortOrder)->limit(5)->get();
        // dd($upcomingEvents);
        return view('frontend.events.show', compact('event', 'upcomingEvents', 'pastEvents'));
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
            'title'=>'exclude_if:title,'.$event->title.'|required|string|unique:events',
            'summary'=>'string|nullable',
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
        $event->slug = \Str::slug($request->title);
        $event->summary = $request->get('summary');
        $event->description = $request->get('description');
        $event->event_date = $request->get('event_date');
        $event->venue = $request->get('venue');
        $event->city = $request->get('city');
        $event->country = $request->get('country');
        $event->status = 0;
        $event->created_by = $request->get('user_id');
        $event->save();
        return redirect('/admin/events')->withFlashSuccess('Event updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Event $event)
    {
        $event->delete();
        return redirect()->route('admin.events.index')
                        ->withFlashSuccess('Event deleted successfully!');
    }
}
