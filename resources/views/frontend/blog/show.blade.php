@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto">
        <h3 class="mt-4">{{ $post->title }} <span class="lead"> by <a href="#"> {{ $post->user->first_name }} </a></span> </h3>
        <hr>
        <p>Posted {{ !! !empty($post->created_at) ? $post->created_at->diffForHumans() : $post->created_at }} </p>
        <hr>
        <img class="img-fluid rounded" src=" {!! !empty($post->image) ? '/storage/uploads/posts/' . $post->image :  'http://placehold.it/750x300' !!} " alt="">
        <hr>
        <p class="lead">{!! html_entity_decode($post->body) !!}</p>
        <hr>
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form>
              <div class="form-group">
                <textarea class="form-control" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection
