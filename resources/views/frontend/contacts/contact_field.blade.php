
<!-- Fullname Field -->
<div class="form-group {{ $errors->has('fullname') ? ' has-error' : '' }}">
  {!! Form::label('fullname', 'Full name:(*)') !!}
  {!! Form::text('fullname', null, ['class' => 'form-control','placeholder' => 'Full name']) !!}
  @if ($errors->has('fullname'))
    <span class="help-block">
        <strong>{{ $errors->first('fullname') }}</strong>
    </span>
  @endif
</div>

<!-- Email Field -->
<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
  {!! Form::label('email', 'Email:(*)') !!}
  {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
  @if ($errors->has('email'))
    <span class="help-block">
        <strong>{{ $errors->first('email') }}</strong>
    </span>
  @endif
</div>

<!-- Phone Field -->
<div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
  {!! Form::label('phone', 'Phone Number:(*)') !!}
  {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Phone number']) !!}
  @if ($errors->has('phone'))
    <span class="help-block">
        <strong>{{ $errors->first('phone') }}</strong>
    </span>
  @endif
</div>

<!-- Subject Field -->
<div class="form-group {{ $errors->has('subject') ? ' has-error' : '' }}">
  {!! Form::label('subject', 'Subject:(*)') !!}
  {!! Form::text('subject', null, ['class' => 'form-control', 'placeholder' => 'Subject']) !!}
  @if ($errors->has('subject'))
    <span class="help-block">
        <strong>{{ $errors->first('subject') }}</strong>
    </span>
  @endif
</div>

<!-- Message Field -->
<div class="form-group {{ $errors->has('content') ? ' has-error' : '' }}">
  {!! Form::label('content', 'Message:(*)') !!}
  {!! Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'Message']) !!} 

  @if ($errors->has('content'))
    <span class="help-block">
        <strong>{{ $errors->first('content') }}</strong>
    </span>
  @endif
</div>

<!-- Human Field -->
<div class="form-group {{ $errors->has('human') ? ' has-error' : '' }}">
  {!! Form::label('human', 'Human verification:(*)') !!}
  {!! Form::text('human', null, ['class' => 'form-control', 'placeholder' => 'Human number']) !!}
  {!! Form::label('human', '+ 3 = five (Pls enter a number)', ['style' => 'color:red;']) !!}
  @if ($errors->has('human'))
    <span class="help-block">
        <strong>{{ $errors->first('human') }}</strong>
    </span>
  @endif
</div>

<!-- Submit Field -->
<div class="clear"></div>
<div class="btns">
  
    {!! Form::submit('Send', ['class' => 'btn btn-primary']) !!}
    {!! Form::reset('Clear', ['class' => 'btn btn-danger']) !!}
       
</div>
<div class="clear"></div> 
