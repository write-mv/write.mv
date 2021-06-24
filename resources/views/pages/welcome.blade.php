  @extends('pages.layout')

  @section('content')
      <div class="mt-16 mb-16 text-center md:mt-32 md:mb-24 poppins">
          <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
              <div class="mt-2 mb-10">
                  <img class="inline-block h-28 md:h-32 lg:h-36 w-auto" src="/images/logo.svg" alt="">
              </div>
              <h1 class="mb-4 text-3xl leading-tight font-display font-bold md:leading-tight md:text-5xl lg:mb-8">
                  <span class="sm:text-transparent sm:bg-clip-text"><mark>Write mv</mark></span>
                  is a dhivehi first platform to write,share and spread your words online.
              </h1>
              <div class="mb-4 text-gray-500 text-lg font-medium md:mb-8 lg:text-xl">
                  Rant, Share & Scribble
              </div>

              <div class="flex justify-center">
                  <svg class="animate-bounce w-6 h-6 text-amber-900" fill="none" stroke-linecap="round"
                      stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                      <path d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                  </svg>
              </div>

              <div class="mt-16 flex flex-col space-y-6 justify-center md:flex-row md:space-y-0">


                  <div class="self-center md:self-start">
                      <a href="/register"
                          class="block px-8 py-3 text-white font-bold bg-gray-900 border-2 border-transparent rounded transition-colors duration-200 hover:bg-gray-800 focus:bg-gray-700 focus:outline-none focus:border-gray-500">
                          <span class="align-middle">Get Started</span>
                      </a>
                  </div>
              </div>
          </div>
      </div>

      <!--

                      <div class="my-16 lg:my-32 md:py-8">
                          <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
                              <div
                                  class="text-center w-full grid grid-cols-1 gap-x-4 gap-y-8 md:gap-y-16 md:px-16 md:text-left md:grid-cols-2 lg:px-0 lg:grid-cols-3">
                                  <div class="flex flex-col lg:mx-auto">
                                      <span class="text-3xl font-bold text-blue-500 md:text-5xl">1,100,000+</span>
                                      <span>Data points processed</span>
                                  </div>
                                  <div class="flex flex-col lg:mx-auto">
                                      <span class="text-3xl font-bold text-blue-500 md:text-5xl">100+</span>
                                      <span>Sites monitored</span>
                                  </div>
                                  <div class="flex flex-col lg:mx-auto">
                                      <span class="text-3xl font-bold text-blue-500 md:text-5xl">20,000+</span>
                                      <span>Unique pages processed</span>
                                  </div>
                              </div>
                          </div>
                      </div>
                    -->
      <div class="relative overflow-hidden">
          <div class="hidden sm:block sm:absolute sm:inset-y-0 sm:h-full sm:w-full" aria-hidden="true">
              <div class="relative h-12 max-w-7xl mx-auto">

                  <img class="absolute transform translate-y-1/4 translate-x-1/4 lg:translate-x-1/24"
                      src="/images/blob-1.svg" />

                  <img class="absolute transform translate-y-3/4 -translate-x-1/4 lg:-translate-x-1/24"
                      src="/images/blob-2.svg" />
              </div>
          </div>


          <div class="md:pt-24 poppins">
              <div class="max-w-7xl md:mx-auto mx-4 text-center pb-12">
                  <div
                      class="text-3xl sm:text-5xl lg:text-6xl leading-none font-extrabold text-gray-900 tracking-tight mb-8 relative">
                      <h1><mark>Shiny Features</mark></h1>
                  </div>
                  <div
                      class="grid gap-y-4 grid-rows-auto md:grid-rows-auto-2 grid-cols-1 md:grid-cols-2 mx-auto max-w-sm md:max-w-4xl pt-10">
                      <div class="border-b-2 md:border-b-0 md:border-r-2 border-dotted border-blue-500 pb-32"></div>
                  </div>

                  <div class="block justify-between max-w-5xl mx-auto mt-10 relative">
                      <div class="bg-white rounded-2xl w-full inline-block align-top text-left py-6 px-6 md:mx-4"
                          style="box-shadow: rgba(57, 47, 86, 0.08) 0px 4px 64px 20px; max-width: 445px;"><img
                              src="/images/home/ui-dashboard.PNG">
                          <h3
                              class="mb-4 mt-4 text-2xl font-extrabold tracking-tight text-center text-gray-800 md:leading-tight sm:text-left md:text-3xl">
                              <mark>Clean</mark> & <mark>Elegant</mark> UI.
                          </h3>
                          <p class="text-gray-500 text-md font-medium">
                              We really care about the user experience and how the product looks. So we carefully
                              crafted a clean and modern UI that is both good looking and easy to the eye.
                          </p>
                      </div>
                      <div class="bg-white rounded-2xl w-full inline-block align-top text-left px-6 mt-10 md:mt-64 pt-12 pb-6 md:mx-4"
                          style="box-shadow: rgba(57, 47, 86, 0.08) 0px 4px 64px 20px; max-width: 445px;"><img
                              src="images/home/writing-en.PNG">
                          <h3
                              class="mb-4 mt-4 text-2xl font-extrabold tracking-tight text-center text-gray-800 md:leading-tight sm:text-left md:text-3xl">
                              <mark>Powerful</mark> & <mark>Easy to use</mark> writing System.
                          </h3>
                          <p class="text-gray-500 text-md font-medium">
                              Love to write all day? Next to our elegant and easy to use UI you can use a powerful writing
                              system to
                              write all
                              your stories,journals,blogs or anything you want.
                          </p>
                      </div>
                      <div class="bg-white rounded-2xl w-full inline-block align-top text-left mt-10 md:mt-0 py-6 px-6 md:mx-4"
                          style="box-shadow: rgba(57, 47, 86, 0.08) 0px 4px 64px 20px; max-width: 445px;"><img
                              src="/images/home/writing.PNG">
                          <h3
                              class="mb-4 mt-4 text-2xl font-extrabold tracking-tight text-center text-gray-800 md:leading-tight sm:text-left md:text-3xl">
                              <mark>Dhivehi</mark> Support.
                          </h3>
                          <p class="text-gray-500 text-md font-medium">
                              Want to write in dhivehi? Oh boy we have dhivehi writing support as well.
                          </p>
                      </div>
                      <div class="bg-white rounded-2xl w-full inline-block align-top text-left px-6 mt-10 md:mt-64 pt-12 pb-6 md:mx-4"
                          style="box-shadow: rgba(57, 47, 86, 0.08) 0px 4px 64px 20px; max-width: 445px;"><img
                              src="/images/home/place-on-the-web.PNG">
                          <h3
                              class="mb-4 mt-4 text-2xl font-extrabold tracking-tight text-center text-gray-800 md:leading-tight sm:text-left md:text-3xl">
                              A <mark>home</mark> for you on the <mark>web</mark>.
                          </h3>
                          <p class="text-gray-500 text-md font-medium">
                              All our user's get a beautiful blog page that lists all of the writings published. So you can
                              share
                              with your
                              friends.
                          </p>
                      </div>

                      <div class="bg-white rounded-2xl w-full inline-block align-top text-left mt-5 md:mt-0 py-6 px-6 md:mx-4"
                          style="box-shadow: rgba(57, 47, 86, 0.08) 0px 4px 64px 20px; max-width: 445px;"><img
                              src="/images/home/rendered-content.PNG">
                          <h3
                              class="mb-4 mt-4 text-2xl font-extrabold tracking-tight text-center text-gray-800 md:leading-tight sm:text-left md:text-3xl">
                              <mark>Beautifully</mark> rendered content.
                          </h3>
                          <p class="text-gray-500 text-md font-medium">
                              Get Beautiful & easy to read rendered content for your readers.
                          </p>
                      </div>

                      <div class="bg-white rounded-2xl w-full inline-block align-top text-left px-6 mt-10 md:mt-64 pt-12 pb-6 md:mx-4"
                          style="box-shadow: rgba(57, 47, 86, 0.08) 0px 4px 64px 20px; max-width: 445px;"><img
                              src="/images/home/schedule.PNG">
                          <h3
                              class="mb-4 mt-4 text-2xl font-extrabold tracking-tight text-center text-gray-800 md:leading-tight sm:text-left md:text-3xl">
                              Content <mark>Scheduling</mark>.
                          </h3>
                          <p class="text-gray-500 text-md font-medium">
                              You can set the publish date to a future date and the writing will be scheduled. It will
                              publish your
                              writing
                              exactly when you want it to
                          </p>
                      </div>


                  </div>
              </div>
          </div>

    {{--
          <div class="my-16 md:my-32 poppins">
              <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                  <div class="max-w-4xl mx-auto text-center">
                      <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                          Write.mv stats
                      </h2>
                      <p class="mt-3 text-xl text-gray-500 sm:mt-4">
                          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellendus repellat laudantium.
                      </p>
                  </div>
              </div>
              <div class="mt-10 pb-12 sm:pb-16">
                  <div class="relative">
                      <div class="absolute inset-0 h-1/2 bg-gray-50"></div>
                      <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                          <div class="max-w-4xl mx-auto">
                              <dl class="rounded-lg bg-white shadow-lg sm:grid sm:grid-cols-3">
                                  <div
                                      class="flex flex-col border-b border-gray-100 p-6 text-center sm:border-0 sm:border-r">
                                      <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">
                                          Blogs
                                      </dt>
                                      <dd class="order-1 text-5xl font-extrabold text-blue-600">
                                          200
                                      </dd>
                                  </div>
                                  <div
                                      class="flex flex-col border-t border-b border-gray-100 p-6 text-center sm:border-0 sm:border-l sm:border-r">
                                      <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">
                                          Users
                                      </dt>
                                      <dd class="order-1 text-5xl font-extrabold text-blue-600">
                                          1000
                                      </dd>
                                  </div>
                                  <div
                                      class="flex flex-col border-t border-gray-100 p-6 text-center sm:border-0 sm:border-l">
                                      <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">
                                          Publications
                                      </dt>
                                      <dd class="order-1 text-5xl font-extrabold text-blue-600">
                                          100k
                                      </dd>
                                  </div>
                              </dl>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

 --}}

  {{--
          <div class="my-16 md:my-32 poppins">
              <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
                  <div class="px-6 py-6 bg-blue-500 rounded-lg md:py-12 md:px-12 lg:py-12 lg:px-12 xl:flex xl:items-center">
                      <div class="xl:w-0 xl:flex-1">
                          <div class="mb-3 text-xl leading-9 font-semibold text-white md:text-2xl">
                              Want more? We will be releasing a pro version of writemv really soon.
                          </div>
                          <p class="text-lg text-blue-200">
                              Sign up for our newsletter to stay up to date.
                          </p>
                      </div>
                      <div class="mt-8 sm:w-full sm:max-w-md xl:mt-0 xl:ml-8">
                          <form class="mb-3 sm:flex" aria-labelledby="newsletter-headline" action="" method="post"
                              id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" novalidate="">
                              <input name="EMAIL" aria-label="Email address" type="email" required=""
                                  class="appearance-none w-full px-5 py-3 border border-transparent text-base leading-6 rounded text-gray-900 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 transition duration-150 ease-in-out"
                                  placeholder="Enter your email">

                              <div class="mt-3 rounded-md sm:mt-0 sm:ml-3 sm:flex-shrink-0">
                                  <button type="submit" name="subscribe" id="mc-embedded-subscribe"
                                      class="w-full flex items-center justify-center px-5 py-3 border-2 border-transparent text-base font-medium rounded text-blue-500 bg-white hover:text-blue-600 focus:outline-none focus:border-blue-400 focus:text-blue-400 transition-colors duration-200">
                                      Subscribe
                                  </button>
                              </div>
                          </form>

                      </div>
                  </div>
              </div>

              --}}

              <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8 poppins text-center mb-10">
              <h1 class="mb-4 text-3xl leading-tight font-display font-bold md:leading-tight md:text-5xl lg:mb-8">
                Need to share a dhivehi snippet? head over to 
                <a href="https://paste.write.mv" class="hover:underline"><mark>paste.write.mv</mark></a>
            </h1>
              </div>
          </div>
      @endsection
