@extends('layouts.default')

@section('content')
<article class="container px-4 py-24 mx-auto" itemid="#" itemscope itemtype="http://schema.org/BlogPosting">
  <div class="w-full mx-auto mb-12 text-center md:w-2/3">

    @if($post->is_english)
    <h1 class="mb-3 text-4xl font-bold text-gray-900 md:leading-tight md:text-5xl" style="font-family: Poppins;">
      {{$post->title}}
    </h1>
    @else
    <h1 class="mb-3 text-4xl font-bold text-gray-900 md:leading-tight md:text-5xl aammu" dir="rtl">
      {{$post->title}}
    </h1>
    @endif

    <p class="text-gray-700">
      @if($post->show_author)
      <div>
        Written by
        <span class="byline author vcard" itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person">
          <a target="_blank" itemprop="url" rel="author noopener noreferrer"
            class="text-primary hover:text-primary-dark"><span itemprop="name">{{$post->display_name}}</span></a>
        </span>
      </div>
      on
      @endif

      @if($is_english)
      <time itemprop="datePublished dateModified" datetime="{{$post->published_date->format('F d, Y')}}"
        pubdate>{{$post->published_date->format('F d, Y')}}</time>

      @else
      <time itemprop="datePublished dateModified"
        datetime="{{$post->published_date->locale('dv')->isoFormat('F d, Y')}}" dir="rtl">
        {{$post->published_date->locale('dv')->isoFormat('F d, Y')}}</time>


      @endif
    </p>
  </div>

  @if($post->is_english)
  <div class="mx-auto prose" style="font-family: Poppins;">
    {!! (new \nadar\quill\Lexer($post->content))->render() !!}
  </div>
  @else

  <div class="mx-auto prose" dir="rtl">
    {!! (new \nadar\quill\Lexer($post->content))->render() !!}
  </div>
  @endif
</article>

@endsection