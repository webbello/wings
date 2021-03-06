<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <a href="{{ route('frontend.index') }}" class="navbar-brand">{{ app_name() }}</a>

    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="@lang('labels.general.toggle_navigation')">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">
            @if(config('locale.status') && count(config('locale.languages')) > 1)
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownLanguageLink" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">@lang('menus.language-picker.language') ({{ strtoupper(app()->getLocale()) }})</a>

                    @include('includes.partials.lang')
                </li>
            @endif

            @auth
                <li class="nav-item"><a href="{{route('frontend.user.dashboard')}}" class="nav-link {{ active_class(Route::is('frontend.user.dashboard')) }}">@lang('navs.frontend.dashboard')</a></li>
            @endauth

            @guest
                <li class="nav-item"><a href="{{route('frontend.auth.login')}}" class="nav-link {{ active_class(Route::is('frontend.auth.login')) }}">@lang('navs.frontend.login')</a></li>

                @if(config('access.registration'))
                    <li class="nav-item"><a href="{{route('frontend.auth.register')}}" class="nav-link {{ active_class(Route::is('frontend.auth.register')) }}">@lang('navs.frontend.register')</a></li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuUser" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">{{ $logged_in_user->name }}</a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuUser">
                        @can('view backend')
                            <a href="{{ route('admin.dashboard') }}" class="dropdown-item">@lang('navs.frontend.user.administration')</a>
                        @endcan

                        <a href="{{ route('frontend.user.account') }}" class="dropdown-item {{ active_class(Route::is('frontend.user.account')) }}">@lang('navs.frontend.user.account')</a>
                        <a href="{{ route('frontend.auth.logout') }}" class="dropdown-item">@lang('navs.general.logout')</a>
                    </div>
                </li>
            @endguest

            <li class="nav-item"><a href="{{route('frontend.photo.gallery.index')}}" class="nav-link {{ active_class(Route::is('frontend.photo.gallery*')) }}">@lang('page.frontend.photo.gallery.show')</a></li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle {{ active_class(Request::is('content/*') && !Request::is('content/blog/*')) }}" id="navbarDropdownMenuUser" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">E-Magazine</a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuUser">
                    <a href="{{ route('frontend.blog.index', 'penmanship-2019') }}" class="dropdown-item {{ active_class(Request::is('content/penmanship-2019') || Request::is('content/penmanship-2019/*')) }}">Penmanship 2019</a>
                    <a href="{{ route('frontend.blog.index', 'penmanship-2020') }}" class="dropdown-item {{ active_class(Request::is('content/penmanship-2020') || Request::is('content/penmanship-2020/*')) }}">Penmanship 2020</a>
                </div>
            </li>
            <li class="nav-item"><a href="{{route('frontend.blog.index')}}" class="nav-link {{ active_class(Request::is('content') || Request::is('content/blog/*')) }}">@lang('navs.frontend.blog.index')</a></li>
            <li class="nav-item"><a href="{{route('frontend.contact')}}" class="nav-link {{ active_class(Route::is('frontend.contact')) }}">@lang('navs.frontend.contact')</a></li>
            <li class="nav-item"><a href="{{route('frontend.events.index')}}" class="nav-link {{ active_class(Route::is('frontend.events.index')) }}">@lang('navs.frontend.event')</a></li>
        </ul>
    </div>
</nav>
