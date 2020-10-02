<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Players extends Model
{
    protected $table = 'players';

    public function team()
    {
        return $this->belongsTo('App\Models\Teams');
    }
}
