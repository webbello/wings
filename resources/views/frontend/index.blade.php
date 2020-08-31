@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

    @include('frontend.includes.intro')
    @include('frontend.includes.featured-services')
    @include('frontend.includes.upcoming-events', ['recent_event' => $upcoming_events->last()])
    @include('frontend.includes.about')
    {{-- @include('frontend.includes.services') --}}
    {{-- @include('frontend.includes.quiz') --}}
    {{-- @include('frontend.includes.call-to-action') --}}
    {{-- @include('frontend.includes.facts') --}}
    @include('frontend.includes.team')
    
    {{-- @include('frontend.includes.example') --}}

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
            var days = Math.floor(distance / (1000 * 60 * 60 * 24)) || '00';
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)) || '00';
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60)) || '00';
            var seconds = Math.floor((distance % (1000 * 60)) / 1000) || '00';
                
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
