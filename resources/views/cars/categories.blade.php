<?php
if(!isset($_SESSION))
{
  session_start();
}
$_SESSION["locationP"] = $_GET["locationPU"];
$_SESSION["locationD"] = $_GET["locationDO"];
$_SESSION["dateP"] = $_GET["datePU"];
$_SESSION["dateD"] = $_GET["dateDO"];
$_SESSION["hourP"] = $_GET["hourPU"];
$_SESSION["hourD"] = $_GET["hourDO"];

function diferenciaDias($inicio, $fin)
{
    $inicio = strtotime($inicio);
    $fin = strtotime($fin);
    $dif = $fin - $inicio;
    $diasFalt = (( ( $dif / 60 ) / 60 ) / 24);
    return ceil($diasFalt);
}

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
    <?php
    if($_GET["datePU"]>$_GET["dateDO"]){
     ?>
     <h2>The drop-off date must be at least one hour greater than the pick-up date</h2>
     <?php
   } else if($_GET["datePU"]==$_GET["dateDO"] && $_GET["hourPU"]>=$_GET["hourDO"]){
      ?>
      <h2>The drop-off date must be at least one hour greater than the pick-up date</h2>
      <?php
    } else {
       ?>
       <table border="1">
         <thead>
           <th colspan="2">Pick-up</th>
           <th colspan="2">Drop-off</th>
           <th>Total Days</th>
         </thead>
         <tr>
           <td colspan="2">{{$_SESSION["locationP"]}}</td>
           <td colspan="2">{{$_SESSION["locationD"]}}</td>
           <td rowspan="2">{{diferenciaDias($inicio, $fin)}}</td>
         </tr>
         <tr>
           <td>{{$_SESSION["dateP"]}}</td>
           <td>{{$_SESSION["hourP"]}}</td>
           <td>{{$_SESSION["dateD"]}}</td>
           <td>{{$_SESSION["hourD"]}}</td>
         </tr>
       </table>
       <form class="" action="{{route('extras')}}" method="get">
         <label for="category">Category</label>
         <select class="" id="category" name="category">
           @foreach($categories as $c)
           <option value="{{$c->id}}">{{$c->name}} - ${{$c->cost}}</option>
           @endforeach
         </select>
         <button type="submit" name="button">Submit</button>
       </form>
       <?php
     }
        ?>
  </body>
</html>
