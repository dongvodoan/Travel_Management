
<li class="{{ Request::is('travels*') ? 'active' : '' }}">
    <a href="{!! route('travels.index') !!}"><i class="fa fa-globe"></i><span>Travels</span></a>
</li>

<li class="{{ Request::is('abouts*') ? 'active' : '' }}">
    <a href="{!! route('abouts.index') !!}"><i class="fa fa-building-o"></i><span>Abouts</span></a>
</li>

<li class="{{ Request::is('types*') ? 'active' : '' }}">
    <a href="{!! route('types.index') !!}"><i class="fa fa-th"></i><span>Types</span></a>
</li>

<li class="{{ Request::is('activities*') ? 'active' : '' }}">
    <a href="{!! route('activities.index') !!}"><i class="fa fa-edit"></i><span>Activities</span></a>
</li>

<li class="{{ Request::is('images*') ? 'active' : '' }}">
    <a href="{!! route('images.index') !!}"><i class="fa fa-picture-o"></i><span>Images</span></a>
</li>

<li class="{{ Request::is('categoryTours*') ? 'active' : '' }}">
    <a href="{!! route('categoryTours.index') !!}"><i class="fa fa-th"></i><span>CategoryTours</span></a>
</li>

<li class="{{ Request::is('times*') ? 'active' : '' }}">
    <a href="{!! route('times.index') !!}"><i class="fa fa-clock-o"></i><span>Times</span></a>
</li>

<li class="{{ Request::is('prices*') ? 'active' : '' }}">
    <a href="{!! route('prices.index') !!}"><i class="fa fa-credit-card"></i><span>Prices</span></a>
</li>

<li class="{{ Request::is('itineraries*') ? 'active' : '' }}">
    <a href="{!! route('itineraries.index') !!}"><i class="fa fa-calendar"></i><span>Itineraries</span></a>
</li>

<li class="{{ Request::is('tours*') ? 'active' : '' }}">
    <a href="{!! route('tours.index') !!}"><i class="fa fa-plane"></i><span>Tours</span></a>
</li>

<li class="{{ Request::is('places*') ? 'active' : '' }}">
    <a href="{!! route('places.index') !!}"><i class="fa fa-map-marker"></i><span>Places</span></a>
</li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-user-o"></i><span>Users</span></a>
</li>
