@extends('master')

@section('content')

    @if (count($post))
            @include('post.partials.post')
   @else
           <div class="post">No posts found.</div>
   @endif

@stop