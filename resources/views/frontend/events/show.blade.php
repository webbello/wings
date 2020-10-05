@extends('frontend.layouts.app')

@section('title', app_name() . ' |  Events')
@section('og_title', $event->title))
@section('og_description', $event->summary)
@section('og_image', '/storage/uploads/events/' . $event->image)

@section('twitter_text_title', $event->title)
@section('twitter_card', $event->summary)
@section('twitter_image', '/storage/uploads/events/' . $event->image)

@section('content')

<!-- http://t.commonsupport.xyz/salonika/ -->
<div class="container">
    <div class="row clearfix">
        
        <!--Content Side-->
        <div class="content-side col-lg-9 col-md-8 col-sm-12 col-xs-12">
            <!--Events Single-->
            <section class="events-single">
                <!--Basic Info-->
                <div class="basic-info">
                    <div class="inner-box">
                        
                        <div class="lower-content">
                        
                            <div class="upper-box">
                                <div class="row clearfix">
                                    <div class="column col-md-8 col-sm-12 col-xs-12">
                                        <!--Event Block-->
                                        <div class="event-block">
                                            <div class="inner-box">
                                                <div class="date-box">
                                                {{ \Carbon\Carbon::parse($event->event_date)->format('d') }} <span>{{\Carbon\Carbon::parse($event->event_date)->format('F')}}</span>
                                                </div>
                                                <h3>{{ $event->title }}</h3>
                                                <ul class="event-info">
                                                    <li><span class="icon fa fa-clock-o"></span>{{\Carbon\Carbon::parse($event->event_date)->format('g:i A')}}</li>
                                                    <li><span class="icon fa fa-map-marker"></span>{{$event->venue}}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="social-column col-md-4 col-sm-12 col-xs-12">
                                        <!-- <ul class="social-icon-three">
                                            <li><strong>Share us on:</strong></li>
                                            <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                                            <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                                            <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                                            <li><a href="#"><span class="fa fa-instagram"></span></a></li>
                                            <li><a href="#"><span class="fa fa-pinterest"></span></a></li>
                                        </ul> -->
                                    </div>
                                    
                                </div>
                            </div>
                            
                            <!--Countdown Timer-->
                            <!-- <div class="time-counter"><div class="time-countdown clearfix" data-countdown="2017/11/29"><div class="counter-column"><div class="inner"><span class="count">00</span>Days</div></div> <div class="counter-column"><div class="inner"><span class="count">00</span>Hours</div></div>  <div class="counter-column"><div class="inner"><span class="count">00</span>Mins</div></div>  <div class="counter-column"><div class="inner"><span class="count">00</span>Secs</div></div></div></div> -->
                            
                        </div>
                        <div class="image">
                            <img src="/storage/uploads/events/{{ $event->image }}" alt="">
                        </div>
                    </div>
                </div>
                <!--More Info-->
                <div class="more-info">
                    <div class="text">
                        {!! html_entity_decode($event->description) !!}
                    </div>
                    
                </div>
                
                <!--Info Boxed-->
                
            </section>
        </div>
        
        <!--Sidebar-->
        <div class="sidebar-side col-lg-3 col-md-4 col-sm-12 col-xs-12">
            <aside class="sidebar">
                
                <!--Popular Events Widget-->
                <div class="sidebar-widget popular-events mt-4">
                    <div class="sidebar-title">
                        <h3>Upcoming Events</h3>
                    </div>
                    @foreach ($upcomingEvents as $key => $event)
                        <article class="event-post">
                            <div class="date-box">{{ \Carbon\Carbon::parse($event->event_date)->format('d') }} <span>{{\Carbon\Carbon::parse($event->event_date)->format('M')}}</span></div>
                            <div class="text"><a href="{{ route('frontend.events.show', $event->id ) }}">{{$event->title}}</a></div>
                            <div class="icon"><i class="fa fa-map-marker" style="color:#eb5310;"></i> {{$event->venue}}</div>
                        </article>
                    @endforeach   
                </div>
                
                <!--Category Widget-->
                <div class="sidebar-widget popular-events">
                    <div class="sidebar-title">
                        <h3>Past Events</h3>
                    </div>
                    @foreach ($pastEvents as $key => $event)
                        <article class="event-post">
                            <div class="date-box">{{ \Carbon\Carbon::parse($event->event_date)->format('d') }} <span>{{\Carbon\Carbon::parse($event->event_date)->format('M')}}</span></div>
                            <div class="text"><a href="{{ route('frontend.events.show', $event->id ) }}">{{$event->title}}</a></div>
                            <div class="icon"> <i class="fa fa-map-marker" style="color:#eb5310;"></i> {{$event->venue}}</div>
                        </article>
                    @endforeach 
                </div>
                
            </aside>
        </div>
        
    </div>
</div>
        

@endsection
