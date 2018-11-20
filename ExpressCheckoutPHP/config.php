<?php

/**
 * Start session in all pages
 */

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//PHP >= 5.4.0
//if(session_id() == '') { session_start(); } //uncomment this line if PHP < 5.4.0 and comment out line above

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

// sandbox or live
define('PPL_MODE', 'sandbox');

if (PPL_MODE == 'sandbox') {

    define('PPL_API_USER', 'merchant74_api1.gmail.com');
    define('PPL_API_PASSWORD', 'NGA3X5HFQCTVHETS');
    define('PPL_API_SIGNATURE', 'A0D2TVkf7Pjk-x7ZaBcqTEtb2NMNACvcwk4XeC-MH8ysEw9UGWgo7hmy');

} else {

    define('PPL_API_USER', 'merchant74_api1.gmail.com');
    define('PPL_API_PASSWORD', 'NGA3X5HFQCTVHETS');
    define('PPL_API_SIGNATURE', 'A0D2TVkf7Pjk-x7ZaBcqTEtb2NMNACvcwk4XeC-MH8ysEw9UGWgo7hmy');
}

$baseUrl = getBaseUrl();
define('PPL_LANG', 'EN');
define('PPL_LOGO_IMG', 'http://url/to/site/logo.png');
define('PPL_RETURN_URL', "$baseUrl/process.php");
define('PPL_CANCEL_URL', "$baseUrl/process.php");
define('PPL_CURRENCY_CODE', 'USD');
