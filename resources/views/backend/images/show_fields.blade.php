
<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $image->name !!}</p>
</div>

<!-- Activities Id Field -->
<div class="form-group">
    {!! Form::label('activities_id', 'Activities Title:') !!}
    <p>{{ $image->activities->title }}</p>
</div>

<!-- Tours Id Field -->
<div class="form-group">
    {!! Form::label('tours_id', 'Tours Title:') !!}
    <p>{{ $image->tours->title }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $image->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $image->updated_at !!}</p>
</div>

