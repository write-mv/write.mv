<div>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           
            </h2>
            <a
            href="{{route('posts')}}"
            class="inline-flex items-center justify-center px-4 py-2 border border-transparent font-medium rounded-md text-blue-700 bg-blue-100 hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:text-sm">
            <x-heroicon-o-arrow-narrow-left class="w-3 h-3 mr-1 text-blue-500" />
            Back
        </a>
            </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
<main class="pb-8">
    <form>
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
       <div class="mb-2 flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add New Post
            </h2>

            <div class="flex items-center">
            <button type="submit" class="ml-3 inline-flex justify-center items-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-gray-600 bg-white hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <x-heroicon-o-eye class="text-gray-600 h-5 w-5 mr-2" />
                <span>Preview</span>
            </button>
          <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            Save
          </button>

            </div>
       </div>
      <!-- Main 3 column grid -->
      <div class="grid grid-cols-1 gap-4 items-start lg:grid-cols-3 lg:gap-8">
        <!-- Left column -->
        <div class="grid grid-cols-1 gap-4 lg:col-span-2">
          <section aria-labelledby="section-1-title">
            <div class="rounded-lg bg-white">
              <div class="p-6">
              
                    <div class="col-span-6 sm:col-span-2">
                        <label for="location" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text"  name="title" id="title"  class="focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm text-xl rounded-md border-gray-300 heading-dhivehi thaana-keyboard" dir="rtl">
                      </div>

                      <div class="col-span-6 sm:col-span-2 mt-3">
                        <div class="mt-2">
                            <label for="location" class="block text-sm font-medium text-gray-700">Excerpt</label>
                          <textarea id="excerpt" name="excerpt" rows="3" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full text-md rounded-md border-gray-300 para-dhivehi thaana-keyboard" dir="rtl"></textarea>
                        </div>
                      </div>

                      <div class="col-span-6 sm:col-span-2 mt-3">
                        <div class="border-b border-gray-200 mb-5">
                            <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                
                          <a href="#" class="border-blue-500 text-blue-600 group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm" aria-current="page">
                              <x-heroicon-o-document-text class="text-blue-500 -ml-0.5 mr-2 h-5 w-5" />
                            <span>Content</span>
                          </a>
                              <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm">
                    <x-heroicon-o-code class="text-gray-400 group-hover:text-gray-500 -ml-0.5 mr-2 h-5 w-5" />
                                <span>Meta</span>
                              </a>
                            
                             
                            </nav>
                          </div>

                          {{json_encode($content)}}

                          <x-form.editor model="content" />
                          
                 
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
                <div class="col-span-6 sm:col-span-2">
                    <label for="post_as" class="block text-sm font-medium text-gray-700">Post as</label>
                    <select id="post_as" name="post_as" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-blue-500 sm:text-sm rounded-md">
                      <option value="anonymous">Anonymous</option>
                      <option selected>{{auth()->user()->name}}</option>
                    </select>
                  </div>

                  <div class="col-span-6 sm:col-span-2 mt-3">
                    <label for="location" class="block text-sm font-medium text-gray-700">Published Date</label>
                   <x-form.date-picker />
                  </div>

                  <div class="col-span-6 sm:col-span-2 mt-3">
                    <label for="location" class="block text-sm font-medium text-gray-700">Publish?</label>

                    <button type="button" class="mt-3 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 bg-gray-200" x-data="{ on: false }" aria-pressed="false" :aria-pressed="on.toString()" @click="on = !on" x-state:on="Enabled" x-state:off="Not Enabled" :class="{ 'bg-blue-600': on, 'bg-gray-200': !(on) }">
                        <span class="pointer-events-none relative inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200 translate-x-0" x-state:on="Enabled" x-state:off="Not Enabled" :class="{ 'translate-x-5': on, 'translate-x-0': !(on) }">
                          <span class="absolute inset-0 h-full w-full flex items-center justify-center transition-opacity opacity-100 ease-in duration-200" aria-hidden="true" x-state:on="Enabled" x-state:off="Not Enabled" :class="{ 'opacity-0 ease-out duration-100': on, 'opacity-100 ease-in duration-200': !(on) }">
                            <svg class="bg-white h-3 w-3 text-gray-400" fill="none" viewBox="0 0 12 12">
                              <path d="M4 8l2-2m0 0l2-2M6 6L4 4m2 2l2 2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                          </span>
                          <span class="absolute inset-0 h-full w-full flex items-center justify-center transition-opacity opacity-0 ease-out duration-100" aria-hidden="true" x-state:on="Enabled" x-state:off="Not Enabled" :class="{ 'opacity-100 ease-in duration-200': on, 'opacity-0 ease-out duration-100': !(on) }">
                            <svg class="bg-white h-3 w-3 text-blue-600" fill="currentColor" viewBox="0 0 12 12">
                              <path d="M3.707 5.293a1 1 0 00-1.414 1.414l1.414-1.414zM5 8l-.707.707a1 1 0 001.414 0L5 8zm4.707-3.293a1 1 0 00-1.414-1.414l1.414 1.414zm-7.414 2l2 2 1.414-1.414-2-2-1.414 1.414zm3.414 2l4-4-1.414-1.414-4 4 1.414 1.414z"></path>
                            </svg>
                          </span>
                        </span>
                      </button>
                  </div>

                  <div class="col-span-6 sm:col-span-2 mt-3">
                    <label for="location" class="block text-sm font-medium text-gray-700">Show Author?</label>

                    <button type="button" class="mt-3 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 bg-gray-200" x-data="{ on: false }" aria-pressed="false" :aria-pressed="on.toString()" @click="on = !on" x-state:on="Enabled" x-state:off="Not Enabled" :class="{ 'bg-blue-600': on, 'bg-gray-200': !(on) }">
                        <span class="pointer-events-none relative inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200 translate-x-0" x-state:on="Enabled" x-state:off="Not Enabled" :class="{ 'translate-x-5': on, 'translate-x-0': !(on) }">
                          <span class="absolute inset-0 h-full w-full flex items-center justify-center transition-opacity opacity-100 ease-in duration-200" aria-hidden="true" x-state:on="Enabled" x-state:off="Not Enabled" :class="{ 'opacity-0 ease-out duration-100': on, 'opacity-100 ease-in duration-200': !(on) }">
                            <svg class="bg-white h-3 w-3 text-gray-400" fill="none" viewBox="0 0 12 12">
                              <path d="M4 8l2-2m0 0l2-2M6 6L4 4m2 2l2 2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                          </span>
                          <span class="absolute inset-0 h-full w-full flex items-center justify-center transition-opacity opacity-0 ease-out duration-100" aria-hidden="true" x-state:on="Enabled" x-state:off="Not Enabled" :class="{ 'opacity-100 ease-in duration-200': on, 'opacity-0 ease-out duration-100': !(on) }">
                            <svg class="bg-white h-3 w-3 text-blue-600" fill="currentColor" viewBox="0 0 12 12">
                              <path d="M3.707 5.293a1 1 0 00-1.414 1.414l1.414-1.414zM5 8l-.707.707a1 1 0 001.414 0L5 8zm4.707-3.293a1 1 0 00-1.414-1.414l1.414 1.414zm-7.414 2l2 2 1.414-1.414-2-2-1.414 1.414zm3.414 2l4-4-1.414-1.414-4 4 1.414 1.414z"></path>
                            </svg>
                          </span>
                        </span>
                      </button>
                  </div>
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
