@extends('master')

@section('content')

	@foreach($posts as $post)
		@include("story.partials.stories")
	@endforeach

	<div class="headline col-lg-12">User: {{ $user->name }}</div>
	@if(count($user))
		<div class="user_posts col-lg-6">
			<h3 style="text-align: center;">Posts</h3>

			@foreach($posts as $post)
				@include('post.partials.post')
			@endforeach
		</div>

		<div class="user_stories col-lg-6">
			<h3 style="text-align: center;">Stories</h3>
			@if(isset($stories))
				@foreach($stories as $story)
					<div class="post">
						<a href="{{ action('StoryController@show', $story->id) }}">
							<h4>{{ $story->title }}</h4>
						</a>

						@if (Auth::id() == $story->user_id)
							{!! Form::open(["method" => "DELETE", "route" => ["story.destroy", $story->id]   ]) !!}
								{!! Form::submit("delete", ["class" => "btn btn-danger story-delete"]) !!}
							{!! Form::close() !!}
						@endif
					</div>
				@endforeach
			@endif
		</div>
	@endif

@endsection