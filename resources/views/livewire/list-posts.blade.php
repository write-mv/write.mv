<div>
    <main class="max-w-screen-lg mx-auto py-16 px-4 sm:px-6">
        <div class="space-y-8">
            <div>

                <div class="relative mt-2">

                    <div class="mt-2 flex items-center justify-between">
                        <h1 class="font-bold text-2xl leading-10 poppins dark:text-gray-200">
                            Your Publications
                        </h1>

                        <a href="{{ route('posts.new') }}"
                            class="inline-flex items-center justify-center border border-transparent rounded-md py-2 px-5 text-sm font-base text-white focus:ring-2 focus:ring-offset-2 focus:outline-none transition ease-in-out duration-150 bg-blue-600 hover:bg-blue-700 disabled:bg-blue-400 focus:ring-blue-500 poppins">
                            <x-heroicon-o-plus class="inline-block w-5 h-5" />
                            Write a post
                        </a>
                    </div>

                </div>

                <div class="relative text-gray-600 mt-2">
                    <input type="search" wire:model="search" name="search" placeholder="Search..."
                        class="bg-white h-10 px-5 pr-10 rounded-full text-sm focus:outline-none border-none">
                </div>

                <div class="mb-3 mt-2">
                    <div>
                        <div class="border-b dark:border-gray-700 border-gray-200">
                            <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                                <a wire:click.prevent="switchFilter('all')"
                                    class="cursor-pointer poppins font-normal {{ $filter == 'all' ? 'tab-active' : 'tab' }}">

                                    <span>All ({{ $all_post_count }})</span>
                                </a>
                                <a wire:click.prevent="switchFilter('published')"
                                    class="cursor-pointer poppins font-normal {{ $filter == 'published' ? 'tab-active' : 'tab' }}">

                                    <span>Published ({{ $published_post_count }})</span>
                                </a>

                                <a wire:click.prevent="switchFilter('draft')"
                                    class="cursor-pointer poppins font-normal {{ $filter == 'draft' ? 'tab-active' : 'tab' }}"
                                    aria-current="page">

                                    <span>Drafts ({{ $draft_post_count }})</span>
                                </a>

                                <a wire:click.prevent="switchFilter('scheduled')"
                                    class="cursor-pointer poppins font-normal {{ $filter == 'scheduled' ? 'tab-active' : 'tab' }}">

                                    <span>Scheduled ({{ $scheduled_post_count }})</span>
                                </a>

                            </nav>
                        </div>
                    </div>
                </div>

                <div class="mt-8 grid grid-cols-1 gap-3">
                    @forelse($posts as $post)
                        <article class="grid bg-white dark:bg-gray-900 p-7 sm:p-4 rounded-lg lg:col-span-2 grid-cols-4">
                            <div class="pt-5 self-center sm:pt-0 sm:pl-10 col-span-3">
                                <h2
                                    class="text-gray-700 dark:text-gray-200 capitalize text-xl font-bold {{ $post->is_english ? 'poppins' : 'para-dhivehi' }}">
                                    {{ $post->title }}</h2>

                                @if ($post->isScheduled())
                                    <span class="text-gray-500 text-sm poppins">Scheduled to post on
                                        {{ $post->published_date->format('M d, Y H:i A') }}</span>
                                @elseif($post->isDrafted())
                                    <span class="text-gray-500 text-sm poppins">Drafted
                                        {{ $post->updated_at->diffForHumans() }}</span>
                                @else
                                    <span class="text-gray-500 text-sm poppins">Published on
                                        {{ $post->published_date->format('M d, Y') }}</span>
                                @endif
                            </div>
                            <div class="justify-self-end">
                                <div class="flex items-center gap-2">
                                    <x-action-dropdown wire:key="dropdown-{{ $post->id }}">
                                        <x-slot name="icon">
                                            <x-heroicon-s-dots-vertical class="h-5 w-5" />
                                        </x-slot>

                                        @if ($post->isPublished())
                                            <a wire:click="moveToDraft({{ $post->id }})"
                                                class="cursor-pointer inline-flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 poppins"
                                                role="menuitem">
                                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                                                </svg>
                                                <span>Move to draft</span>
                                            </a>
                                        @endif

                                        @if ($post->isScheduled() || $post->isDrafted())
                                            <a wire:click="publishNow({{ $post->id }})"
                                                class="cursor-pointer flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 poppins"
                                                role="menuitem">
                                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                                    </path>
                                                </svg>
                                                <span>Publish now</span>
                                            </a>
                                        @endif
                                        <a href="{{ route('posts.update', $post) }}"
                                            class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 poppins flex items-center"
                                            role="menuitem">
                                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                </path>
                                            </svg>
                                            <span>Edit post</span>
                                        </a>
                                        <a href="#" wire:click="openDeleteModal({{ $post->id }})"
                                            class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 poppins flex items-center"
                                            role="menuitem">
                                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                            <span>Delete post</span>
                                        </a>
                                        <a href="{{ route('stats.show', $post->id) }}"
                                            class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 poppins"
                                            role="menuitem">
                                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                                </path>
                                            </svg>
                                            <span>View stats</span>
                                        </a>
                                        @if ($post->isPublished())
                                            <a href="{{ route('posts.show', ['name' => $post->blog->name, 'post' => $post->slug]) }}"
                                                class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 poppins"
                                                role="menuitem">
                                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                                    </path>
                                                </svg>
                                                <span>Visit post</span>
                                            </a>

                                        @endif
                                    </x-action-dropdown>

                                </div>


                            </div>
                        </article>

                    @empty


                        <a href="{{ route('posts.new') }}"
                            class="relative block w-full border-2 border-gray-300 border-dashed rounded-lg p-12 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <svg class="mx-auto h-12 w-12 text-gray-400" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.75 4.75H7.75C6.64543 4.75 5.75 5.64543 5.75 6.75V17.25C5.75 18.3546 6.64543 19.25 7.75 19.25H12.25M12.75 4.75V8.25C12.75 9.35457 13.6454 10.25 14.75 10.25H18.25L12.75 4.75Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path d="M17 14.75V19.25" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M19.25 17H14.75" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>

                            <span class="mt-2 block text-sm font-medium dark:text-gray-200 text-gray-900">
                                Create a new post
                            </span>
                        </a>




                    @endforelse
                </div>

                @if ($posts->total() > 0 && $posts->count() < $posts->total())
                    <div class="mt-2 ml-1 poppins">
                        <a class="cursor-pointer text-gray-700 dark:text-gray-200 hover:underline"
                            wire:click="load">Load more</a>
                    </div>
                @endif
            </div>


        </div>

    </main>

    <x-modal.confirmation wire:model.defer="showConfirmModal">
        <x-slot name="title">Delete post</x-slot>
        <x-slot name="content">


            <div class="mt-2">
                <p class="text-sm text-gray-500">
                    Are you sure you want to remove this post?
                </p>
            </div>

        </x-slot>

        <x-slot name="footer">
            <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                <button wire:click="destroy" type="button"
                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Delete
                </button>
                <button wire:click="$set('showConfirmModal', false)" type="button"
                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:w-auto sm:text-sm">
                    Cancel
                </button>
            </div>
        </x-slot>
    </x-modal.confirmation>
</div>
