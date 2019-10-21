@extends('backend.layouts.app')

@section('title', app_name() . ' | '. __('labels.backend.access.roles.management'))

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Add New Events</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-primary" href="{{ route('admin.events.index') }}"> Back</a>
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

<form action="{{ route('admin.events.update',$event->id) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="form-group">    
      <label for="title">Title:</label>
      <input type="text" class="form-control" name="title"/>
  </div>

  <div class="form-group">
      <label for="summary">Summary:</label>
      <input type="text" class="form-control" name="summary"/>
  </div>

  <div class="form-group">
      <label for="description">Description:</label>
      <input type="text" class="form-control" name="description"/>
  </div>
  <div class="form-group">
      <label for="venue">Venue:</label>
      <input type="text" class="form-control" name="venue"/>
  </div>
  <div class="form-group">
    <label for="city">City:</label>
    <input type="text" class="form-control" name="city"/>
</div>
  <div class="form-group">
      <label for="country">Country:</label>
      <input type="text" class="form-control" name="country"/>
  </div>
  <div class="form-group">
      <label for="image">Image:</label>
      <input type="file" class="form-control" name="image"/>
  </div>                         
  <button type="submit" class="btn btn-primary">Add event</button>
</form>
@endsection
