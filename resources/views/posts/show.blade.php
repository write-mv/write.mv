@extends('layouts.default')

@section('meta')
<meta name="title" content="{{$post->meta['title'] ?? ""}}">
<meta name="description" content="{{$post->meta['description'] ?? ""}}">
<meta property="og:url" content="https://write.mv">
<meta property="og:type" content="website">
<meta property="og:description" content="{{$post->meta['description'] ?? ""}}">
<meta property="og:title" content="{{$post->meta['title'] ?? ""}} - Write.mv">
<meta property="og:image" content="{{$post->featuredImageUrl() ?? ""}}">
<meta property="og:site_name" content="Write.mv">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{$post->meta['title'] ?? ""}} - Write.mv">
<meta name="twitter:image" content="{{$post->featuredImageUrl() ?? ""}}">
<meta name="twitter:description" content="{{$post->meta['description'] ?? ""}}">

<title>{{$post->meta['title'] ?? ""}} - Write.mv</title>
@endsection

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
            class="text-gray-900 hover:text-primary-dark"><span itemprop="name">{{$post->display_name}}</span></a>
        </span>
      </div>

      @endif

      @if($post->is_english)
      <time itemprop="datePublished dateModified" datetime="{{$post->published_date->format('F d, Y')}}"
        pubdate>{{$post->published_date->format('F d, Y')}}</time>

      @else
      <time itemprop="datePublished dateModified" class="faseyha" dir="rtl">
        {{$post->published_date->locale('dv')->isoFormat('Do MMMM YYYY')}}
      </time>
      @endif
    </p>
  </div>

  @if($post->featured_image)
  <div class="flex flex-col items-center justify-center">
    <img class="object-cover lg:w-1/2 lg:h-1/2 mb-5 bg-center rounded" src="{{ $post->featuredImageUrl() }}"
      alt="Featured Image">
    <p class="text-base text-gray-500 mt-1 mb-3">{{ $post->featured_image_caption }}</p>
  </div>
  @endif

  @if($post->is_english)
  <div class="mx-auto prose" style="font-family: Poppins;">
    {!! $post->getRenderedHtmlContent() !!}
  </div>
  @else

  <div class="mx-auto prose" dir="rtl">
    {!! $post->getRenderedHtmlContent() !!}
  </div>
  @endif
</article>

@endsection