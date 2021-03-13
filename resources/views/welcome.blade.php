<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description"
    content="Writing platform built to write, share and spread your words. Primarily optimized for Dhivehi">
  <meta property="og:url" content="https://trycanvas.app">
  <meta property="og:type" content="website">
  <meta property="og:description"
    content="Writing platform built to write, share and spread your words. Primarily optimized for Dhivehi">
  <meta property="og:title" content="Write.mv ― Rant, share & scribble">
  <meta property="og:image" content="https://trycanvas.app/img/opengraph.png">
  <meta property="og:site_name" content="Canvas">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Write.mv ― Rant, share & scribble">
  <meta name="twitter:image" content="https://trycanvas.app/img/opengraph.png">
  <meta name="twitter:description"
    content="Writing platform built to write, share and spread your words. Primarily optimized for Dhivehi">

  <title>Write.mv ― Rant, share & scribble</title>
  <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;800&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>

<body class="antialiased">
  <div class="relative pt-6 pb-4 sm:pb-10 bg-gray-50" x-data="{ open: false }">
    <nav class="relative max-w-screen-xl mx-auto flex items-center justify-between px-4 sm:px-6">
      <div class="flex items-center flex-1">
        <div class="flex items-center justify-between w-full md:w-auto">
          <a href="https://blade-ui-kit.com" aria-label="Home">
            <img class="h-8 w-auto sm:h-10" src="/images/logo.svg" alt="Logo" />
          </a>
          <div class="-mr-2 flex items-center md:hidden">
            <button @click="open = true" type="button"
              class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
              id="main-menu" aria-label="Main menu" aria-haspopup="true">
              <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
              </svg>
            </button>
          </div>
        </div>
        <div class="hidden md:block md:ml-10">
          <a href="/screencasts" style="font-family: Poppins;"
            class="font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">
            Screencast
          </a>
          <a href="/#features" style="font-family: Poppins;"
            class="ml-10 font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">
            Features
          </a>
          <a href="/explore" style="font-family: Poppins;"
            class="ml-10 font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">
            Explore
          </a>
        </div>
      </div>
      <div class="hidden md:block text-right text-gray">
        <a class="text-scarlet-600 hover:text-scarlet-500 ml-4 font-medium transition duration-150 ease-in-out"
          href="https://twitter.com/bladeuikit"><svg class="h-6 w-6 inline" fill="currentColor"
            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path
              d="M17.316 6.246c.008.162.011.326.011.488 0 4.99-3.797 10.742-10.74 10.742-2.133 0-4.116-.625-5.787-1.697a7.577 7.577 0 0 0 5.588-1.562 3.779 3.779 0 0 1-3.526-2.621 3.858 3.858 0 0 0 1.705-.065 3.779 3.779 0 0 1-3.028-3.703v-.047a3.766 3.766 0 0 0 1.71.473 3.775 3.775 0 0 1-1.168-5.041 10.716 10.716 0 0 0 7.781 3.945 3.813 3.813 0 0 1-.097-.861 3.773 3.773 0 0 1 3.774-3.773 3.77 3.77 0 0 1 2.756 1.191 7.602 7.602 0 0 0 2.397-.916 3.789 3.789 0 0 1-1.66 2.088 7.55 7.55 0 0 0 2.168-.594 7.623 7.623 0 0 1-1.884 1.953z" />
          </svg></a>
        <a class="text-scarlet-600 hover:text-scarlet-500 ml-4 font-medium transition duration-150 ease-in-out"
          href="https://github.com/blade-ui-kit/blade-ui-kit"><svg class="h-6 w-6 inline" fill="currentColor"
            viewBox="0 0 24 24">
            <path fill-rule="evenodd"
              d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
              clip-rule="evenodd" />
          </svg></a>
        <a class="text-scarlet-600 hover:text-scarlet-500 ml-4 font-medium transition duration-150 ease-in-out"
          href="https://discord.gg/Vev5CyE"><svg class="h-6 w-6 inline" fill="currentColor"
            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 146 146">
            <path
              d="M107.75 125.001s-4.5-5.375-8.25-10.125c16.375-4.625 22.625-14.875 22.625-14.875-5.125 3.375-10 5.75-14.375 7.375-6.25 2.625-12.25 4.375-18.125 5.375-12 2.25-23 1.625-32.375-.125-7.125-1.375-13.25-3.375-18.375-5.375-2.875-1.125-6-2.5-9.125-4.25-.375-.25-.75-.375-1.125-.625-.25-.125-.375-.25-.5-.375-2.25-1.25-3.5-2.125-3.5-2.125s6 10 21.875 14.75c-3.75 4.75-8.375 10.375-8.375 10.375-27.625-.875-38.125-19-38.125-19 0-40.25 18-72.875 18-72.875 18-13.5 35.125-13.125 35.125-13.125l1.25 1.5c-22.5 6.5-32.875 16.375-32.875 16.375s2.75-1.5 7.375-3.625c13.375-5.875 24-7.5 28.375-7.875.75-.125 1.375-.25 2.125-.25 7.625-1 16.25-1.25 25.25-.25 11.875 1.375 24.625 4.875 37.625 12 0 0-9.875-9.375-31.125-15.875l1.75-2S110 19.626 128 33.126c0 0 18 32.625 18 72.875 0 0-10.625 18.125-38.25 19zM49.625 66.626c-7.125 0-12.75 6.25-12.75 13.875s5.75 13.875 12.75 13.875c7.125 0 12.75-6.25 12.75-13.875.125-7.625-5.625-13.875-12.75-13.875zm45.625 0c-7.125 0-12.75 6.25-12.75 13.875s5.75 13.875 12.75 13.875c7.125 0 12.75-6.25 12.75-13.875s-5.625-13.875-12.75-13.875z"
              fill-rule="nonzero" />
          </svg></a>
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
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
          </div>
          <div class="px-2 pt-2 pb-3">
            <a href="/screencasts" style="font-family: Poppins;"
              class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out"
              role="menuitem">
              Screencast
            </a>
            <a href=/#features" style="font-family: Poppins;"
              class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out"
              role="menuitem">
              Features
            </a>
            <a href="/explore" style="font-family: Poppins;"
              class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out"
              role="menuitem">
              Explore
            </a>
          </div>
          <div class="bg-gray-50 text-center">
            <a class="text-scarlet-600 hover:text-scarlet-500 inline-block px-5 py-3 text-center font-medium bg-gray-50 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
              href="https://twitter.com/bladeuikit"><svg class="h-6 w-6 inline" fill="currentColor"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path
                  d="M17.316 6.246c.008.162.011.326.011.488 0 4.99-3.797 10.742-10.74 10.742-2.133 0-4.116-.625-5.787-1.697a7.577 7.577 0 0 0 5.588-1.562 3.779 3.779 0 0 1-3.526-2.621 3.858 3.858 0 0 0 1.705-.065 3.779 3.779 0 0 1-3.028-3.703v-.047a3.766 3.766 0 0 0 1.71.473 3.775 3.775 0 0 1-1.168-5.041 10.716 10.716 0 0 0 7.781 3.945 3.813 3.813 0 0 1-.097-.861 3.773 3.773 0 0 1 3.774-3.773 3.77 3.77 0 0 1 2.756 1.191 7.602 7.602 0 0 0 2.397-.916 3.789 3.789 0 0 1-1.66 2.088 7.55 7.55 0 0 0 2.168-.594 7.623 7.623 0 0 1-1.884 1.953z" />
              </svg></a>
            <a class="text-scarlet-600 hover:text-scarlet-500 inline-block px-5 py-3 text-center font-medium bg-gray-50 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
              href="https://github.com/blade-ui-kit/blade-ui-kit"><svg class="h-6 w-6 inline" fill="currentColor"
                viewBox="0 0 24 24">
                <path fill-rule="evenodd"
                  d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                  clip-rule="evenodd" />
              </svg></a>
            <a class="text-scarlet-600 hover:text-scarlet-500 inline-block px-5 py-3 text-center font-medium bg-gray-50 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
              href="https://discord.gg/Vev5CyE"><svg class="h-6 w-6 inline" fill="currentColor"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 146 146">
                <path
                  d="M107.75 125.001s-4.5-5.375-8.25-10.125c16.375-4.625 22.625-14.875 22.625-14.875-5.125 3.375-10 5.75-14.375 7.375-6.25 2.625-12.25 4.375-18.125 5.375-12 2.25-23 1.625-32.375-.125-7.125-1.375-13.25-3.375-18.375-5.375-2.875-1.125-6-2.5-9.125-4.25-.375-.25-.75-.375-1.125-.625-.25-.125-.375-.25-.5-.375-2.25-1.25-3.5-2.125-3.5-2.125s6 10 21.875 14.75c-3.75 4.75-8.375 10.375-8.375 10.375-27.625-.875-38.125-19-38.125-19 0-40.25 18-72.875 18-72.875 18-13.5 35.125-13.125 35.125-13.125l1.25 1.5c-22.5 6.5-32.875 16.375-32.875 16.375s2.75-1.5 7.375-3.625c13.375-5.875 24-7.5 28.375-7.875.75-.125 1.375-.25 2.125-.25 7.625-1 16.25-1.25 25.25-.25 11.875 1.375 24.625 4.875 37.625 12 0 0-9.875-9.375-31.125-15.875l1.75-2S110 19.626 128 33.126c0 0 18 32.625 18 72.875 0 0-10.625 18.125-38.25 19zM49.625 66.626c-7.125 0-12.75 6.25-12.75 13.875s5.75 13.875 12.75 13.875c7.125 0 12.75-6.25 12.75-13.875.125-7.625-5.625-13.875-12.75-13.875zm45.625 0c-7.125 0-12.75 6.25-12.75 13.875s5.75 13.875 12.75 13.875c7.125 0 12.75-6.25 12.75-13.875s-5.625-13.875-12.75-13.875z"
                  fill-rule="nonzero" />
              </svg></a>
          </div>
        </div>
      </div>
    </div>

    <main class="mt-8 mx-auto max-w-screen-xl px-4 sm:mt-12 sm:px-6 md:mt-20 xl:mt-24 ">


      <div class="">
        <div class="sm:text-center md:max-w-2xl md:mx-auto">
          <a href="https://github.com/blade-ui-kit/blade-ui-kit"
            class="inline-flex items-center px-3 pb-1 pt-1.5 rounded-full uppercase text-sm font-semibold leading-5 bg-blue-100 hover:bg-blue-200 text-blue-800"
            style="font-family: Poppins;">
            Pre-release out now
          </a>

          <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg md:text-xl">
            <img class="inline-block h-28 md:h-32 lg:h-36 w-auto" src="/images/profile.svg" alt="" />
          </p>

          <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg md:text-xl" style="font-family: Poppins;">
            Writing platform built to write, share and spread your words. Primarily optimized for Dhivehi
          </p>


          <div class="mt-10 sm:flex sm:justify-center">
            <div class="rounded-md shadow inline-block">
              <a href="/register"
                class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:border-blue-800 focus:shadow-outline-blue transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10"
                style="font-family: Poppins;">
                <x-heroicon-o-newspaper class="-ml-1 mr-3 h-5 w-5" />
                Get started
              </a>
            </div>


          </div>
        </div>
      </div>
    </main>
  </div>
  </div>

  <div class="w-full mx-auto mt-20 text-center md:w-10/12">
    <img src="https://kutty.netlify.app/hero.jpg" alt="Hellonext feedback boards software screenshot"
      class="w-full rounded-lg shadow-2xl" />
  </div>
  </section>
</body>

</html>