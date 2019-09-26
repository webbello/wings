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
                @include('backend.categories.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="container1">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">Categories</div>
                                <div class="card-body">
                                    @foreach($parentCategories as $category)
                                        <ul class="list-group">
                                            <li class="list-group-item d-flex justify-content-between align-items-center">{{$category->name}}
                                            <span class="badge ">
                                                @include('backend.categories.includes.actions', ['category' => $category])
                                            </span>
                                            </li>
                                            
                                            @if(count($category->subcategory))
                                                 @include('backend.categories.includes.subCategoryList',['subcategories' => $category->subcategory])
                                            @endif 
                                        </ul>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
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
                    {{-- {!! $posts->render() !!} --}}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
