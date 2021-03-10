<div>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add New Post
            </h2>
            <a
            href="{{route('posts')}}"
            class="inline-flex items-center justify-center px-4 py-2 border border-transparent font-medium rounded-md text-blue-700 bg-blue-100 hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:text-sm">
            Back
            <x-heroicon-o-arrow-narrow-left class="w-3 h-3 ml-1 text-blue-500" />
        </a>
            </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
<main class="pb-8">
    <form>
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
      <!-- Main 3 column grid -->
      <div class="grid grid-cols-1 gap-4 items-start lg:grid-cols-3 lg:gap-8">
        <!-- Left column -->
        <div class="grid grid-cols-1 gap-4 lg:col-span-2">
          <section aria-labelledby="section-1-title">
            <div class="rounded-lg overflow-hidden">
              <div class="p-6">
              
                    <div class="col-span-6 sm:col-span-2">
                        <input type="text"  name="title" id="title" placeholder="Title" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm rounded-sm border-none">
                      </div>

                      <div class="col-span-6 sm:col-span-2 mt-3">
                        <div class="mt-">
                          <textarea id="excerpt" name="excerpt" rows="3" class="shadow-sm focus:ring-blue-500 border-none focus:border-blue-500 block w-full sm:text-sm rounded-sm" placeholder="Excerpt..."></textarea>
                        </div>
                        <p class="mt-2 text-sm text-gray-500">
                          Brief description of your blog.
                        </p>
                      </div>

                      
               
              </div>
            </div>
          </section>
        </div>

        <!-- Right column -->
        <div class="grid grid-cols-1 gap-4">
          <section aria-labelledby="section-2-title">
            <div class="rounded-lg bg-white overflow-hidden">
              <div class="p-6">
                <!-- Your content -->
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
</form>
  </main>

        </div>
    </div>
</div>
