<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
      <h1>Welcome to MonoCars</h1>
    <form class="" action="{{route('admin')}}" method="get">
      <button type="submit" name="button">Administrator</button>
    </form>
    <form class="" action="{{route('reservation')}}" method="get">
      <button type="submit" name="button">Reserve</button>
    </form>
    <form class="" action="{{route('search')}}" method="get">
      <button type="submit" name="button">Search Reservation</button>
    </form>
  </body>
</html>
