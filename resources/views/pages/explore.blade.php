@extends('pages.layout')

@section('content')
<div class="py-12">
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
        <div class="flex flex-col items-center justify-center my-4 mb-3" style="font-family: Poppins;">
        <h1 class="font-bold text-2xl leading-10 poppins">
           Explore
        </h1>

        <p class="font-normal text-lg leading-10 poppins">
            Explore publications from other writers.
        </p>
        </div>
        <div class="flex flex-col lg:grid lg:gap-4 2xl:gap-6 lg:grid-cols-4 2xl:row-span-2 2xl:pb-8 ml-2 pt-4 px-6">
         
         @foreach ($posts as $post)
                   <!-- start Card -->
          <a href="{{route('posts.show', ['name' => $post->blog->name ,'post' => $post->slug])}}" class="hover:bg-blue-200 hover:text:white border border-gray-600 lg:order-1 lg:row-span-1 2xl:row-span-1 lg:col-span-2 rounded-lg  mb-5 lg:mb-0">
            <div class="mx-6 my-8 mt-10">
              <h2 class="text-black text-opacity-50 text-md md:text-base 2xl:text-2xl 2xl:my-2 ml-1 sm:ml-5">
                Published {{$post->published_date->format('F d, Y')}}, by {{$post->display_name}}
                </h2>
            </div>
            <div class="-mt-6 relative">
              <p class="text-black text-xl 2xl:text-3xl font-bold px-7 lg:px-9 2xl:pt-6 2xl:mx-2" style="font-family: Poppins;">
                {{$post->title}}
            </p>
              <br />
              <p class="text-black text-opacity-50 font-normal md:text-sm 2xl:text-2xl px-7 lg:px-9 mb-3 2xl:pb-8 2xl:mx-2" style="font-family: Poppins;">
               {{substr( $post->excerpt, 0, 150). " ... "}}
            </p>
            </div>
        </a>
          <!-- End card-->
         @endforeach
      

        </div>
    </div>
    </div>
@endsection