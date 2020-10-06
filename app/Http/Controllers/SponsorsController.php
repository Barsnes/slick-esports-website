<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sponsors;
use Image;

class SponsorsController extends Controller
{

    public function index()
    {
        $sponsors = Sponsors::get();

        return view('dashboard.sponsors.index')->withSponsors($sponsors);
    }

    public function create()
    {
        return view('dashboard.sponsors.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|min:2|max:255',
            'url' => 'required|url',
            'image' => 'required|image',
            'body' => ''
        ));

        // Store in DB
        $sponsor = new Sponsors;

        $sponsor->name = $request->name;
        $sponsor->url = $request->url;
        $sponsor->body = $request->body;

        $image = $request->file('image');
        $info = getimagesize($image);
        $extension = image_type_to_extension($info[2]);
        $filename = time() . $extension;
        $location = public_path('images/' . $filename);
        Image::make($image)->save($location);
        $sponsor->image = $filename;

        $sponsor->save();

        // Redirect
        return redirect()->route('sponsors.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $sponsor = Sponsors::find($id);

        // dd($sponsor);

        return view('dashboard.sponsors.edit')->withSponsor($sponsor);
    }

    public function update(Request $request, $id)
    {
      $this->validate($request, array(
          'name' => 'required|min:2|max:255',
          'url' => 'required|url',
          'image' => 'image',
          'body' => ''
        ));

        // Store in DB
        $sponsor = Sponsors::find($id);

        $sponsor->name = $request->name;
        $sponsor->url = $request->url;
        $sponsor->body = $request->body;

        if($image = $request->file('image')) {
          $image = $request->file('image');
          $info = getimagesize($image);
          $extension = image_type_to_extension($info[2]);
          $filename = time() . $extension;
          $location = public_path('images/' . $filename);
          Image::make($image)->save($location);
          $sponsor->image = $filename;
        }

        $sponsor->save();

        // Redirect
        return redirect()->route('sponsors.index');
    }

    public function destroy($id)
    {
      $player = Sponsors::find($id);
      $player->delete();

      return redirect()->route('sponsors.index');
    }
}
