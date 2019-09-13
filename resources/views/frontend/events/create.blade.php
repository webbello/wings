@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')


    @include('frontend.includes.upcoming-events')
    <div class="row">
      <div class="col-sm-8 offset-sm-2">
          <h1 class="display-3">Add a Event</h1>
        <div>
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
              </ul>
            </div><br />
          @endif
            <form method="post" action="{{ route('frontend.events.store') }}">
                @csrf
                <div class="form-group">    
                    <label for="first_name">Title:</label>
                    <input type="text" class="form-control" name="title"/>
                </div>
      
                <div class="form-group">
                    <label for="last_name">Summary:</label>
                    <input type="text" class="form-control" name="summary"/>
                </div>
      
                <div class="form-group">
                    <label for="email">Description:</label>
                    <input type="text" class="form-control" name="description"/>
                </div>
                <div class="form-group">
                    <label for="city">Venu:</label>
                    <input type="text" class="form-control" name="venu"/>
                </div>
                <div class="form-group">
                    <label for="country">Country:</label>
                    <input type="text" class="form-control" name="country"/>
                </div>
                <div class="form-group">
                    <label for="job_title">Image:</label>
                    <input type="file" class="form-control" name="image"/>
                </div>                         
                <button type="submit" class="btn btn-primary">Add event</button>
            </form>
        </div>
      </div>
    </div>


@endsection
