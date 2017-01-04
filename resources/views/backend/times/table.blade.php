<table class="table table-responsive" id="times-table">
    <thead>
        <th>Time</th>
        <th>Describe</th>
        <th>Action</th>
    </thead>
    <tbody>
    @foreach($times as $time)
        <tr>
            <td>{{ $time->time }}</td>
            <td>{{ $time->describe }}</td>
            <td style="width: 80px;">
                {!! Form::open(['route' => ['times.destroy', $time->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('times.show', [$time->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('times.edit', [$time->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>