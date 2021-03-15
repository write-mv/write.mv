<section class="container px-4 py-24 mx-auto">
    <h2 class="mb-2 text-3xl font-extrabold leading-tight text-gray-900" style="font-family: Poppins;">
        {{$blog->site_title}}</h2>
    <p class="mb-20 text-md text-gray-500" style="font-family: Poppins;">{{$blog->description}}</p>
    <div class="grid grid-cols-1 gap-12 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3">
        @foreach ($posts as $post)
        <div>
            @if($post->featured_image)
            <a href="{{route('posts.show', ['name' => $blog->name ,'post' => $post->slug])}}">
                <img src="{{$post->featuredImageUrl()}}" class="object-cover md:w-1/2 md:h-1/2 mb-5 bg-center rounded" alt="{{$post->featured_image_caption}}"
                    loading="lazy" />
            </a>
            @endif
            @if($post->is_english)
            <h2 class="mb-2 text-lg font-semibold text-gray-900" style="font-family: Poppins;">
                <a href="{{route('posts.show', ['name' => $blog->name ,'post' => $post->slug])}}" class="text-gray-900 hover:text-purple-700">{{$post->title}}</a>
            </h2>

            @else
            <h2 class="mb-2 text-lg font-semibold text-gray-900 faseyha text-right" dir="rtl">
                <a href="{{route('posts.show', ['name' => $blog->name ,'post' => $post->slug])}}" class="text-gray-900 hover:text-purple-700">{{$post->title}}</a>
            </h2>

            @endif

            @if($post->is_english)
            <p class="mb-3 text-sm font-normal text-gray-500 faseyha text-right" style="font-family: Poppins;">
                {{$post->excerpt}}
            </p>
            @else
            <p class="mb-3 text-sm font-normal text-gray-500 faseyha text-right" dir="rtl">
                @endif
                <div class="mb-3 text-sm font-normal text-gray-500 flex justify-between items-center">
                    <a href="#" class="font-medium text-gray-900 hover:text-purple-700">Praveen Juge</a>
                    @if($post->is_english)
                    <p class="text-sm font-normal text-gray-500">{{$post->published_date->format('F d, Y')}}</p>
                    @else
                    <p class="text-sm font-normal text-gray-500 text-right faseyha" style="direction: rtl;">
                        {{$post->published_date->locale('dv')->isoFormat('Do MMMM YYYY')}}</p>
                    @endif

                </div>
        </div>
        @endforeach

    </div>
    <div
        class="flex flex-col items-center justify-center mt-20 space-x-0 space-y-2 md:space-x-2 md:space-y-0 md:flex-row">
        {{$posts->links()}}
    </div>
</section>