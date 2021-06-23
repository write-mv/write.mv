<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="dark:bg-gray-900 bg-white sm:rounded-lg mb-5 lg:w-1/2">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-200 mb-5 poppins">
                        Blog
                    </h3>
                    <div class="mt-2 max-w-xl text-sm text-gray-500 flex items-center">
                        <h3 class="text-lg font-normal text-gray-700 dark:text-gray-200 poppins">
                            {{$blog->name}}
                        </h3>
                        <h3 class="ml-8 text-lg font-light text-gray-500 dark:text-gray-200 poppins">
                            <a href="{{$blog->url}}">{{$blog->url}}</a>
                        </h3>
                    </div>
                    <div class="mt-5">
                        <a
                            href="{{route('posts.new')}}"
                            class="mr-2 inline-flex justify-center mt-3 items-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:text-sm poppins">
                            New Post
                        </a>

                        <a
                            href="{{route('blog.customize', $blog)}}"
                            class="inline-flex items-center mt-3 justify-center px-4 py-2 mr-2 border border-transparent font-medium rounded-md text-gray-700 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:text-sm poppins">
                            Customize
                        </a>
                        <a
                            target="_blank"
                            href="{{$blog->url}}"
                            class="inline-flex items-center mt-3 justify-center px-4 py-2 border border-transparent font-medium rounded-md text-gray-700 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:text-sm poppins">
                            View Blog
                            <x-heroicon-o-arrow-narrow-right class="w-3 h-3 ml-1 text-gray-500" />
                        </a>
                    </div>
                </div>
            </div>


            <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-200 poppins">
                    Posts Stats
                </h3>
                <x-metric.group>

                    <x-metric.stats title="Total" :value="$total_post_count">
                        <x-slot name="icon">
                            <x-heroicon-o-newspaper class="w-6 h-6 mr-1 text-gray-500" />
                        </x-slot>
                    </x-metric.stats>

                    <x-metric.stats title="Published" :value="$published_post_count">
                        <x-slot name="icon">
                            <x-heroicon-o-check-circle class="w-6 h-6 mr-1 text-gray-500" />
                        </x-slot>
                    </x-metric.stats>

                    <x-metric.stats title="Scheduled" :value="$scheduled_post_count">
                        <x-slot name="icon">
                            <x-heroicon-o-clock class="w-6 h-6 mr-1 text-gray-500" />
                        </x-slot>
                    </x-metric.stats>


                </x-metric.group>
            </div>
        </div>
</x-app-layout>