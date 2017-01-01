
<li class="{{ Request::is('travels*') ? 'active' : '' }}">
    <a href="{!! route('travels.index') !!}"><i class="fa fa-edit"></i><span>Travels</span></a>
</li>

<li class="{{ Request::is('abouts*') ? 'active' : '' }}">
    <a href="{!! route('abouts.index') !!}"><i class="fa fa-edit"></i><span>Abouts</span></a>
</li>

<li class="{{ Request::is('types*') ? 'active' : '' }}">
    <a href="{!! route('types.index') !!}"><i class="fa fa-edit"></i><span>Types</span></a>
</li>

<li class="{{ Request::is('activities*') ? 'active' : '' }}">
    <a href="{!! route('activities.index') !!}"><i class="fa fa-edit"></i><span>Activities</span></a>
</li>

<li class="{{ Request::is('images*') ? 'active' : '' }}">
    <a href="{!! route('images.index') !!}"><i class="fa fa-edit"></i><span>Images</span></a>
</li>

<li class="{{ Request::is('categoryTours*') ? 'active' : '' }}">
    <a href="{!! route('categoryTours.index') !!}"><i class="fa fa-edit"></i><span>CategoryTours</span></a>
</li>

<li class="{{ Request::is('times*') ? 'active' : '' }}">
    <a href="{!! route('times.index') !!}"><i class="fa fa-edit"></i><span>Times</span></a>
</li>

<li class="{{ Request::is('prices*') ? 'active' : '' }}">
    <a href="{!! route('prices.index') !!}"><i class="fa fa-edit"></i><span>Prices</span></a>
</li>

<li class="{{ Request::is('itineraries*') ? 'active' : '' }}">
    <a href="{!! route('itineraries.index') !!}"><i class="fa fa-edit"></i><span>Itineraries</span></a>
</li>

<li class="{{ Request::is('tours*') ? 'active' : '' }}">
    <a href="{!! route('tours.index') !!}"><i class="fa fa-edit"></i><span>Tours</span></a>
</li>

<li class="{{ Request::is('places*') ? 'active' : '' }}">
    <a href="{!! route('places.index') !!}"><i class="fa fa-edit"></i><span>Places</span></a>
</li>

