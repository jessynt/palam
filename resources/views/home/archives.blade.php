@extends('layouts.home')
@section('title', '归档')

@section('content')
    <div class="archive">
        @foreach($posts as $key => $post)
            <h2>{{ $key }}</h2>
            @foreach($post as $item)
                <div class="post-item">
                    <div class="post-info">{{ $item->created_at->toFormattedDateString() }}</div>
                    <div class="post-title-link">
                        <a href="{{ route('home.show', ['slug' => $item->slug]) }}">{{ $item->title }}</a>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>
@endsection