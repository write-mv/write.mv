<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <div class="dark:bg-gray-900 bg-white sm:rounded-lg mb-5 lg:w-1/2">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-200 mb-5 poppins">
                        Blog
                    </h3>
                    <div class="mt-2 max-w-xl text-sm text-gray-500 flex items-center">
                        <h3 class="text-lg font-normal text-gray-700 dark:text-gray-200 poppins">
                            {{ $blog->name }}
                        </h3>
                        <h3 class="ml-8 text-lg font-light text-gray-500 dark:text-gray-200 poppins">
                            <a href="{{ $blog->url }}">{{ $blog->url }}</a>
                        </h3>
                    </div>
                    <div class="mt-5">
                        <a href="{{ route('posts.new') }}"
                            class="mr-2 inline-flex justify-center mt-3 items-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:text-sm poppins">
                            New Post
                        </a>

                        <a href="{{ route('blog.customize', $blog) }}"
                            class="inline-flex items-center mt-3 justify-center px-4 py-2 mr-2 border border-transparent font-medium rounded-md text-gray-700 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:text-sm poppins">
                            Customize
                        </a>
                        <a target="_blank" href="{{ $blog->url }}"
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


            @if ($latest_activities->count())
                <div class="poppins">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-200 poppins">
                        Recent Activities
                    </h3>

                    <div class="dark:bg-gray-900 bg-white sm:rounded-lg">
                        <ul role="list" class="mt-2 divide-y dark:divide-gray-800 divide-gray-200 overflow-hidden shadow">

                            @foreach ($latest_activities as $activity)
                                <li>
                                    <a  class="block px-4 py-4 dark:bg-gray-900 bg-white rounded-lg">
                                        <span class="flex items-center space-x-4">
                                            <span class="flex-1 flex space-x-2 truncate">
                                                <svg class="flex-shrink-0 h-6 w-6 text-gray-400" viewBox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M4.75 11.75H8.25L10.25 4.75L13.75 19.25L15.75 11.75H19.25"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg>


                                                <span
                                                    class="flex flex-col text-gray-700 dark:text-gray-200 text-sm truncate">
                                                    <span class="truncate">{{ $activity->description }}
                                                        {{ Str::afterLast($activity->subject_type, '\\') }}</span>
                                                    <time>{{ $activity->created_at->diffForHumans() }}</time>
                                                </span>
                                            </span>
                                            <svg class="flex-shrink-0 h-5 w-5 text-gray-400"
                                                x-description="Heroicon name: solid/chevron-right"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            @endif
        </div>
</x-app-layout>
