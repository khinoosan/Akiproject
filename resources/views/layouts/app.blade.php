<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'アプリケーション')</title>

    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @yield('styles')
</head>
<body>
    <div style="display: flex; height: 100vh;">
        @include('partials.sidebar')

        <div class="content" style="margin-left: 250px; width: calc(100% - 250px);">
            @yield('content')
        </div>
    </div>

    @yield('scripts')
</body>
</html>