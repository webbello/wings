@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
{{-- <blog-posts></blog-posts> --}}

<div class="container">
  <div class="row row-height align-items-center">
    <div class = "col-md-4 left d-none d-sm-none d-md-block">
        <ul class="list-group">
          @foreach ($postsList as $key => $item)
            <li class="list-group-item"> <a href="{{ route('frontend.blog.single', $key) }}">{{$item}}</a> </li>
          @endforeach
        </ul>
    </div>
    <div class="col-md-8 mx-auto mid">
      {{-- <h1 class="my-4 text-center">Welcome to the Blog </h1> --}}

      @foreach ($posts as $post)
      {{-- {{dd($post->category->slug)}} --}}
      <div class="card mb-4">
        <img class="card-img-top img-fluid" src=" {!! !empty($post->image) ? '/storage/uploads/posts/' . $post->image :  'http://placehold.it/750x300' !!} " style="height: 300px">
        <div class="card-body">
          <h2 class="card-title "><a href="{{ route('frontend.blog.single', $post->id) }}" >{{ $post->title }} </a></h2>
          <ul class="list-inline text-muted">
              <li class="list-inline-item"><i class="fa fa-calendar"></i> {{ !! !empty($post->created_at) ? $post->created_at->diffForHumans() : $post->created_at }}</li>
              {{-- <li class="list-inline-item"><span class="lead1"> <i class="fa fa-user"></i> <a href="#"> {{ $post->user->name }}</a></span></li> --}}
              <li class="list-inline-item"><i class="fa fa-user"></i> {{ $post->user->name }}</li>
          </ul>
          {{-- <div class="card-text"> {!! html_entity_decode(Str::words($post->body, $limit = 16, $end = '...')) !!} </div> --}}
          <div class="card-text clearfix"> {!! html_entity_decode($post->summary) !!} </div>
          {{-- <a href="/blog/posts/{{ $post->id }}" class="btn btn-primary">Read More &rarr;</a> --}}
          <a href="{{ route('frontend.blog.single', $post->id) }}" class="btn btn-primary">Read More &rarr;</a>

        </div>
        {{-- <div class="card-footer text-muted">
          Posted {{ $post->created_at->diffForHumans() }} by
          <a href="#">{{ $post->user->name }} </a>
        </div> --}}
      </div>
      @endforeach
      {{ $posts->links() }}
    </div>
    {{-- <div class="col-md-3 right d-none d-sm-none d-md-block">
      
    </div> --}}
  </div>
</div>


@endsection
