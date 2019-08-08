<?php
if(!isset($_SESSION))
{
  session_start();
}

use Illuminate\Http\Request;
use \App\Reservation;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/payment', function () {
  // Set your secret key: remember to change this to your live secret key in production
  // See your keys here: https://dashboard.stripe.com/account/apikeys
  \Stripe\Stripe::setApiKey('sk_test_YomAW3dWdQBdPu8fpwE1p42a00J65zgERg');

  // Token is created using Checkout or Elements!
  // Get the payment token ID submitted by the form:
  $token = $_POST['stripeToken'];
  $charge = \Stripe\Charge::create([
    'amount' => $_SESSION["toPay"],
    'currency' => 'usd',
    'description' => 'MonoCars',
    'source' => $token,
  ]);
  $payment=Reservation::find($_SESSION["id"]);
  $payment->debt=0;
  $payment->Totalcost=$_SESSION["toPay"]/100;
  $payment->tokenID = $charge->id;
  //$payment->Totalcost=$costDB;
  $payment->save();

  return view('cars.successfulPayment');

});

Route::post('/refund', function () {
  // Set your secret key: remember to change this to your live secret key in production
  // See your keys here: https://dashboard.stripe.com/account/apikeys
  \Stripe\Stripe::setApiKey('sk_test_YomAW3dWdQBdPu8fpwE1p42a00J65zgERg');

  $refund = \Stripe\Refund::create([
    'charge' => $_POST["tokenID"],
    'amount' => $_POST["Totalcost"],
  ]);
  $payment=Reservation::find($_POST["id"]);
  $payment->canceled=1;
  $payment->save();
  return view('cars.successfulRefound');

});

Route::post('/cancel', function () {

  $payment=Reservation::find($_POST["id"]);
  $payment->canceled=1;
  $payment->debt=0;
  $payment->save();
  return view('cars.canceled');

});
