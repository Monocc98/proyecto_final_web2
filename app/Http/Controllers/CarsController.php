<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use \App\Category;
use \App\Location;
use \App\Reservation;
use \App\Http\Requests\ReservationRequest;

class CarsController extends Controller
{
  public function homepage()
    {
      $categories = Category::all();
      return view('cars.homepage');
    }

    public function reservation()
    {
      $locations = Location::all();
      return view('cars.reservation')->with('locations',$locations);
    }

    public function categories()
    {
      $categories = Category::all();
      return view('cars.categories')->with('categories',$categories);
    }

    public function extras()
    {
      $categories = Category::all();
      return view('cars.extras')->with('categories',$categories);
    }

    public function order()
    {
      $categories = Category::all();
      return view('cars.order')->with('categories',$categories);
    }

    public function admin()
    {
      $categories = Category::all();
      return view('cars.admin');
    }

    public function categoriesTable()
    {
      $categories = Category::all();
      return view('cars.categoriesTable')->with('categories',$categories);
    }

    public function locationsTable()
    {
      $locations = Location::all();
      return view('cars.locationsTable')->with('locations',$locations);
    }

    public function reservationsTable()
    {
      $reservations = Reservation::all();
      return view('cars.reservationsTable')->with('reservations',$reservations);
    }

    public function storeCategory(Request $request)
    {
      Category::create($request->all());
      $categories = Category::all();
      return view('cars.categoriesTable')->with('categories',$categories);
    }

    public function storeLocation(Request $request)
    {
      Location::create($request->all());
      $locations = Location::all();
      return view('cars.locationsTable')->with('locations',$locations);
    }

    public function payment()
    {
      $reservations = Reservation::all();
      return view('cars.payment')->with('reservations',$reservations);
    }

    public function confirmation(Request $request)
    {
      $id=Reservation::create($request->all());
      return view('cars.confirmation')->withId($id);
    }

    public function search()
    {
      $reservations = Reservation::all();
      return view('cars.search')->with('reservations',$reservations);
    }

    public function reservationFound()
    {
      $reservations = Reservation::all();
      return view('cars.reservationFound')->with('reservations',$reservations);
    }

    public function successfulPayment()
    {
      $reservations = Reservation::all();
      return view('cars.successfulPayment')->with('reservations',$reservations);
    }

    public function categoriesDelete(Request $id)
    {
      $delateCategory = Category::destroy($id->all());
      $categories = Category::all();
      return view('cars.categoriesTable')->with('categories',$categories);
    }

    public function locationsDelete(Request $id)
    {
      $delateLocation = Location::destroy($id->all());
      $locations = Location::all();
      return view('cars.locationsTable')->with('locations',$locations);
    }
}
