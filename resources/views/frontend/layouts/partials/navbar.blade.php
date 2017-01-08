<ul class="sf-menu">
  <li class="current"><a href="index.html">Home</a></li>
  <li class="with_ul"><a href="tours.html">Tours</a>
    <ul>
      <li><a href="#"> cuisine</a></li>
      <li><a href="#">Good rest</a></li>
      <li><a href="#">Services</a></li>
    </ul>
  </li>
  <li><a href="news.html">Day trips</a></li>
  <!-- <li><a href="portfolio.html">Portfolio</a></li> -->
  <li><a href="thing_todo.html">Things to do</a>
    <ul>
      <li><a href="#"> cuisine</a></li>
      <li><a href="#">Good rest</a></li>
      <li><a href="#">Services</a></li>
    </ul>
  </li>
  
  <li><a href="about_us.html">About us</a></li>
  <li class="{{ Request::is('contacts*') ? 'current' : '' }}">
    <a href="{{ route('contacts.index') }}">Contacts</a>
  </li>
</ul>