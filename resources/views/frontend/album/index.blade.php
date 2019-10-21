@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
{{-- <blog-posts></blog-posts> --}}
<div class="photo_gallery">
    {{-- @include('frontend.includes.gallery') --}}
    @include('frontend.includes.album')
    {{-- <router-view></router-view> --}}
</div>


@endsection
