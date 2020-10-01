<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\News;
use Image;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $news = News::get();

        return view('dashboard.news.index')->with('news', $news);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // Validate data
      $this->validate($request, array(
          'title' => 'required|min:2|max:255|unique:news,title',
          'author' => 'required|min:5|max:255',
          'image' => 'required|image',
          'team_id' => '',
          'body' => 'required',
        ));

        // Store in DB
        $article = new News;

        $article->title = $request->title;
        $article->author = $request->author;
        $article->image = $request->image;
        if ($request->team_id == 'null') {
          $article->team_id = '';
        } else {
          $article->team_id = $request->team_id;
        }
        $article->body = $request->body;

        $value = $article->title;
        $article->slug = Str::slug($value);

        // image
        $image = $request->file('image');
        $info = getimagesize($image);
        $extension = image_type_to_extension($info[2]);
        $filename = time() . $extension;
        $location = public_path('images/' . $filename);
        Image::make($image)->resize(1920, 1080)->save($location);

        $article->image = $filename;

        $article->save();

        // Redirect
        return redirect()->route('news.single', [$article->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $news = News::where('id', '=', $id)->first();

      return view('dashboard.news.edit')->withNews($news);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      // Validate data
      $this->validate($request, array(
          'title' => 'required|min:5',
          'author' => 'required|min:5',
          'image' => 'image',
          'team_id' => '',
          'body' => 'required',
        ));

        $article = News::find($id);

        $article->title = $request->title;
        $article->author = $request->author;
        if ($request->team_id == 'null') {
          $article->team_id = '';
        } else {
          $article->team_id = $request->team_id;
        }
        $article->body = $request->body;

        $value = $article->title;
        $article->slug = Str::slug($value);

        if ($request->hasFile('image')) {
          $image = $request->file('image');
          $info = getimagesize($image);
          $extension = image_type_to_extension($info[2]);
          $filename = time() . $extension;
          $location = public_path('images/' . $filename);
          Image::make($image)->resize(1200, 600)->save($location);

          $article->image = $filename;
        }

        $article->save();

        // Redirect
        return redirect()->route('news.single', [$article->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::find($id)->delete();

        return redirect()->route('dashboard.news');
    }
}
