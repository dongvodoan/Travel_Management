
<!-- Images Field -->

<div class="col-lg-12">
    
    <div class="form-group">
        {{ Form::file('image',['class' => 'control','id' => 'files', 'multiple' => 'multiple']) }}
    </div>
    <div id="selectedFiles">
        <div class="col-lg-4">
            <img style="width:300px;height:200px;margin-bottom:10px;" src="{{ url(config('path.upload_img').$image->name) }}" 
            class = "setpicture img-thumbnail img_upload" id ="image_no"></img><br>
        </div>
    </div>
</div> 
 
<div class="form-group col-sm-6">
	{!! Form::label('question', 'Choice Active') !!}
		<div>
            <select  class="form-control" name="activities_id"> 
                <option value=""></option>
                @foreach ($activities as $activity)
                    <option value="{{ $activity->id }}"  @if(($activity->id)===($image->activities_id)) selected @endif>{{ $activity->title }}</option>
                <!--{!! Form::select('active_id', ['id' => $activity->title]) !!}-->
                @endforeach
            </select>
		</div>
</div>

<div class="form-group col-sm-6">
	{!! Form::label('question', 'Choice Tour') !!}
		<div>
            <select  class="form-control"  name="tours_id">
                <option value=""></option>
                @foreach ($tours as $tour)
                    <option value="{{ $tour->id }}" @if(($tour->id)===($image->tours_id)) selected @endif>{{ $tour->title }}</option>
                <!--{!! Form::select('active_id', ['id' => $activity->title]) !!}-->
                @endforeach
            </select>
		</div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('images.index') !!}" class="btn btn-default">Cancel</a>
</div>
