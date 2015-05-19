@extends('master')

@section('content')

	<div class="headline">Create Story</div>

	{!! Form::open(['action' => 'StoryController@store']) !!}
		@include('story.partials.form', ['submitButton' => 'Create Story'])
	{!! Form::close() !!}

	@include('errors.list')

@endsection