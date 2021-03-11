@extends('layouts.default')

@section('content')
<section class="container w-full px-4 py-24 mx-auto md:w-3/4 lg:w-2/4">
    <div class="mb-12 text-left md:text-center">
      <h2 class="mb-2 text-3xl font-extrabold leading-tight text-gray-900">{{$blog->site_title}}</h2>
      <p class="text-lg text-gray-500">{{$blog->description}}</p>
    </div>
    <div class="flex flex-col space-y-12 divide-y divide-gray-200">
        @foreach ($posts as $post)
        <div>
            <p class="pt-12 mb-3 text-sm font-normal text-gray-500">{{$post->published_date->format('F d, Y')}}</p>
            <h2 class="mb-2 text-xl font-extrabold leading-snug tracking-tight text-gray-800 md:text-3xl">
              <a href="#" class="text-gray-900 hover:text-purple-700">{{$post->title}}</a>
            </h2>
            <p class="mb-4 text-base font-normal text-gray-600">
                {{$post->excerpt}}
            </p>
            <a href="#" class="btn btn-light btn-sm">Continue Reading</a>
          </div>
        @endforeach
    
    </div>

    <div class="border-t border-gray-200 mt-12"> </div>
    
    <div class="mt-12">
        {{$posts->links()}}
    </div>
  </section> 
@endsection

@section('footer')
<footer class="mb-4">
    <div class="flex justify-center">
        <p class="mb-8 text-sm text-center text-gray-700 md:text-left md:mb-0">Powered by <a href="https://write.mv"><span class="font-semibold text-blue-500">Write.mv</span></a></p>

    </div>
  </footer> 
@endsection