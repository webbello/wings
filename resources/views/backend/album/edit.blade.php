@extends('backend.layouts.app')

@section('title', app_name() . ' | '. __('labels.backend.access.roles.management'))

@section('content')
<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="float-left">

            <h2>Edit album</h2>

        </div>

        <div class="float-right">
            <a class="btn btn-primary" href="{{ route('admin.album.index') }}"> Back</a>
        </div>
    </div>

</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach
        </ul>
    </div>

@endif
<form action="{{ route('admin.album.update',$album->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    @method('PUT')
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" name="title" value="{{ $album->title }}" class="form-control" placeholder="Title">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea class="form-control" style="height:150px" name="description" placeholder="Description">{{ $album->description }}</textarea>
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
@endsection
