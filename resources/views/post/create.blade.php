@extends('master')

@section('content')

    <div class="headline">Create Post</div>

    {!! Form::open(['action' => 'PostController@store', 'files' => true]) !!}
       @include('post.partials.form', ['submitButton' => 'Add Post'])
    {!! Form::close() !!}

    @include('errors.list')

@stop