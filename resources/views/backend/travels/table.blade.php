<table class="table table-responsive" id="travels-table">
    <thead>
        <th>Title</th>
        <th>Content</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($travels as $travel)
        <tr>
            <td>{!! $travel->title !!}</td>
            <td>{!! $travel->content !!}</td>
            <td>
                {!! Form::open(['route' => ['travels.destroy', $travel->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('travels.show', [$travel->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('travels.edit', [$travel->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>