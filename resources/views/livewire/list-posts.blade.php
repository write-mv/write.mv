<div>
    <main class="max-w-screen-lg mx-auto py-16 px-4 sm:px-6">
        <div class="space-y-8">
            <div>

                <div class="relative mt-2">

                    <div class="mt-2 flex items-center justify-between">
                        <h1 class="font-bold text-2xl leading-10 poppins">
                            Your Publications
                        </h1>

                        <a href="{{route('posts.new')}}"
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
                        <div class="border-b border-gray-200">
                            <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                                <a wire:click.prevent="switchFilter('all')"
                                    class="cursor-pointer poppins font-normal {{ $filter == 'all' ? 'tab-active' : 'tab' }}">

                                    <span>All ({{$all_post_count}})</span>
                                </a>
                                <a wire:click.prevent="switchFilter('published')"
                                    class="cursor-pointer poppins font-normal {{ $filter == 'published' ? 'tab-active' : 'tab' }}">

                                    <span>Published ({{$published_post_count}})</span>
                                </a>

                                <a wire:click.prevent="switchFilter('draft')"
                                    class="cursor-pointer poppins font-normal {{ $filter == 'draft' ? 'tab-active' : 'tab' }}"
                                    aria-current="page">

                                    <span>Drafts ({{$draft_post_count}})</span>
                                </a>

                                <a wire:click.prevent="switchFilter('scheduled')"
                                    class="cursor-pointer poppins font-normal {{ $filter == 'scheduled' ? 'tab-active' : 'tab' }}">

                                    <span>Scheduled ({{$scheduled_post_count}})</span>
                                </a>

                            </nav>
                        </div>
                    </div>
                </div>

                <div class="mt-8 grid grid-cols-1 gap-3">
                    @forelse($posts as $post)
                    <article class="grid bg-white p-7 sm:p-4 rounded-lg lg:col-span-2 grid-cols-4">
                        <div class="pt-5 self-center sm:pt-0 sm:pl-10 col-span-3">
                            <h2 class="text-gray-700 capitalize text-xl font-bold {{$post->is_english ? "poppins" : "para-dhivehi"}}"
                                {{!$post->is_english ? 'dir=rtl' : ""}}>{{$post->title}}</h2>

                            @if($post->isScheduled())
                            <span class="text-gray-500 text-sm poppins">Scheduled to post on
                                {{$post->published_date->format('M d, Y H:i A')}}</span>
                            @elseif($post->isDrafted())
                            <span class="text-gray-500 text-sm poppins">Drafted
                                {{$post->published_date->diffForHumans()}}</span>
                            @else
                            <span class="text-gray-500 text-sm poppins">Published on
                                {{$post->published_date->format('M d, Y')}}</span>
                            @endif
                        </div>
                        <div class="justify-self-end">
                            <div class="flex items-center gap-2">
                                <x-action-dropdown wire:key="dropdown-{{ $post->id }}">
                                    @if($post->isPublished())
                                    <a wire:click="moveToDraft({{$post->id}})"
                                        class="cursor-pointer block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 poppins"
                                        role="menuitem">Move to draft</a>
                                    @endif

                                    @if($post->isScheduled() || $post->isDrafted())
                                    <a wire:click="publishNow({{$post->id}})"
                                        class="cursor-pointer block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 poppins"
                                        role="menuitem">Publish now</a>
                                    @endif
                                    <a href="{{route('posts.update', $post)}}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 poppins"
                                        role="menuitem">Edit post</a>
                                    <a href="#" wire:click="openDeleteModal({{$post->id}})"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 poppins"
                                        role="menuitem">Delete post</a>
                                    <a href="{{route('stats.show',$post->id)}}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 poppins"
                                        role="menuitem">View stats</a>
                                    @if($post->isPublished())
                                    <a href="{{route('posts.show', ['name' => $post->blog->name ,'post' => $post->slug])}}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 poppins"
                                        role="menuitem">Visit post</a>

                                    @endif
                                </x-action-dropdown>

                            </div>


                        </div>
                    </article>

                    @empty

                    <div class="flex justify-start items-center">
                        <x-heroicon-o-newspaper class="w-10 h-10 mr-1 text-gray-400" />
                        <span class="font-medium py-8 text-gray-400 text-xl poppins">No posts found.</span>
                    </div>

                    @endforelse
                </div>

                @if($posts->total() > 0 && $posts->count() < $posts->total())
                    <div class="mt-2 ml-1 poppins">
                        <a class="cursor-pointer text-gray-700" wire:click="load">Load more</a>
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