<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Place Field -->
<div class="form-group col-sm-6"> 
    {!! Form::label('place', 'Choose Places') !!}
    <select name="check_list[]" multiple id="subject" class="form-control">
        <option value=""></option>
        @foreach($places as $place)
        <option value="{!! $place->id !!}">{!! $place->name !!}</option>
        @endforeach
    </select>
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
    	<option value="{!! $time->id !!}">{!! $time->time !!}</option>
    	@endforeach
    </select>	
</div>

<!-- Price Field-->
<div class="form-group col-sm-6">	
    {!! Form::label('prices_id', 'Price Tour') !!}
    <select name="prices_id" class="form-control">
    	<option value=""></option>
    	@foreach($prices as $price)
    	<option value="{!! $price->id !!}">{!! $price->title !!}</option>
    	@endforeach
    </select>	
</div>

<!-- Itinerary Field-->
<div class="form-group col-sm-6">	
    {!! Form::label('itineraries_id', 'Itinerary Tour') !!}
    <select name="itineraries_id" class="form-control">
    	<option value=""></option>
    	@foreach($itineraries as $itinerary)
    	<option value="{!! $itinerary->id !!}">{!! $itinerary->title !!}</option>
    	@endforeach
    </select>	
</div>

<!-- Categoty tour Field-->
<div class="form-group col-sm-6">	
    {!! Form::label('category_tours_id', 'Category Tour') !!}
    <select name="category_tours_id" class="form-control">
    	<option value=""></option>
    	@foreach($categoryTours as $categoryTour)
    	<option value="{!! $categoryTour->id !!}">{!! $categoryTour->name !!}</option>
    	@endforeach
    </select>	
</div>



<!-- Images Field -->
<div class="col-lg-12">
    <div class="form-group">
                {{ Form::file('image[]',['class' => 'control','id' => 'files', 'multiple' => 'multiple']) }}
            </div>
            <div id="selectedFiles"></div> 
</div> 

<!-- Submit Field -->
<div class="form-group col-sm-12" style="margin-top: 15px;">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tours.index') !!}" class="btn btn-default">Cancel</a>
</div>
