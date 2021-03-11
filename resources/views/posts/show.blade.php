@extends('layouts.default')

@section('content')
<article class="container px-4 py-24 mx-auto" itemid="#" itemscope itemtype="http://schema.org/BlogPosting">
  <div class="w-full mx-auto mb-12 text-center md:w-2/3">
    <p class="mb-3 text-xs font-semibold tracking-wider text-gray-500 uppercase">Development</p>
    <h1 class="mb-3 text-4xl font-bold text-gray-900 md:leading-tight md:text-5xl {{$post->is_english ? "" : "aammu"}}">
    {{$post->title}}
    </h1>
    <p class="text-gray-700">
      Written by
      <span class="font-semibold">
       {{$post->show_author ? $post->display_name : ""}}
      </span>
      on <time>{{$post->published_date->format('F d, Y')}}</time>
    </p>
  </div>

  <div class="mx-auto">
   {!! (new \nadar\quill\Lexer($post->content))->render() !!}
  </div>
</article>

@endsection