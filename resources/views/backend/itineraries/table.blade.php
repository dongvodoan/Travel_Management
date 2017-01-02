<table class="table table-responsive" id="itineraries-table">
    <thead>
        <th>Title</th>
        <th>Content</th>
        <th>Action</th>
    </thead>
    <tbody>
    @foreach($itineraries as $itinerary)
        <tr>
            <td>{!! $itinerary->title !!}</td>
            <td>{!! $itinerary->content !!}</td>
            <td style="width: 80px;">
                {!! Form::open(['route' => ['itineraries.destroy', $itinerary->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('itineraries.show', [$itinerary->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('itineraries.edit', [$itinerary->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>