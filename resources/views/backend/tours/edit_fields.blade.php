<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Describe Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('describe', 'Describe:') !!}
    {!! Form::textarea('describe', null, ['class' => 'form-control']) !!}
</div>

<!-- Time Field-->
<div class="form-group col-sm-6">	
    {!! Form::label('times_id', 'Time Tour') !!}
    <select name="times_id" class="form-control">
    	<option value=""></option>
    	@foreach($times as $time)
    	<option @if(($time->time)===($tour->times->time)) selected @endif value="{!! $time->id !!}">{!! $time->time !!}</option>
    	@endforeach
    </select>	
</div>

<!-- Price Field-->
<div class="form-group col-sm-6">	
    {!! Form::label('prices_id', 'Price Tour') !!}
    <select name="prices_id" class="form-control">
    	<option value=""></option>
    	@foreach($prices as $price)
    	<option @if(($price->title)===($tour->prices->title)) selected @endif value="{!! $price->id !!}">{!! $price->title !!}</option>
    	@endforeach
    </select>	
</div>

<!-- Itinerary Field-->
<div class="form-group col-sm-6">	
    {!! Form::label('itineraries_id', 'Itinerary Tour') !!}
    <select name="itineraries_id" class="form-control">
    	<option value=""></option>
    	@foreach($itineraries as $itinerary)
    	<option @if(($itinerary->title)===($tour->itineraries->title)) selected @endif value="{!! $itinerary->id !!}">{!! $itinerary->title !!}</option>
    	@endforeach
    </select>	
</div>

<!-- Categoty tour Field-->
<div class="form-group col-sm-6">	
    {!! Form::label('category_tours_id', 'Category Tour') !!}
    <select name="category_tours_id" class="form-control">
    	<option value=""></option>
    	@foreach($categoryTours as $categoryTour)
    	<option @if(($categoryTour->name)===($tour->category_tours->name)) selected @endif value="{!! $categoryTour->id !!}">{!! $categoryTour->name !!}</option>
    	@endforeach
    </select>	
</div>

{{-- @foreach($tour->places as $place_check) {!!$place_check->name!!} @endforeach --}}
<!-- Place Field -->
<div class="form-group col-sm-12 col-lg-12">
	<div class="col col-lg-1 col-md-1">
		 {!! Form::label('place', 'Choose Place') !!}
	</div>
	<div class="col col-lg-11 col-md-11 thumbnail">
		@foreach($places as $place)
		<input type="checkbox" name="check_list[]" @foreach($tour->places as $place1) @if($place->id === $place1->id) checked @else false @endif @endforeach value="{{ $place->id }}" id="{{ $place->name }}">
        <label for="{!! $place->name !!}" style="margin-right: 10px">{!! $place->name !!}</label>
	@endforeach
	</div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tours.index') !!}" class="btn btn-default">Cancel</a>
</div>
