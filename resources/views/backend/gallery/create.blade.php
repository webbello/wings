@extends('backend.layouts.app')

@section('title', app_name() . ' | '. __('labels.backend.access.roles.management'))

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-right">
            <a class="btn btn-primary" href="{{ route('admin.gallery.index') }}"> Back</a>
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

<form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">

    @csrf
     <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" name="title" class="form-control" placeholder="Title">
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
                <textarea class="form-control" style="height:150px" name="description" placeholder="Description"></textarea>
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
