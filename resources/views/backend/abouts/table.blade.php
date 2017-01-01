<table class="table table-responsive" id="abouts-table">
    <thead>
        <th>Title</th>
        <th>Content</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($abouts as $about)
        <tr>
            <td>{!! $about->title !!}</td>
            <td>{!! $about->content !!}</td>
            <td>
                {!! Form::open(['route' => ['abouts.destroy', $about->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('abouts.show', [$about->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('abouts.edit', [$about->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>