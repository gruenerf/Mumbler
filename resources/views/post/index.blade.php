@extends('master')

@section('content')

    <div class="headline">All Posts</div>

    @if (count($postArray))
        @foreach($postArray as $post)
            <div class="post">
                <div class="post_mediacontent">{{ $post->media_content }}</div>
                <a href="{{ action('PostController@show', $post->id) }}">
                    <div class="post_headline">{{ $post->title }}</div>
                </a>
                <div class="post_content">{{ $post->text }}</div>
                <a href="{{ action('HashtagController@show', $post->hashtag) }}">
                    <div class="post_hashtag">{{ $post->hashtag }}</div>
                </a>
            </div>
        @endforeach
    @else
        <div class="post">No posts so far.</div>
    @endif


@stop