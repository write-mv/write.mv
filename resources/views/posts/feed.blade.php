<?xml version="1.0" encoding="UTF-8"?>
<rss version='2.0'>
    <channel>
        <link href="{{ url($blog->name."/feed") }}">
        </link>
        <title>Writemv</title>
        @foreach ($posts as $post)
        <item>
            <title>{{ $post->title }}</title>
            <link rel="alternate" href="{{ url(route('posts.show',['name' => $blog->name, 'post' => $post->slug]))}}" />
            <id>{{ url(route('posts.show',['name' => $blog->name, 'post' => $post->slug]))}}</id>
            <description>
                {{  $post->excerpt}}
            </description>
            <updated>{{ $post->updated_at->format('D, d M Y H:i:s +0000') }}</updated>
        </item>
        @endforeach
    </channel>
</rss>