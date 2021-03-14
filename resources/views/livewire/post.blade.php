<div>
  <x-slot name="header">
    <div class="flex items-center">
      <nav class="flex" aria-label="Breadcrumb">
        <ol class="flex items-center space-x-4">
          <li>
            <div class="flex items-center">
              <a href="{{route('posts')}}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Posts</a>
            </div>
          </li>
          <li>
            <div class="flex items-center">
              <!-- Heroicon name: solid/chevron-right -->
              <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                  clip-rule="evenodd" />
              </svg>
              <p class="ml-4 text-sm font-medium text-gray-500">{{$label}}</p>
            </div>
          </li>
        </ol>
      </nav>
    </div>
  </x-slot>

  <div class="py-12">
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
      <main class="pb-8">
        <form wire:submit.prevent="save">
          <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
            <div class="mb-2 flex justify-between">
              <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{$label}}
              </h2>

              <div class="flex items-center">
                <div class="col-span-6 sm:col-span-2 mt-3">
                  <label for="location" class="block text-sm font-medium text-gray-700">Language: <span
                      class="font-semibold">{{$is_english ? "English" : "Dhivehi"}}</span></label>
                  <x-form.toggle model="is_english" />

                </div>
                <button type="submit"
                  class="ml-3 inline-flex justify-center items-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-gray-600 bg-white hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                  <x-heroicon-o-eye class="text-gray-600 h-5 w-5 mr-2" />
                  <span>Preview</span>
                </button>
                <button type="submit"
                  class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
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
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" name="title" id="title" wire:model.lazy="title"
                          class="focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm text-xl rounded-md border-gray-300 {{$is_english ? "" : "heading-dhivehi thaana-keyboard"}}"
                          {{$is_english ? "" : "dir=rtl"}}>
                        @error('title') <p class="mt-2 text-sm text-red-600">{{$message}}</p> @enderror
                      </div>


                      <div class="col-span-6 sm:col-span-2 mt-3">
                        <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                        <input type="text" name="slug" id="slug" wire:model.lazy="slug"
                          class="focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm text-xl rounded-md border-gray-300"
                          required>
                        @error('slug') <p class="mt-2 text-sm text-red-600">{{$message}}</p> @enderror
                      </div>

                      <div class="col-span-6 sm:col-span-2 mt-3">
                        <div class="mt-2">
                          <label for="location" class="block text-sm font-medium text-gray-700">Excerpt</label>
                          <textarea id="excerpt" name="excerpt" wire:model.lazy="excerpt" rows="5"
                            class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full text-md rounded-md border-gray-300 {{$is_english ? "" : "para-dhivehi thaana-keyboard"}}"" {{$is_english ? "" : "dir=rtl"}}></textarea>
                            @error('excerpt') <p class=" mt-2 text-sm text-red-600">{{$message}}</p> @enderror
                        </div>
                      </div>

                      <div class=" col-span-6 sm:col-span-2 mt-3">
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
                       <x-form.editor model="content" :value="$post ? json_encode($post->content) : null"  />
                        @error('content') <p class="mt-2 text-sm text-red-600">{{$message}}</p> @enderror
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
                    <select id="post_as" wire:model="display_name" name="post_as" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-blue-500 sm:text-sm rounded-md">
                      <option value="{{auth()->user()->name}}">{{auth()->user()->name}}</option>
                      <option value="anonymous">Anonymous</option>
                    </select>
                    @error('display_name') <p class="mt-2 text-sm text-red-600">{{$message}}</p> @enderror
                  </div>

                  <div class="col-span-6 sm:col-span-2 mt-3">
                    <label for="location" class="block text-sm font-medium text-gray-700">Published Date</label>
                   <x-form.date-picker wire:model.lazy="published_date" />
                   @error('published_date') <p class="mt-2 text-sm text-red-600">{{$message}}</p> @enderror
                  </div>

                  <div class="col-span-6 sm:col-span-2 mt-3">
                    <label for="location" class="block text-sm font-medium text-gray-700">Publish?</label>
                   <x-form.toggle model="published" />
                   @error('published') <p class="mt-2 text-sm text-red-600">{{$message}}</p> @enderror
                  </div>

                  <div class="col-span-6 sm:col-span-2 mt-3">
                    <label for="show_author" class="block text-sm font-medium text-gray-700">Show Author?</label>
                    <x-form.toggle model="show_author" />
                    @error('show_author') <p class="mt-2 text-sm text-red-600">{{$message}}</p> @enderror
                  </div>
              </div>
            </div>
          </section>

          <section aria-labelledby="section-2-title">
            <div class="rounded-lg bg-white overflow-hidden">
              <div class="p-6">
                <div class="col-span-6 sm:col-span-2">
                    <label for="featured_image" class="block text-sm font-medium text-gray-700">Featued Image</label>
            
                  </div>

                  <div class="col-span-6 sm:col-span-2">
                    <label for="featured_image_caption" class="block text-sm font-medium text-gray-700">Image Caption</label>
                    <input type="text" name="featured_image_caption" id="title" wire:model.lazy="featured_image_caption" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-blue-500 sm:text-sm rounded-md">
                  @error('featured_image_caption') <p class="mt-2 text-sm text-red-600">{{$message}}</p> @enderror
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
<!-- <script src="/js/thaana-keyboard.min.js"></script> -->