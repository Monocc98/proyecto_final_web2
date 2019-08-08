<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
  protected $fillable = ['country', 'onAirport', 'location'];

  public function locations()
  {
    return $this->belongsToMany(\App\Category);
  }
}
