<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>@php echo Config::get('app.name'); @endphp - @yield('title') </title>
  <link REL="SHORTCUT ICON" HREF="{{ asset('/assets/SHORTCUTICON.png') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Stylesheets -->
  <link rel="stylesheet" href="/css/master.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  @yield('stylesheets')
  @yield('seo')

</head>
<body>
<div class="header">
    <div class="nav-logo">
      <a href="/"><img src="/assets/dark-logo.png" alt="Slick Esports logo"></a>
    </div>
    <nav class="navbar">
      <ul class="navlist">
        <li><a class="{{ (Request::is('about') || Request::is('about/*') ? 'onSite' : '') }}" href="/about">About</a></li>
        <li><a class="{{ (Request::is('news') || Request::is('news/*') ? 'onSite' : '') }}" href="/news">News</a></li>
        <li><a class="{{ (Request::is('teams') || Request::is('team/*') ? 'onSite' : '') }}" href="/teams">Teams</a></li>
        <li><a class="{{ (Request::is('teams') || Request::is('team/*') ? 'onSite' : '') }}" href="/teams">Contact</a></li>
        <li><a class="{{ (Request::is('sponsors')) }}" href="/sponsors">Sponsors</a></li>
      </ul>
    </nav>
</div>

@yield('content')

<div class="footer">

  <div class="footer--left">
    <img src="/assets/white-logo.png" />
  </div>

  <ul>
    <li class="list-title">Socials</li>
    <li><a href="#">Twitter</a></li>
    <li><a href="#">Twitch</a></li>
    <li><a href="#">Facebook</a></li>
    <li><a href="#">YouTube</a></li>
  </ul>

  <ul>
    <li class="list-title">Contact</li>
    <li>Email: contact@slick.be</li>
  </ul>

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
