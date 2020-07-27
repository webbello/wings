@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.users.management'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('Events') }} <small class="text-muted">{{ __('Upcomming') }}</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                @include('backend.events.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->
        <div class="row mt-4 mb-3">
            <div class="col-sm-6">
                <form action="{{ route('admin.events.index') }}" method="get">
                    <div class="form-group1">
                        <label for="appendedInputButtons" class="sr-only">Two-button append</label>
                        <div class="controls">
                        <div class="input-group">
                            <input class="form-control" name="search" placeholder="Search" size="26" type="text" value="{{$search}}">
                            <span class="input-group-append">
                                <button class="btn btn-success" type="submit"><i class="fas fa-search"></i></button>
                                @if ($search)
                                <a class="btn btn-primary" href="{{ route('admin.events.index') }}">Reset</a>
                                <!-- <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Advanced</button> -->
                                @endif
                            </span>
                        </div>
                        </div>
                    </div>
                </form>
            </div><!--col-->

            <div class="col-sm-6 text-right">
            <form action="{{ route('admin.events.index') }}" method="get" name="event_filter">
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
        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Venue</th>
                            <th>Event Date</th>
                            <th width="280px">Action</th>
                        </tr>
                
                        @foreach ($events as $event)
                
                        <tr>
                
                            <td>{{ ++$i }}</td>
                            <td><a href="/storage/uploads/events/{{ $event->image }}"><img src="/storage/uploads/events/{{ $event->image }}" alt="" width="60px" height="60px"> </a> </td>
                            <td>{{ $event->title }}</td>
                            <td>{{ $event->venue }}</td>
                            <td>{{ Carbon\Carbon::parse($event->event_date)->format('j F, Y g:i A') }}</td>
                            <td>@include('backend.events.includes.actions', ['event' => $event])</td>
                
                        </tr>
                
                        @endforeach
                
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {{-- {!! $users->total() !!} {{ trans_choice('labels.backend.access.users.table.total', $users->total()) }} --}}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $events->links() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
