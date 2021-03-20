<section class="container w-full px-4 py-24 mx-auto md:w-3/4 lg:w-2/4">
    <div class="mb-12 text-center">
        <h2 class="mb-2 text-3xl font-extrabold leading-tight text-gray-900" style="font-family: Poppins;">
            {{$blog->site_title}}</h2>
        <p class="text-lg text-gray-500" style="font-family: Poppins;">{{$blog->description}}</p>
    </div>
    <div class="grid md:grid-cols-2 sm:grid-cols-1 gap-3 lg:grid-cols-3 m-5 mb-10">

        @foreach ($posts as $post)

        @if($post->is_english)
        <!-- start Card -->
        <a href="{{route('posts.show', ['name' => $blog->name ,'post' => $post->slug])}}"
            class=" shadow-sm rounded-lg mb-5 lg:mb-0 hover:shadow-lg border border-gray-400"
            style="background-color:#F9F4F0;">
            <div class="mx-6 my-8 mt-10">
                <h2 class="text-black text-opacity-70 text-md 2xl:my-2 ml-1 sm:ml-5" style="font-family: Poppins;">
                    Published {{$post->published_date->format('F d, Y')}}@if($post->show_author)<div>by
                        {{$post->display_name}}
                    </div>@endif
                </h2>
            </div>
            <div class="-mt-6 relative">

                <p class="text-black text-xl font-bold px-7 lg:px-9 2xl:pt-6 2xl:mx-2" style="font-family: Poppins;">
                    {{$post->title}}
                </p>
                <br />

                <p class="text-black text-opacity-70 font-normal text-sm  px-7 lg:px-9 mb-3 2xl:pb-8 2xl:mx-2 leading-7"
                    style="font-family: Poppins;">
                    {{substr( $post->excerpt, 0, 150). " ... "}}
                </p>

            </div>
        </a>
        <!-- End card-->
        @else
        <!-- start Card -->
        <a href="{{route('posts.show', ['name' => $blog->name ,'post' => $post->slug])}}"
            class=" shadow-sm rounded-lg mb-5 lg:mb-0 hover:shadow-lg border border-gray-400"
            style="background-color:#F9F4F0;">
            <div class="mx-6 my-8 mt-10">
                <h2 class="text-black text-opacity-70 text-md 2xl:my-2 ml-1 sm:ml-5 typer" dir="rtl">
                    {{$post->published_date->locale('dv')->isoFormat('Do MMMM YYYY')}}
                </h2>
            </div>
            <div class="-mt-6 relative">

                <p class="text-black text-xl 2xl:text-2xl font-bold px-7 lg:px-9 2xl:pt-6 2xl:mx-2 aammu" dir="rtl">
                    {{$post->title}}
                </p>
                <br />

                <p class="text-black text-opacity-70 font-normal text-sm  px-7 lg:px-9 mb-3 2xl:pb-8 2xl:mx-2 typer leading-7"
                    dir="rtl">
                    {{ $post->excerpt}}
                </p>

            </div>
        </a>
        <!-- End card-->
        @endif


        @endforeach

    </div>


    <div class="mt-12">
        {{$posts->links()}}
    </div>
</section>