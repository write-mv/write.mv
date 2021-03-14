<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Writing platform built to write, share and spread your words. Primarily optimized for Dhivehi">
    <meta property="og:url" content="https://trycanvas.app">
    <meta property="og:type" content="website">
    <meta property="og:description"
        content="Writing platform built to write, share and spread your words. Primarily optimized for Dhivehi">
    <meta property="og:title" content="{{$blog->site_title}} - Write.mv">
    <meta property="og:image" content="">
    <meta property="og:site_name" content="Write.mv">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{$blog->site_title}} - Write.mv">
    <meta name="twitter:image" content="">
    <meta name="twitter:description"
        content="Writing platform built to write, share and spread your words. Primarily optimized for Dhivehi">
    <title>{{$blog->site_title}} - Write.mv</title>
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/font.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;800&display=swap" rel="stylesheet">
    <style>
        .embed-responsive-item {
            width: 100%;
            height: 350px;
        }
    </style>
</head>

<body>
    @yield('content')
    <footer class="mb-4">
        <div class="flex justify-center">
            <p class="mb-8 text-sm text-center text-gray-700 md:text-left md:mb-0" style="font-family: Poppins;">Powered
                by <a href="https://write.mv"><span class="font-semibold" style="color:#2F71F0;">Write.mv</span></a></p>

        </div>
    </footer>
</body>

</html>