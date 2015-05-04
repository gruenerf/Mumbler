@extends('master')

@section('content')

      @if (count($postArray))
            <div class="headline">{{ $postArray[0]->hashtag }}</div>
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
            <div class="post">No posts found.</div>
        @endif

@stop