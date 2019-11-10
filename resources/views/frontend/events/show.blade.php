@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')


    {{-- {{dd($event)}} --}}
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
            <tr>
                <th>@lang('labels.frontend.user.profile.avatar')</th>
                <td><img src="/storage/uploads/events/{{ $event->image }}" width="100px" class="user-profile-image" /></td>
            </tr>
            <tr>
                <th>@lang('Title')</th>
                <td>{{ $event->title }}</td>
            </tr>
            <tr>
                <th>@lang('Description')</th>
                <td>{{ $event->description }}</td>
            </tr>
            <tr>
                <th>@lang('Event Date')</th>
                <td> {{ $event->event_date }}</td>
            </tr>
            <tr>
                <th>@lang('Venue')</th>
                <td>{{$event->venue }}</td>
            </tr>
            <tr>
                <th>@lang('City')</th>
                <td>{{$event->city }}</td>
            </tr>
            <tr>
                <th>@lang('Country')</th>
                <td>{{$event->country }}</td>
            </tr>
            <tr>
                <th>@lang('labels.frontend.user.profile.last_updated')</th>
                <td>{{ timezone()->convertToLocal($event->updated_at) }} ({{ $event->updated_at->diffForHumans() }})</td>
            </tr>
        </table>
    </div>
        

@endsection
