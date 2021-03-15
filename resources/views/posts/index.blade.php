@extends('layouts.default')

@section('meta')
<meta name="title" content="{{$blog->site_title}}">
<meta name="description" content="{{$blog->description ?? ""}}">
<meta property="og:url" content="https://write.mv">
<meta property="og:type" content="website">
<meta property="og:description" content="{{$blog->description ?? ""}}">
<meta property="og:title" content="{{$blog->site_title}} - Write.mv">
<meta property="og:image" content="">
<meta property="og:site_name" content="Write.mv">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{$blog->site_title}} - Write.mv">
<meta name="twitter:image" content="">
<meta name="twitter:description" content="{{$blog->description ?? ""}}">
<title>{{$blog->site_title}} - Write.mv</title>
@endsection
@section('content')

@if($blog->is_grid)
@include('themes.grid')

@else
@include('themes.list')
@endif
@endsection