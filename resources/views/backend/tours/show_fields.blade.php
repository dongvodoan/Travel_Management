<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $tour->id !!}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{!! $tour->title !!}</p>
</div>

<!-- Describe Field -->
<div class="form-group">
    {!! Form::label('describe', 'Describe:') !!}
    <p>{!! $tour->describe !!}</p>
</div>

<!-- Times Id Field -->
<div class="form-group">
    {!! Form::label('times_id', 'Times Id:') !!}
    <p>{!! $tour->times_id !!}</p>
</div>

<!-- Prices Id Field -->
<div class="form-group">
    {!! Form::label('prices_id', 'Prices Id:') !!}
    <p>{!! $tour->prices_id !!}</p>
</div>

<!-- Itineraries Id Field -->
<div class="form-group">
    {!! Form::label('itineraries_id', 'Itineraries Id:') !!}
    <p>{!! $tour->itineraries_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $tour->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $tour->updated_at !!}</p>
</div>

