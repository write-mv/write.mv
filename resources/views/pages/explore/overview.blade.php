@extends('pages.layout')

@section('content')
    <div class="container mx-auto">


        <div class="pt-5 pb-10 lg:pt-10 lg:pb-0">
            <div class="container mx-auto flex flex-col gap-x-12 px-4 lg:flex-row">
                <div class="lg:w-3/4">
                    <div class="flex justify-between items-center lg:block">
                        <div class="flex justify-between items-center">
                            <h1 class="text-4xl text-gray-900 font-bold">
                                Explore Writings.
                            </h1>

                            <span class="inline-flex rounded-md shadow-sm">


                                <x-buttons.primary-button href="https://laravelio.this.lan/forum/create-thread">Create
                                    Publication</x-buttons.primary-button>
                            </span>
                        </div>

                        <div class="flex items-center justify-between lg:mt-6">
                            <h3 class="text-gray-800 text-xl font-semibold">
                                {{ $posts->total() }} Publications
                            </h3>
                        </div>

                    </div>

                    <div class="pt-2 lg:hidden">
                        <a href="https://fullstackeurope.com/2021?utm_source=Laravel.io&amp;utm_campaign=fseu21&amp;utm_medium=advertisement"
                            target="_blank" rel="noopener noreferrer" onclick="fathom.trackGoal('SRIK2PEE', 0);">
                            <img class="my-4 mx-auto w-full" style="max-width:300px"
                                src="https://laravelio.this.lan/images/showcase/fseu-small.png" alt="Full Stack Europe">
                        </a>

                        <p class="text-center px-4 mt-4 md:mt-6">
                            <a href="https://github.com/sponsors/laravelio" target="_blank" rel="noopener"
                                class="text-base border-b pb-1 text-gray-700 border-gray-300 hover:text-gray-500">
                                Your banner here too?
                            </a>
                        </p>
                        <div class="flex justify-center mt-6">
                            <span class="inline-flex rounded shadow-sm ">
                                <button
                                    class="w-full bg-gray-900 border border-transparent rounded py-2 px-4 inline-flex justify-center text-lg leading-6 text-white hover:bg-gray-800">
                                    <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path
                                            d="M5 3a1 1 0 000 2c5.523 0 10 4.477 10 10a1 1 0 102 0C17 8.373 11.627 3 5 3z">
                                        </path>
                                        <path
                                            d="M4 9a1 1 0 011-1 7 7 0 017 7 1 1 0 11-2 0 5 5 0 00-5-5 1 1 0 01-1-1zM3 15a2 2 0 114 0 2 2 0 01-4 0z">
                                        </path>
                                    </svg> RSS Feed
                                </button>
                            </span>
                        </div>

                        <div class="flex gap-x-4 mt-10">
                            <div class="w-1/2">
                                <span class="inline-flex rounded shadow w-full">
                                    <button @click="activeModal = 'tag-filter'"
                                        class="w-full bg-white border border-gray-200 rounded py-2 px-4 inline-flex justify-center text-lg leading-6 text-gray-900 hover:bg-gray-100">
                                        <span class="flex items-center gap-x-2">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z">
                                                </path>
                                            </svg> Tag filter
                                        </span>
                                    </button>
                                </span>
                            </div>

                            <div class="w-1/2">
                                <span class="inline-flex rounded shadow-sm w-full">
                                    <a href="https://laravelio.this.lan/forum/create-thread"
                                        class="w-full bg-lio-500 border border-transparent rounded py-2 px-4 inline-flex justify-center text-lg leading-6 text-white hover:bg-lio-600">
                                        Create Thread
                                    </a>
                                </span>
                            </div>
                        </div>

                        <div class="flex mt-4">
                            <div class="flex w-full rounded shadow">
                                <a href="http://laravelio.this.lan/forum?filter=recent" aria-current="page"
                                    class="w-full flex justify-center font-medium rounded-l px-5 py-2 border bg-gray-900 text-white  border-gray-900 hover:bg-gray-800">
                                    Recent
                                </a>

                                <a href="http://laravelio.this.lan/forum?filter=resolved" aria-current="false"
                                    class="w-full flex justify-center font-medium px-5 py-2 border-t border-b bg-white text-gray-800 border-gray-200 hover:bg-gray-100">
                                    Resolved
                                </a>

                                <a href="http://laravelio.this.lan/forum?filter=unresolved" aria-current="false"
                                    class="w-full flex justify-center font-medium rounded-r px-5 py-2 border bg-white text-gray-800 border-gray-200 hover:bg-gray-100">
                                    Unresolved
                                </a>
                            </div>
                        </div>

                    </div>

                    <section class="mt-8 mb-5 lg:mb-32">
                        <div class="flex flex-col gap-y-4">
                            @foreach ($posts as $post)
                                <x-explore.overview-summary :post="$post" />
                            @endforeach

                        </div>

                        <div class="mt-10">
                            {{ $posts->links() }}

                        </div>
                    </section>
                </div>

                <div class="lg:w-1/4">
                    <div class="hidden lg:block">
                        <a href="https://larajobs.com" target="_blank" rel="noopener noreferrer"
                            onclick="fathom.trackGoal('9C3CAYKR', 0);">
                            <img class="my-4 mx-auto w-full" style="max-width:300px"
                                src="https://laravelio.this.lan/images/showcase/larajobs-small.png" alt="LaraJobs">
                        </a>

                        <p class="text-center px-4 mt-4 md:mt-6">
                            <a href="https://github.com/sponsors/laravelio" target="_blank" rel="noopener"
                                class="text-base border-b pb-1 text-gray-700 border-gray-300 hover:text-gray-500">
                                Your banner here too?
                            </a>
                        </p>
                    </div>

                    <div class="bg-white shadow-sm mt-6">
                        <h3 class="text-xl font-semibold px-5 pt-5">
                            Top Blogs
                        </h3>

                        <ul>
                            @foreach ($blogs as $blog)
                                <x-explore.writer-card :blog="$blog" />
                            @endforeach
                        </ul>
                    </div>


                </div>
            </div>
        </div>

        <div class="modal" x-show="activeModal === 'tag-filter'" style="display: none;">
            <div class="w-full h-full p-8 lg:w-96 lg:h-3/4 overflow-y-scroll">
                <div class="flex flex-col bg-white rounded-md shadow max-h-full"
                    x-data="{ activeTag: '', filter: '', isFiltered(value) { return !this.filter || value.toLowerCase().includes(this.filter.toLowerCase()) } }">
                    <div class="border-b">
                        <div class="p-4">
                            <div class="flex justify-between items-center mb-2">
                                <h3 class="text-3xl font-semibold">Filter tag</h3>

                                <button @click="$dispatch('close-modal')">
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg> </button>
                            </div>

                            <div class="text-gray-800 mb-3">
                                <p>Select a tag below to filter the results</p>
                            </div>

                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-800" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>

                                <input type="search" name="filter" id="search"
                                    class="border block pl-10 border-gray-300 rounded w-full"
                                    placeholder="Filter by tag name" x-model="filter">
                            </div>
                        </div>
                    </div>

                    <div class="border-b overflow-y-scroll">
                        <div class="flex flex-col text-lg p-4">
                            <a href="https://laravelio.this.lan/forum/tags/blade?filter=recent"
                                class="flex items-center py-3.5 hover:text-lio-500"
                                :class="{ 'text-lio-500': '2' === activeTag }" x-show="isFiltered('Blade')">
                                Blade
                                <svg x-show="'2' === activeTag" class="ml-3 w-6 h-6 text-lio-500"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    style="display: none;">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg> </a>
                            <a href="https://laravelio.this.lan/forum/tags/cache?filter=recent"
                                class="flex items-center py-3.5 hover:text-lio-500"
                                :class="{ 'text-lio-500': '3' === activeTag }" x-show="isFiltered('Cache')">
                                Cache
                                <svg x-show="'3' === activeTag" class="ml-3 w-6 h-6 text-lio-500"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    style="display: none;">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg> </a>
                            <a href="https://laravelio.this.lan/forum/tags/installation?filter=recent"
                                class="flex items-center py-3.5 hover:text-lio-500"
                                :class="{ 'text-lio-500': '1' === activeTag }" x-show="isFiltered('Installation')">
                                Installation
                                <svg x-show="'1' === activeTag" class="ml-3 w-6 h-6 text-lio-500"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    style="display: none;">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg> </a>
                        </div>
                    </div>

                    <div class="flex gap-x-2 justify-end p-4">
                        <span class="inline-flex rounded-md shadow">
                            <button
                                class="bg-white border border-gray-200 rounded py-2 px-4 inline-flex justify-center text-base text-gray-900 hover:bg-gray-100 font-medium"
                                @click="$dispatch('close-modal')">
                                Cancel
                            </button>
                        </span>
                        <span class="inline-flex rounded-md shadow">
                            <a class="bg-white border border-gray-200 rounded py-2 px-4 inline-flex justify-center text-base text-gray-900 hover:bg-gray-100 font-medium"
                                href="https://laravelio.this.lan/forum" x-show="activeTag" style="display: none;">
                                Remove filter
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
