<table class="table table-responsive" id="tours-table">
    <thead>
        <th>Title</th>
        <th>Describe</th>
        <th>Times Id</th>
        <th>Prices Id</th>
        <th>Itineraries Id</th>
        <th>Action</th>
    </thead>
    <tbody>
    @foreach($tours as $tour)
        <tr>
            <td>{!! $tour->title !!}</td>
            <td>{!! $tour->describe !!}</td>
            <td>{!! $tour->times_id !!}</td>
            <td>{!! $tour->prices_id !!}</td>
            <td>{!! $tour->itineraries_id !!}</td>
            <td style="width:80px;">
                {!! Form::open(['route' => ['tours.destroy', $tour->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('tours.show', [$tour->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('tours.edit', [$tour->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>