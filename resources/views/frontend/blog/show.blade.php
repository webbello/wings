@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
<div class="container blog1">
    <div class="row">
      <div class="col-lg-10 mx-auto">
        <h3 class="mt-4">{{ $post->title }} <span class="lead"> by <a href="#"> {{ $post->user->name }}</a></span> </h3>
        <hr>
        <ul class="list-inline">
          @foreach($post->tags as $tag)
            <li class="list-inline-item"><a class="btn btn-sm btn-outline-primary" href="#" role="button">{{$tag->name}}</a></li>
          @endforeach
        </ul>
        <p>Posted {{ !! !empty($post->created_at) ? $post->created_at->diffForHumans() : $post->created_at }} </p>
        <hr>
        <img class="img-fluid rounded" src=" {!! !empty($post->image) ? '/storage/uploads/posts/' . $post->image :  'http://placehold.it/750x300' !!} " alt="">
        <hr>
        <p class="lead">{!! html_entity_decode($post->body) !!}</p>
        <hr>
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
              @if($logged_in_user)
              <h6 class="text-center">(Loggedin as <a href="{{ route('frontend.auth.logout') }}">{{$logged_in_user->name}}. @lang('navs.general.logout')?</a>)</h6>
              @endif
              <div class="media">
                @if($logged_in_user)
                <img src="{{$logged_in_user->picture}}" width="100px" class="rounded mr-3" alt="{{$logged_in_user->name}}">
                @endif
                <div class="media-body">
                  <h5 class="mt-0">Your comment</h5>
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
                          @if($logged_in_user)
                          <input type="submit" class="btn btn-primary" value="Add Comment" />
                          @else
                          <a href="{{route('frontend.auth.login')}}" class="btn btn-success" >Login to comment</a>
                          @endif
                      </div>
                  </form>
                </div>
              </div>
          </div>
          {{-- <h4 class="card-header pl-3">Display Comments</h4> --}}
            <div class="comments-container pr-2 pb-2">
              @include('includes.partials._comment_replies', ['comments' => $post->comments, 'post_id' => $post->id])
            </div>
        </div>
      </div>
    </div>
</div>

@endsection
