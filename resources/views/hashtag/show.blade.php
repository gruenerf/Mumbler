@extends('master')

@section('content')

      @if (count($postArray))
            <div class="headline">{{ $postArray[0]->hashtag }}</div>
            @foreach($postArray as $post)
                <div class="post">
                    <div class="post_mediacontent">
                    @if ($post->mediacontent->type === 'video')
                        <video class="post_video" preload="metadata" controls>
                             <source src="{{ asset($post->mediacontent->src)}}" type="video/mp4" />
                        </video>
                    @else
                        <img class="post_image" src="{{ asset($post->mediacontent->src) }}">
                    @endif
                    </div>
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