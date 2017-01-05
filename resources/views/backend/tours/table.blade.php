<?php use App\Components\Util; ?>
<table class="table table-responsive" id="tours-table">
    <thead>
        <th>Title</th>
        <th>Describe</th>
        <th>Times</th>
        <th>Prices</th>
        <th>Itineraries</th>
        <th>Category Tour</th>
        <th>Places</th>
        <th>Action</th>
    </thead>
    <tbody>
    @foreach($tours as $tour)
        <tr>
            <td>{!! $tour->title !!}</td>
            <td>{!! Util::theExcerpt($tour->describe) !!}</td>
            <td>{!! $tour->times->time !!}</td>
            <td>{!! $tour->prices->title !!}</td>
            <td>{!! $tour->itineraries->title !!}</td>
            <td>{!! $tour->category_tours->name !!}</td>
            <td>
                @foreach($tour->places as $place) 
                    {!! $place->name !!}     
                @endforeach
            </td>
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