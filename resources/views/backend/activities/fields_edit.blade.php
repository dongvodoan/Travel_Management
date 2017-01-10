<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {{ Form::text('title', null, ['class' => 'form-control']) }}
</div>

<!-- Images Field -->
<div class="col-lg-12" style="margin-bottom:10px;">
    <div class="form-group">
        {{ Form::file('image[]',['class' => 'control','id' => 'files', 'multiple' => 'multiple']) }}
    </div>
    <div id="selectedFiles">
        @foreach ($images as $image)
            <div class="col col-lg-4 col-md-4 col-sm-6 col-xs-6">
                <img style="border:none; width: 300px; height: 150px;" src="{{ url(config('path.upload_img').$image->name) }}" ></img>
            </div>
        @endforeach
    </div> 
</div>

<!-- Types Field-->
<div class="form-group col-sm-6">	
    {!! Form::label('types_id', 'Types') !!}
    <select name="types" class="form-control">
    	@foreach($types as $type)
    	<option @if(($type->name)===($activity->types->name)) selected @endif value="{!! $type->id !!}">{!! $type->name !!}</option>
    	@endforeach
    </select>	
</div>

<!-- Descibe Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('describe', 'Descibe:') !!}
    {{ Form::textarea('describe', null, ['class' => 'form-control']) }}
</div>

<!-- Content Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('content', 'Content:') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control', 'id' => 'activities-textarea']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('activities.index') !!}" class="btn btn-default">Cancel</a>
</div>
