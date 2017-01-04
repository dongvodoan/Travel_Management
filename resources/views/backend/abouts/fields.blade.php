<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Check Field -->
<div class="form-group col-sm-4 col-sm-offset-1">
	{!! Form::label('question', 'Display to view page:') !!}
		<div>
			{!! Form::radio('check', 1, null, ['id' => 'select']) !!}
			{!! Form::label('select', 'Yes') !!}
		</div>
		<div>
			{!! Form::radio('check', 0, null, ['id' => 'unselect']) !!}
			{!! Form::label('unselect', 'No') !!}
		</div>
</div>

<!-- Content Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('content', 'Content:') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control', 'id' => 'about-textarea']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('abouts.index') !!}" class="btn btn-default">Cancel</a>
</div>
