@extends('layouts.default')

@section('title', 'News')

@section('content')

<div class="news bg-white">

  <div class="news-content">

    <div class="news-section">
      @foreach ($news->reverse() as $article)
        <a href={{ "/news/" . $article->slug }} class="article">
          <img src="{{ asset('images/' . $article->image) }}" />
        </a>
      @endforeach
    </div>

  </div>

</div>

@endsection
