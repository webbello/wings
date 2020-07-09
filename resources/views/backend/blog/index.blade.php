@extends('backend.layouts.app')

@section('title', app_name() . ' | '. __('labels.backend.access.roles.management'))

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    @lang('labels.backend.blog.posts.list')
                </h4>
            </div><!--col-->

            <div class="col-sm-7 pull-right">
                @include('backend.blog.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Summary</th>
                            <th>Category</th>
                            {{-- <th>Body</th> --}}
                            <th>@lang('labels.general.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ ucwords($post->title) }}</td>
                                    <td>{{ ucwords($post->summary) }}</td>
                                    <td>{{ ucwords($post->category->name) }}</td>
                                    {{-- <td>{!! html_entity_decode(Str::limit($post->body, $limit = 180, $end = '...')) !!}</td> --}}
                                    <td>@include('backend.blog.includes.actions', ['post' => $post])</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {{-- {!! $posts->total() !!} {{ trans_choice('labels.backend.access.roles.table.total', $posts->total()) }} --}}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $posts->links() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
