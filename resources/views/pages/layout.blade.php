<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Writing platform built to write, share and spread your words. Primarily optimized for Dhivehi">
    <meta property="og:url" content="https://write.mv">
    <meta property="og:type" content="website">
    <meta property="og:description"
        content="Writing platform built to write, share and spread your words. Primarily optimized for Dhivehi">
    <meta property="og:title" content="Write.mv ― Rant, share & scribble">
    <meta property="og:image" content="https://write.mv/images/opengraph.png">
    <meta property="og:site_name" content="Write.mv">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Write.mv ― Rant, share & scribble">
    <meta name="twitter:image" content="https://write.mv/images/opengraph.png">
    <meta name="twitter:description"
        content="Writing platform built to write, share and spread your words. Primarily optimized for Dhivehi">

    <title>Write.mv ― Rant, share & scribble</title>
    <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;800&display=swap"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link href="/css/font.css" rel="stylesheet">
    <style>
        mark {
            background: linear-gradient(90deg, #097FFF .3%, #9DFCCE 102.11%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .poppins {
            font-family: Poppins;
        }

    </style>

</head>

<body class="antialiased bg-gray-50">
    <div class="relative pt-6 pb-4 sm:pb-10" x-data="{ open: false }">
        <nav class="relative max-w-screen-xl mx-auto flex items-center justify-between px-4 sm:px-6">
            <div class="flex items-center flex-1">
                <div class="flex items-center justify-between w-full md:w-auto">
                    <a href="https://write.mv" aria-label="Home">
                        <img class="h-8 w-auto sm:h-10" src="/images/logo.svg" alt="Logo" />
                    </a>
                    <div class="-mr-2 flex items-center md:hidden">
                        <button @click="open = true" type="button"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                            id="main-menu" aria-label="Main menu" aria-haspopup="true">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="hidden md:flex space-x-8 ml-5">
                    <a href="/" style="font-family: Poppins;"
                        class="font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">
                        Home
                    </a>
                    <a href="/about" style="font-family: Poppins;"
                        class="ml-10 font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">
                        About
                    </a>
                    <a href="/publishing-guideline" style="font-family: Poppins;"
                        class="ml-10 font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">
                        Guidelines
                    </a>
                    <a href="https://paste.write.mv" style="font-family: Poppins;"
                        class="ml-10 font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">
                        Paste
                    </a>
                    <a href="https://write.mv/writemv/" style="font-family: Poppins;"
                        class="ml-10 font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">
                        Our blog
                    </a>
                    <a href="/explore" style="font-family: Poppins;"
                        class="ml-10 font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">
                        Explore
                    </a>
                </div>
            </div>



            <div class="hidden md:flex items-center justify-end space-x-8 md:flex-1 lg:w-0">
                @guest

                    <a href="/login" style="font-family: Poppins;"
                        class="text-sm font-medium text-gray-500 hover:text-gray-900 transition ease-in-out duration-150">
                        Sign in
                    </a>

                    <a href="/register" style="font-family: Poppins;"
                        class="whitespace-nowrap bg-blue-100 border border-transparent rounded-lg py-2 px-4 inline-flex items-center justify-center text-sm font-medium text-blue-600 hover:bg-blue-200 transition ease-in-out duration-150">
                        Start writing
                    </a>
                @endguest

                @auth
                    <a href="/dashboard" style="font-family: Poppins;"
                        class="text-sm font-medium text-gray-500 hover:text-gray-900 transition ease-in-out duration-150">
                        Dashboard
                    </a>
                @endauth
            </div>
        </nav>

        <div class="top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden fixed top-2 z-50" x-show="open"
            @click.away="open = false">
            <div class="rounded-lg shadow-md">
                <div class="rounded-lg bg-white shadow-xs overflow-hidden" role="menu" aria-orientation="vertical"
                    aria-labelledby="main-menu">
                    <div class="px-5 pt-4 flex items-center justify-between">
                        <div>
                            <a href="/">
                                <img class="h-8 w-auto" src="/images/logo.svg" alt="" />
                            </a>
                        </div>
                        <div class="-mr-2">
                            <button @click="open = false" type="button"
                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                                aria-label="Close menu">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="px-2 pt-2 pb-3">
                        <a href="/" style="font-family: Poppins;"
                            class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out"
                            role="menuitem">
                            Home
                        </a>
                        <a href="/about" style="font-family: Poppins;"
                            class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out"
                            role="menuitem">
                            About
                        </a>

                        <a href="/publishing-guideline" style="font-family: Poppins;"
                            class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out"
                            role="menuitem">
                            Guidelines
                        </a>
                        <a href="https://paste.write.mv" style="font-family: Poppins;"
                            class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out"
                            role="menuitem">
                            Paste
                        </a>
                        <a href="https://write.mv/writemv/" style="font-family: Poppins;"
                            class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out"
                            role="menuitem">
                            Our blog
                        </a>
                        <a href="/explore" style="font-family: Poppins;"
                            class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out"
                            role="menuitem">
                            Explore
                        </a>
                    </div>
                    <div class="bg-gray-50 text-center py-3">
                        <div class="flex items-center justify-center space-x-8 md:flex-1 lg:w-0">

                            @guest
                                <a href="/login" style="font-family: Poppins;"
                                    class="text-sm font-medium text-gray-500 hover:text-gray-900 transition ease-in-out duration-150">
                                    Sign in
                                </a>

                                <a href="/register" style="font-family: Poppins;"
                                    class="whitespace-nowrap bg-blue-100 border border-transparent rounded-lg py-2 px-4 inline-flex items-center justify-center text-sm font-medium text-blue-600 hover:bg-blue-200 transition ease-in-out duration-150">
                                    Start writing
                                </a>

                            @endguest

                            @auth
                                <a href="/dashboard" style="font-family: Poppins;"
                                    class="text-sm font-medium text-gray-500 hover:text-gray-900 transition ease-in-out duration-150">
                                    Dashboard
                                </a>

                            @endauth


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @yield('content')

    @include('partials.footer')
</body>

</html>
