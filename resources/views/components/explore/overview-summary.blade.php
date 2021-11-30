@props(['post'])

<div class="h-full rounded shadow-sm p-5 bg-white">
    <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center">
        <div>
            <div class="flex flex-col lg:flex-row lg:items-center">
                <div class="flex">

                    @if ($post->show_author)
                        @if ($post->display_name == 'anonymous')
                            <a href="#" class="hover:underline">
                                <span class="text-gray-900 mr-5">{{ $post->display_name }}</span>
                            </a>

                        @else
                            <a href="{{ route('domain.posts.index', ['name' => $post->blog->name]) }}"
                                class="hover:underline">
                                <span class="text-gray-900 mr-5">{{ $post->display_name }}</span>
                            </a>
                        @endif

                    @endif
                </div>

                <span class="font-mono text-gray-700 mt-1 lg:mt-0">
                    {{ $post->created_at->format('j M, Y \a\t h:i') }}
                </span>
            </div>
        </div>

    </div>

    <div class="mt-3 break-words">

        @if ($post->display_name != 'anonymous')
            <a href="{{ route('domain.posts.show', ['name' => $post->blog->name, 'post' => $post->slug]) }}"
                class="hover:underline">

                @if ($post->is_english)
                    <h3 class="text-xl text-gray-900 font-semibold">
                        {{ $post->title }}
                    </h3>
                @else

                    <h3 class="text-xl text-gray-900 font-semibold text-right typer-bold" dir="rtl">
                        {{ $post->title }}
                    </h3>

                @endif
            </a>
        @else
            <a href="{{ route('anonymous.show', ['post' => $post]) }}" class="hover:underline">

                @if ($post->is_english)
                    <h3 class="text-xl text-gray-900 font-semibold">
                        {{ $post->title }}
                    </h3>
                @else

                    <h3 class="text-xl text-gray-900 font-semibold text-right typer-bold" dir="rtl">
                        {{ $post->title }}
                    </h3>

                @endif
            </a>
        @endif


        <a href="{{ route('domain.posts.show', ['name' => $post->blog->name, 'post' => $post->slug]) }}"
            class="hover:underline">
            @if ($post->is_english)
                <p class="text-gray-800 leading-7 mt-1">
                    {{ $post->excerpt }}
                </p>
            @else
                <p class="text-gray-800 leading-7 mt-1 typer text-right" dir="rtl">
                    {{ $post->excerpt }}
                </p>
            @endif
        </a>

    </div>
</div>
