@extends('layouts.default')

@section('title', 'About')

@section('content')

<div class="about bg-white">

    <div class="about-top">
      <h1>About Us</h1>
      <img src={{ asset('assets/x.svg') }} class="extra" />
    </div>

    <div class="body">
      {!! $about->body !!}
      <h5>#BESLICK</h5>
    </div>


</div>

@endsection
