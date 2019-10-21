@extends('backend.layouts.app')

@section('title', app_name() . ' | '. __('labels.backend.access.roles.management'))
@push('after-styles')
    <link rel="stylesheet" type="text/css" href="/css/bootstrap-datetimepicker.min.css">
@endpush
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Add New Events</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('admin.events.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">    
        <label for="title">Title:</label>
        <input type="text" class="form-control" name="title"/>
    </div>

    {{-- <div class="form-group">
        <label for="summary">Summary:</label>
        <input type="text" class="form-control" name="summary"/>
    </div> --}}

    <div class="form-group">
        <label for="description">Description:</label>
        <input type="text" class="form-control" name="description"/>
    </div>
    <div class="form-group">
        
        <label for="event_date">Date:</label>
        <div class="input-group mb-3 ">
            <input type="text" class="form-control datetimepicker" placeholder="Event Name" name="event_date" aria-label="Recipient's username" aria-describedby="button-addon2">
            <div class="input-group-append datetimepicker">
                <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-calendar-alt"></i></button>
            </div>
        </div>
        {{-- <input type="text" class="form-control datetimepicker" name="event_date"/> --}}
    </div>
    <div class="form-group">
        <label for="venue">Venue:</label>
        <input type="text" class="form-control" name="venue"/>
    </div>
    <div class="form-group">
        <label for="city">City:</label>
        <input type="text" class="form-control" name="city"/>
    </div>
    <div class="form-group">
        <label for="country">Country:</label>
        <input type="text" class="form-control" name="country"/>
    </div>
    <div class="form-group">
        <label for="image">Image:</label>
        <input type="file" class="form-control" name="image"/>
    </div>                         
    <button type="submit" class="btn btn-primary">Add event</button>
    </form>
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
                    format: 'DD-MM-YYYY hh:mm A',
                    
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