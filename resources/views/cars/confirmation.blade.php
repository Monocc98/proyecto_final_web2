<?php
if(!isset($_SESSION))
{
  session_start();
}

$_SESSION["Name"] = $_GET["Name"];
$_SESSION["LastName"] = $_GET["LastName"];
$_SESSION["Email"] = $_GET["Email"];
$_SESSION["Numero"] = $_GET["Numero"];

$inicio = $_SESSION["dateP"];
$fin = $_SESSION["dateD"];
$_SESSION["category"] = $_GET["category"];

$diferenciaDias = function($inicio, $fin){
  $inicio = strtotime($inicio);
  $fin = strtotime($fin);
  $dif = $fin - $inicio;
  $diasFalt = (( ( $dif / 60 ) / 60 ) / 24);
  return ceil($diasFalt);
};

$inicio = $_SESSION["dateP"];
$fin = $_SESSION["dateD"];

//mail($_SESSION["Email"],"Your Reservation","Your ID Reservation it's:". $_SESSION["ID"]);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Reservation created successfully!</h1>
    <table border="1">
      <thead>
        <th colspan="2">Pick-up</th>
        <th colspan="2">Drop-off</th>
        <th>Total Days</th>
        <th>Selected Car</th>
        <th>GPS</th>
        <th>Child Seats</th>
        <th>Total Cost</th>
        <th>Debt</th>
        <th colspan="4">Personal Information</th>
      </thead>
      <tr>
        <td colspan="2">{{\App\Reservation::find($id->id)->LocationPickUp}}</td>
        <td colspan="2">{{\App\Reservation::find($id->id)->LocationDropOff}}</td>
        <td rowspan="2">{{$diferenciaDias($inicio,$fin)}}</td>
        <td rowspan="2">{{\App\Reservation::find($id->id)->category}}</td>
        <td rowspan="2">{{\App\Reservation::find($id->id)->GPS}}</td>
        <td rowspan="2">{{\App\Reservation::find($id->id)->ChildSeat}}</td>
        <td rowspan="2">{{\App\Reservation::find($id->id)->Totalcost}}</td>
        <td rowspan="2">{{\App\Reservation::find($id->id)->debt}}</td>
        <td rowspan="2">{{\App\Reservation::find($id->id)->Name}}</td>
        <td rowspan="2">{{\App\Reservation::find($id->id)->LastName}}</td>
        <td rowspan="2">{{\App\Reservation::find($id->id)->Email}}</td>
        <td rowspan="2">{{\App\Reservation::find($id->id)->Numero}}</td>
      </tr>
      <tr>
        <td>{{\App\Reservation::find($id->id)->PickUpDate}}</td>
        <td>{{\App\Reservation::find($id->id)->PickUpHour}}</td>
        <td>{{\App\Reservation::find($id->id)->DropOffDate}}</td>
        <td>{{\App\Reservation::find($id->id)->DropOffHour}}</td>
      </tr>
    </table>
    <h3>Your reservation id: {{$id->id}}</h3>
    <h3>If you pay online now, you will get a 20% discount!</h3>
    <form class="" action="{{route('payment')}}" method="get">
      <label for="">Pay now?</label>
      <input type="hidden" name="id" value="{{$id->id}}">
      <input type="hidden" name="debt" value="{{$_SESSION["debt"]}}">
      <button type="submit" name="discount" value="1">Pay!</button>
    </form>
    <form class="" action="{{route('homepage')}}" method="get">
      <button type="subit" name="button">Homepage</button>
    </form>
  </body>
</html>
