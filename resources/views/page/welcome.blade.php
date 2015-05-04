@extends('master')

@section('content')

      @if (count($hashtagArray))
            <div class="headline">Hashtags</div>
            @foreach($hashtagArray as $hashtag)
                <div class="hashtag">
                    <a href="{{ action('HashtagController@show', $hashtag['hashtag']) }}">
                        <div class="post_hashtag">{{ $hashtag['hashtag'] }}</div>
                    </a>
                </div>
            @endforeach
        @else
            <div class="post">No posts found.</div>
        @endif
        
        <form action="{{ action('SearchController@search') }}">
            <input type="text" name="term">
            <input type="submit" name="submit" title="go!">
        </form>

@stop