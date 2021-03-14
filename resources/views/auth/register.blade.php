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
                        <a href="/login" class="font-medium text-indigo-600 hover:text-indigo-500"
                            style="font-family: Poppins;">
                            sign in if you already have one
                        </a>
                    </p>
                </div>

                <div class="mt-8">
                    <div class="mt-6">
                        <form method="POST" action="{{ route('register') }}" class="space-y-6">
                            @csrf
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700"    style="font-family: Poppins;">
                                    Name
                                </label>
                                <div class="mt-1">
                                    <input id="name" name="name" type="text" value="{{old('name')}}" autocomplete="name"
                                        required
                                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>
                            </div>

                            <div>
                                <label for="blog_name" class="block text-sm font-medium text-gray-700" style="font-family: Poppins;">
                                    Blog Name
                                </label>
                                <div class="mt-1">
                                    <input id="blog_name" name="blog_name" type="text" value="{{old('blog_name')}}"
                                        autocomplete="blog_name" required
                                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        <p class="mt-2 text-sm text-gray-500">We will use the blog name to create the main blog page for you.</p>
                                    @error('blog_name')<p class="mt-2 text-sm text-red-600">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700" style="font-family: Poppins;">
                                    Email address
                                </label>
                                <div class="mt-1">
                                    <input id="email" name="email" type="email" value="{{old('email')}}"
                                        autocomplete="email" required
                                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    @error('email')<p class="mt-2 text-sm text-red-600" id="email-error">{{$message}}
                                    </p>@enderror
                                </div>
                            </div>

                            <div class="space-y-1">
                                <label for="password" class="block text-sm font-medium text-gray-700" style="font-family: Poppins;">
                                    Password
                                </label>
                                <div class="mt-1">
                                    <input id="password" name="password" type="password" autocomplete="current-password"
                                        required
                                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    @error('password')<p class="mt-2 text-sm text-red-600" id="email-error">{{$message}}
                                    </p>@enderror
                                </div>
                            </div>


                            <div class="space-y-1">
                                <label for="password" class="block text-sm font-medium text-gray-700" style="font-family: Poppins;">
                                    Confirm Password
                                </label>
                                <div class="mt-1">
                                    <input id="password_confirmation" name="password_confirmation" type="password"
                                        autocomplete="current-password" required
                                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    @error('password_confirmation')<p class="mt-2 text-sm text-red-600"
                                        id="email-error">{{$message}}</p>@enderror
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
                                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" style="font-family: Poppins;">
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
                src="https://images.unsplash.com/photo-1517495306984-f84210f9daa8?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MTJ8fHNreXxlbnwwfHwwfA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60"
                alt="">
        </div>
    </div>
</x-guest-layout>