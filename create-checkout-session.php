<?php

require 'vendor/autoload.php';
// This is your test secret API key.
\Stripe\Stripe::setApiKey('sk_test_51LgIIyCoV3pmO74u24jtvFPyv3LJvGPAxXc3Yrlc1gvOSq4S0S2nF4ArRfHNs02vA49I1ls2H6bwTBhjm3Wh1baS00TqcPOJbs');

header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://localhost/stripe-api';

$checkout_session = \Stripe\Checkout\Session::create([
  'line_items' => [[
    # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
    'price' => 'price_1LgIk0CoV3pmO74ukuLxQCUV',
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '/success.html',
  'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);