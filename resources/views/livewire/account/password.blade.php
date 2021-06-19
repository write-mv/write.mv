<section aria-labelledby="password_settings_heading" class="mt-6 poppins">
    <form wire:submit.prevent="update">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 space-y-6 sm:p-6">
                <div>
                    <h2 id="password_settings_heading" class="text-lg leading-6 font-medium text-gray-900">Password
                        Settings</h2>
                    <p class="mt-1 text-sm leading-5 text-gray-500">Update the password used for logging into your
                        account.</p>
                </div>

                <div class="grid grid-cols-12 gap-6">

                    <div class="col-span-12">
                        <label for="current_password" class="block text-sm font-medium leading-5 text-gray-700">
                            Current password
                        </label>
                        <div>
                            <div class="relative">

                                <input name="current_password" wire:model.lazy="current_password" type="password" id="current_password"
                                    class="block w-full border-gray-300 rounded-md focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 sm:text-sm sm:leading-5 mt-1"
                                    required="required">

                            </div>

                        </div>
                        @error('current_password')<p class="mt-2 text-sm text-red-600">{{$message}}</p>@enderror
                    </div>

                    <div class="col-span-12">
                        <label for="password" class="block text-sm font-medium leading-5 text-gray-700">
                            New Password
                        </label>
                        <div>
                            <div class="relative">

                                <input name="password" wire:model.lazy="password"  type="password" id="password"
                                    class="block w-full border-gray-300 rounded-md focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 sm:text-sm sm:leading-5 mt-1"
                                    required="required">

                            </div>

                        </div>
                        @error('password')<p class="mt-2 text-sm text-red-600">{{$message}}</p>@enderror
                    </div>

                    <div class="col-span-12">
                        <label for="password_confirmation" class="block text-sm font-medium leading-5 text-gray-700">
                            Confirm New Password
                        </label>
                        <div>
                            <div class="relative">

                                <input name="password_confirmation" wire:model.lazy="password_confirmation"  type="password" id="password_confirmation"
                                    class="block w-full border-gray-300 rounded-md focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 sm:text-sm sm:leading-5 mt-1"
                                    required="required">

                            </div>

                        </div>
                        @error('password_confirmation')<p class="mt-2 text-sm text-red-600">{{$message}}</p>@enderror
                    </div>

                </div>
            </div>

            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <span class="inline-flex rounded-md shadow-sm">
                    <button
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 poppins"
                        type="submit">
                        Update Password
                    </button>
                </span>
            </div>
        </div>
    </form>
</section>
