<div class="form-group">
	{!! Form::label('title', 'Title:') !!}
	{!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('hashtag', 'Hashtag:') !!}
	<input name="hashtag" value="{{ $post->hashtag }}" class="form-control">
</div>

<div class="form-group">
	{!! Form::submit($submitButton, ['class' => 'btn btn-primary form-control']) !!}
</div>