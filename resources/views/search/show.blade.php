@extends('master')

@section('content')

	@foreach($postArray as $post)
		@include("story.partials.stories")
	@endforeach

    <div class="headline">Search: {{ $term }}</div>
<div class="col-lg-6">
	<h3 style="text-align: center;">Posts</h3>
    @if (count($postArray))
    	
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
                   <a href="{{ action('PostController@edit', $post->id ) }}">
                         <div id="edit" class="btn btn-primary form-control">edit</div>
                     </a>
                  {!! Form::open(["method" => "DELETE", "route" => ["post.destroy", $post->id]   ]) !!}
                    {!! Form::submit("delete", ["class" => "btn btn-danger form-control story-delete"]) !!}
                  {!! Form::close() !!}
               @endif
           </div>
           @if (Auth::id())
		<button type="button" class="story-panel-button btn btn-primary" 
			style="margin-bottom: 30px;" data-resource="{{$post->id}}">&#43; Add to story
		</button>
	@endif
        @endforeach
    @else
        <div class="post">No posts found.</div>
    @endif
</div>

	<div class=" col-lg-6">
		<h3 style="text-align: center;">Stories</h3>
			@if (count($stories))
                      <div class="post">
				@foreach($stories as $story)
					<a href="{{ action('StoryController@show', $story->id) }}">
						<h4>{{ $story->title }}</h4>
					</a>
				@endforeach
                      </div>
			@else
				<div class="post">No stories found.</div>
			@endif
		
	 </div>


	<script src="{{ asset('js/jquery.min.js') }}"></script>
      <script src="{{ asset('js/story-panel.js') }}"></script>

@stop