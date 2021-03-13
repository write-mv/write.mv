@extends('layouts.default')

@section('content')

@if($blog->is_grid)
@include('themes.grid')

@else
@include('themes.list')
@endif
@endsection