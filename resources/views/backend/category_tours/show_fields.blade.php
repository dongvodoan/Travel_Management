
<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $categoryTour->name }}</p>
</div>

<!-- Describe Field -->
<div class="form-group">
    {!! Form::label('describe', 'Describe:') !!}
    <p>{{ $categoryTour->describe }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $categoryTour->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $categoryTour->updated_at !!}</p>
</div>

