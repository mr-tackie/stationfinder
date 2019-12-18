<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Station;

class Region extends Model
{
    //

    protected $fillable = ['name', 'code'];

    public function stations(){
        return $this->hasMany(Station::class, 'code');
    }
}
