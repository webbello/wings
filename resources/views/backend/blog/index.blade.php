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
        <div class="row">
        
        <div class="col-sm-6">
        <form action="{{ route('admin.blog.posts.index') }}" method="get">
            <div class="form-group1">
                <label for="appendedInputButtons" class="sr-only">Two-button append</label>
                <div class="controls">
                <div class="input-group">
                    <input class="form-control" name="search" placeholder="Search" size="26" type="text" value="{{$search}}">
                    <span class="input-group-append">
                        <button class="btn btn-success" type="submit"><i class="fas fa-search"></i></button>
                        @if ($search)
                        <a class="btn btn-primary" href="{{ route('admin.blog.posts.index') }}">Reset</a>
                        <!-- <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Advanced</button> -->
                        @endif
                    </span>
                </div>
                </div>
            </div>
        </form>
        </div><!--col-->

        <div class="col-sm-6">
            
        </div><!--col-->
        
    </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead >
                        <tr class="text-black-50">
                            <th scope="col">
                                @include('backend.blog.includes.sortable-link', ['name' => 'Title', 'sort' => 'title', 'sortOrder' => $sortOrder])
                            </th>
                            <th>
                                @include('backend.blog.includes.sortable-link', ['name' => 'Summary', 'sort' => 'summary', 'sortOrder' => $sortOrder])
                            </th>
                            <th>Category</th>
                            <th>
                                @include('backend.blog.includes.sortable-link', ['name' => 'Body', 'sort' => 'body', 'sortOrder' => $sortOrder])
                            </th>
                            <th>@lang('labels.general.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ ucwords($post->title) }}</td>
                                    <td>{{ ucwords($post->summary) }}</td>
                                    <td>{{ isset($post->category->name) ? ucwords($post->category->name) : "" }}</td>
                                    <td>{!! html_entity_decode(Str::limit($post->body, $limit = 100, $end = '...')) !!}</td>
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
