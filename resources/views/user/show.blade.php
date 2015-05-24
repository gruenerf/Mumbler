@extends('master')

@section('content')
	
	<div class="row">
    <div class="headline col-lg-12">{{ $user->name }} </div>
    @if(count($user))
        <div class="col-lg-10"><div style="float:right"><button class="btn btn-info dropdown" style="margin: 5px;">Sort By<span class="caret"></span></button><button class="btn btn-info" style="margin: 5px;">Search</button></div></div>

        <div class="user_posts col-lg-5">
      
        	<h3>My posts</h3><br>
            @foreach($postArray AS $post)
    		<h4>{{ $post->hashtag }}</h4>
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
                    <a href="{{ action('PostController@edit', $post->id) }}">
                     <div id="edit" class="btn btn-primary form-control">edit</div>
                    </a>
                    <a href="{{ action('PostController@destroy', $post->id) }}">
                        <div id="delete" data-id="{{$post->id}}" class="btn btn-danger form-control">delete</div>
                    </a>
                @endif
            </div>
    		
        @endforeach
        </div>

        <div class="user_stories col-lg-5">
        	<h3>My stories</h3><br>
        	<p><h4>Lorem</h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        	<p><h4>Ipsum</h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        	<p><h4>Dolor</h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div class="user_profile col-lg-2"><div style="width:200px; height: 200px; background:teal; border-radius: 100px;"></div><div style="width:200px; height: 200px; background:#345a5a; margin-top:40px; color:#2fc7c7; word-wrap: break-word; padding: 15px;"><h4>Most Used HasHtags</h4><p>#HasHtag,#HasHtag,#HasHtag,#HasHtag,#HasHtag,#HasHtag,#HasHtag,#HasHtag,#HasHtag</p></div></div>
    @endif
	</div>
@stop