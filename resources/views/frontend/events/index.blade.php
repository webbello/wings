@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('page.frontend.events.index'))

@section('content')


    @include('frontend.includes.upcoming-events', ['events' => $events])
    <div class="container">
        <div class="section-content">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-5">
                    <h3 class="line-bottom border-bottom mt-3">Upcoming Events</h3>
                    @foreach ($events as $key => $event)
                        <div class="media {{($key > 0) ? 'my-4' : ''}}">
                            <div class="event-date text-center bg-theme-colored border-1px pt-1 pl-3 pr-3 mr-3 sm-custom-style">
                                <ul class="list-inline">
                                    <li class="font-28 text-white font-weight-700">{{ \Carbon\Carbon::parse($event->event_date)->format('d') }}</li>
                                    <li class="font-18 text-white text-center text-uppercase">{{\Carbon\Carbon::parse($event->event_date)->format('M')}}</li>
                                </ul>
                            </div>
                            <div class="media-body align-self-center">
                                <h5 class="media-heading font-16 font-weight-600"><a href="{{ route('frontend.events.show', $event->id ) }}">{{$event->title}}</a></h5>
                                <ul class="list-inline font-weight-600 text-gray-dimgray">
                                    <li class="list-inline-item"><i class="far fa-clock text-theme-colored"></i> {{\Carbon\Carbon::parse($event->event_date)->format('g.i')}}</li>
                                    <li class="list-inline-item"> <i class="fa fa-map-marker text-theme-colored"></i> {{$event->venue}}</li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                    
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <h3 class="line-bottom border-bottom mt-3">About Us</h3>
                    <img src="img/frontend/site/about-plan.jpg" class="rounded img-fluid" alt="">
                    <p class="mt-15">A humble desire to give back to E.S.C. (Educational Support Council) and the society at large while having the inner pleasure to reach out to the distressed and being tied together by a value system that transforms the past students of E.S.C.</p>
                    <a href="#" class="btn btn-outline-primary btn-sm btn-theme-colored">read more</a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <h3 class="text-uppercase line-bottom mt-sm-30 mt-3">Get <span class="text-theme-colored"> Involved</span></h3>
                    <div class="icon-box icon-box-effect mb-20 p-3 bg-light border-bottom-theme-color-3px">
                        <a href="#" class="icon mb-0 mr-0 pull-left flip">
                        <i class="flaticon-charity-responsible-energy-use text-theme-colored font-48"></i>
                        </a>
                        <div class="ml-80">
                        <h5 class="icon-box-title mt-15 mb-1"><strong>Become a Donar</strong></h5>
                        <p class="text-gray">Lorem ipsum dolor sit ametcon elit sectetu radipisicing. Mollitia quasi.<a class="font-14 pl-10 text-theme-colored" href="page-about1.html"> read more...</a></p>
                        </div>
                    </div>
                    <div class="icon-box icon-box-effect mb-20 p-3 bg-light border-bottom-theme-color-3px">
                        <a href="#" class="icon mb-0 mr-0 pull-left flip">
                        <i class="flaticon-charity-shelter text-theme-colored font-48"></i>
                        </a>
                        <div class="ml-80">
                        <h5 class="icon-box-title mt-15 mb-1"><strong>Become a Volunteer</strong></h5>
                        <p class="text-gray">Lorem ipsum dolor sit ametcon elit sectetu radipisicing. Mollitia quasi.<a class="font-14 pl-10 text-theme-colored" href="page-about1.html"> read more...</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="row mb-4">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fab fa-font-awesome-flag"></i> Font Awesome @lang('strings.frontend.test')
                    </div>
                    <div class="card-body">
                        <event-calender></event-calender>
                        <i class="fas fa-home"></i>
                        <i class="fab fa-facebook"></i>
                        <i class="fab fa-twitter"></i>
                        <i class="fab fa-pinterest"></i>
                    </div><!--card-body-->
                </div><!--card-->  
            </div><!--col-->
        </div><!--row--> --}}
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