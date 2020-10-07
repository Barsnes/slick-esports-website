<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>@php echo Config::get('app.name'); @endphp - @yield('title') </title>
  <link REL="SHORTCUT ICON" HREF="{{ asset('/assets/SHORTCUTICON.png') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Stylesheets -->
  <link rel="stylesheet" href="{{ mix('css/master.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  @yield('stylesheets')
  @yield('seo')

</head>
<body>
<div class="header {{ (Request::is('/') ? 'index' : '') }}">
    <div class="nav-logo">
      <a href="/"><img src="{{ (Request::is('/') ? '/assets/dark-logo.png' : '/assets/white-logo.png') }}" alt="Slick Esports logo"></a>
    </div>
    <nav class="navbar">
      <ul class="navlist" id="myTopnav">
        <a class="{{ (Request::is('about') || Request::is('about/*') ? 'active' : '') }}" href="/about">About</a>
        <a class="{{ (Request::is('news') || Request::is('news/*') ? 'active' : '') }}" href="/news">News</a>
        <a class="{{ (Request::is('teams') || Request::is('team/*') ? 'active' : '') }}" href="/teams">Teams</a>
        <a class="{{ (Request::is('sponsors' ? 'active' : '')) }}" href="/sponsors">Sponsors</a>

        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a>
      </ul>
    </nav>
</div>

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "navlist") {
    x.className += " responsive";
  } else {
    x.className = "navlist";
  }
}
</script>

@yield('content')

<div class="footer bg-dark">

  <div class="footer-top">
    <div class="footer-top-left">
      <a href="https://twitter.com/SlickEU" target="_blank">Twitter</a>
      <a href="#" target="_blank">Twitch</a>
      <a href="#" target="_blank">Instagram</a>
    </div>

    <img src="/assets/white-logo.png" />

    <div class="footer-top-right">
      <a href="mailto:info@slickesports.be">info@slickesports.be</a>
    </div>
  </div>

  @if (!Request::is('sponsors'))
    <div class="footer-bottom">
      @foreach ($sponsors as $sponsor)
        <a href={{ $sponsor->url }} target="_blank"><img src={{ asset('images/' . $sponsor->image) }} /></a>
      @endforeach
    </div>
  @endif

</div>

  <script type="text/javascript">
      $(document).ready(function(){
        $('.menu').click(function(){
          $('.navlist').toggleClass('active')
          $('i').toggleClass('notactive');
        })
      })
  </script>

  <script>
   $(document).ready(function(){
    $("a").on('click', function(event) {
      if (this.hash !== "") {
        event.preventDefault();
        var hash = this.hash;
        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 1200, function(){
          window.location.hash = hash;
        });
      }
    });
  });
  </script>
</body>
