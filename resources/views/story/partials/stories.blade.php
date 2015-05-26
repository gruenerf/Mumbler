<div class="sp story-panel story-panel{{$post->id}}">

	{!! Form::open(['action' => 'StoryController@addToStory', 'class'=>'panel-form']) !!}
		<div style="padding: 5px; width:  100%;">

			<div class="story-panel-close btn" style="margin-right: 15px; padding: 10px 12px; position: absolute; top: 0; right: 0;">
				<span class="glyphicon glyphicon-remove" aria-hidden="true" style="font-size: 25px; display: inline-block; color: #aaa;"></span>
			</div>
			
			<h4 class="panel-header" style="padding-left: 10px;">your stories</h4>
	
			<input name="postId" type="hidden" value="{{ $post->id }}">

			@foreach($usersStories as $story)
				@if ($post->hashtag == $story->hashtag)
					<div class="enabled" style="border-top: 1px solid #ddd; padding: 5px 0;">
						<label style="cursor: pointer; padding:10px; width: 90%;">
							<span style="font-size: 18px;">{{ $story->title }}</span> 
								<input type="radio" name="story" value="{{ $story->id }}"> 
							<span style="color: #bbb; padding-right: 5px;">in</span>
							<span style="color: #606060;">{{ $story->hashtag }}</span>
							<input type="submit" name="submit" value="Add" class="btn btn-primary add-button {{ $story->id }}">
						</label>
					</div>
				@else
					<div class="disabled" style="border-top: 1px solid #ddd; padding: 5px 0;">
						<label style="cursor: pointer; padding:10px; width: 90%;">
							<span style="font-size: 18px; color: #ddd;">{{ $story->title }}</span> 
								<input type="radio" disabled name="story" value="{{ $story->id }}">
							<span style="color: #bbb; padding-right: 5px;">in</span>
							<span style="color: #606060;">{{ $story->hashtag }}</span>
							<input type="submit" name="submit" value="Add" class="btn btn-primary add-button {{ $story->id }}">
						</label>
					</div>
				@endif
			@endforeach
		</div>
	{!! Form::close() !!}

	<div style="padding: 10px; height: 100%; background-color: #EAEAEA;">
	<h4 class="panel-header">create new story</h4>
		{!! Form::open(['action' => 'StoryController@store']) !!}
			<input name="postId" type="hidden" value="{{ $post->id }}">
			@include('story.partials.form', ['submitButton' => 'Create new story'])
		{!! Form::close() !!}
	</div>
</div>