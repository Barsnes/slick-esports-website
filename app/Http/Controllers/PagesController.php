<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\News;
use App\Models\About;
use App\Models\Teams;
use App\Models\Sponsors;

class PagesController extends Controller
{
    public function index() {
      $news = News::get()->reverse()->take(5);
      $about = About::find(1);
      $team = Teams::where('highlight', '=', 1)->first();
      $sponsors = Sponsors::get();

      return view('index')->withNews($news)->withAbout($about)->withTeam($team)->withSponsors($sponsors);
    }

    public function about() {
      $about = About::find(1);
      $sponsors = Sponsors::get();

      return view('about')->withAbout($about)->withSponsors($sponsors);
    }

    public function news() {
      $news = News::get();
      $sponsors = Sponsors::get();

      return view('news.index')->withNews($news)->withSponsors($sponsors);
    }

    public function getSingleNews($slug) {

      // $article = Article::where('created_at', '=', $year)->get();
      $news = News::where('slug', '=', $slug)->first();
      $sponsors = Sponsors::get();

      return view('news.single')->withNews($news)->withSponsors($sponsors);

    }

    public function teams() {
      $teams = Teams::where('active', '=', 1)->get();
      $sponsors = Sponsors::get();

      return view('teams')->withTeams($teams)->withSponsors($sponsors);
    }

    public function sponsors() {
      $sponsors = Sponsors::get();

      return view('sponsors')->withSponsors($sponsors);
    }

}
