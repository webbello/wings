@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . $categoryName)
@section('og_title', $post->title)
@section('og_description', $post->summary)
@section('og_url', Request::url())
@section('og_image', '/storage/uploads/posts/' . $post->image)

@section('twitter_text_title', $post->title)
@section('twitter_card', $post->summary)
@section('twitter_image', '/storage/uploads/posts/' . $post->image)

@section('content')
<div class="container">
  <div class="row row-height align-items-center blog">
    <div class = "col-md-4 left d-none d-sm-none d-md-block">
        <ul class="list-group">
          @foreach ($postsList as $key => $item)
          <a href="{{ route('frontend.blog.single', [$categorySlug, $key]) }}"><li class="list-group-item {{ active_class(Request::is('content/'.$categorySlug.'/'.$key)) }}"> {{$item}} </li></a>
          @endforeach
        </ul>
    </div>
    <div class="col-md-8 mx-auto mid">
      <h1>{{ $post->title }} </h1>

      <div class="card-content mb-4">

        <ul class="list-inline">
            <li class="list-inline-item"><i class="fa fa-calendar"></i> {{ !! !empty($post->created_at) ? $post->created_at->diffForHumans() : $post->created_at }}</li>
            {{-- <li class="list-inline-item"><span class="lead1"> <i class="fa fa-user"></i> <a href="#"> {{ $post->user->name }}</a></span></li> --}}
            <li class="list-inline-item"><i class="fa fa-user"></i> {{ $post->user->name }}</li>
        </ul>

        {{-- <p>Posted {{ !! !empty($post->created_at) ? $post->created_at->diffForHumans() : $post->created_at }} </p> --}}
        
        <div class="blog-post clearfix">
        <div class="text-center">
          <img class="img-fluid rounded" src=" {!! !empty($post->image) ? '/storage/uploads/posts/' . $post->image :  'http://placehold.it/750x300' !!} " style="height: 300px">
        </div>
          <hr>
          {!! html_entity_decode($post->body) !!}
        </div>
        <hr>
        {{-- {{dd($post->tags)}} --}}
        @if (count($post->tags) > 0)
        <ul class="list-inline">
            @foreach($post->tags as $tag)
              @if (!empty($tag->name))
              <li class="list-inline-item"><a class="btn btn-sm btn-outline-primary" href="#" role="button">{{$tag->name}}</a></li>
              @endif
            @endforeach
        </ul>
        @endif
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body" id="comment-section">
              @if($logged_in_user)
              <h6 class="text-center">(Loggedin as <a href="{{ route('frontend.auth.logout') }}">{{$logged_in_user->name}}. @lang('navs.general.logout')?</a>)</h6>
              @endif
              <div class="media">
                @if($logged_in_user)
                <img src="{{$logged_in_user->picture}}" width="100px" class="rounded mr-3" alt="{{$logged_in_user->name}}">
                @endif
                <div class="media-body">
                  <h5 class="mt-0 mb-1">Your comment</h5>
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
            <div class="comments-container pr-2 pb-2 pl-3">
              @include('includes.partials._comment_replies', ['comments' => $post->comments, 'post_id' => $post->id])
            </div>
        </div>
      </div>
    </div>
    {{-- <div class="col-md-3 right d-none d-sm-none d-md-block">
      
    </div> --}}
  </div>
</div>


@endsection
