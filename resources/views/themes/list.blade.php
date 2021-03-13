<section class="container w-full px-4 py-24 mx-auto md:w-3/4 lg:w-2/4">
  <div class="mb-12 text-left md:text-center">
    <h2 class="mb-2 text-3xl font-extrabold leading-tight text-gray-900" style="font-family: Poppins;">
      {{$blog->site_title}}</h2>
    <p class="text-lg text-gray-500" style="font-family: Poppins;">{{$blog->description}}</p>
  </div>
  <div class="flex flex-col space-y-12 divide-y divide-gray-200">
    @foreach ($posts as $post)
    <div>
      @if($post->is_english)
      <p class="pt-12 mb-3 text-sm font-normal text-gray-500">{{$post->published_date->format('F d, Y')}}</p>

      <h2 class="mb-2 text-xl font-extrabold leading-snug tracking-tight text-gray-800 md:text-3xl"
        style="font-family: Poppins;">
        <a href=" {{route('posts.show', ['name' => $blog->name ,'post' => $post->slug])}}"
          class="text-gray-800 hover:text-blue-700">{{$post->title}}</a>
      </h2>

      <p class="mb-4 text-base font-normal text-gray-600" style="font-family: Poppins;">
        {{$post->excerpt}}
      </p>
      @else
      <p class="pt-12 mb-3 text-sm font-normal text-gray-500 text-right faseyha" dir="rtl">
        {{$post->published_date->locale('dv')->isoFormat('Do MMMM YYYY')}}</p>

      <h2 class="mb-2 text-xl font-extrabold leading-snug tracking-tight text-gray-800 md:text-3xl aammu text-right"
        dir="rtl">
        <a href=" {{route('posts.show', ['name' => $blog->name ,'post' => $post->slug])}}"
          class="text-gray-800 hover:text-blue-700">{{$post->title}}</a>
      </h2>
      <p class="mb-4 text-base font-normal text-gray-600 faseyha text-right" dir="rtl">
        {{$post->excerpt}}
      </p>

      @endif

      @if($post->is_english)
      <div class="mt-3">
        <a href="#" class="text-base font-semibold text-blue-600 hover:text-blue-500">
          Read more
        </a>
      </div>
      @else
      <div class="mt-3 flex justify-end mr-2">
        <a href="#" class="text-base font-semibold text-blue-600 hover:text-blue-500 text-right faseyha"
          style="direction: rtl;">
          އިތުރަށް ކިޔާލާ
        </a>
      </div>
      @endif
    </div>
    @endforeach

  </div>

  <div class="border-t border-gray-200 mt-12"> </div>

  <div class="mt-12">
    {{$posts->links()}}
  </div>
</section>