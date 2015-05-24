@if (count($usersStories))
	<div 	style="position: fixed; top: 0; right: 0; 
			height: 100%; 
			display: none; 
			background-color: #F7F7F7; 
			z-index: 100; 
			border: 1px solid #eee;
			width: 400px;"
		class="story-panel{{$post->id}}">

		{!! Form::open(['action' => 'StoryController@addToStory']) !!}
			<div style="height: 100%; overflow-y: scroll; border-bottom: 1px solid #aaa; padding: 5px; width:  100%;">
				
				<h4 style="font-variant: small-caps; letter-spacing: 1px;">stories</h4>
				{!! Form::submit("Add", ["name" => "submit", "class" => "btn btn-primary"]) !!}<br>
		
				
				<input name="postId" type="hidden" value="{{ $post->id }}">

				@foreach($usersStories as $story)
					@if ($post->hashtag == $story->hashtag)
						<div style="border-top: 1px solid #ddd; padding: 5px 0;">
							<label style="cursor: pointer; padding:10px;">
								<span style="font-size: 18px;">{{ $story->title }}</span> <input type="radio" name="story" value="{{ $story->id }}"> 
							</label>
							<span style="color: #bbb; padding-right: 5px;">in</span>
							<span style="color: #606060;">{{ $story->hashtag }}</span>
						</div>
					@else
						<div style="border-top: 1px solid #ddd; padding: 5px 0;">
							<label style="cursor: pointer; padding:10px;">
								<span style="font-size: 18px;">{{ $story->title }}</span> <input type="radio" disabled name="story" value="{{ $story->id }}">
							</label>
							<span style="color: #bbb; padding-right: 5px;">in</span>
							<span style="color: #606060;">{{ $story->hashtag }}</span>
						</div>
					@endif
				@endforeach
			</div>
		{!! Form::close() !!}

		<div style="padding: 10px; height: 100%; background-color: #EAEAEA;">
			{!! Form::open(['action' => 'StoryController@store']) !!}
				@include('story.partials.form', ['submitButton' => 'Create new story'])
			{!! Form::close() !!}
		</div>
	</div>
@endif