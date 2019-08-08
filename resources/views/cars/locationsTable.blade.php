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
        <th>Country</th>
        <th>On Airport</th>
        <th>Location</th>
      </thead>
      @foreach($locations as $l)
      <tr>
        <td>{{$l->id}}</td>
        <td>{{$l->country}}</td>
        <td>{{$l->onAirport}}</td>
        <td>{{$l->location}}</td>
        <td><form class="" action="{{route('locationsDelete')}}" method="get">
          <button type="submit" name="id">Delete</button>
        </form></td>
      </tr>
      @endforeach
    </table>
    <form class="" action="{{route('storeLocation')}}" method="get">
      <label for="country">Country:</label>
      <input type="text" name="country">
      <label for="onAirport">On Airport:</label>
      <input type="text" name="onAirport">
      <label for="location">Location:</label>
      <input type="text" name="location">
      <button type="submit">Add</button>
    </form>
    <form class="" action="{{route('admin')}}" method="get">
      <button type="submit" name="button">Return</button>
    </form>
    </form>
  </body>
</html>
