@extends('layouts.default')

@section('title', 'Home')

@section('content')

  <div class="index-header bg-dark">
    <img src="{{ asset('/assets/SLICKESPORTS.svg') }}" />

    <a class="index-button" href="#news">
      v
    </a>
  </div>

  <div id="news" class="index-news bg-white">
    <div class="index-title">
      <h2>NEWS</h2>
      <img src={{ asset('/assets/x.svg') }} class"extra" />
    </div>
    <div class="news-content">
      @foreach ($news as $article)
        <a href={{ '/news/' . $article->slug }}><img src={{ '/images/' . $article->image }} /></a>
      @endforeach
    </div>
  </div>

  <div class="index-team bg-dark">
    <div class="index-title">
      <h2>@if($team) {{ $team->name }} @endif</h2>
      <img src={{ asset('/assets/x.svg') }} class"extra" />
    </div>

    <div class="team-content">
      <div class="players">
        @foreach ($team->players as $player)
          <div class="player">
            @if($player->image === 'assets/jersey.png')
             <img src='/assets/jersey.png' />
            @else
              <img src={{ asset('/images/' . $player->image) }} />
            @endif
            <div class="player-info">
              <h5>{{ $player->playerName }}</h5>
              <h6>{{ $player->firstName . " " . $player->lastName }}</h6>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>

  <div class="index-story bg-white">
    <div class="index-title">
      <h2>OUR STORY</h2>
      <img src={{ asset('/assets/x.svg') }} class"extra" />
    </div>

    <div class="about-section">
      <img src="assets/about-image.png" />
      <div class="content">
        <p>
          {!! $about->index_story !!}
        </p>
        <h6>#BESLICK</h6>
      </div>
    </div>
  </div>

@endsection
