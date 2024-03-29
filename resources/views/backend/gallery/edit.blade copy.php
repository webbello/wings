dd($gallery);
@extends('backend.layouts.app')

@section('title', app_name() . ' | '. __('labels.backend.access.roles.management'))

@section('content')
<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Edit gallery</h2>

        </div>

        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('admin.gallery.index') }}"> Back</a>
        </div>
    </div>

</div>

<form action="{{ route('admin.gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    @method('PUT')
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" name="title" value="{{ $gallery->title }}" class="form-control" placeholder="Title">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Album:</strong>
                {{-- {{ dd($albums) }} --}}
                {{-- <input type="text" name="album" class="form-control" placeholder="Album"> --}}
                <select class="form-control"  name="album">
                    @foreach($albums as $album)
                            <option value="{{$album->id}}">{{$album->title}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea class="form-control" style="height:150px" name="description" placeholder="Description">{{ $gallery->description }}</textarea>
            </div>
            <div class="form-group">    
                <label for="image"><strong> Image </strong> </label>
                <input type="file" name="image" id="image"  autofocus="autofocus" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
{{-- {{dd($gallery->id)}} --}}
@endsection
