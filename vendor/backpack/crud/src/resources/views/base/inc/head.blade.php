    @if (config('backpack.base.meta_robots_content'))<meta name="robots" content="{{ config('backpack.base.meta_robots_content', 'noindex, nofollow') }}"> @endif
    <meta name="csrf-token" content="{{ csrf_token() }}" /> {{-- Encrypted CSRF token for Laravel, in order for Ajax requests to work --}}

    @yield('before_styles')
    @stack('before_styles')
    

    @if (config('backpack.base.mix_styles') && count(config('backpack.base.mix_styles')))
        @foreach (config('backpack.base.mix_styles') as $path => $manifest)
        <link rel="stylesheet" type="text/css" href="{{ mix($path, $manifest) }}">
        @endforeach
    @endif

    @yield('after_styles')
    @stack('after_styles')
