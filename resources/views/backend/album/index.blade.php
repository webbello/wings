@extends('backend.layouts.app')

@section('title', app_name() . ' | '. __('labels.backend.access.roles.management'))

@section('content')
<div class="row">

    <div class="col-lg-12 margin-tb">
        <div class="float-right">
            <a class="btn btn-success" href="{{ route('admin.album.create') }}"> Create New album</a>
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

    @foreach ($albums as $album)

    <tr>

        <td>{{ ++$i }}</td>
        <td><a href="/storage/uploads/album/{{ $album->image }}"><img src="/storage/uploads/album/{{ $album->image }}" alt="" width="60px"> </a> </td>
        <td>{{ $album->title }}</td>
        <td>{{ $album->description }}</td>
        <td>

            <form action="{{ route('admin.album.destroy',$album->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('admin.album.show',$album->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('admin.album.edit',$album->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>

        </td>

    </tr>

    @endforeach

</table>

{!! $albums->links() !!}
@endsection
