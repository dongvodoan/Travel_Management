<?php use App\Components\Util; ?>
<table class="table table-responsive" id="categoryTours-table">
    <thead>
        <th>Name</th>
        <th>Describe</th>
        <th>Action</th>
    </thead>
    <tbody>
    @foreach($categoryTours as $categoryTour)
        <tr>
            <td>{{ $categoryTour->name }}</td>
            <td>{{ Util::theExcerpt($categoryTour->describe) }}</td>
            <td style="width: 80px;">
                {!! Form::open(['route' => ['categoryTours.destroy', $categoryTour->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('categoryTours.show', [$categoryTour->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('categoryTours.edit', [$categoryTour->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>