<!--View Image Field-->
<div class="form-group">
    <img style="border:none; width: 300px; height: 150px;" src="{{ url(config('path.upload_img').$image->name) }}" class = "setpicture img-thumbnail img_upload" id ="image_no"></img>
</div>

<!-- Activities Id Field -->
<div class="form-group">
    {!! Form::label('activities_id', 'Activities Title:') !!}
    <p>@if($image->activities_id==null)  @else {{ $image->activities->title }} @endif</p>
</div>

<!-- Tours Id Field -->
<div class="form-group">
    {!! Form::label('tours_id', 'Tours Title:') !!}
    <p>@if($image->tours_id==null)  @else{{ $image->tours->title }} @endif</p>
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

