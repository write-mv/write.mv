@props(['blog'])

<li class="border-b pb-3 pt-5">
    <div class="flex justify-between items-center px-5">
        <div class="flex items-center gap-x-5">
            <img src="https://unavatar.now.sh/github/gottlieb.gussie?fallback=https%3A%2F%2Flaravelio.this.lan%2Fimages%2Fuser.svg" class="rounded-full text-gray-500 w-10 h-10">

            <span class="flex flex-col">
                <a href="{{route('domain.posts.index',['name' => $blog->name])}}" class="hover:underline">
                    <span class="text-gray-900 font-medium">
                       {{ $blog->name }}
                    </span>
                </a>

                <span class="text-gray-700">
                    {{ $blog->posts_count }} Posts
                </span>
            </span>
        </div>

        <div>
            <span class="flex items-center gap-x-3 text-lio-500">
                <span class="text-xl font-medium">
                    1
                </span>

                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    stroke="none" viewBox="0 0 24 24">
                    <path
                        d="M21,4h-3V3c0-0.553-0.447-1-1-1H7C6.447,2,6,2.447,6,3v1H3C2.447,4,2,4.447,2,5v3c0,4.31,1.799,6.91,4.819,7.012 c0.88,1.509,2.396,2.597,4.181,2.898V20H9v2h6v-2h-2v-2.09c1.784-0.302,3.301-1.39,4.181-2.898C20.201,14.91,22,12.31,22,8V5 C22,4.447,21.553,4,21,4z M4,8V6h2v6.021v0.809C4.216,12.078,4,9.299,4,8z M12,16c-2.206,0-4-1.794-4-4V4h8v8 C16,14.206,14.206,16,12,16z M18,12.83v-0.809V6h2v2C20,9.299,19.784,12.078,18,12.83z">
                    </path>
                </svg> </span>
        </div>
    </div>
</li>