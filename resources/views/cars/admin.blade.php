<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="{{route('locationsTable')}}" method="get">
      <button type="submit" name="button">Locations</button>
    </form>
    <form class="" action="{{route('categoriesTable')}}" method="get">
      <button type="submit" name="button">Categories</button>
    </form>
    <form class="" action="{{route('reservationsTable')}}" method="get">
      <button type="submit" name="button">Reservations</button>
    </form>
    <form class="" action="{{route('homepage')}}" method="get">
      <button type="submit" name="button">Return</button>
    </form>
  </body>
</html>
