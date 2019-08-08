<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
  protected $fillable = ['LocationPickUp', 'PickUpDate', 'PickUpHour', 'LocationDropOff', 'DropOffDate', 'DropOffHour', 'category', 'GPS', 'ChildSeat', 'Totalcost', 'debt', 'tokenID', 'Name', 'LastName', 'Email', 'Numero', 'canceled'];

  public function reservations()
  {
    return $this->belongsToMany(\App\Category);
  }
}
