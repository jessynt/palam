@extends('layouts.home')
@section('meta')
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $post->title }}">
    <meta property="og:url" content="{{ Request::url() }}">
    <meta property="og:description" content="{{ $post->description }}">
    <meta property="og:image" content="">
    <meta property="og:updated_time" content="{{ $post->updated_at }}">
@endsection

@section('content')
    <article class="post post-{{ $post->id }}">
        <h1 class="title">{{ $post->title }}</h1>
        <div class="meta">
            <span class="date">Published on <time
                        datetime="{{ $post->created_at }}">{{ $post->created_at->toFormattedDateString() }}</time></span>
        </div>
        <div class="entry-content markdown-body">
            <div class="toc-container"></div>
            {!! $post->body !!}
        </div>
    </article>
@endsection
@section('title', $post->title)
@section('description', $post->description)