<div>
    <main class="max-w-screen-lg mx-auto py-16 px-4 sm:px-6 poppins">
        <div class="space-y-8">
            <div class="lg:flex lg:items-center lg:justify-between">
                <div class="flex-1 min-w-0">
                    <h2 class="text-2xl font-bold leading-7 dark:text-gray-200 text-gray-900 sm:text-3xl sm:truncate">
                        {{ $label }}
                    </h2>
                    <div class="mt-1 flex flex-col sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-6">
                        <div class="mt-2 flex items-center text-sm text-gray-500">
                            Published on: 7/16/21 at 9:00 PM
                        </div>
                    </div>
                </div>
                <div class="mt-5 flex lg:mt-0 lg:ml-4">

                    <div class="sm:mr-3 flex items-center space-x-2">
                        <label class="block text-sm text-gray-700 dark:text-gray-200 poppins font-normal">Language:
                            <span class="font-semibold">{{ $page->is_english ? 'English' : 'Dhivehi' }}</span></label>
                        <x-form.toggle model="page.is_english" />

                    </div>

                    <span class="hidden sm:block">
                        <button type="button"
                            class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M6.75 6.75C6.75 5.64543 7.64543 4.75 8.75 4.75H15.25C16.3546 4.75 17.25 5.64543 17.25 6.75V19.25L12 14.75L6.75 19.25V6.75Z">
                                </path>
                            </svg>

                            Revert to Draft
                        </button>
                    </span>


                    <span class="sm:ml-3">
                        <button type="button"
                            class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                            <svg class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5" d="M12 5.75V18.25"></path>
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5" d="M18.25 12L5.75 12"></path>
                            </svg>

                            Publish
                        </button>
                    </span>



                    <!-- Dropdown -->
                    <span class="ml-3 relative sm:hidden">
                        <button type="button"
                            class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            id="mobile-menu-button" aria-expanded="false" aria-haspopup="true">
                            More
                            <!-- Heroicon name: solid/chevron-down -->
                            <svg class="-mr-1 ml-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>

                        <!--
              Dropdown menu, show/hide based on menu state.
      
              Entering: "transition ease-out duration-200"
                From: "transform opacity-0 scale-95"
                To: "transform opacity-100 scale-100"
              Leaving: "transition ease-in duration-75"
                From: "transform opacity-100 scale-100"
                To: "transform opacity-0 scale-95"
            -->
                        <div class="origin-top-right absolute right-0 mt-2 -mr-1 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="mobile-menu-button" tabindex="-1">
                            <!-- Active: "bg-gray-100", Not Active: "" -->
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                id="mobile-menu-item-0">Edit</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                id="mobile-menu-item-1">View</a>
                        </div>
                    </span>
                </div>
            </div>

        </div>

        <div class="my-5 border-b-2 pb-5">

            <div class="col-span-6 sm:col-span-2">
                <label for="title"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-200 poppins">Title*</label>
                <input type="text" name="title" wire:model.lazy="page.title"
                    class="focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm text-xl rounded-md dark:bg-gray-300 border-gray-300 mt-2 {{ $page->is_english ? '' : 'heading-dhivehi thaana-keyboard' }}"
                    {{ $page->is_english ? '' : 'dir=rtl' }}>
            </div>

            <div class="col-span-6 sm:col-span-2 mt-5">
                <label for="slug"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-200 poppins">Slug*</label>
                <input type="text" name="slug" wire:model.lazy="page.slug"
                    class="focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm text-xl rounded-md dark:bg-gray-300 border-gray-300 mt-2">
            </div>

            <div class="col-span-6 sm:col-span-2 mt-5">
                <label for="content"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-200 poppins">Content*</label>
                <x-form.editor />
            </div>

            <div class="col-span-2 mt-10">
                <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-200 poppins">Publish
                    date:</label>
                <x-form.date-picker
                    class="max-w-lg block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md" />
            </div>
        </div>

    </main>

</div>
