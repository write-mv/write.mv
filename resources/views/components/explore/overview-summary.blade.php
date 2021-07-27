@props(['post'])

<div class="h-full rounded shadow-sm p-5 bg-white">
    <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center">
        <div>
            <div class="flex flex-col lg:flex-row lg:items-center">
                <div class="flex">

                    @if ($post->show_author)
                        <a href="https://laravelio.this.lan/user/jinas123" class="hover:underline">
                            <span class="text-gray-900 mr-5">{{ $post->display_name }}</span>
                        </a>

                    @endif
                </div>

                <span class="font-mono text-gray-700 mt-1 lg:mt-0">
                    {{ $post->created_at->format('j M, Y \a\t h:i') }}
                </span>
            </div>
        </div>

    </div>

    <div class="mt-3 break-words">
        <a href="{{ route('posts.show', ['name' => $post->blog->name, 'post' => $post->slug]) }}"
            class="hover:underline">
            <h3 class="text-xl text-gray-900 font-semibold">
                {{ $post->title }}
            </h3>
        </a>

        <a href="{{ route('posts.show', ['name' => $post->blog->name, 'post' => $post->slug]) }}"
            class="hover:underline">
            <p class="text-gray-800 leading-7 mt-1">
                {{ $post->excerpt }}
            </p>
        </a>

    </div>
</div>
