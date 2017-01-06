
<!-- Images Field -->
<div class="col-lg-12">
    <div class="form-group">
        {{ Form::file('image[]',['class' => 'control','id' => 'files', 'multiple' => 'multiple']) }}
    </div>
    <div id="selectedFiles"></div>
</div> 

<div class="form-group col-sm-6">
	{!! Form::label('question', 'Choice Active') !!}
		<div>
            <select  class="form-control" name="activities_id"> 
                <option value=""></option>
                @foreach ($activities as $activity)
                    <option value="{{ $activity->id }}"  >{{ $activity->title }}</option>
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
                    <option value="{{ $tour->id }}">{{ $tour->title }}</option>
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
