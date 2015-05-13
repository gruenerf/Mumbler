<div class="form-group">
   {!! Form::label('text', 'Text:') !!}
   {!! Form::textarea('text', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
   {!! Form::label('media_content', 'Mediacontent ( Filetypes: mp4,jpeg,png,bmp,gif ):') !!}
   {!! Form::file('media_content', ['class' => 'form-control']); !!}
</div>

<div class="form-group">
   {!! Form::label('hashtag', 'Hashtag:') !!}
   {!! Form::text('hashtag', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
   {!! Form::submit($submitButton, ['class' => 'btn btn-primary form-control']) !!}
</div>