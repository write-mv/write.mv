<div>
    <main class="max-w-screen-lg mx-auto py-16 px-4 sm:px-6 poppins">
        <div class="space-y-8">
            <div>
                <div class="text-sm text-light text-gray-500">
                    Here's the tags you created so far
                </div>
                <div class="mt-2 flex items-center justify-between">
                    <h1 class="font-bold text-2xl leading-10 poppins">
                        Your tags
                    </h1>

                    <a wire:click="create"
                        class="cursor-pointer inline-flex items-center justify-center border border-transparent rounded-md py-2 px-5 text-sm font-base text-white focus:ring-2 focus:ring-offset-2 focus:outline-none transition ease-in-out duration-150 bg-blue-600 hover:bg-blue-700 disabled:bg-blue-400 focus:ring-blue-500 poppins">
                        <x-heroicon-o-plus class="inline-block w-5 h-5" />
                        New tag
                    </a>
                </div>

                <div class="flex justify-between mt-5">

                <div class="relative text-gray-600 mt-2">
                    <input type="search" wire:model="search" name="search" placeholder="Search tags..."
                        class="bg-white h-10 px-5 pr-10 rounded-full text-sm focus:outline-none border-none">
                </div>

                <div>
                    <x-action-dropdown wire:key="dropdown-sort">
                        <x-slot name="icon">
                            Sort
                          <x-heroicon-s-filter class="h-5 w-5" />
                        </x-slot>
                          <a wire:click="$set('sort', 'desc')"
                              class="cursor-pointer block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 poppins"
                              role="menuitem">Most posts</a>
                          <a wire:click="$set('sort', 'asc')"
                              class="cursor-pointer block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 poppins"
                              role="menuitem">Fewer posts</a>
                              
                      </x-action-dropdown>

                </div>

                </div>
            </div>
        </div>

        <div class="flex flex-col mt-5">
            <div class="-my-2 sm:-mx-6 lg:-mx-8">
              <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="sm:rounded-lg">
                  <table class="min-w-full divide-y divide-gray-200">
                    @if($tags->total() > 0)
                    <thead class="bg-gray-50">
                      <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Tags
                        </th>

                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                          <span class="sr-only">Edit</span>
                        </th>
                      </tr>
                    </thead>
                    @endif
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($tags as $tag)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-{{$colors[array_rand($colors)]}}-100 text-{{$colors[array_rand($colors)]}}-800">
                                    {{$tag->name}}
                                  </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                              {{$tag->posts_count}} post belongs to this tag
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm">
                                <div class="flex items-center gap-2">
                                    <x-action-dropdown wire:key="dropdown-{{ $tag->id }}">
                                      <x-slot name="icon">
                                        <x-heroicon-s-dots-vertical class="h-5 w-5" />
                                      </x-slot>
                
                                        <a  wire:click="edit({{$tag->id}})"
                                            class="cursor-pointer block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 poppins"
                                            role="menuitem">Edit tag</a>
                                        <a wire:click="openDeleteModal({{$tag->id}})""
                                            class="cursor-pointer block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 poppins"
                                            role="menuitem">Delete tag</a>
                                    </x-action-dropdown>
    
                                </div>
                            </td>
                          </tr>
              
                          @empty

                    <div class="flex justify-start items-center">
                        <x-heroicon-o-tag class="w-10 h-10 mr-1 text-gray-400" />
                        <span class="font-medium py-8 text-gray-400 text-xl poppins">No tags found.</span>
                    </div>

                    @endforelse
                    
                    
                    </tbody>
                  </table>
                </div>
                @if($tags->total() > 0 && $tags->count() < $tags->total())
                <div class="mt-2 ml-1 poppins">
                    <a class="cursor-pointer text-gray-700 hover:underline" wire:click="load">Load more</a>
                </div>
                @endif
              </div>
            </div>
          </div>

    </main>

    <form wire:submit.prevent="save">
      <x-modal.dialog wire:model.defer="showEditModal">
          <x-slot name="title">{{$label}}</x-slot>
          <x-slot name="content">
            <div class="p-6">

              <div class="col-span-6 sm:col-span-2">
                <label for="name" class="block text-sm font-medium text-gray-700 poppins">Name</label>
                <input type="text" name="name" id="name" wire:model.lazy="editing.name"
                  class="mt-2 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm text-xl rounded-md border-gray-300">
                @error('editing.name') <p class="mt-2 text-sm text-red-600">{{$message}}</p> @enderror
              </div>


              <div class="col-span-6 sm:col-span-2 mt-3">
                <label for="slug" class="block text-sm font-medium text-gray-700 poppins">Slug</label>
                <input type="text" name="slug" id="slug" wire:model.lazy="editing.slug"
                  class="mt-2 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm text-xl rounded-md border-gray-300"
                  required>
                @error('editing.slug') <p class="mt-2 text-sm text-red-600">{{$message}}</p> @enderror
              </div>

            </div>
          </x-slot>

          <x-slot name="footer">
            <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
              <button type="submit"
                  class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                  <div class="ml-3" wire:loading wire:target="save">
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                </div>
                  Save
              </button>
              <button wire:click="$set('showEditModal', false)" type="button"
                  class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:w-auto sm:text-sm">
                  Cancel
              </button>
          </div>
          </x-slot>
      </x-modal.dialog>
  </form>

  <x-modal.confirmation wire:model.defer="showConfirmModal">
    <x-slot name="title">Delete tag</x-slot>
    <x-slot name="content">


        <div class="mt-2">
            <p class="text-sm text-gray-500">
                Are you sure you want to remove this tag?
            </p>
        </div>

    </x-slot>

    <x-slot name="footer">
        <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
            <button wire:click="destroy" type="button"
                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                Delete
            </button>
            <button wire:click="$set('showConfirmModal', false)" type="button"
                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:w-auto sm:text-sm">
                Cancel
            </button>
        </div>
    </x-slot>
</x-modal.confirmation>
</div>