@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
{{-- <blog-posts></blog-posts> --}}
<div class="our_mission container">
    
    <ul>
        <li>To carry forward the lamp of knowledge in the society</li>
        <li>To promote literacy among the unfortunates</li>
        <li>To help and provide every possible means to the underprivileged students for the betterment</li>
        
        <li>To conduct various program and career guiding seminars</li>
        {{-- <a href="" class="btn btn-primary">Read more</a> --}}
        <ul>To promote the works and ideals of Education Support Council (ESC)
            <li>To bring in fresh and innovative ideas to run the institution smoothly</li>
            <li>To share the burden of the management and the coordinator on our shoulders</li>
            <li>To be the face and voice of management in front of the students</li>
            <li>To bring the problems faced by the students, to the management</li>
        </ul>

    </ul>

</div>

@endsection
