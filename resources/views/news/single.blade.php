@extends('layouts.default')

@section('title', 'News')

@section('content')

<div class="news bg-white">

  <div class="news-single">

    <img src="{{ asset('images/' . $news->image) }}" />
    <h1>{{ $news->title }}</h1>
    <div class="body">
      {!! $news->body !!}
      <h5>#BESLICK</h5>
    </div>

  </div>

</div>

@endsection
