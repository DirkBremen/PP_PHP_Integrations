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
define('CLIENT_ID', 'AUwffmEqTvZfFZzpxSyD0Lr7GCLxyTxppff6tGv9m2WdNh8VK3o1YZ4HwkTA54iPzOqIO0Cpy1GtdiwS'); //your PayPal client ID
define('CLIENT_SECRET', 'EPE1Wv6KetPfsx8McWMIOjwXHE2OiOVnJ-ED9e4FacpGI-pJjbzmaVOYj9Xc5jeQ3WnYoTwEFwWnr4x9'); //PayPal Secret
define('RETURN_URL', "$baseUrl/order_process.php"); //return URL where PayPal redirects user
define('CANCEL_URL', "$baseUrl/payment_cancel.html"); //cancel URL
define('PP_CURRENCY', 'USD'); //Currency code
define('PP_MODE', 'sandbox'); //sandbox or live (sandbox requires testing credentials)
//define('PP_CONFIG_PATH', "$baseUrl/sdk_config.ini"); //PayPal config path (sdk_config.ini)

//Enter MySQL details
$db_host 		= "localhost";
$db_username 	= "root";
$db_password 	= "";
$db_name 		= "restsdk_shoppingcart_multiitems";

//Open mySQL connection
$mysqli = new mysqli( $db_host, $db_username, $db_password, $db_name);
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}

?>