<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Default Title')</title>
    @yield('before-styles-end')
    <link rel="stylesheet" href="{{ elixir('css/admin/dashboard.css') }}">
    <script>
        window.BlogConfig = {!! json_encode(['csrfToken' => csrf_token()]) !!};
    </script>
    @yield('after-styles-end')
</head>
<body class="hold-transition skin-black sidebar-mini sidebar-collapse">
<div class="wrapper">
    @include('admin.layouts.header')
    @include('admin.layouts.main-sidebar')

    <div class="content-wrapper">

        <section class="content-header">
            {!! Breadcrumbs::renderIfExists() !!}
            @yield('content-header')
        </section>
        <!-- 正文开始 -->
        <section class="content">
            @include('layouts._partials.messages')
            @yield('content')
        </section>
        <!-- 正文结束 -->

    </div>
    @include('admin.layouts.footer')

</div>
@yield('before-scripts-end')
<script src="{{ elixir('js/admin/dashboard.js') }}"></script>
@yield('after-scripts-end')
</body>
</html>