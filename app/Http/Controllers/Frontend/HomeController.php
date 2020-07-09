<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Event;
use App\Models\Category;
use App\Http\Controllers\Controller;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $sort = 'event_date';
        $sortOrder = 'desc';
        $upcoming_events = Event::where('event_date', '>=', now())->orderBy($sort, $sortOrder)->get();
        $penmanshipCategories = Category::where('slug','penmanship')->get();
        // dd($penmanshipCategories);
        // $events = Event::latest()->get();
        return view('frontend.index',compact('upcoming_events'));
    }
    public function page_our_mission()
    {
        return view('frontend.pages.mission');
    }
    public function page_our_vision()
    {
        return view('frontend.pages.vision');
    }
    public function page_our_activities()
    {
        return view('frontend.pages.our_activities');
    }
    public function page_mission_50k()
    {
        return view('frontend.pages.mission_50k');
    }
    public function page_president_message()
    {
        return view('frontend.pages.president_message');
    }

}
