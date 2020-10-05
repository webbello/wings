<!DOCTYPE html>
@langrtl
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
@else
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@endlangrtl
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', app_name())</title>
        <meta name="description" content="@yield('meta_description', "An Ex-Students' Association")">
        <meta name="author" content="@yield('meta_author', 'Md Irfan')">
        @yield('meta')
        <!-- Jetpack Open Graph Tags -->
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="website" />
        <meta property="og:site_name" content="Wings of ESC" />
        <meta property="article:section" content="Uncategorized" />
        <meta property="article:published_time" content="@yield('article_published_time')" />
        <meta property="article:modified_time" content="@yield('article_modified_time')" />
        <meta property="og:updated_time" content="@yield('og_updated_time')" />

        <meta property="og:title" content="@yield('og_title', 'Wings of ESC')" />
        <meta property="og:description" content="@yield('og_description', 'Serve the society - An Ex-Students')" />
        <meta property="og:url" content="@yield('og_url', 'https://wingsofesc.in')" />
        <meta property="og:image" content="@yield('og_image', 'https://wingsofesc.files.wordpress.com/2016/10/wings.png')" />
        <meta property="og:image:width" content="730" />
        <meta property="og:image:height" content="412" />
        <meta name="twitter:site" content="@wings_of_esc" />
        <meta name="twitter:text:title" content="@yield('twitter_text_title','WingsOfEsc')" />
        <meta name="twitter:image" content="@yield('twitter_image','https://wingsofesc.files.wordpress.com/2016/10/wings.png')" />
        <meta name="twitter:card" content="@yield('twitter_card', 'Serve the society - An Ex-Students')" />
        <meta property="fb:app_id" content="370313053437434" />
        <meta property="article:publisher" content="https://www.facebook.com/wingsofescofficial" />
        <!-- End Jetpack Open Graph Tags -->

        <link rel="shortcut icon" type="image/x-icon" href="https://secure.gravatar.com/blavatar/62c7f1f62f2971bd7f11aa0de05eeaf1?s=32" sizes="16x16" />
        <link rel="icon" type="image/x-icon" href="https://secure.gravatar.com/blavatar/62c7f1f62f2971bd7f11aa0de05eeaf1?s=32" sizes="16x16" />
        <link rel="apple-touch-icon-precomposed" href="https://secure.gravatar.com/blavatar/62c7f1f62f2971bd7f11aa0de05eeaf1?s=114" />
        <link rel="search" type="application/opensearchdescription+xml" href="https://wingsofesc.wordpress.com/osd.xml" title="Wings of ESC" />
        <link rel="search" type="application/opensearchdescription+xml" href="https://s1.wp.com/opensearch.xml" title="wingsofesc.in" />

        {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
        @stack('before-styles')

        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
        {{ style(mix('css/frontend.css')) }}

        @stack('after-styles')
        <link href="css/ionicons/css/ionicons.min.css" rel="stylesheet">
    </head>
    <body>
        @include('includes.partials.read-only')

        <div id="app">
            @include('includes.partials.logged-in-as')
            @include('frontend.includes.nav')
            {{-- @include('frontend.includes.header') --}}
            @if (Route::currentRouteName() !== 'frontend.index' && Route::currentRouteName() !== 'frontend.user.dashboard')
                @include('frontend.includes.inner-header')
            @endif

            <main id="main">
                @include('includes.partials.messages')
                @yield('content')
            </main>
            @include('frontend.includes.footer')
        </div><!-- #app -->

        <!-- Scripts -->
        @stack('before-scripts')
        {!! script(mix('js/manifest.js')) !!}
        {!! script(mix('js/vendor.js')) !!}
        {!! script(mix('js/frontend.js')) !!}
        @stack('after-scripts')

        @include('includes.partials.ga')
    </body>
</html>
