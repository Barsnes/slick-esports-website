<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{

    protected $table = 'teams';

    public function players()
    {
        return $this->hasMany('App\Models\Players', 'team_id');
    }

}
