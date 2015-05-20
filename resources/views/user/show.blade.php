@extends('master')

@section('content')

    @if(count($user))

        <div class="headline">{{ $user[0]['name'] }}</div>

        <div class="user_posts">

        </div>

        <div class="user_stories">

        </div>
    @endif

@stop