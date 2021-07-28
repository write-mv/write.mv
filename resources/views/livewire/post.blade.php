<div>
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <main class="pb-8">
                <form wire:submit.prevent="save">
                    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                        <div class="mb-2 flex justify-between">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight poppins dark:text-gray-200">
                                {{ $label }}
                            </h2>

                            <div class="flex items-center">
                                <div class="col-span-6 sm:col-span-2 mt-3">
                                    <label
                                        class="block text-sm text-gray-700 dark:text-gray-200 poppins font-normal">Language:
                                        <span
                                            class="font-semibold">{{ $post->is_english ? 'English' : 'Dhivehi' }}</span></label>
                                    <x-form.toggle model="post.is_english" />

                                </div>
                                <button type="submit" wire:loading.attr="disabled"
                                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 poppins">
                                    <div wire:loading wire:target="save">
                                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                                stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor"
                                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                            </path>
                                        </svg>
                                    </div>
                                    Save
                                </button>

                            </div>
                        </div>
                        <!-- Main 3 column grid -->
                        <div class="grid grid-cols-1 gap-4 items-start lg:grid-cols-3 lg:gap-8">
                            <!-- Left column -->
                            <div class="grid grid-cols-1 gap-4 lg:col-span-2">
                                <section aria-labelledby="section-1-title">
                                    <div class="rounded-lg bg-white dark:bg-gray-900">
                                        <div class="p-6">

                                            <div class="col-span-6 sm:col-span-2">
                                                <label for="title"
                                                    class="block text-sm font-medium text-gray-700 dark:text-gray-200 poppins">Title</label>
                                                <input type="text" name="title" id="title" wire:model.lazy="post.title"
                                                    class="focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm text-xl rounded-md dark:bg-gray-300 border-gray-300 {{ $post->is_english ? '' : 'heading-dhivehi thaana-keyboard' }}"
                                                    {{ $post->is_english ? '' : 'dir=rtl' }}>
                                                @error('post.title') <p class="mt-2 text-sm text-red-600">
                                                    {{ $message }}</p> @enderror
                                            </div>


                                            <div class="col-span-6 sm:col-span-2 mt-3">
                                                <label for="slug"
                                                    class="block text-sm font-medium text-gray-700 dark:text-gray-200 poppins">Slug</label>
                                                <input type="text" name="slug" id="slug" wire:model.lazy="post.slug"
                                                    class="focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm text-xl rounded-md dark:bg-gray-300 border-gray-300"
                                                    required>
                                                @error('post.slug') <p class="mt-2 text-sm text-red-600">
                                                    {{ $message }}</p> @enderror
                                            </div>

                                            <div class="col-span-6 sm:col-span-2 mt-3">
                                                <div class="mt-2">
                                                    <label for="location"
                                                        class="block text-sm font-medium text-gray-700 dark:text-gray-200 poppins">Excerpt</label>
                                                    <textarea id="excerpt" name="excerpt" wire:model.lazy="post.excerpt"
                                                        rows="5"
                                                        class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full text-md rounded-md dark:bg-gray-300 border-gray-300 {{ $post->is_english ? '' : 'para-dhivehi thaana-keyboard' }}"" {{ $post->is_english ? '' : 'dir=rtl' }}></textarea>
                            @error('post.excerpt') <p class=" mt-2 text-sm
                                                        text-red-600">{{ $message }}</p> @enderror
                        </div>
                      </div>
                      <div class=" col-span-6 sm:col-span-2 mt-3">
                        <div class="border-b border-gray-200 mb-5">
                            <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                
                          <a href="#" class="border-blue-500 text-blue-600 group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm poppins" aria-current="page">
                              <x-heroicon-o-document-text class="text-blue-500 -ml-0.5 mr-2 h-5 w-5" />
                            <span>Content</span>
                          </a>
                              <a href="#" wire:click="$set('showMetaModal', true)" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm poppins">
                    <x-heroicon-o-code class="text-gray-400 group-hover:text-gray-500 -ml-0.5 mr-2 h-5 w-5" />
                                <span>Meta</span>
                              </a>
                            
                             
                            </nav>
                          </div>
                       <x-form.editor wire:model="post.content" />
                        @error('post.content') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

               
              </div>
            </div>
          </section>
        </div>

        <!-- Right column -->
        <div class="grid grid-cols-1 gap-4">
          <section aria-labelledby="section-2-title">
            <div class="rounded-lg bg-white dark:bg-gray-900 overflow-hidden">
              <div class="p-6">
                <div class="col-span-6 sm:col-span-2">
                    <label for="post_as" class="block text-sm font-medium text-gray-700 dark:text-gray-200 poppins">Post as</label>
                    <select id="post_as" wire:model="post.display_name" name="post_as" class="block w-full pl-3 pr-10 py-2 text-base dark:bg-gray-300 border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-blue-500 sm:text-sm rounded-md mt-2">
                      <option value="{{ auth()->user()->name }}">{{ auth()->user()->name }}</option>
                      <option value="anonymous">Anonymous</option>
                    </select>
                    @error('post.display_name') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                  </div>

                  <div class="col-span-6 sm:col-span-2 mt-3">
                    <label for="location" class="block text-sm font-medium text-gray-700 dark:text-gray-200  poppins mb-2">Published Date</label>
                   <x-form.date-picker wire:model="post.published_date" />
                   @error('post.published_date') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                  </div>

                  <div class="col-span-6 sm:col-span-2 mt-3">
                    <label for="location" class="block text-sm font-medium text-gray-700 dark:text-gray-200 poppins">Publish?</label>
                   <x-form.toggle model="post.published" />
                   @error('post.published') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                  </div>

                  <div class="col-span-6 sm:col-span-2 mt-3">
                    <label for="show_author" class="block text-sm font-medium text-gray-700 dark:text-gray-200 poppins">Show Author?</label>
                    <x-form.toggle model="post.show_author" />
                    @error('post.show_author') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                  </div>
              </div>
            </div>
          </section>

          <section aria-labelledby="section-2-title">
            <div class="rounded-lg bg-white dark:bg-gray-900">
              <div class="p-6">
                <div class="col-span-6 sm:col-span-2">
                    <label for="featured_image" class="block text-sm font-medium text-gray-700  dark:text-gray-200 poppins mb-2">Featured Image</label>
                    @if ($upload)
                    <img class="mt-2 rounded-2xl border border-gray-100 dark:border-gray-700 mb-3" src="{{ $upload->temporaryUrl() }}" alt="Featured Image">
          @elseif($post->featured_image)
                <div class="flex justify-end">
                  <a wire:click="removeFeaturedImage('{{ $post->featured_image }}')" class="cursor-pointer w-4 mr-2 transform hover:text-red-600 hover:scale-110">
                  <x-heroicon-o-trash class="w-6 h-6 mr-1 text-red-500" />
                  </a>
                </div>
                  <img class="mt-2 rounded-2xl border border-gray-100 dark:border-gray-700 mb-3" src="{{ $post->featuredImageUrl() }}" alt="Featured Image">
           @else
                   @endif

                    <x-input.filepond wire:model="upload" />
                    @error('upload') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                  </div>

                  <div class="col-span-6 sm:col-span-2">
                    <label for="featured_image_caption" class="block text-sm font-medium text-gray-700 dark:text-gray-200 poppins mb-2">Image Caption</label>
                    <input type="text" name="featured_image_caption" id="featured_image_caption" wire:model.lazy="post.featured_image_caption" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-blue-500 sm:text-sm rounded-md dark:bg-gray-300">
                  @error('post.featured_image_caption') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                  </div>

                  {{-- 
                  <div class="col-span-6 sm:col-span-2 mt-3">
                    <label for="tags" class="block text-sm font-medium text-gray-700 dark:text-gray-200 poppins mb-2">Tags</label>
                    <x-multiselect
                    trackBy="id"
                    placeholder="Select a tag"
                    wire:model="tags"
                    :options="$AvailableTags"
                />
                  </div>
                  --}}

           
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
      <x-modal.dialog wire:model.defer="showMetaModal">
          <x-slot name="title">Meta informations</x-slot>

          <x-slot name="content">
              <div class="col-span-6 sm:col-span-2">
                <label for="meta_title" class="block text-sm font-medium text-gray-700 poppins">Title</label>
                <input type="text" name="meta_title" id="meta_title" wire:model.lazy="post.meta.title" class="mt-2 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm text-xl rounded-md border-gray-300">
                @error('post.meta.title') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
              </div>
              <div class="col-span-6 sm:col-span-2 mt-3">
                <label for="description" class="block text-sm font-medium text-gray-700 poppins">Description</label>
                <textarea id="meta_description" name="meta_description" wire:model.lazy="post.meta.description" rows="5" class="mt-2 shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full text-md rounded-md border-gray-300"></textarea>
                                                    @error('post.meta.description') <p
                                                            class=" mt-2 text-sm text-red-600">{{ $message }}</p>
                                                    @enderror
                                                </div>


                                                </x-slot>

                                                <x-slot name="footer">
                                                    <a wire:click="$set('showMetaModal', false)"
                                                        class="ml-3 cursor-pointer inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 poppins">
                                                        Done
                                                    </a>

                                                </x-slot>
                                                </x-modal.dialog>
                </form>
            </main>

        </div>
    </div>
</div>
<!-- <script src="/js/thaana-keyboard.min.js"></script> -->
