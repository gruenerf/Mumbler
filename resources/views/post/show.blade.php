@extends('master')

@section('content')

    <div class="headline">Single Post</div>

    <div class="post">
        <div class="post_mediacontent">{{ $post->media_content }}</div>
        <div class="post_headline">{{ $post->title }}</div>
        <div class="post_content">{{ $post->text }}</div>
    </div>

@stop