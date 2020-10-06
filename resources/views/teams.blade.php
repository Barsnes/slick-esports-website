@extends('layouts.default')

@section('title', 'Teams')

@section('content')

<div class="teams">

    <div class="teams-section">
      @php
        $count = 0;
      @endphp
      @foreach ($teams->reverse() as $team)
        <div class="team-single
        @if ($count % 2 === 0)
          bg-white
        @else
          bg-dark
        @endif">
          <h1>{{ $team->name }}</h1>
          <img src={{ asset('assets/x.svg') }} class="extra" />
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
        @php
          $count++
        @endphp
      @endforeach
    </div>

</div>

@endsection
