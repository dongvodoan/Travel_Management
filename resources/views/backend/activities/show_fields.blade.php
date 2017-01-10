

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $activity->title }}</p>
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
<!-- Descibe Field -->
<div class="form-group">
    {!! Form::label('describe', 'Describe:') !!}
    <p>{{ $activity->describe }}</p>
</div>

<!-- Content Field -->
<div class="form-group">
    {!! Form::label('content', 'Content:') !!}
    <p>{!! $activity->content !!}</p>
</div>

<!-- Types Id Field -->
<div class="form-group">
    {!! Form::label('types_id', 'Types Name:') !!}
    <p>{!! $activity->types->name !!}</p>
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

