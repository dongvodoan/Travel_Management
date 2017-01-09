<ul class="sf-menu">
  <li class="{{ Request::is('/*') || Request::is('home-travel*')? 'current' : '' }}"><a href="{{ route('home-travel.index') }}">Home</a></li>
  <li class="with_ul"><a href="tours.html">Tours</a>
    <ul>
      <li><a href="#"> cuisine</a></li>
      <li><a href="#">Good rest</a></li>
      <li><a href="#">Services</a></li>
    </ul>
  </li>
  <li><a href="news.html">Day trips</a></li>
  <!-- <li><a href="portfolio.html">Portfolio</a></li> -->
  <li class="{{ Request::is('things-to-do*') || Request::is('activities*') ? 'current' : '' }}">
    <a href="{{ route('things-to-do.index') }}">Things to do</a>
    <ul>
      @foreach($types as $type)
          <li><a href="{{route('activities.filter',$type->types_id)}}"> {{ $type->types->name }}</a></li>
      @endforeach 
    </ul>
  </li>
  
  <li class="{{ Request::is('about-us*') || Request::is('travel-us*') ? 'current' : '' }}">
    <a href="{{ route('about-us.index') }}">About us</a>
  </li>
  <li class="{{ Request::is('contacts*') ? 'current' : '' }}">
    <a href="{{ route('contacts.index') }}">Contacts</a>
  </li>
</ul>