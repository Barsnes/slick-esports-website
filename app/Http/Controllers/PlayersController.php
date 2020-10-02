<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Players;
use App\Models\Teams;

use Image;

class PlayersController extends Controller
{

    public function index()
    {
        $players = Players::get();
        return view('dashboard.players.index')->withPlayers($players);
    }

    public function create()
    {
        $teams = Teams::get();
        return view('dashboard.players.create')->withTeams($teams);
    }

    public function store(Request $request)
    {
      // Validate data
      $this->validate($request, array(
          'firstName' => 'required|min:2|max:255',
          'playerName' => 'required|min:2|max:255',
          'lastName' => 'required|min:2|max:255',
          'image' => 'image',
          'team_id' => 'required|integer'
        ));

        // Store in DB
        $player = new Players;

        $player->firstName = $request->firstName;
        $player->playerName = $request->playerName;
        $player->lastName = $request->lastName;
        $player->team_id = $request->team_id;

        // image
        if($image = $request->file('image')) {
          $image = $request->file('image');
          $info = getimagesize($image);
          $extension = image_type_to_extension($info[2]);
          $filename = time() . $extension;
          $location = public_path('images/' . $filename);
          Image::make($image)->resize(400, 488)->save($location);
        } else {
          $filename = 'assets/jersey.png';
        };

        $player->image = $filename;

        $player->save();

        // Redirect
        return redirect()->route('players.index');
    }

    public function edit($id)
    {
        $player = Players::find($id);
        $teams = Teams::get();
        return view('dashboard.players.edit')->withPlayer($player)->withTeams($teams);
    }

    public function update(Request $request, $id)
    {
      // Validate data
      $this->validate($request, array(
          'firstName' => 'required|min:2|max:255',
          'playerName' => 'required|min:2|max:255',
          'lastName' => 'required|min:2|max:255',
          'image' => 'image',
          'team_id' => 'required|integer'
        ));

        // Store in DB
        $player = Players::find($id);

        $player->firstName = $request->firstName;
        $player->playerName = $request->playerName;
        $player->lastName = $request->lastName;
        $player->team_id = $request->team_id;

        // image
        if($request->hasFile('image')) {
          $image = $request->file('image');
          $info = getimagesize($image);
          $extension = image_type_to_extension($info[2]);
          $filename = time() . $extension;
          $location = public_path('images/' . $filename);
          Image::make($image)->resize(400, 488)->save($location);
          $player->image = $filename;
        }

        $player->save();

        // Redirect
        return redirect()->route('players.index');
    }

    public function destroy($id)
    {
        $player = Players::find($id);
        $player->delete();

        return redirect()->route('players.index');
    }
}
