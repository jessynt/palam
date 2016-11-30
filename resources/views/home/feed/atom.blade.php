{!! '<'.'?'.'xml version="1.0" encoding="UTF-8" ?>' !!}
<feed xmlns="http://www.w3.org/2005/Atom">
    <title>@yield('title', 'Default Title')</title>
    <link href="{{  url('/') }}"/>
    <id>{{  url('/') }}</id>
    @foreach($posts as $post)
        <entry>
            <title>{{ $post->title }}</title>
            <link href="{{ route('home.show', ['slug' => $post->slug]) }}"/>
            <id>{{ route('home.show', ['slug' => $post->slug])}} {{ $post->title }}</id>
            <published>{{ $post->created_at }}</published>
            <updated>{{ $post->updated_at }}</updated>
            <content type="html">{{ $post->body }}
            </content>
            <summary type="html">{{ $post->description }}</summary>
            @foreach($post->tags as $tag)
                <category term="{{$tag->name}}"/>
            @endforeach
        </entry>
    @endforeach
</feed>


