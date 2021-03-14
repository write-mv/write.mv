<div>
    <x-slot name="header">
        <div class="flex items-center">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-4">
                    <li>
                        <div class="flex items-center">
                            <a href="{{route('dashboard')}}"
                                class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Dashboard</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <!-- Heroicon name: solid/chevron-right -->
                            <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <p class="ml-4 text-sm font-medium text-gray-500">Account Settings</p>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-5">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Account Settings
                </h2>
            </div>
            <div class="space-y-6">
                <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Account Information</h3>
                            <p class="mt-1 text-sm text-gray-500">
                                This information won't be displayed publicly
                            </p>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <form class="space-y-6" wire:submit.prevent="save">
                                <div class="grid grid-cols-3 gap-6">

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                        <input type="text" wire:model.lazy="user.name" name="name" id="name"
                                            autocomplete="name"
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                        <input type="text" wire:model.lazy="user.email" name="email" id="email"
                                            autocomplete="email"
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>



                                </div>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit"
                            class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Save
                        </button>
                    </div>
                </div>
                </form>


            </div>
        </div>
    </div>