@extends('master')

@section('content')

	<div class="headline">Edit {{ $story->title }}</div>

	{!! Form::model($story,['method' => 'PATCH', 'action' => ['StoryController@update', $story->id]]) !!}
		@include('story.partials.form', ['submitButton' => 'Update Story'])
	{!! Form::close() !!}

	@include('errors.list')

@endsection