<?php
/**
 * Getting base url for redirect Urls
 *
 * @return void
 */
function getBaseUrl()
{
    if (isset($_SERVER['HTTPS'])) {
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    } else {
        $protocol = 'http';
    }
    return dirname($protocol . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
}
$baseUrl = getBaseUrl();
$currency = '$'; //Currency Character or code

//MySql
$db_username = 'root';
$db_password = '';
$db_name = 'simpleshoppingcart';
$db_host = 'localhost';

//paypal settings
$PayPalMode = 'sandbox'; // sandbox or live
$PayPalApiUsername = 'merchant74_api1.gmail.com'; //PayPal API Username
$PayPalApiPassword = 'NGA3X5HFQCTVHETS'; //Paypal API password
$PayPalApiSignature = 'A0D2TVkf7Pjk-x7ZaBcqTEtb2NMNACvcwk4XeC-MH8ysEw9UGWgo7hmy'; //Paypal API Signature
$PayPalCurrencyCode = 'USD'; //Paypal Currency Code
$PayPalReturnURL = "$baseUrl/paypal-express-checkout/"; //Point to paypal-express-checkout page
$PayPalCancelURL = "$baseUrl/paypal-express-checkout/cancel_url.html"; //Cancel URL if user clicks cancel

//Additional taxes and fees
$HandalingCost = 0.00; //Handling cost for the order.
$InsuranceCost = 0.00; //shipping insurance cost for the order.
$shipping_cost = 1.50; //shipping cost
$ShippinDiscount = 0.00; //Shipping discount for this order. Specify this as negative number (eg -1.00)
$taxes = array( //List your Taxes percent here.
    'VAT' => 12,
    'Service Tax' => 5,
);

//connection to MySql
$mysqli = new mysqli($db_host, $db_username, $db_password, $db_name);
if ($mysqli->connect_error) {
    die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
