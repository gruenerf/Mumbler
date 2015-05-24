@extends('master')

@section('content')

    @foreach($posts as $post)
        @include("story.partials.stories")
    @endforeach

    <div class="headline">All Posts</div>

    @if (count($posts))
        @foreach($posts as $post)
            <div class="post">
                <div class="username"><a href="{{ action('UserController@show', $post->user->name )}}">{{$post->user->name}}</a></div>
                <div class="post_mediacontent">
                   @if ($post->mediacontent->type === 'video')
                       <video class="post_video" preload="metadata" controls>
                            <source src="{{ asset($post->mediacontent->src)}}" type="video/mp4" />
                       </video>
                   @else
                       <img class="post_image" src="{{ asset($post->mediacontent->src) }}">
                   @endif
                    </div>
                <a href="{{ action('PostController@show', $post->id) }}">
                    <div class="post_headline">{{ $post->title }}</div>
                </a>
                <div class="post_content">{{ $post->text }}</div>
                <a href="{{ action('HashtagController@show', $post->hashtag) }}">
                    <div class="post_hashtag">{{ $post->hashtag }}</div>
                </a>

                @if (Auth::id() == $post->user_id)
                     <a href="{{ action('PostController@edit', $post->id ) }}">
                         <div id="edit" class="btn btn-primary form-control">edit</div>
                     </a>
                     <a href="{{ action('PostController@destroy', $post->id ) }}">
                     <div id="delete" data-id="{{$post->id}}" class="btn btn-primary form-control">delete</div></a>
                     <a href="post/{{$post->id}}/edit">
                         <div id="edit" class="btn btn-primary form-control">edit</div>
                     </a>
                     <div id="delete" data-id="{{$post->id}}" class="btn btn-danger form-control">delete</div>
                @endif
            </div>

            @if(count($usersStories))
                <button type="button" class="story-panel-button btn btn-primary" 
                    style="margin-bottom: 30px;" data-resource="{{$post->id}}">&#43; Add to story
                </button>
            @endif
         @endforeach
    @else
        <div class="post">No posts so far.</div>
    @endif



    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script>
        $('.story-panel-button').on('click', function(e)
        {
            var resource = $(this).data("resource");
            $(".story-panel" + resource).toggle();
        });
    </script>

@stop