<div class="post">

    <div class="top_content">
         <div class="username">
             <a href="{{ action('UserController@show', $post->user->name )}}">{{$post->user->name}}</a>
         </div>

         <div class="date">
             {{ $post->created_at->format('H:i:s d.m.y') }}
         </div>
    </div>

    <div class="post_mediacontent">
       @if ($post->mediacontent->type === 'video')
           <video class="post_video" preload="none" controls>
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

    <div class="bottom_content">
        <a href="{{ action('HashtagController@show', $post->hashtag) }}">
            <div class="post_hashtag">{{ $post->hashtag }}</div>
        </a>

         @if (Auth::id())
             <button type="button" class="story-panel-button btn btn-primary"
             data-resource="{{$post->id}}">&#43; Add to story
            </button>
        @endif
    </div>

    @if (Auth::id() == $post->user_id)
         <a href="{{ action('PostController@edit', $post->id ) }}">
                 <div id="edit" class="btn btn-primary form-control">edit</div>
             </a>
          {!! Form::open(["method" => "DELETE", "route" => ["post.destroy", $post->id]   ]) !!}
             {!! Form::submit("delete", ["class" => "btn btn-danger form-control story-delete"]) !!}
          {!! Form::close() !!}
    @endif

</div>