<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table border="1">
      <thead>
        <th>ID</th>
        <th>Client Name</th>
        <th>Client Last Name</th>
        <th>Client Email</th>
        <th>Client Phone Number</th>
        <th>Location Pick-Up</th>
        <th>Pick-Up Date</th>
        <th>Pick-Up Hour</th>
        <th>Location Drop-Off</th>
        <th>Drop-Off Date</th>
        <th>Drop-Off Hour</th>
        <th>Car Category</th>
        <th>GPS</th>
        <th>Child Seats</th>
        <th>Total Cost</th>
        <th>Debt</th>
      </thead>
      @foreach($reservations as $r)
      <tr>
        <td>{{$r->id}}</td>
        <td>{{$r->Name}}</td>
        <td>{{$r->LastName}}</td>
        <td>{{$r->Email}}</td>
        <td>{{$r->Numero}}</td>
        <td>{{$r->LocationPickUp}}</td>
        <td>{{$r->PickUpDate}}</td>
        <td>{{$r->PickUpHour}}</td>
        <td>{{$r->LocationDropOff}}</td>
        <td>{{$r->DropOffDate}}</td>
        <td>{{$r->DropOffHour}}</td>
        <td>{{$r->category}}</td>
        <td>{{$r->GPS}}</td>
        <td>{{$r->ChildSeat}}</td>
        <td>{{$r->Totalcost}}</td>
        <td>{{$r->debt}}</td>
      </tr>
      @endforeach
    </table>
    <form class="" action="{{route('admin')}}" method="get">
      <button type="submit" name="button">Return</button>
    </form>
  </body>
</html>
