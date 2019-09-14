@extends('backend.layouts.app')

@section('title', __('labels.backend.access.roles.management') . ' | ' . __('labels.backend.access.roles.create'))

@section('content')
{{ html()->form('POST', route('admin.blog.posts.store'))->class('form-horizontal')->attribute('enctype', 'multipart/form-data')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.blog.posts.create')
                        {{-- <small class="text-muted">@lang('labels.backend.blog.posts.create')</small> --}}
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            <div class="row mt-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(__('Title'))
                            ->class('col-md-2 form-control-label')
                            ->for('title') }}

                        <div class="col-md-10">
                            {{ html()->text('title')
                                ->class('form-control')
                                ->placeholder(__('Title'))
                                ->attribute('maxlength', 191)
                                ->required()
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label(__('Summary'))
                            ->class('col-md-2 form-control-label')
                            ->for('summary') }}

                        <div class="col-md-10">
                            {{ html()->textarea('summary')
                                ->class('form-control')
                                ->placeholder(__('summary'))
                                ->attribute('maxlength', 191)
                                ->required()
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label(__('Body'))
                            ->class('col-md-2 form-control-label')
                            ->for('body') }}

                        <div class="col-md-10">
                            {{ html()->textarea('body')
                                ->class('form-control')
                                ->placeholder(__('Body'))
                                ->attribute('maxlength', 191)
                                ->attribute('id', 'editor')
                                ->attribute('rows', 10)
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label(__('Image'))
                            ->class('col-md-2 form-control-label')
                            ->for('image') }}

                        <div class="col-md-10">
                            {{ html()->file('image')
                                ->class('form-control')
                                ->attribute('maxlength', 191)
                                ->required()
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.blog.posts.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.create')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->form()->close() }}
@endsection
