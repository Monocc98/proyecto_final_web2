<?php
use Carbon\Carbon;

$tomorrow = Carbon::now();
$current = Carbon::now();
$current = new Carbon();
$tomorrow = new Carbon('tomorrow');

$current = $current->format('Y-m-d');
$tomorrow = $tomorrow->format('Y-m-d');

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="{{route('categories')}}" method="get">
      <label for="locationS">Location pick-up</label>
      <select class="" id="locationS" name="locationPU">
        @foreach($locations as $l)
        <option value="{{$l->location}}">{{$l->location}}</option>
        @endforeach
      </select>
      <label for="fechaS">Pick-up date</label>
      <input type="date" name="datePU" id="fechaS" value="{{$current}}">
      <label for="horaS">Pick-up hour</label>
      <select class="" id="locationD" name="hourPU" >
        <?php
        for ($i = 7; $i <= 19; $i++) {
            for ($j = 0; $j < 60; $j = $j + 60) {
                $i = str_pad($i, 2, "0", STR_PAD_LEFT);
                $j = str_pad($j, 2, "0", STR_PAD_LEFT);
        ?>
                <option  value="<?php echo "$i:$j" ?>"><?php echo "$i:$j" ?></option>
        <?php
            }
        }
        ?>
      </select>
      <label for="locationD">Location drop-off</label>
      <select class="" id="locationD" name="locationDO" >
        @foreach($locations as $l)
        <option value="{{$l->location}}">{{$l->location}}</option>
        @endforeach
      </select>
      <label for="fechaD">Drop-off date</label>
      <input type="date" name="dateDO" id="fechaD" value="{{$tomorrow}}">
      <label for="horaS">Drop-off hour</label>
      <select class="" name="hourDO" >
        <?php
        for ($i = 8; $i <= 20; $i++) {
            for ($j = 0; $j < 60; $j = $j + 60) {
                $i = str_pad($i, 2, "0", STR_PAD_LEFT);
                $j = str_pad($j, 2, "0", STR_PAD_LEFT);
        ?>
                <option  value="<?php echo "$i:$j" ?>"><?php echo "$i:$j" ?></optio n>
        <?php
            }
        }
        ?>
      </select>
      <button type="submit" name="button">Search</button>
    </form>
  </body>
</html>
