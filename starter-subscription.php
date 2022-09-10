<?php
require_once('vendor/autoload.php');

$stripe = new \Stripe\StripeClient("sk_test_51LgIIyCoV3pmO74u24jtvFPyv3LJvGPAxXc3Yrlc1gvOSq4S0S2nF4ArRfHNs02vA49I1ls2H6bwTBhjm3Wh1baS00TqcPOJbs");

$product = $stripe->products->create([
  'name' => 'Starter Subscription',
  'description' => '$12/Month subscription',
]);
echo "Success! Here is your starter subscription product id: " . $product->id . "\n";

$price = $stripe->prices->create([
  'unit_amount' => 1200,
  'currency' => 'usd',
  'recurring' => ['interval' => 'month'],
  'product' => $product['id'],
]);
echo "Success! Here is your premium subscription price id: " . $price->id . "\n";

?>