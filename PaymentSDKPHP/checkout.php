<?php

use PayPal\API\Payer;
use PayPal\API\Item;
use PayPal\API\ItemList;
use PayPal\API\Details;
use PayPal\API\Amount;
use PayPal\API\Transaction;
use PayPal\API\RedirectUrls;
use PayPal\API\Payment;

require 'app/start.php';


function getBaseUrl(){
    if(isset($_SERVER['HTTPS'])){
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    }
    else{
        $protocol = 'http';
    }
    return dirname($protocol . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
}

if(!isset($_POST['product'], $_POST['price'])) {
    die();
}

$product = $_POST['product'];
$price = floatval($_POST['price']);
$shipping = 2.00;

$total = $price + $shipping;

$payer = new Payer();
$payer->setPaymentMethod('paypal');
$item = new Item();
$item->setName($product)
    ->setCurrency('USD')
    ->setQuantity(1)
    ->setSku("123123")
    ->setPrice($price);

$itemList = new ItemList();
$itemList->setItems([$item]);

$details = new Details();
$details->setShipping($shipping)
    ->setSubtotal($price);

$amount = new Amount();
$amount->setCurrency('USD')
    ->setTotal($total)
    ->setDetails($details);

$transaction = new Transaction();
$transaction->setAmount($amount)
    ->setItemList($itemList)
    ->setDescription('PayForSomething Payment')
    ->setInvoiceNumber(uniqid());


$baseUrl = getBaseUrl(); 
$redirectUrls = new RedirectUrls();
$redirectUrls->setReturnUrl("$baseUrl/executePayment.php?success=true") 
    ->setCancelUrl("$baseUrl/executePayment.php?success=false");

$payment = new Payment();
$payment->setIntent('sale')
    ->setPayer($payer)
    ->setRedirectUrls($redirectUrls)
    ->setTransactions(array($transaction));

try{
    $payment->create($paypal);
} catch (Exception $e){
    $data = json_decode($e->getData());
    var_dump($data);
    die();
}

$approvalUrl = $payment->getApprovalLink();
header("Location: {$approvalUrl}");







