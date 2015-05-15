@extends('master')

@section('content')

    <div class="headline">Single Post</div>

    <div class="post">
        @if ($post->mediacontent->type === 'video')
            <video class="post_video" preload="metadata" controls>
                 <source src="{{ asset($post->mediacontent->src)}}" type="video/mp4" />
            </video>
        @else
            <img class="post_image" src="{{ asset($post->mediacontent->src) }}">
        @endif
        <div class="post_headline">{{ $post->title }}</div>
        <div class="post_content">{{ $post->text }}</div>
    </div>

@stop