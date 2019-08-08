<?php
use Carbon\Carbon;

$current = Carbon::now();
$current = new Carbon();

$current = $current->format('Y-m-d');

$pickupDate = \App\Reservation::find($_GET["id"])->PickUpDate;
$createdAt = \App\Reservation::find($_GET["id"])->created_at;

$orderName = $_GET["Name"];

$diferenciaDias = function($inicio, $fin){
  $inicio = strtotime($inicio);
  $fin = strtotime($fin);
  $dif = $fin - $inicio;
  $diasFalt = (( ( $dif / 60 ) / 60 ) / 24);
  return ceil($diasFalt);
};

$DaysRefund = function($createdAt, $current){
  $createdAt = strtotime($createdAt);
  $current = strtotime($current);
  $dif = $current - $createdAt;
  $diasFalt = (( ( $dif / 60 ) / 60 ) / 24);
  return ceil($diasFalt);
};

$PicupRefund = function($pickupDate, $current){
  $pickupDate = strtotime($pickupDate);
  $current = strtotime($current);
  $dif = $pickupDate - $current;
  $diasFalt = (( ( $dif / 60 ) / 60 ) / 24);
  return ceil($diasFalt);
};

if ($DaysRefund($createdAt, $current) <= 1) {
  $refund = \App\Reservation::find($_GET["id"])->Totalcost;
  $refund = $refund * 100;
} else if($PicupRefund($pickupDate, $current) >= 2){
  $refund = \App\Reservation::find($_GET["id"])->Totalcost;
  $refund = $refund * 100;
  $refund = $refund/2;
} else {
  $refund = \App\Reservation::find($_GET["id"])->Totalcost;
  $refund = $refund * 100;
  $refund = $refund/4;
}

$inicio = \App\Reservation::find($_GET["id"])->PickUpDate;
$fin = \App\Reservation::find($_GET["id"])->DropOffDate;

$totalDebt = \App\Reservation::find($_GET["id"])->debt;
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <?php
  if ($orderName == \App\Reservation::find($_GET["id"])->Name) {
    if (\App\Reservation::find($_GET["id"])->debt != 0) {
   ?>
  <body>
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
        <td colspan="2">{{\App\Reservation::find($_GET["id"])->LocationPickUp}}</td>
        <td colspan="2">{{\App\Reservation::find($_GET["id"])->LocationDropOff}}</td>
        <td rowspan="2">{{$diferenciaDias($inicio,$fin)}}</td>
        <td rowspan="2">{{\App\Reservation::find($_GET["id"])->category}}</td>
        <td rowspan="2">{{\App\Reservation::find($_GET["id"])->GPS}}</td>
        <td rowspan="2">{{\App\Reservation::find($_GET["id"])->ChildSeat}}</td>
        <td rowspan="2">{{\App\Reservation::find($_GET["id"])->Totalcost}}</td>
        <td rowspan="2">{{\App\Reservation::find($_GET["id"])->debt}}</td>
        <td rowspan="2">{{\App\Reservation::find($_GET["id"])->Name}}</td>
        <td rowspan="2">{{\App\Reservation::find($_GET["id"])->LastName}}</td>
        <td rowspan="2">{{\App\Reservation::find($_GET["id"])->Email}}</td>
        <td rowspan="2">{{\App\Reservation::find($_GET["id"])->Numero}}</td>
      </tr>
      <tr>
        <td>{{\App\Reservation::find($_GET["id"])->PickUpDate}}</td>
        <td>{{\App\Reservation::find($_GET["id"])->PickUpHour}}</td>
        <td>{{\App\Reservation::find($_GET["id"])->DropOffDate}}</td>
        <td>{{\App\Reservation::find($_GET["id"])->DropOffHour}}</td>
      </tr>
    </table>
    <h3>Your reservation id: {{\App\Reservation::find($_GET["id"])->id  }}</h3>
    <form class="" action="{{route('payment')}}" method="get">
      <label for="">Pay now?</label>
      <input type="hidden" name="debt" value="{{\App\Reservation::find($_GET["id"])->debt}}">
      <input type="hidden" name="id" value="{{\App\Reservation::find($_GET["id"])->id}}">
      <input type="hidden" name="Name" value="{{\App\Reservation::find($_GET["id"])->Name}}">
      <button type="submit" name="discount" value="0">Pay!</button>
    </form>
    <form class="" action="/api/cancel" method="post">
      <label for="">Cancel reservation?</label>
      <input type="hidden" name="id" value="{{\App\Reservation::find($_GET["id"])->id}}">
      <button type="submit" name="button">Cancel</button>
    </form>
    <form class="" action="{{route('homepage')}}" method="get">
      <h2>Return to homepage</h2>
      <button type="submit" name="button">Homepage</button>
    </form>
  </body>
  <?php
} else if (\App\Reservation::find($_GET["id"])->debt == 0 && \App\Reservation::find($_GET["id"])->canceled == 0){
   ?>
   <body>
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
         <td colspan="2">{{\App\Reservation::find($_GET["id"])->LocationPickUp}}</td>
         <td colspan="2">{{\App\Reservation::find($_GET["id"])->LocationDropOff}}</td>
         <td rowspan="2">{{$diferenciaDias($inicio,$fin)}}</td>
         <td rowspan="2">{{\App\Reservation::find($_GET["id"])->category}}</td>
         <td rowspan="2">{{\App\Reservation::find($_GET["id"])->GPS}}</td>
         <td rowspan="2">{{\App\Reservation::find($_GET["id"])->ChildSeat}}</td>
         <td rowspan="2">{{\App\Reservation::find($_GET["id"])->Totalcost}}</td>
         <td rowspan="2">{{\App\Reservation::find($_GET["id"])->debt}}</td>
         <td rowspan="2">{{\App\Reservation::find($_GET["id"])->Name}}</td>
         <td rowspan="2">{{\App\Reservation::find($_GET["id"])->LastName}}</td>
         <td rowspan="2">{{\App\Reservation::find($_GET["id"])->Email}}</td>
         <td rowspan="2">{{\App\Reservation::find($_GET["id"])->Numero}}</td>
       </tr>
       <tr>
         <td>{{\App\Reservation::find($_GET["id"])->PickUpDate}}</td>
         <td>{{\App\Reservation::find($_GET["id"])->PickUpHour}}</td>
         <td>{{\App\Reservation::find($_GET["id"])->DropOffDate}}</td>
         <td>{{\App\Reservation::find($_GET["id"])->DropOffHour}}</td>
       </tr>
     </table>
     <h3>Your reservation id: {{\App\Reservation::find($_GET["id"])->id  }}</h3>
     <form class="" action="/api/refund" method="post">
       <label for="">Do you want to cancel?</label>
       <input type="hidden" name="Totalcost" value="{{$refund}}">
       <input type="hidden" name="id" value="{{\App\Reservation::find($_GET["id"])->id}}">
       <input type="hidden" name="tokenID" value="{{\App\Reservation::find($_GET["id"])->tokenID}}">
       <button type="submit" name="discount" value="0">Refound!</button>
     </form>
     <form class="" action="{{route('homepage')}}" method="get">
       <h2>Return to homepage</h2>
       <button type="submit" name="button">Homepage</button>
     </form>
   </body>
   <?php
 } else if (\App\Reservation::find($_GET["id"])->debt == 0 && \App\Reservation::find($_GET["id"])->canceled == 1){
   ?>
   <body>
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
         <td colspan="2">{{\App\Reservation::find($_GET["id"])->LocationPickUp}}</td>
         <td colspan="2">{{\App\Reservation::find($_GET["id"])->LocationDropOff}}</td>
         <td rowspan="2">{{$diferenciaDias($inicio,$fin)}}</td>
         <td rowspan="2">{{\App\Reservation::find($_GET["id"])->category}}</td>
         <td rowspan="2">{{\App\Reservation::find($_GET["id"])->GPS}}</td>
         <td rowspan="2">{{\App\Reservation::find($_GET["id"])->ChildSeat}}</td>
         <td rowspan="2">{{\App\Reservation::find($_GET["id"])->Totalcost}}</td>
         <td rowspan="2">{{\App\Reservation::find($_GET["id"])->debt}}</td>
         <td rowspan="2">{{\App\Reservation::find($_GET["id"])->Name}}</td>
         <td rowspan="2">{{\App\Reservation::find($_GET["id"])->LastName}}</td>
         <td rowspan="2">{{\App\Reservation::find($_GET["id"])->Email}}</td>
         <td rowspan="2">{{\App\Reservation::find($_GET["id"])->Numero}}</td>
       </tr>
       <tr>
         <td>{{\App\Reservation::find($_GET["id"])->PickUpDate}}</td>
         <td>{{\App\Reservation::find($_GET["id"])->PickUpHour}}</td>
         <td>{{\App\Reservation::find($_GET["id"])->DropOffDate}}</td>
         <td>{{\App\Reservation::find($_GET["id"])->DropOffHour}}</td>
       </tr>
     </table>
     <h3>Your reservation id: {{\App\Reservation::find($_GET["id"])->id  }}</h3>
     <h3>This reservation has been canceled</h3>
     <form class="" action="{{route('homepage')}}" method="get">
       <h2>Return to homepage</h2>
       <button type="submit" name="button">Homepage</button>
     </form>
   </body>
   <?php
    }
  }else {
    ?>
   <body>
     <h1>The name of the order does not match...</h1>
     <form class="" action="{{route('search')}}" method="get">
       <button type="submit" name="button">Go back</button>
     </form>
   </body>
   <?php
   }
    ?>
</html>
