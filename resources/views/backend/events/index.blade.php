@extends('backend.layouts.app')

@section('title', app_name() . ' | '. __('labels.backend.access.roles.management'))

@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('admin.events.create') }}"> Create New event</a>
            </div>
        </div>

    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>

        @foreach ($events as $event)

        <tr>

            <td>{{ ++$i }}</td>
            <td><a href="/storage/uploads/events/{{ $event->image }}"><img src="/storage/uploads/events/{{ $event->image }}" alt="" width="60px"> </a> </td>
            <td>{{ $event->title }}</td>
            <td>{{ $event->description }}</td>
            <td>

                <form action="{{ route('admin.events.destroy',$event->id) }}" method="POST">
                    
                    <a class="btn btn-info" href="{{ route('admin.events.show',$event->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('admin.events.edit',$event->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>

            </td>

        </tr>

        @endforeach

    </table>

    {!! $events->links() !!}

@endsection
