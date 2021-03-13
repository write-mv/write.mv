@extends('layouts.default')

@section('content')
<article class="container px-4 py-24 mx-auto" itemid="#" itemscope itemtype="http://schema.org/BlogPosting">
  <div class="w-full mx-auto mb-12 text-center md:w-2/3">
    <h1 class="mb-3 text-4xl font-bold text-gray-900 md:leading-tight md:text-5xl {{$post->is_english ? "" : "aammu"}}">
      {{$post->title}}
      </h1>
    <p class="text-gray-700">
      @if($post->show_author)
      <div>
      Written by
      <span class="byline author vcard" itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person">
        <a target="_blank" itemprop="url" rel="author noopener noreferrer" class="text-primary hover:text-primary-dark"><span itemprop="name">{{$post->display_name}}</span></a>
      </span>
      </div>
      on
      @endif
       <time itemprop="datePublished dateModified" datetime="{{$post->published_date->format('F d, Y')}}" pubdate>{{$post->published_date->format('F d, Y')}}</time>
    </p>
  </div>

  <div class="mx-auto prose" style="font-family: Poppins;">
    {!! (new \nadar\quill\Lexer($post->content))->render() !!}
  </div>
</article>

@endsection