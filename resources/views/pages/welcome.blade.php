@extends('pages.layout')

@section('content')
<main class="mt-8 mx-auto max-w-screen-xl px-4 sm:mt-12 sm:px-6 md:mt-12 xl:mt-12 ">
  <div>
    <div class="sm:text-center md:max-w-2xl md:mx-auto">
      <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg md:text-xl">
        <img class="inline-block h-28 md:h-32 lg:h-36 w-auto" src="/images/profile.svg" alt="" />
      </p>

      <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg md:text-xl" style="font-family: Poppins;">
        <a class="font-semibold hover:underline" href="https://write.mv"><mark>Write.mv</mark></a> is platform built
        to write,
        share and spread your words. Primarily optimized for Dhivehi
      </p>


      <div class="mt-10 flex sm:justify-center justify-start" style="font-family: Poppins;">


        <a href="/register" class="relative mt-5">
          <span class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-gray-900 rounded"></span>
          <span
            class="relative inline-block w-full h-full px-8 py-3 text-base font-bold bg-white border-2 border-black rounded hover:bg-blue-600 xl:text-xl fold-bold hover:text-white">Get
            Started</span>
        </a>


      </div>
    </div>
  </div>
</main>
</div>
</div>
</section>

<div class="mt-12 text-center">
  <h2 class="text-4xl font-semibold text-gray-800" style="font-family: Poppins;">Shiny Features</h2>

</div>
<section class="px-4 py-24 mx-auto max-w-7xl" style="font-family: Poppins;">
  <div class="grid items-center grid-cols-1 mb-24 md:grid-cols-2 gap-y-10 md:gap-y-32 gap-x-10 md:gap-x-24">
    <div>
      <h2
        class="mb-4 text-2xl font-extrabold tracking-tight text-center text-gray-800 md:leading-tight sm:text-left md:text-4xl">
        Clear overview for efficient tracking</h2>
      <p class="mb-5 text-base text-center text-gray-600 sm:text-left md:text-lg">
        Handle your subscriptions and transactions efficiently with the clear overview in Dashboard. Features like the
        smart search option allow you to quickly find any data you’re looking for.
      </p>
    </div>
    <div class="w-full h-full py-48 bg-gray-200"></div>
  </div>
  <div class="grid flex-col-reverse items-center grid-cols-1 md:grid-cols-2 gap-y-10 md:gap-y-32 gap-x-10 md:gap-x-24">
    <div class="order-none md:order-2">
      <h2
        class="mb-4 text-2xl font-extrabold tracking-tight text-center text-gray-800 md:leading-tight sm:text-left md:text-4xl">
        Decide how you integrate Payments</h2>
      <p class="mb-5 text-base text-center text-gray-600 sm:text-left md:text-lg">
        Love to code? Next to our ready-made and free plugins you can use our expansive yet simple API; decide how you
        integrate Payments and build advanced and reliable products yourself from
        scratch.
      </p>
    </div>
    <div class="w-full h-full py-48 bg-gray-200"></div>
  </div>
</section>
@endsection