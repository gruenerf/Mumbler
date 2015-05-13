@extends('master')

@section('content')

      @if (count($hashtagArray))
            <div class="headline">Hashtags</div>

            @foreach($hashtagArray as $hashtag)
                <div class="hashtag">
                    <a href="{{ action('HashtagController@show', $hashtag->hashtag) }}">
                        <div class="post_hashtag">{{ $hashtag->hashtag }}</div>
                    </a>
                </div>
            @endforeach
        @else
            <div class="post">No posts found.</div>
        @endif

        {!! Form::open(['action' => 'SearchController@show']) !!}
           {!! Form::label('text', 'Search:') !!}
           {!! Form::text('text', null, ['class' => 'form-control']) !!}
           {!! Form::submit('search', ['name' => 'submit', 'class' => 'btn btn-primary form-control'])!!}
        {!! Form::close() !!}
@stop