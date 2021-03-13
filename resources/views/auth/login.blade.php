<x-guest-layout>
  <div class="min-h-screen bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
      <img class="mx-auto h-16 w-auto" src="/images/logo.svg">
      <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900" style="font-family: Poppins;">
        Sign in to your account
      </h2>
      <p class="mt-2 text-center text-sm text-gray-600 max-w" style="font-family: Poppins;">
        Or
        <a href="/register" class="font-medium text-blue-600 hover:text-blue-500" style="font-family: Poppins;">
          create an account
        </a>
      </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
      <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
        <form class="space-y-6" method="POST" action="{{ route('login') }}">
          @csrf
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700" style="font-family: Poppins;">
              Email address
            </label>
            <div class="mt-1">
              <input id="email" value="{{old('email')}}" name="email" type="email" autocomplete="email" required
                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
              @error('email')<p class="mt-2 text-sm text-red-600" id="email-error">{{$message}}</p>@enderror
            </div>
          </div>

          <div>
            <label for="password" class="block text-sm font-medium text-gray-700" style="font-family: Poppins;">
              Password
            </label>
            <div class="mt-1">
              <input id="password" name="password" type="password" autocomplete="current-password" required
                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
              @error('password')<p class="mt-2 text-sm text-red-600" id="email-error">{{$message}}</p>@enderror
            </div>
          </div>

          <div class="flex items-center justify-between">
            <div class="flex items-center">
              <input id="remember_me" name="remember_me" type="checkbox"
                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
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
              class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" style="font-family: Poppins;">
              Sign in
            </button>
          </div>
        </form>

      </div>
    </div>
  </div>

</x-guest-layout>