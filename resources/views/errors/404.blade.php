@extends('errors.layout')
@section('content')
    <section class="container px-4 py-32 mx-auto ">
        <div class="w-full mx-auto lg:w-1/3">
          <a href="/" class="flex items-center">
            <img class="w-auto h-64" src="/images/error.svg">
          </a>
          <p class="mt-5 mb-3 text-xl font-bold text-white md:text-2xl" style="font-family: Poppins;">
            Page not found (404)
          </p>
          <p class="mb-3 text-base font-medium text-white" style="font-family: Poppins;">
            The page you're looking for may have moved or no longer exists. Head back
            to our <a href="/" class="underline">homepage</a>
          </p>
        </div>
      </section>
@endsection