@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('page.frontend.events.index'))

@section('content')
{{-- {{dd($events['upcoming']->last())}} --}}
    @if (isset($upcomingEvents))
        @include('frontend.includes.upcoming-events', ['recent_event' => $upcomingEvents->last()])
    @endif
    
    <div class="container">
    <!-- <event-calender></event-calender> -->
        <div class="row mt-4 mb-3">
            <div class="col-sm-6">
                <form action="{{ route('frontend.events.index') }}" method="get">
                    <div class="form-group1">
                        <label for="appendedInputButtons" class="sr-only">Two-button append</label>
                        <div class="controls">
                        <div class="input-group">
                            <input class="form-control" name="search" placeholder="Search" size="26" type="text" value="{{$search}}">
                            <span class="input-group-append">
                                <button class="btn btn-success" type="submit"><i class="fas fa-search"></i></button>
                                @if ($search)
                                <a class="btn btn-primary" href="{{ route('frontend.events.index') }}">Reset</a>
                                <!-- <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Advanced</button> -->
                                @endif
                            </span>
                        </div>
                        </div>
                    </div>
                </form>
            </div><!--col-->

            <div class="col-sm-6 text-right">
            <form action="{{ route('frontend.events.index') }}" method="get" name="event_filter">
                <div class="form-row">
                    <div class="form-group col-md-9">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons" onchange="event_filter.submit();">
                            <label class="btn btn-outline-primary {{ ($filter === "all" || $filter == '') ? 'active':''}}" >
                                <input type="radio" name="filter" id="option1" {{$filter === "all" ? 'checked':''}} value="all" > All
                            </label>
                            <label class="btn btn-outline-primary {{$filter === "upcoming" ? 'active':''}}">
                                <input type="radio" name="filter" id="option2" {{$filter === "upcoming" ? 'checked':''}} value="upcoming" > Upcoming
                            </label>
                            <label class="btn btn-outline-primary {{$filter === "past" ? 'active':''}}" >
                                <input type="radio" name="filter" id="option3" {{$filter === "past" ? 'checked':''}} value="past" > Past
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <select class="form-control" name="sort" id="sort_by_event" onchange="event_filter.submit();">
                            <option value="">Sort By</option>
                            <!-- {{$sort == "title" ? 'selected':''}} -->
                            <option value="title">Title</option>
                            <option value="event_date">Event Date</option>
                            <option value="venue">Venue</option>
                        </select>
                    </div>
                    <input type="hidden" name="sortOrder" value="{{$sortOrder}}">
                </div>
            </form>
            </div><!--col-->
        </div><!--row-->
        <div class="row clearfix">
            @if (isset($events))
                @foreach ($events as $key => $event)
                <!--Event Block-->
                <div class="event-block col-md-6 col-sm-12 col-xs-12">
                    <div class="inner-box">
                        @if ($event->event_date >= now())
                            <span class="ribbon">Upcoming</span>
                        @endif
                        <div class="content">
                            <div class="date-box">
                            {{ \Carbon\Carbon::parse($event->event_date)->format('d') }} <span>{{\Carbon\Carbon::parse($event->event_date)->format('F')}}</span>
                            </div>
                            <h3><a href="{{ route('frontend.events.show', $event->id ) }}">{{$event->title}}</a></h3>
                            <ul class="event-info">
                                <li><span class="icon fa fa-clock-o"></span>{{\Carbon\Carbon::parse($event->event_date)->format('g:i A')}}</li>
                                <li><span class="icon fa fa-map-marker"></span>{{$event->venue}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--Event Block-->
                @endforeach
            @endif
        </div>
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {{-- {!! $events->total() !!} {{ trans_choice('labels.backend.access.roles.table.total', $events->total()) }} --}}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $events->links() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--container-->


@endsection

@push('after-scripts')
    <script>
        $(document).ready(function(){
            const event_date = document.querySelector('#event-countdown');
            

            // Set the date we're counting down to
            var countDownDate = new Date(event_date.dataset.countdown).getTime();

            // Update the count down every 1 second
            var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();
                
            // Find the distance between now and the count down date
            var distance = countDownDate - now;
                
            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                
            // Output the result in an element with id="demo"
            document.getElementById("seconds").innerHTML = seconds;
            document.getElementById("days").innerHTML = days;
            document.getElementById("hours").innerHTML = hours;
            document.getElementById("minutes").innerHTML = minutes;
            
                
            // If the count down is over, write some text 
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "EXPIRED";
            }
            }, 1000);
        });
    </script>
@endpush