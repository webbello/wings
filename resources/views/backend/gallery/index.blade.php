@extends('backend.layouts.app')

@section('title', app_name() . ' | '. __('labels.backend.access.roles.management'))

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        
        <div class="float-right">
            <a class="btn btn-success" href="{{ route('admin.gallery.create') }}"> Create New photo</a>
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
        <th>Album</th>
        <th>Name</th>
        <th>Details</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($photos as $photo)
    <tr>
        <td>{{ ++$i }}</td>
        <td><a href="/storage/uploads/album/{{ $photo->album_id }}/{{ $photo->image }}"><img src="/storage/uploads/album/{{ $photo->album_id }}/{{ $photo->image }}" alt="" width="60px"> </a> </td>
        <td>{{$photo->album->title}}</td>
        <td>{{ $photo->title }}</td>
        <td>{{ $photo->description }}</td>
        <td>
            <form action="{{ route('admin.gallery.destroy',$photo->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('admin.gallery.show',$photo->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('admin.gallery.edit',$photo->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $photos->links() !!}
@endsection
