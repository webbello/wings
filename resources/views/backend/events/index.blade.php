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

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Venue</th>
                            <th>Event Date</th>
                            <th width="280px">Action</th>
                        </tr>
                
                        @foreach ($events as $event)
                
                        <tr>
                
                            <td>{{ ++$i }}</td>
                            <td><a href="/storage/uploads/events/{{ $event->image }}"><img src="/storage/uploads/events/{{ $event->image }}" alt="" width="60px"> </a> </td>
                            <td>{{ $event->title }}</td>
                            <td>{{ $event->venue }}</td>
                            <td>{{ $event->event_date }}</td>
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
