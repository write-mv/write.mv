<div>
    <main class="max-w-screen-lg mx-auto py-16 px-4 sm:px-6 poppins">
        <form wire:submit.prevent="save">
            <div class="space-y-8">
                <div class="lg:flex lg:items-center lg:justify-between">
                    <div class="flex-1 min-w-0">
                        <h2
                            class="text-2xl font-bold leading-7 dark:text-gray-200 text-gray-900 sm:text-3xl sm:truncate">
                            {{ $label }}
                        </h2>
                        @if ($editing)
                            <div class="mt-1 flex flex-col sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-6">
                                <div class="mt-2 flex items-center text-sm text-gray-500">
                                    Published: {{ $page->published_date->format('d/m/Y H:i A') }}
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="mt-5 flex lg:mt-0 lg:ml-4 justify-between">

                        <div class="sm:mr-3 flex items-center space-x-2">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 poppins">Publish?</label>
                            <x-form.toggle model="page.published" />
                            @error('page.published') <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="sm:mr-3 flex items-center space-x-2">
                            <label class="block text-sm text-gray-700 dark:text-gray-200 poppins font-normal">Language:
                                <span class="font-semibold">{{ $page->is_english ? 'English' : 'Dhivehi' }}</span></label>
                            <x-form.toggle model="page.is_english" />

                        </div>

                        <span class="ml-3">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                                <svg class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="1.5" d="M12 5.75V18.25"></path>
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="1.5" d="M18.25 12L5.75 12"></path>
                                </svg>

                                Save
                            </button>
                        </span>
                    </div>
                </div>

            </div>

            <div class="my-5 pb-5">
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
                    <x-form.editor wire:model="page.content" />
                </div>

                <div class="col-span-2 mt-10">
                    <label for="content"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-200 poppins">Publish
                        date:</label>
                    <x-form.date-picker wire:model="page.published_date"
                        class="max-w-lg block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md" />
                </div>

            </div>
        </form>
    </main>

</div>
