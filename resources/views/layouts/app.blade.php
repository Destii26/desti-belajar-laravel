<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'AdminLTE 3 | Dashboard')</title>

    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- ... (Tambahkan path asset lainnya) -->

    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- ... (Tambahkan path script lainnya) -->
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        @include('layou.header') {{-- Header --}}
        @include('layouts.sidebar') {{-- Sidebar --}}

        <div class="content-wrapper">
            <section class="content-header">
                @yield('content_header')
            </section>

            <section class="content">
                @yield('content')
            </section>
        </div>

        @include('layout.footer') {{-- Footer --}}

    </div>

    @include('layouts.scripts') {{-- Scripts --}}
</body>
</html>
