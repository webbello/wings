@extends('backend.layouts.app')

@section('title', __('Post') . ' | ' . __('labels.backend.access.roles.create'))

@section('content')
<div class="card">
    <form method="post" action="{{ route('admin.blog.posts.store') }}" enctype="multipart/form-data">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.blog.posts.create')
                        {{-- <small class="text-muted">@lang('labels.backend.blog.posts.create')</small> --}}
                    </h4>
                </div><!--col-->
                <div class="col-sm-7">
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('admin.blog.posts.index') }}"> Back</a>
                    </div>
                </div><!--col-->
            </div><!--row-->

            <hr>

            <div class="row">
            <div class="col-sm-12">
                <div>
                    
                    @csrf
                    
                    <div class="form-group">    
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" placeholder="Title" value="{{ old('title') }}" required="required" autofocus="autofocus" class="form-control">
                    </div>
                    <input type="hidden" name="author" value="{{$logged_in_user->id}}">
                    <input type="hidden" name="user_id" value="{{$logged_in_user->id}}">
                    {{-- <div class="form-group">    
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" id="slug" placeholder="Slug" maxlength="191" autofocus="autofocus" class="form-control">
                    </div> --}}
        
                    <div class="form-group">
                        <label for="summary">Summary:</label>
                        <textarea name="summary" id="summary" placeholder="summary" required="required" value="{{ old('summary') }}" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="body">Body:</label>
                        <textarea name="body" data-lang="{{app()->getLocale()}}" id="editor" placeholder="Body" maxlength="191" rows="10" autofocus="autofocus" class="form-control">{{ old('body') }}</textarea>                            
                    </div>
                    <div class="form-group">    
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" maxlength="191"  autofocus="autofocus" class="form-control">
                    </div>
                    <div class="form-group">    
                        <label for="lang">Language</label>
                        <select class="form-control" id="lang" name="lang">
                            @foreach(array_keys(config('locale.languages')) as $lang)
                                @if(old('lang'))
                                    <option value="{{$lang}}" {{(  $lang == old('lang') ) ? 'selected' : ''}}>@lang('menus.language-picker.langs.'.$lang)</option>
                                @else
                                    <option value="{{$lang}}" {{(  $lang == 'en' ) ? 'selected' : ''}}>@lang('menus.language-picker.langs.'.$lang)</option>
                                @endif 
                            @endforeach
                        </select>
                        {{-- <input type="text" name="lang" id="lang" placeholder="Language" maxlength="191"  autofocus="autofocus" class="form-control"> --}}
                    </div>
                    <div class="form-group">    
                        <label for="category">Category</label>
                        <select class="form-control" id="category" name="category">
                            @foreach($parentCategories as $category)
                                <option value="{{$category->id}}" {{($category->id == old('category')) ? 'selected' : ''}}>{{$category->name}}</option>
                                @if(count($category->subcategory))
                                    @include('backend.Blog.includes.subCategory',['subcategories' => $category->subcategory])
                                @endif 
                            @endforeach
                        </select>
                        {{-- <input type="category" name="category" id="category" placeholder="Category" maxlength="191"  autofocus="autofocus" class="form-control"> --}}
                    </div>
                    <div class="form-group">    
                        <label for="tags">Tag</label>
                        <input type="text" name="tags" id="tags"  value="{{ old('tags') }}" class="form-control">
                    </div>
                </div>
            </div>
            </div>
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{-- <a type="button" class="btn btn-primary-outline" href="{{route('admin.blog.posts.index')}}">Cancel</button> --}}
                </div><!--col-->

                <div class="col text-right">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </form>
</div><!--card-->
@endsection
