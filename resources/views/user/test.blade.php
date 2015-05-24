@extends('master')

@section('content')

	@foreach($posts as $post)
		@include("story.partials.stories")
	@endforeach

	@if(count($user))
		<div class="headline col-lg-12"><h1>{{ $user->name }}</h1></div>

		<div class="user_posts col-lg-6">
			<h3 style="text-align: center;">Posts</h3>

			@foreach($posts as $post)
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
					
					<a href="{{ action('PostController@show', $post->id) }}">
						<div class="post_headline">{{ $post->title }}</div>
					</a>
					
					<div class="post_content">{{ $post->text }}</div>
					
					<a href="{{ action('HashtagController@show', $post->hashtag) }}">
						<div class="post_hashtag">{{ $post->hashtag }}</div>
					</a>

					@if (Auth::id() == $post->user_id)
						<a href="post/{{$post->id}}/edit">
							<div id="edit" class="btn btn-primary form-control">edit</div>
						</a>
						<div id="delete" data-id="{{$post->id}}" class="btn btn-danger form-control">delete</div>
					@endif
				</div>

				@if (count($usersStories))
					<button type="button" class="story-panel-button btn btn-primary" 
						style="margin-bottom: 30px;" data-resource="{{$post->id}}">&#43; Add to story
					</button>
				@endif
			@endforeach
		</div>

		<div class="user_stories col-lg-6">
			<h3 style="text-align: center;">Stories</h3>
			<div class="post">
			@if(isset($stories))
				@foreach($stories as $story)
					<a href="{{ action('StoryController@show', $story->id) }}">
						<h4>{{ $story->title }}</h4>
					</a>
				@endforeach
			@endif
			</div>
		</div>
	@endif
	

	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script>
		/*
		$('.test').on('click', function(e) {
			var resource = $(this).data("resource");

			$.ajax({
				url: '/' + resource,
				dataType:'json',
				type: 'post',
				success:function(data) {
					console.log(data);
				}
			});
		});
		*/
	
		$('.story-panel-button').on('click', function(e)
		{
			var resource = $(this).data("resource");
			$(".story-panel" + resource).toggle();
		});
	</script>

@endsection