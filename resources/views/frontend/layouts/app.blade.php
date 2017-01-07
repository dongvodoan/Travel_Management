<!DOCTYPE html>
<html>
<head>
    <title>Gourmet Hanoi Travel</title>
    <meta charset="utf-8">
    <link rel="icon" href="{{ url('frontend/images/favicon.ico')}}">
    <link rel="shortcut icon" href="{{ url('frontend/images/favicon.ico')}}">
    <!-- css -->
    @include('frontend.layouts.partials.css')
    
    @yield('css')
</head>

<body class="skin-blue sidebar-mini">
<div class="main">
  <header>
    <div class="container_12">
      <div class="grid_12">
        <h1><a href="index.html"><img src="{{ url('frontend/images/logo.png') }}" alt=""></a></h1>
        <div class="menu_block">
          <nav>
             @include('frontend.layouts.partials.navbar')
          </nav>
          <div class="clear"></div>
        </div>
        <div class="clear"></div>
      </div>
    </div>
  </header>

  <div class="content">
      @yield('content')
  </div>
  
  <div class="container_12 bottom_block">
    <div class="grid_6 p">
      <h3>Follow Us</h3>
      <div class="socials"> <a href="#"></a> <a href="#"></a> <a href="#"></a> </div>
      <nav>
        <ul>
          <li class="current"><a href="index.html">Home</a></li>
          <li><a href="tours.html">Tours</a></li>
          <li><a href="news.html">Day trips</a></li>
          <li><a href="thing_todo.html">Things to do</a></li>
          <li><a href="about_us.html">About us</a></li>
          <li><a href="contacts.html">Contact us</a></li>
        </ul>
      </nav>
    </div>
  </div>
  <div class="clear"></div>
</div>
<footer style="background-color: #5fa022">
  <div class="container_12">
    <div class="grid_12"> Gourmet Ha Noi Travel &copy; 2017 | <a href="#">Privacy Policy</a> | Design by: <a href="http://www.templatemonster.com/">TemplateMonster.com</a> </div>
    <div class="clear"></div>
  </div>
</footer>

    <!-- Scripts -->
    @include('frontend.layouts.partials.scripts')
    
    @yield('scripts')
</body>
</html>