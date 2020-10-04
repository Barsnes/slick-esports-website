<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teams;

class TeamsController extends Controller
{

    public function index()
    {
        $teams = Teams::get();
        return view('dashboard.teams.index')->withTeams($teams);
    }

    public function create()
    {

        return view('dashboard.teams.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|unique:teams,name',
            'active' => 'required|boolean'
        ));

        $team = new Teams;

        $team->name = $request->name;
        $team->active = $request->active;

        $team->save();

        $teams = Teams::get();

        // Redirect
        return view('dashboard.teams.index')->withTeams($teams);
    }

    public function show($id)
    {
        return route('teams.index');
    }

    public function edit($id)
    {
        $team = Teams::find($id);
        return view('dashboard.teams.edit')->withTeam($team);
    }

    public function update(Request $request, $id)
    {
      $this->validate($request, array(
          'name' => 'required',
          'active' => 'required|boolean'
      ));

      $team = Teams::find($id);

      $team->name = $request->name;
      $team->active = $request->active;

      $team->save();

      $teams = Teams::get();

      // Redirect
      return redirect()->route('teams.index');
    }

    public function destroy($id)
    {
      Teams::find($id)->delete();
      return redirect()->route('teams.index');
    }

    public function highlight(Request $request, $id)
    {
      $oldTeam = Teams::where('highlight', '=', 1)->first();
      // dd($oldTeam);
      $oldTeam->highlight = 0;
      $oldTeam->save();


      $teams = Teams::find($id);
      $teams->highlight = 1;
      $teams->save();
      return redirect()->route('teams.index');
    }
}
