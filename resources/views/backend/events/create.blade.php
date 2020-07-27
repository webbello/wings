@extends('backend.layouts.app')

@section('title', app_name() . ' | '. __('labels.backend.access.roles.management'))
@push('after-styles')
    <link rel="stylesheet" type="text/css" href="/css/bootstrap-datetimepicker.min.css">
@endpush
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('Add New Event')
                        <small class="text-muted">@lang('Upcoming')</small>
                    </h4>
                </div><!--col-->
                <div class="col-sm-7">
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.events.index') }}"> Back</a>
                        </div>
                </div><!--col-->
            </div><!--row-->

            <hr>

            <div class="row mt-4">
                <div class="col">
                    <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">    
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}"/>
                            <input type="hidden" name="user_id" value="{{$logged_in_user->id}}">
                        </div>
                    
                        <div class="form-group">
                            <label for="summary">Summary:</label>
                            <input type="text" class="form-control" name="summary"/>
                        </div>
                    
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <!-- <input type="text" class="form-control" name="description" value="{{ old('description') }}"/> -->
                            <textarea name="description" data-lang="{{app()->getLocale()}}" id="editor" placeholder="Body" maxlength="191" rows="10" autofocus="autofocus" class="form-control">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            
                            <label for="event_date">Date:</label>
                            <div class="input-group mb-3 ">
                                <input type="text" class="form-control datetimepicker" placeholder="Event Name" name="event_date" value="{{ old('event_date') }}" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <div class="input-group-append datetimepicker">
                                    <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-calendar-alt"></i></button>
                                </div>
                            </div>
                            {{-- <input type="text" class="form-control datetimepicker" name="event_date"/> --}}
                        </div>
                        <div class="form-group">
                            <label for="venue">Venue:</label>
                            <input type="text" class="form-control" name="venue" value="{{ old('venue') }}"/>
                        </div>
                        <div class="form-group">
                            <label for="city">City:</label>
                            <input type="text" class="form-control" name="city" value="{{ old('city') }}"/>
                        </div>
                        <div class="form-group">
                            <label for="country">Country:</label>
                            <input type="text" class="form-control" name="country" value="{{ old('country') }}"/>
                        </div>
                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" class="form-control" name="image"/>
                        </div>                         
                        <button type="submit" class="btn btn-primary">Add event</button>
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
@push('after-scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
    <script src="/js/bootstrap-datetimepicker.min.js"></script>
    <script>
        jQuery(document).ready(function($) {
            if (window.jQuery().datetimepicker) {
                $('.datetimepicker').datetimepicker({
                    // Formats
                    // follow MomentJS docs: https://momentjs.com/docs/#/displaying/format/
                    format: 'YYYY-MM-DD HH:mm:ss', //YYYY-MM-DD HH:MM:SS
                    
                    // Your Icons
                    // as Bootstrap 4 is not using Glyphicons anymore
                    icons: {
                        time: 'fas fa-clock',
                        date: 'fa fa-calendar',
                        up: 'fa fa-chevron-up',
                        down: 'fa fa-chevron-down',
                        previous: 'fa fa-chevron-left',
                        next: 'fa fa-chevron-right',
                        today: 'fa fa-check',
                        clear: 'fa fa-trash',
                        close: 'fa fa-times'
                    }
                });
            }
        });
    </script>
@endpush