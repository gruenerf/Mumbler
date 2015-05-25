@extends('master')

@section('content')

    @foreach($posts as $post)
        @include("story.partials.stories")
    @endforeach

    <div class="headline">All Posts</div>

    @if (count($posts))
        @foreach($posts as $post)
            @include('post.partials.post')
         @endforeach
    @else
        <div class="post">No posts so far.</div>
    @endif

@stop