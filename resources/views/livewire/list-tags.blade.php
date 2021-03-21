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

                    <a href="{{route('posts.new')}}"
                        class="inline-flex items-center justify-center border border-transparent rounded-md py-2 px-5 text-sm font-base text-white focus:ring-2 focus:ring-offset-2 focus:outline-none transition ease-in-out duration-150 bg-blue-600 hover:bg-blue-700 disabled:bg-blue-400 focus:ring-blue-500 poppins">
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
                    <x-action-dropdown>
                        <x-slot name="icon">
                            Sort
                          <x-heroicon-s-filter class="h-5 w-5" />
                        </x-slot>
                          <a href="#"
                              class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 poppins"
                              role="menuitem">Most posts</a>
                          <a href="#" 
                              class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 poppins"
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
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($tags as $tag)
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
                                    <x-action-dropdown >
                                      <x-slot name="icon">
                                        <x-heroicon-s-dots-vertical class="h-5 w-5" />
                                      </x-slot>
                
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 poppins"
                                            role="menuitem">Edit tag</a>
                                        <a href="#" 
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 poppins"
                                            role="menuitem">Delete tag</a>
                                    </x-action-dropdown>
    
                                </div>
                            </td>
                          </tr>
              
                        @endforeach
                    
                    
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

    </main>
</div>