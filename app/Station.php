<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Region;

class Station extends Model
{
    //
    protected $fillable = ['name', 'contact_number', 'longitude', 'latitude', 'region_code'];

    public function region(){
        return $this->belongsTo(Region::class, 'region_code');
    }
}
