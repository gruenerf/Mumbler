@extends('master')

@section('content')

	@foreach($postArray as $post)
		@include("story.partials.stories")
	@endforeach

    <div class="headline">Search: {{ $term }}</div>

    <div class="col-lg-6">
        <h3 style="text-align: center;">Posts</h3>
        @if (count($postArray))

            @foreach($postArray as $post)
               @include('post.partials.post')
            @endforeach
        @else
            <div class="post">No posts found.</div>
        @endif
    </div>

	<div class=" col-lg-6">
		<h3 style="text-align: center;">Stories</h3>
			@if (count($stories))
                      <div class="post">
				@foreach($stories as $story)
					<a href="{{ action('StoryController@show', $story->id) }}">
						<h4>{{ $story->title }}</h4>
					</a>
				@endforeach
                      </div>
			@else
				<div class="post">No stories found.</div>
			@endif
	 </div>

@stop