<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\About;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::find(1);

        return view('dashboard.about.index')->withAbout($about);
    }


    public function update(Request $request, $id)
    {
      $this->validate($request, array(
          'body' => 'required',
          'index_story' => 'required'
        ));

        $about = About::find(1);

        $about->body = $request->body;
        $about->index_story = $request->index_story;

        $about->save();

        // Redirect
        return view('dashboard.about.index')->withAbout($about);
    }
}
