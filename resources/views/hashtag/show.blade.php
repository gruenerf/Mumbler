@extends('master')

@section('content')

      @if (count($postArray))
            <div class="headline">{{ $postArray[0]->hashtag }}</div>
            @foreach($postArray as $post)
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
                          <a href="../post/{{$post->id}}/edit">
                              <div id="edit" class="btn btn-primary form-control">edit</div>
                          </a>
                          <a href="{{ action('PostController@destroy', $post->id ) }}">
                     <div id="delete" data-id="{{$post->id}}" class="btn btn-primary form-control">delete</div></a>
                     @endif
                 </div>
            @endforeach
        @else
            <div class="post">No posts found.</div>
        @endif

@stop