<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\News;
use App\Models\About;
use App\Models\Teams;

class PagesController extends Controller
{
    public function index() {
      $news = News::get()->reverse()->take(5);
      $about = About::find(1);
      $team = Teams::where('highlight', '=', 1)->first();

      return view('index')->withNews($news)->withAbout($about)->withTeam($team);
    }

    public function about() {
      $about = About::find(1);

      return view('about')->withAbout($about);
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

    public function teams() {
      $teams = Teams::where('active', '=', 1)->get();

      return view('teams')->withTeams($teams);
    }

}
