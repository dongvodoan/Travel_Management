<!-- Name Field -->
<!--<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>-->

{!! Form::open(array('files'=>true)) !!}
<div class="form-group col-sm-6">
      <div class="controls">
      {!! Form::file('images[]', array('multiple'=>true)) !!}
     </div>
</div>

<div class="form-group col-sm-6">
	{!! Form::label('question', 'Choice Active') !!}
		<div>
            <select  class="form-control">
                @foreach ($activities as $activity)
                    <option value="{{ $activity->id }}" name="activities" >{{ $activity->title }}</option>
                <!--{!! Form::select('active_id', ['id' => $activity->title]) !!}-->
                @endforeach
            </select>
		</div>
</div>

<div class="form-group col-sm-6">
	{!! Form::label('question', 'Choice Tour') !!}
		<div>
            <select  class="form-control">
                @foreach ($tours as $tour)
                    <option value="{{ $tour->id }}" name="tours">{{ $tour->title }}</option>
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
