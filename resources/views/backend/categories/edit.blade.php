@extends('backend.layouts.app')

@section('title', __('labels.backend.access.roles.management') . ' | ' . __('labels.backend.access.roles.create'))

@section('content')
    <div class="card">
        <form method="post" action="{{ route('admin.categories.update', ['id' => $category->id]) }}">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">
                            @lang('Add a Category')
                            {{-- <small class="text-muted">@lang('labels.backend.blog.posts.create')</small> --}}
                        </h4>
                    </div><!--col-->
                </div><!--row-->

                <hr>

                <div class="row">
                    <div class="col-sm-12">
                    <div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        </div><br />
                    @endif
                        
                            @csrf
                            <div class="form-group">    
                                <label for="first_name">Category Name:</label>
                            <input type="text" class="form-control" name="name" value="{{$category->name}}"/>
                            </div>
                
                            <div class="form-group">
                                <label for="last_name">Parent Id:</label>
                                {{-- <input type="text" class="form-control" name="parent_id"/> --}}
                                <select class="form-control" id="parent_id" name="parent_id">
                                    <option value="">Root</option>
                                    @foreach($parentCategories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @if(count($category->subcategory))
                                            @include('backend.Blog.includes.subCategory',['subcategories' => $category->subcategory])
                                        @endif 
                                    @endforeach
                                </select>
                            </div>
                    </div>
                </div>
                </div>
            </div><!--card-body-->

            <div class="card-footer">
                <div class="row">
                    <div class="col">
                        {{-- <a type="button" class="btn btn-primary-outline" href="{{route('admin.categories.index')}}">Cancel</button> --}}
                    </div><!--col-->

                    <div class="col text-right">
                        <button type="submit" class="btn btn-success">Update Category</button>
                    </div><!--col-->
                </div><!--row-->
            </div><!--card-footer-->
        </form>
    </div><!--card-->

@endsection
