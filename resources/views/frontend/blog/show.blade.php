@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
<div class="container blog">
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
              <form method="post" action="{{ route('comments.store') }}">
                  @csrf
                  <div class="form-group">
                      {{-- <input type="text" name="comment_body" class="form-control" /> --}}
                      <div class="form-group">
                          <textarea class="form-control" name="comment_body" rows="3"></textarea>
                        </div>
                      <input type="hidden" name="post_id" value="{{ $post->id }}" />
                  </div>
                  <div class="form-group">
                      <input type="submit" class="btn btn-warning" value="Add Comment" />
                  </div>
              </form>
          </div>
          {{-- <h4 class="card-header pl-3">Display Comments</h4> --}}
            <div class="comments-container pr-2">
              @include('includes.partials._comment_replies', ['comments' => $post->comments, 'post_id' => $post->id])
            </div>
        </div>
      </div>
    </div>
</div>

@endsection
