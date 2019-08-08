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
        <th>Name</th>
        <th>Capacity</th>
        <th>Cost</th>
      </thead>
      @foreach($categories as $c)
      <tr>
        <td>{{$c->id}}</td>
        <td>{{$c->name}}</td>
        <td>{{$c->capacity}}</td>
        <td>{{$c->cost}}</td>
        <td><form class="" action="{{route('categoriesDelete')}}" method="get">
          <input type="hidden" name="id" value="{{$c->id}}">
          <button type="submit" name="button">Delete</button>
        </form></td>
      </tr>
      @endforeach
    </table>
    <form class="" action="{{route('storeCategory')}}" method="get">
      <label for="name">Name:</label>
      <input type="text" name="name">
      <label for="capacity">Capacity:</label>
      <input type="text" name="capacity">
      <label for="cost">Cost:</label>
      <input type="text" name="cost">
      <button type="submit">Add</button>
    </form>
    <form class="" action="{{route('admin')}}" method="get">
      <button type="submit" name="button">Return</button>
    </form>
  </body>
</html>
