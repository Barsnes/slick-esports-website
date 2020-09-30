@extends('layouts.default')

@section('title', 'Home')

@section('content')

  <div class="index-header">
    <h1><span>SLIC</span>K</h1>

    <a class="index-button" href="#news">
      v
    </a>
  </div>

  <div id="news" class="index-news">
    <div class="index-title">
      <h2>NEWS</h2>
      <span class="extra">X</span>
    </div>
    <div class="news-content">
      <a href="#"><img src="/assets/news-default.png" /></a>
      <a href="#"><img src="/assets/news-default.png" /></a>
      <a href="#"><img src="/assets/news-default.png" /></a>
      <a href="#"><img src="/assets/news-default.png" /></a>
      <a href="#"><img src="/assets/news-default.png" /></a>
    </div>
  </div>

  <div class="index-team">
    <div class="index-title">
      <h2>CSGO TEAM</h2>
      <span class="extra">X</span>
    </div>

    <div class="team-content">
      <div class="players">
        <div class="player">
          <img src="assets/jersey.png" />
          <div class="player-info">
            <h5>Playername</h5>
            <h6>Full Name</h6>
          </div>
        </div>
        <div class="player">
          <img src="assets/jersey.png" />
          <div class="player-info">
            <h5>Playername</h5>
            <h6>Full Name</h6>
          </div>
        </div>
        <div class="player">
          <img src="assets/jersey.png" />
          <div class="player-info">
            <h5>Playername</h5>
            <h6>Full Name</h6>
          </div>
        </div>
        <div class="player">
          <img src="assets/jersey.png" />
          <div class="player-info">
            <h5>Playername</h5>
            <h6>Full Name</h6>
          </div>
        </div>
        <div class="player">
          <img src="assets/jersey.png" />
          <div class="player-info">
            <h5>Playername</h5>
            <h6>Full Name</h6>
          </div>
        </div>
      </div>
    </div>

    <div class="index-story">
      <div class="index-title">
        <h2>OUR STORY</h2>
        <span class="extra">X</span>
      </div>

      <div class="about-section">
        <img src="assets/about-image.png" />
        <div class="content">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </p>
          <h6>#BESLICK</h6>
        </div>
      </div>
    </div>
  </div>

@endsection
