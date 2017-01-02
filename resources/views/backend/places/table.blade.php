<table class="table table-responsive" id="places-table">
    <thead>
        <th>Name</th>
        <th>Action</th>
    </thead>
    <tbody>
    @foreach($places as $place)
        <tr>
            <td>{!! $place->name !!}</td>
            <td style="width:80px;">
                {!! Form::open(['route' => ['places.destroy', $place->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('places.show', [$place->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('places.edit', [$place->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>