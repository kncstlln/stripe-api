<?php
require "vendor/autoload.php";

$stripe = new \Stripe\StripeClient(
  'sk_test_51LgIIyCoV3pmO74u24jtvFPyv3LJvGPAxXc3Yrlc1gvOSq4S0S2nF4ArRfHNs02vA49I1ls2H6bwTBhjm3Wh1baS00TqcPOJbs'
);
$result = $stripe->products->all(['limit' => 3]);
var_dump($result);