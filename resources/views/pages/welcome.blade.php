@extends('pages.layout')

@section('content')
<main class="mt-8 mx-auto max-w-screen-xl px-4 sm:mt-12 sm:px-6 md:mt-12 xl:mt-12 ">
  <div>
    <div class="sm:text-center md:max-w-2xl md:mx-auto">
      <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg md:text-xl">
        <img class="inline-block h-28 md:h-32 lg:h-36 w-auto" src="/images/profile.svg" alt="" />
      </p>

      <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg md:text-xl" style="font-family: Poppins;">
        <a class="font-semibold hover:underline" href="https://write.mv"><mark>Write.mv</mark></a> is a platform to write,share and spread your words online. Primarily optimized for Dhivehi
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
        <mark>Clean</mark> & <mark>Elegant</mark> UI.</h2>
      <p class="mb-5 text-base text-center text-gray-600 sm:text-left md:text-lg">
        We really care about the user experience and how the product looks. So we carefully
        crafted a clean and modern UI that is both good looking and easy to the eye.
      </p>
    </div>
    <div class="py-24">
      <img src="/images/home/ui-dashboard.PNG" class="w-full h-full rounded-lg shadow-lg" />

    </div>
  </div>
  <div class="grid flex-col-reverse items-center grid-cols-1 md:grid-cols-2 gap-y-10 md:gap-y-32 gap-x-10 md:gap-x-24">
    <div class="order-none md:order-2">
      <h2
        class="mb-4 text-2xl font-extrabold tracking-tight text-center text-gray-800 md:leading-tight sm:text-left md:text-4xl">
        <mark>Powerful</mark> & <mark>Easy to use</mark> writing System.</h2>
      <p class="mb-5 text-base text-center text-gray-600 sm:text-left md:text-lg">
        Love to write all day? Next to our elegant and easy to use UI you can use a powerful writing system to write all
        your stories,journals,blogs or anything you want.
      </p>
    </div>
    <div class="py-24">
      <img src="/images/home/writing-en.PNG" class="w-full h-full rounded-lg shadow-lg" />
    </div>
  </div>

  <div class="grid items-center grid-cols-1 mb-24 md:grid-cols-2 gap-y-10 md:gap-y-32 gap-x-10 md:gap-x-24">
    <div>
      <h2
        class="mb-4 text-2xl font-extrabold tracking-tight text-center text-gray-800 md:leading-tight sm:text-left md:text-4xl">
        <mark>Dhivehi</mark> Support.</h2>
      <p class="mb-5 text-base text-center text-gray-600 sm:text-left md:text-lg">
        Want to write in dhivehi? Oh boy we have dhivehi writing support as well.
      </p>
    </div>
    <div class="py-24">
      <img src="/images/home/writing.PNG" class="w-full h-full rounded-lg shadow-lg" />
    </div>
  </div>

  <div class="grid flex-col-reverse items-center grid-cols-1 md:grid-cols-2 gap-y-10 md:gap-y-32 gap-x-10 md:gap-x-24">
    <div class="order-none md:order-2">
      <h2
        class="mb-4 text-2xl font-extrabold tracking-tight text-center text-gray-800 md:leading-tight sm:text-left md:text-4xl">
        Great <mark>insight</mark> into your writings.</h2>
      <p class="mb-5 text-base text-center text-gray-600 sm:text-left md:text-lg">
        Get a great insight into your writings and measure the views & unique visitors foreach of your writings..
      </p>
    </div>
    <div class="py-24">
      <img src="/images/home/insights-post.PNG" class="w-full h-full rounded-lg shadow-lg" />
    </div>
  </div>

  <div class="grid flex-col-reverse items-center grid-cols-1 md:grid-cols-2 gap-y-10 md:gap-y-32 gap-x-10 md:gap-x-24">
    <div>
      <h2
        class="mb-4 text-2xl font-extrabold tracking-tight text-center text-gray-800 md:leading-tight sm:text-left md:text-4xl">
        <mark>Search Engine</mark> optimization.</h2>
      <p class="mb-5 text-base text-center text-gray-600 sm:text-left md:text-lg mt-2">
        Attach meta tags, descriptions to allow your content up to be discovered in as many ways as possible.
      </p>
    </div>
    <div class="py-24">
      <img src="/images/home/meta.PNG" class="w-full h-full rounded-lg shadow-lg" />
    </div>
  </div>

  <div class="grid flex-col-reverse items-center grid-cols-1 md:grid-cols-2 gap-y-10 md:gap-y-32 gap-x-10 md:gap-x-24">
    <div class="order-none md:order-2">
      <h2
        class="mb-4 text-2xl font-extrabold tracking-tight text-center text-gray-800 md:leading-tight sm:text-left md:text-4xl">
        A <mark>home</mark> for you on the <mark>web</mark>.</h2>
      <p class="mb-5 text-base text-center text-gray-600 sm:text-left md:text-lg">
        All our user's get a beautiful blog page that lists all of the writings published. So you can share with your
        friends.
      </p>
    </div>
    <div class="py-24">
      <img src="/images/home/place-on-the-web.PNG" class="w-full h-full rounded-lg shadow-lg" />
    </div>
  </div>

  <div class="grid flex-col-reverse items-center grid-cols-1 md:grid-cols-2 gap-y-10 md:gap-y-32 gap-x-10 md:gap-x-24">
    <div>
      <h2
        class="mb-4 text-2xl font-extrabold tracking-tight text-center text-gray-800 md:leading-tight sm:text-left md:text-4xl">
        <mark>Beautifully</mark> rendered content.</h2>
      <p class="mb-5 text-base text-center text-gray-600 sm:text-left md:text-lg mt-2">
        Get Beautiful & easy to read rendered content for your readers.
      </p>
    </div>
    <div class="py-24">
      <img src="/images/home/rendered-content.PNG" class="w-full h-full rounded-lg shadow-lg" />
    </div>
  </div>

  <div class="grid flex-col-reverse items-center grid-cols-1 md:grid-cols-2 gap-y-10 md:gap-y-32 gap-x-10 md:gap-x-24">
    <div class="order-none md:order-2">
      <h2
        class="mb-4 text-2xl font-extrabold tracking-tight text-center text-gray-800 md:leading-tight sm:text-left md:text-4xl">
        Content <mark>Scheduling</mark>.</h2>
      <p class="mb-5 text-base text-center text-gray-600 sm:text-left md:text-lg">
        You can set the publish date to a future date and the writing will be scheduled. It will publish your writing
        exactly when you want it to
      </p>
    </div>
    <div class="py-24">
      <img src="/images/home/schedule.PNG" class="w-full h-full rounded-lg shadow-lg" />
    </div>
  </div>


  <div class="grid flex-col-reverse items-center grid-cols-1 md:grid-cols-2 gap-y-10 md:gap-y-32 gap-x-10 md:gap-x-24">
    <div>
      <h2
        class="mb-4 text-2xl font-extrabold tracking-tight text-center text-gray-800 md:leading-tight sm:text-left md:text-4xl">
        <mark>Engage</mark> with your readers.</h2>
      <span class="inline-block mt-0 rounded-lg text-black bg-blue-300 px-2 relative text-md">Coming soon</span>
      <p class="mb-5 text-base text-center text-gray-600 sm:text-left md:text-lg">
        Connect with your readers and engage with their comments. This feature will be released soon.
      </p>
    </div>
    <div class="py-24">
      <img src="/images/home/comment.PNG" class="w-full h-full rounded-lg shadow-lg" />
    </div>
  </div>
</section>


<div class="bg-gray-100 px-6 pt-5 md:pt-6 lg:pt-6 pb-0 md:pb-10 xl:-mt-8" style="font-family: Poppins;">
  <div class="max-w-5xl mx-auto w-full">
    <h2 class="text-center font-bold text-3xl md:text-4xl pt-8 md:pt-10 text-gray-800 mb-10 tracking-tighter">Want more?
      Meet Write.mv Pro <br /> <span
        class="inline-block mt-0 rounded-lg text-gray-800 bg-blue-300 px-2 relative text-md font-normal">Releasing
        soon</span></h2>

    <div class="md:mb-4 px-6 w-full max-w-6xl mx-auto items-center flex flex-col md:flex-row md:space-x-4">
      <div class="w-full md:w-1/2">
        <ul>
          <li class="flex mb-4">
            <div class="flex-shrink-0 mr-4 w-6 h-6 rounded-full bg-green-200 flex items-center justify-center">
              <svg class="stroke-current w-5 h-5 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
            </div>
            <div class="text-gray-600 text-lg">
              <strong>Team Support</strong>
            </div>
          </li>

          <li class="flex mb-4">
            <div class="flex-shrink-0 mr-4 w-6 h-6 rounded-full bg-green-200 flex items-center justify-center">
              <svg class="stroke-current w-5 h-5 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
            </div>
            <div class="text-gray-600 text-lg">
              <strong>Custom Themes Support</strong>
            </div>
          </li>

          <li class="flex mb-4">
            <div class="flex-shrink-0 mr-4 w-6 h-6 rounded-full bg-green-200 flex items-center justify-center">
              <svg class="stroke-current w-5 h-5 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
            </div>
            <div class="text-gray-600 text-lg">
              <strong>Custom Domain Support</strong>
            </div>
          </li>

          <li class="flex mb-4">
            <div class="flex-shrink-0 mr-4 w-6 h-6 rounded-full bg-green-200 flex items-center justify-center">
              <svg class="stroke-current w-5 h-5 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
            </div>
            <div class="text-gray-600 text-lg">
              <strong>Auto Publish</strong> any of your writing automatically to all social networks.
            </div>
          </li>
        </ul>
      </div>
      <div class="w-full md:w-1/2">
        <ul>
          <li class="flex mb-4">
            <div class="flex-shrink-0 mr-4 w-6 h-6 rounded-full bg-green-200 flex items-center justify-center">
              <svg class="stroke-current w-5 h-5 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
            </div>
            <div class="text-gray-600 text-lg">
              <strong>Tags & Topics</strong>
            </div>
          </li>

          <li class="flex mb-4">
            <div class="flex-shrink-0 mr-4 w-6 h-6 rounded-full bg-green-200 flex items-center justify-center">
              <svg class="stroke-current w-5 h-5 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
            </div>
            <div class="text-gray-600 text-lg">
              <strong>Categories</strong>
            </div>
          </li>



        </ul>
      </div>
    </div>
  </div>
</div>
@endsection