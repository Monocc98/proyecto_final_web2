<?php
if(!isset($_SESSION))
{
  session_start();
}

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
      </thead>
      <tr>
        <td colspan="2">{{$_SESSION["locationP"]}}</td>
        <td colspan="2">{{$_SESSION["locationD"]}}</td>
        <td rowspan="2">{{$diferenciaDias($inicio,$fin)}}</td>
        <td rowspan="2">{{\App\Category::find($_SESSION['category'])->name}}</td>
      </tr>
      <tr>
        <td>{{$_SESSION["dateP"]}}</td>
        <td>{{$_SESSION["hourP"]}}</td>
        <td>{{$_SESSION["dateD"]}}</td>
        <td>{{$_SESSION["hourD"]}}</td>
      </tr>
    </table>
    <form class="" action="{{route('order')}}" method="get">
      <table  border="1">
        <thead>
          <th colspan="2">Child Safety Seats</th>
        </thead>
        <tr>
          <td>
            <select class="" name="totalSeats">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
            </select>
          </td>
          <td><input type="checkbox" name="childSeat" value="100">$100 c/u Por día</td>
        </tr>
      </table>
      <table  border="1">
        <thead>
          <th>Hands-Free Navigation (GPS)</th>
        </thead>
        <tr>
          <td><input type="checkbox" name="gps" value="150">$150 Por día</td>
        </tr>
      </table>
      <button type="submit" name="button" value="">Submit</button>
    </form>
  </body>
</html>
