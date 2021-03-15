<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="Writing platform built to write, share and spread your words. Primarily optimized for Dhivehi">
        <meta property="og:url" content="https://write.mv">
        <meta property="og:type" content="website">
        <meta property="og:description" content="Writing platform built to write, share and spread your words. Primarily optimized for Dhivehi">
        <meta property="og:title" content="Write.mv ― Rant, share & scribble">
        <meta property="og:image" content="https://write.mv/images/opengraph.png">
        <meta property="og:site_name" content="Write.mv">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Write.mv ― Rant, share & scribble">
        <meta name="twitter:image" content="https://write.mv/images/opengraph.png">
        <meta name="twitter:description" content="Writing platform built to write, share and spread your words. Primarily optimized for Dhivehi">
        <title>Write.mv ― Rant, share & scribble</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;800&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </body>
</html>
