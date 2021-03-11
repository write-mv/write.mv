<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{$blog->site_title}} </title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/font.css') }}">
</head>

<body>
    @yield('content')
    <footer class="mb-4">
        <div class="flex justify-center">
            <p class="mb-8 text-sm text-center text-gray-700 md:text-left md:mb-0">Powered by <a href="https://write.mv"><span class="font-semibold text-blue-500">Write.mv</span></a></p>
    
        </div>
      </footer> 
</body>

</html>