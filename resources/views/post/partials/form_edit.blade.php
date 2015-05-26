<div class="form-group">
   {!! Form::label('text', 'Text:') !!}
   {!! Form::textarea('text', null, ['class' => 'text form-control', 'onkeyup' => 'countChar(this)']) !!}
   <div id="charNum"></div>
</div>

<div class="form-group">
   {!! Form::submit($submitButton, ['class' => 'btn btn-primary form-control']) !!}
</div>