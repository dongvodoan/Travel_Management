
<!-- Time Field -->
<div class="form-group">
    {!! Form::label('time', 'Time:') !!}
    <p>{{ $time->time }}</p>
</div>

<!-- Describe Field -->
<div class="form-group">
    {!! Form::label('describe', 'Describe:') !!}
    <p>{{ $time->describe }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $time->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $time->updated_at !!}</p>
</div>

