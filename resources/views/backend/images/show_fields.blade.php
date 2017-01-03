<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $image->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $image->name !!}</p>
</div>

<!-- Activities Id Field -->
<div class="form-group">
    {!! Form::label('activities_id', 'Activities Id:') !!}
    <p>{!! $image->activities_id !!}</p>
</div>

<!-- Tours Id Field -->
<div class="form-group">
    {!! Form::label('tours_id', 'Tours Id:') !!}
    <p>{!! $image->tours_id !!}</p>
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

