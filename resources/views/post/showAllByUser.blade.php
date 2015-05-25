@extends('master')

@section('content')

    <div class="headline">All Posts</div>

    @if (count($postArray))
        @foreach($postArray as $post)
            @include('post.partials.post')
        @endforeach
    @else
        <div class="post">No posts so far.</div>
    @endif

@stop