<x-guest-layout>
    <div class="min-h-screen flex">
        <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
            <div class="mx-auto w-full max-w-sm lg:w-96">
                <div>
                    <img class="h-16 w-auto" src="/images/logo.svg">
                    <h2 class="mt-6 text-3xl font-extrabold text-gray-900" style="font-family: Poppins;">
                        Create your account
                    </h2>
                    <p class="mt-2 text-sm text-gray-600 max-w" style="font-family: Poppins;">
                        Or
                        <a href="/login" class="font-medium text-blue-600 hover:text-blue-500"
                            style="font-family: Poppins;">
                            sign in if you already have one
                        </a>
                    </p>
                </div>

                <div class="mt-8">
                    <div>
                        <div>
                            <p class="text-sm font-medium text-gray-700">
                                Sign up with
                            </p>

                            <div class="mt-1 grid grid-cols-3 gap-3">
                            

                                <div>
                                    <a href="/auth/github"
                                        class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                        <span class="sr-only">Sign up with GitHub</span>
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M10 0C4.477 0 0 4.484 0 10.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0110 4.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.203 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.942.359.31.678.921.678 1.856 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0020 10.017C20 4.484 15.522 0 10 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 relative">
                            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-2 bg-white text-gray-500">
                                    Or continue with
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6">
                        <form method="POST" action="{{ route('register') }}" class="space-y-6">
                            @csrf
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700"
                                    style="font-family: Poppins;">
                                    Name
                                </label>
                                <div class="mt-1">
                                    <input id="name" name="name" type="text" value="{{ old('name') }}"
                                        autocomplete="name" required
                                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>
                            </div>

                            <div>
                                <label for="blog_name" class="block text-sm font-medium text-gray-700"
                                    style="font-family: Poppins;">
                                    Blog Name
                                </label>
                                <div class="mt-1">
                                    <input id="blog_name" name="blog_name" type="text" value="{{ old('blog_name') }}"
                                        autocomplete="blog_name" required
                                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    <p class="mt-2 text-sm text-gray-500">We will use the blog name to create the main
                                        blog page for you.</p>
                                    @error('blog_name')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700"
                                    style="font-family: Poppins;">
                                    Email address
                                </label>
                                <div class="mt-1">
                                    <input id="email" name="email" type="email" value="{{ old('email') }}"
                                        autocomplete="email" required
                                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    @error('email')
                                        <p class="mt-2 text-sm text-red-600" id="email-error">{{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="space-y-1">
                                <label for="password" class="block text-sm font-medium text-gray-700"
                                    style="font-family: Poppins;">
                                    Password
                                </label>
                                <div class="mt-1">
                                    <input id="password" name="password" type="password" autocomplete="current-password"
                                        required
                                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    @error('password')
                                        <p class="mt-2 text-sm text-red-600" id="email-error">{{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>


                            <div class="space-y-1">
                                <label for="password" class="block text-sm font-medium text-gray-700"
                                    style="font-family: Poppins;">
                                    Confirm Password
                                </label>
                                <div class="mt-1">
                                    <input id="password_confirmation" name="password_confirmation" type="password"
                                        autocomplete="current-password" required
                                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    @error('password_confirmation')
                                        <p class="mt-2 text-sm text-red-600" id="email-error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>


                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <input id="remember_me" name="remember_me" type="checkbox"
                                        class="h-4 w-4 text-blue-600 focus:ring-indigo-500 border-gray-300 rounded">
                                    <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                                        Remember me
                                    </label>
                                </div>

                                <div class="text-sm">
                                    <a href="#" class="font-medium text-blue-600 hover:text-blue-500">
                                        Forgot your password?
                                    </a>
                                </div>
                            </div>

                            <div>
                                <button type="submit"
                                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    style="font-family: Poppins;">
                                    Register
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden lg:block relative w-0 flex-1">
            <img class="absolute inset-0 h-full w-full object-cover"
                src="https://images.unsplash.com/photo-1432821596592-e2c18b78144f?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=1350&q=80"
                alt="">
        </div>
    </div>
</x-guest-layout>
