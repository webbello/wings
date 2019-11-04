<section class="bg-theme-colored">
        <div class="container">   
                {{-- {{dd($events->first()->description)}} --}}
            <div class="row">
                <div class="col-md-6">
                        <h2 class="text-white mt-5 mb-0">{{$events->first()->title ?? 'There is no upcoming event'}} </h2>
                        <h6 class="text-white mt-2">{{$events->first()->description ?? 'There is no upcoming event'}}</h6>
                        <a class="btn btn-primary btn-flat mt-10 mb-5" href="{{ route('frontend.events.show', $events->first()->id ?? 0 ) }}">Know more</a>
                </div>
                
                <div class="col-md-6">
                    <div class="text-center text-white font-13 pt-30 mt-5" data-countdown="{{$events->first()->event_date ?? '0000-00-00 00:00:00'}}">
                        <ul class="list-inline home-countdown float-right">
                            <li class="list-inline-item"><span>00</span><br> days</li>
                            <li class="list-inline-item"><span>00</span><br> Hours</li>
                            <li class="list-inline-item"><span>00</span><br> Minites</li>
                            <li class="list-inline-item"><span>00</span><br> Seconds</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
  </section>