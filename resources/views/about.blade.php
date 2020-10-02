@extends('layouts.default')

@section('title', 'About')

@section('content')

<div class="about">

  <div class="about-top">
    <img src="/assets/white-logo.png" />
    <h1>About Slick</h1>
  </div>

  <div class="about-content">
    <span class="extra">X</span>

    <div class="body">
      {!! $about->body !!}
      <h5>#BESLICK</h5>
    </div>

  </div>

</div>

@endsection
