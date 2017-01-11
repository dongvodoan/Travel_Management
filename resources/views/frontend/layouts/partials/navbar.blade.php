<ul class="sf-menu">
  <li class="{{ Request::is('/*') || Request::is('home-travel*')? 'current' : '' }}"><a href="{{ route('home-travel.index') }}">Home</a></li>
  <li  class="{{ Request::is('tours-travel*') || Request::is('tour-category*') 
  || Request::is('choice-time*') || Request::is('find-address*') ? 'current' : '' }}">
  <a href="{{ route('tours-travel.index') }}" style="padding-left: 25px;padding-right: 25px;">Tours</a>
    <ul>
      @foreach($categories as $category)
          <li><a href="{{ route('tours-travel.filter', $category->category_tours_id) }}"> {{ $category->category_tours->name }}</a></li>
      @endforeach
    </ul>
  </li>
  <li class="{{ Request::is('daytrip*') ? 'current' : '' }}">
  <a href="{{route('tours-travel.filterTime',$day_tour->id)}}">Day trips</a></li>
  <!-- <li><a href="portfolio.html">Portfolio</a></li> -->
  <li class="{{ Request::is('things-to-do*') || Request::is('tour-activity-type*') ? 'current' : '' }}">
    <a href="{{ route('things-to-do.index') }}">Things to do</a>
    <ul>
      @foreach($types as $type)
          <li><a href="{{route('activities.filter',$type->types_id)}}"> {{ $type->types->name }}</a></li>
      @endforeach 
    </ul>
  </li>
  
  <li class="{{ Request::is('about-us*') || Request::is('travel-us*') ? 'current' : '' }}">
    <a href="{{ route('about-us.index') }}">About</a>
  </li>
  <li class="{{ Request::is('contacts*') ? 'current' : '' }}">
    <a href="{{ route('contacts.index') }}">Contacts</a>
  </li>
</ul>