<section class="bg-theme-colored">
        <div class="container">   
                {{-- {{dd($recent_event->description)}} --}}
            <div class="row">
                <div class="col-md-6">
                        <h2 class="text-white mt-5 mb-0">{{$recent_event->title ?? 'There is no upcoming event'}} </h2>
                        <h6 class="text-white mt-2">{{$recent_event->title ?? 'There is no upcoming event'}}</h6>
                        <a class="btn btn-primary btn-flat mt-10 mb-5" href="{{ route('frontend.events.show', $recent_event->id ?? 0 ) }}">Know more</a>
                </div>
                
                <div class="col-md-6">
                    <div class="text-center text-white font-13 pt-30 mt-5" id="event-countdown" data-countdown="{{$recent_event->event_date ?? '0000-00-00 00:00:00'}}">
                        <ul class="list-inline home-countdown float-right">
                            <li class="list-inline-item"><span id="days">{{ ($recent_event) ? Carbon\Carbon::parse($recent_event->event_date)->diffInDays() : '00' }}</span><br> days</li>
                            <li class="list-inline-item"><span id="hours">00</span><br> Hours</li>
                            <li class="list-inline-item"><span id="minutes">00</span><br> Minutes</li>
                            <li class="list-inline-item"><span id="seconds">00</span><br> Seconds</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
  </section>