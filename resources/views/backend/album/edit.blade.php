@extends('backend.layouts.app')

@section('title', app_name() . ' | '. __('labels.backend.access.roles.management'))

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    @lang('Update Album')
                    <!-- <small class="text-muted">@lang('Upcoming')</small> -->
                </h4>
            </div><!--col-->
            <div class="col-sm-7">
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('admin.album.index') }}"> Back</a>
                    </div>
            </div><!--col-->
        </div><!--row-->

        <hr>

        <div class="row mt-4">
            <div class="col">
            <form action="{{ route('admin.album.update',$album->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                @method('PUT')
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Title:</strong>
                            <input type="text" name="title" value="{{ $album->title }}" class="form-control" placeholder="Title">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Description:</strong>
                            <textarea class="form-control" style="height:150px" name="description" placeholder="Description">{{ $album->description }}</textarea>
                        </div>
                        <div class="form-group">    
                            <label for="image"><strong> Image </strong> </label>
                            <input type="file" name="image" id="image"  autofocus="autofocus" class="form-control">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->

    <div class="card-footer">
        <div class="row">
            <div class="col">
                {{-- {{ form_cancel(route('admin.auth.role.index'), __('buttons.general.cancel')) }} --}}
            </div><!--col-->

            <div class="col text-right">
                {{-- {{ form_submit(__('buttons.general.crud.create')) }} --}}
            </div><!--col-->
        </div><!--row-->
    </div><!--card-footer-->
</div><!--card-->
@endsection
