<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{$blog->site_title}} </title>
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/font.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;800&display=swap" rel="stylesheet">
</head>

<body>
    @yield('content')
    <footer class="mb-4">
        <div class="flex justify-center">
            <p class="mb-8 text-sm text-center text-gray-700 md:text-left md:mb-0" style="font-family: Poppins;">Powered by <a href="https://write.mv"><span class="font-semibold" style="color:#2F71F0;">Write.mv</span></a></p>
    
        </div>
      </footer> 
</body>

</html>