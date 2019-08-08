<?php
if(!isset($_SESSION))
{
  session_start();
}

if(isset($_GET["gps"]) && $_GET["gps"] == "150"){
  $gps = 150;
  $gpsRent = "Yes";
}else{
  $gps = 0;
  $gpsRent = "No";
}

if(isset($_GET["childSeat"]) && $_GET["childSeat"] == "100"){
  $childSeat = 100;
  $numSeats = $_GET["totalSeats"];
}else{
  $childSeat = 0;
  $numSeats = 0;
}

$apertura = $_SESSION["hourP"];
$cierre = $_SESSION["hourD"];

$carCategoryName = \App\Category::find($_SESSION['category'])->name;

$diferenciaDias = function($inicio, $fin){
  $inicio = strtotime($inicio);
  $fin = strtotime($fin);
  $dif = $fin - $inicio;
  $diasFalt = (( ( $dif / 60 ) / 60 ) / 24);
  if ($diasFalt > 6 && $diasFalt < 14) {
    $diasFalt = $diasFalt - 1;
  } else if ($diasFalt > 13) {
    $diasFalt = $diasFalt - 2;
  } else if ($diasFalt == 0){
    $diasFalt = 1;
  }
  return ceil($diasFalt);
};

$inicio = $_SESSION["dateP"];
$fin = $_SESSION["dateD"];
$car = \App\Category::find($_SESSION['category'])->cost;
$gpsCost = $gps * $diferenciaDias($inicio,$fin);
$carCost = $car * $diferenciaDias($inicio,$fin);
$totalSeats = $_GET["totalSeats"];
$seatsCost = ($totalSeats * $childSeat) * $diferenciaDias($inicio,$fin);
$totalCost = $gpsCost + $carCost + $seatsCost;

$_SESSION["debt"] = $totalCost;
$_SESSION["categoryName"] = $carCategoryName;

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table border="1">
      <thead>
        <th colspan="2">Pick-up</th>
        <th colspan="2">Drop-off</th>
        <th>Total Days</th>
        <th>Selected Car</th>
        <th>Total Cost</th>
      </thead>
      <tr>
        <td colspan="2">{{$_SESSION["locationP"]}}</td>
        <td colspan="2">{{$_SESSION["locationD"]}}</td>
        <td rowspan="2">{{$diferenciaDias($inicio,$fin)}}</td>
        <td rowspan="2">{{$_SESSION["categoryName"]}}</td>
        <td rowspan="2">{{$totalCost}}</td>
      </tr>
      <tr>
        <td>{{$_SESSION["dateP"]}}</td>
        <td>{{$_SESSION["hourP"]}}</td>
        <td>{{$_SESSION["dateD"]}}</td>
        <td>{{$_SESSION["hourD"]}}</td>
      </tr>
    </table>
    <form class="" action="{{route('confirmation')}}" method="get">
      <h1>Your Information</h1>
      <label for="">Name(s):</label>
      <input type="text" name="Name" value="">
      <label for="">Last Name:</label>
      <input type="text" name="LastName" value="">
      <label for="">Email:</label>
      <input type="email" name="Email" value="">
      <label for="">Phone Number:</label>
      <input type="text" name="Numero" value="">
      <button type="submit" name="button">Submit</button>
      <input type="hidden" name="LocationPickUp" value="{{$_SESSION["locationP"]}}">
      <input type="hidden" name="PickUpDate" value="{{$_SESSION["dateP"]}}">
      <input type="hidden" name="PickUpHour" value="{{$_SESSION["hourP"]}}">
      <input type="hidden" name="LocationDropOff" value="{{$_SESSION["locationD"]}}">
      <input type="hidden" name="DropOffDate" value="{{$_SESSION["dateD"]}}">
      <input type="hidden" name="DropOffHour" value="{{$_SESSION["hourD"]}}">
      <input type="hidden" name="category" value="{{$_SESSION["categoryName"]}}">
      <input type="hidden" name="GPS" value="{{$gpsRent}}">
      <input type="hidden" name="ChildSeat" value="{{$numSeats}}">
      <input type="hidden" name="Totalcost" value="{{$_SESSION["debt"]}}">
      <input type="hidden" name="debt" value="{{$_SESSION["debt"]}}">
      <input type="hidden" name="tokenID" value="0">
      <input type="hidden" name="canceled" value="0">
    </form>
  </body>
</html>
