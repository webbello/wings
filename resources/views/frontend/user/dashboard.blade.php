@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )
@push('after-styles')
    <style>
         .border{
            border-bottom:1px solid #F1F1F1;
            margin-bottom:10px;
            }
            .main-secction{
                padding: 0 10px;
                box-shadow: 10px 10px 10px;
            }
            .image-section{
            padding: 0px;
            }
            .image-section img{
            width: 100%;
            height:250px;
            position: relative;
            }
            .user-image{
            margin: 0 auto;
            margin-top: -70px;
            }

            .user-image img{
            width: 140px;
            }
            

            // Small devices (landscape phones, 576px and up)
        @media (max-width: 767px) { 
        .profile-right-section{
            padding: 20px 0px 10px 0px;
            background-color: #FFFFFF;  
        }
        }
    </style>
@endpush
@section('content')

<div class="container1">
    <div class="row">
        <div class="col">
            <div class="image-section">
                <img class="img-fluid1" src="https://marcbruederlin.github.io/particles.js/img/background.jpg">
            </div>
        </div>
        <div class="w-100"></div>
        <div class="col-md-3">
            <div class="user-image text-center">
                <img src="{{ $logged_in_user->picture }}" alt="Profile Picture" class="rounded-circle">
            </div>
            <div class="text-center" *ngIf="user">
                <h3 class="">{{ $logged_in_user->name }}</h3>
                <h5>
                    <i class="fas fa-envelope"></i> {{ $logged_in_user->email }}<br/>
                </h5>
                
                <i class="fas fa-calendar-check"></i> @lang('strings.frontend.general.joined') {{ timezone()->convertToLocal($logged_in_user->created_at, 'F jS, Y') }}
                <div>
                <a href="{{ route('frontend.user.account')}}" class="btn btn-info btn-sm mb-1">
                    <i class="fas fa-user-circle"></i> @lang('navs.frontend.user.account')
                </a>

                @can('view backend')
                    &nbsp;<a href="{{ route('admin.dashboard')}}" class="btn btn-danger btn-sm mb-1">
                        <i class="fas fa-user-secret"></i> @lang('navs.frontend.user.administration')
                    </a>
                @endcan
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div role="tabpanel">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#profile" class="nav-link active" aria-controls="profile" role="tab" data-toggle="tab">@lang('navs.frontend.user.profile')</a>
                    </li>

                    <li class="nav-item">
                        <a href="#edit" class="nav-link" aria-controls="edit" role="tab" data-toggle="tab">@lang('labels.frontend.user.profile.update_information')</a>
                    </li>

                    @if($logged_in_user->canChangePassword())
                        <li class="nav-item">
                            <a href="#password" class="nav-link" aria-controls="password" role="tab" data-toggle="tab">@lang('navs.frontend.user.change_password')</a>
                        </li>
                    @endif
                </ul>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade show active pt-3" id="profile" aria-labelledby="profile-tab">
                        @include('frontend.user.account.tabs.profile')
                    </div><!--tab panel profile-->

                    <div role="tabpanel" class="tab-pane fade show pt-3" id="edit" aria-labelledby="edit-tab">
                        @include('frontend.user.account.tabs.edit')
                    </div><!--tab panel profile-->

                    @if($logged_in_user->canChangePassword())
                        <div role="tabpanel" class="tab-pane fade show pt-3" id="password" aria-labelledby="password-tab">
                            @include('frontend.user.account.tabs.change-password')
                        </div><!--tab panel change password-->
                    @endif
                </div><!--tab content-->
            </div><!--tab panel-->
        </div>
    </div>
</div>
@endsection
