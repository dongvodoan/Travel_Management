<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $activity->id !!}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{!! $activity->title !!}</p>
</div>

<!-- Descibe Field -->
<div class="form-group">
    {!! Form::label('descibe', 'Descibe:') !!}
    <p>{!! $activity->descibe !!}</p>
</div>

<!-- Content Field -->
<div class="form-group">
    {!! Form::label('content', 'Content:') !!}
    <p>{!! $activity->content !!}</p>
</div>

<!-- Types Id Field -->
<div class="form-group">
    {!! Form::label('types_id', 'Types Id:') !!}
    <p>{!! $activity->types_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $activity->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $activity->updated_at !!}</p>
</div>

