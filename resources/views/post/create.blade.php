@extends('master')

@section('content')

    <div class="headline">Create Post</div>

    {!! Form::open(['action' => 'PostController@store']) !!}
       @include('post.partials.form', ['submitButton' => 'Add Post'])
    {!! Form::close() !!}

    @include('errors.list')

@stop