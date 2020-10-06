@extends('layouts.default')

@section('title', 'Sponsors')

@section('content')

<div class="sponsors">

  <div class="sponsors-top bg-white">
    <h1>Sponsors & Partners</h1>
    <img src={{ asset('assets/x.svg') }} class="extra" />
  </div>

  <div class="sponsors-content bg-dark">
    @foreach ($sponsors as $sponsor)
      <div class="sponsor-single">
        <img src={{ asset('images/' . $sponsor->image) }} />
        <div class="sponsor-single-info">
          <h5>{{ $sponsor->name }}</h5>
          <p>
            {!! $sponsor->body !!}
            <p>Website: <a href={{ $sponsor->url }}>{{ $sponsor->url }}</a></p>
          </p>
        </div>
      </div>
    @endforeach
  </div>

</div>

@endsection
