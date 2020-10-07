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
      <a href={{ $sponsor->url }} target="_blank"><img src={{ asset('images/' . $sponsor->image) }} /></a>
    @endforeach
  </div>
</div>

@endsection
