@extends('master')

@section('content')
	<div class="headline">Story: {{ $story->title }}</div>


	@foreach($posts as $post)
		@include("story.partials.stories")
	@endforeach
	
	@if (count($posts))
		@foreach($posts as $post)
			@include('post.partials.post')
		@endforeach

		@include('errors.list')

	@else
		<div class="post">No posts so far.</div>
	@endif

@endsection