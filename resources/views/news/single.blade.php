@extends('layouts.default')

@section('title', 'News')

@section('content')

<div class="news">

  <div class="news-single">

    <img src="{{ asset('images/' . $news->image) }}" />
    <h1>{{ $news->title }}</h1>
    <h5 class="text-sm">Written by {{ $news->author }} on {{ date('d M Y', strtotime($news->created_at)) }}</h5>
    <hr>
    <div class="body">
      {!! $news->body !!}
    </div>

  </div>

</div>

@endsection
