@extends('master')

@section('content')

    @foreach($posts as $post)
        @include("story.partials.stories")
    @endforeach

      @if (count($posts))
            <div class="headline">Hashtag: {{ $posts[0]->hashtag }}</div>
            @foreach($posts as $post)
                @include('post.partials.post')


            @endforeach
        @else
            <div class="post">No posts found.</div>
        @endif
@stop