<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\News;

class PagesController extends Controller
{
    public function index() {
      $news = News::get()->reverse()->take(5);

      return view('index')->withNews($news);
    }

    public function news() {
      $news = News::get();

      return view('news.index')->withNews($news);
    }

    public function getSingleNews($slug) {

      // $article = Article::where('created_at', '=', $year)->get();
      $news = News::where('slug', '=', $slug)->first();

      return view('news.single')->withNews($news);

    }

}
