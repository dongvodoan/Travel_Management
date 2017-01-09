
<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{!! $tour->title !!}</p>
</div>

<!-- Images Field -->
{!! Form::label('image', 'Images:') !!}
<div class="col col-lg-12">
    <div class="form-group">
        @foreach($images as $image)
        <div class="col col-lg-4 col-md-4 col-sm-6 col-xs-6">
            <img style="border:none; width: 300px; height: 150px;" src="{{ url(config('path.upload_img').$image->name) }}" class = "setpicture img-thumbnail img_upload"></img>
        </div>
        @endforeach
    </div>  
</div>

<!-- Describe Field -->
<div class="form-group">
    {!! Form::label('describe', 'Describe:') !!}
    <p>{!! $tour->describe !!}</p>
</div>

<!-- Times Id Field -->
<div class="form-group">
    {!! Form::label('times_id', 'Time:') !!}
    <p>{!! $tour->times->time !!}</p>
</div>

<!-- Prices Id Field -->
<div class="form-group">
    {!! Form::label('prices_id', 'Price:') !!}
    <p>{!! $tour->prices->title !!}</p>
</div>

<!-- Itineraries Id Field -->
<div class="form-group">
    {!! Form::label('itineraries_id', 'Itinerarie:') !!}
    <p>{!! $tour->itineraries->title !!}</p>
</div>

<!-- Itineraries Id Field -->
<div class="form-group">
    {!! Form::label('category_tours_id', 'Category Tour:') !!}
    <p>{!! $tour->category_tours->name !!}</p>
</div>

<!-- Test -->
<div class="form-group">
    {!! Form::label('places', 'Places:') !!}
    <p> 
        @foreach($tour->places as $place) 
            <span style="border: 1px solid gray;margin:5px;padding: 5px;">
                {!! $place->name !!}
            </span> 
        @endforeach
    </p>
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

