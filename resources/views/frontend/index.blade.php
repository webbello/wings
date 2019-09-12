@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

    @include('frontend.includes.intro')
    @include('frontend.includes.featured-services')
    @include('frontend.includes.upcoming-events')
    @include('frontend.includes.about')
    @include('frontend.includes.services')
    @include('frontend.includes.call-to-action')
    @include('frontend.includes.facts')
    @include('frontend.includes.team')
    
    {{-- @include('frontend.includes.example') --}}

@endsection
