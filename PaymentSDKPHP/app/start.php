<?php

require 'vendor/autoload.php';

$paypal = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AUwffmEqTvZfFZzpxSyD0Lr7GCLxyTxppff6tGv9m2WdNh8VK3o1YZ4HwkTA54iPzOqIO0Cpy1GtdiwS',
        'EPE1Wv6KetPfsx8McWMIOjwXHE2OiOVnJ-ED9e4FacpGI-pJjbzmaVOYj9Xc5jeQ3WnYoTwEFwWnr4x9'
    )
);