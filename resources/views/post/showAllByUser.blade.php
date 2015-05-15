@extends('master')

@section('content')

    <div class="headline">All Posts</div>

    @if (count($postArray))
        @foreach($postArray as $post)
            <div class="post">
                 @if ($post->mediacontent->type === 'video')
                      <video class="post_video" preload="metadata" controls>
                           <source src="{{ asset($post->mediacontent->src)}}" type="video/mp4" />
                      </video>
                  @else
                      <img class="post_image" src="{{ asset($post->mediacontent->src) }}">
                  @endif
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