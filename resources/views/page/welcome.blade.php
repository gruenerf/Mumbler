@extends('master')

@section('content')

      @if (count($hashtagArray))
            <div id="hashtags">
                @foreach($hashtagArray as $hashtag)
                    <div class="hashtag">
                        <a href="{{ action('HashtagController@show', $hashtag->hashtag) }}" rel="{{ rand(4,12) }}">
                            <div class="post_hashtag">{{ $hashtag->hashtag }}</div>
                        </a>
                    </div>
                @endforeach
            </div>

        @else
            <div class="post">No posts found.</div>
        @endif

        {!! Form::open(['class' => 'search_form']) !!}
           {!! Form::text('term', null, ['class' => 'hashtag form-control', 'id' => 'search_text', 'placeholder' => 'Search for posts or stories.']) !!}
           {!! Form::submit('search', ['name' => 'submit', 'id' => 'search_submit', 'class' => 'btn btn-primary form-control'])!!}
        {!! Form::close() !!}
@stop

@section('footer')
    <script src="{{ asset('js/jquery.tagcloud.js') }}"></script>
    <script src="{{ asset('js/search.js') }}"></script>
@stop