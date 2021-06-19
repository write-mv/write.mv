<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-5">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight poppins">
                    Customize {{ $blog->name }}'s blog
                </h2>
            </div>
            <div class="space-y-6">
                <div class="bg-white dark:bg-gray-900 shadow px-4 py-5 sm:rounded-lg sm:p-6">
                    <div class="md:col-span-1 mb-8">
                        <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-200 poppins">Blog Information</h3>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400 poppins font-normal">
                            This information will be displayed publicly so be careful what you share.
                        </p>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form class="space-y-6" wire:submit.prevent="save">
                            <div class="grid grid-cols-3 gap-6">

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="site_title" class="block text-sm font-medium text-gray-700 dark:text-gray-200 poppins">Site
                                        Title</label>
                                    <input type="text" wire:model.lazy="blog.site_title" name="site_title"
                                        id="site_title" autocomplete="given-name"
                                        class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md dark:bg-gray-300">
                                    @error('blog.site_title')<p class="mt-2 text-sm text-red-600 poppins"
                                        id="email-error">{{ $message }}</p>@enderror

                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-200 poppins">
                                        Description
                                    </label>
                                    <div class="mt-1">
                                        <textarea wire:model.lazy="blog.description" id="description" name="description"
                                            rows="8"
                                            class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md dark:bg-gray-300"
                                            placeholder="Description..."></textarea>
                                        @error('blog.description')<p class="mt-2 text-sm text-red-600 poppins"
                                            id="email-error">{{ $message }}</p>@enderror
                                    </div>
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="URL" class="block text-sm font-medium text-gray-700 dark:text-gray-200 poppins">
                                        URL
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm poppins font-normal">
                                        <span
                                            class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 dark:bg-gray-300 text-gray-500 text-sm">
                                            write.mv/
                                        </span>
                                        <input type="text" wire:model.lazy="blog.name" name="url" id="url"
                                            class="focus:ring-blue-500 focus:border-blue-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300 text-gray-500 dark:bg-gray-300">
                                    </div>
                                    @error('blog.name')<p class="mt-2 text-sm text-red-600 poppins" id="email-error">
                                        {{ $message }}</p>@enderror
                                </div>
                            </div>


                    </div>
                </div>

                <div class="bg-white dark:bg-gray-900 shadow px-4 py-5 sm:rounded-lg sm:p-6">
                    <div class="md:col-span-1 mb-8">
                        <h3 class="text-lg font-medium leading-6 text-gray-900 poppins dark:text-gray-200">Themes</h3>
                        <p class="mt-1 text-sm text-gray-500 poppins font-normal dark:text-gray-400">
                            Customize your blog style with themes.
                        </p>
                    </div>


                    <ul role="list"
                        class="grid grid-cols-2 gap-4 sm:grid-cols-3 sm:gap-x-6 md:grid-cols-4 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">

                        @foreach ($themes as $theme)
                            <li class="relative">
                                <div
                                    class="group border border-gray-200 block w-full aspect-w-10 aspect-h-10 rounded-lg bg-gray-100 overflow-hidden">
                                    <img src="{{ $theme->preview_img }}" alt=""
                                        class=" object-cover pointer-events-none">
                                    <button type="button" class="absolute inset-0 focus:outline-none">
                                        <span class="sr-only">View details for IMG_4985.HEIC</span>
                                    </button>
                                </div>
                                <p
                                    class="mt-2 block text-md font-medium text-gray-900 truncate uppercase text-center pointer-events-none">
                                    {{ $theme->name }}</p>
                                <p class="block text-sm font-medium text-gray-500 pointer-events-none text-center">
                                    {{ $theme->description }}</p>

                                <div class="flex justify-center mt-3">

                                    @if ($blog->theme_id == $theme->id)

                                        <button type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent shadow-sm text-sm leading-4 font-medium rounded-md text-white bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">

                                            <svg class="-ml-0.5 mr-2 h-4 w-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            Selected
                                        </button>

                                    @else
                                        <button type="button" wire:key="theme-{{ $theme->id }}"
                                            wire:click="$set('blog.theme_id', {{ $theme->id }})"
                                            class="inline-flex items-center px-3 py-2 border border-transparent shadow-sm text-sm leading-4 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                                            <svg class="-ml-0.5 mr-2 h-4 w-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122">
                                                </path>
                                            </svg>
                                            Select theme
                                        </button>
                                    @endif

                                </div>

                            </li>
                        @endforeach




                    </ul>


                </div>

                <div class="flex justify-end">
                    <button type="submit" wire:loading.attr="disabled"
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 poppins">
                        <div wire:loading wire:target="save">
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
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
