@extends('master')

@section('content')

    <div class="headline">Edit {{ $post->title }}</div>

    {!! Form::model($post,['method' => 'PATCH', 'action' => ['PostController@update', $post->id]]) !!}
         @include('post.partials.form_edit', ['submitButton' => 'Update Post'])
    {!! Form::close() !!}

    @include('errors.list')

@stop