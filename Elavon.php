<?php

/*
Plugin Name: Elavon
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: A brief description of the Plugin.
Version: 1.0
Author: bryan
Author URI: http://URI_Of_The_Plugin_Author
License: A "Slug" license name e.g. GPL2
*/


<?php
//Uncomment the endpoint desired.
//Production URL
//$url ='https://www.myvirtualmerchant.com/VirtualMerchant/process.do';
//Demo URL
$url = 'https://demo.myvirtualmerchant.com/VirtualMerchantDemo/process.
do';
//Configuration parameters.
$ssl_merchant_id = 'xxxxxx';
$ssl_user_id = 'xxxxxx';
$ssl_pin = 'xxxxxx';
$ssl_show_form = 'true';
$ssl_result_format = 'HTML';
$ssl_test_mode = 'false';
$ssl_receipt_link_method = 'REDG';
$ssl_receipt_link_url = 'your_receipt_page_url_here';
$ssl_transaction_type = 'CCSALE';
$ssl_cvv2cvc2_indicator = '1';
//Declares base URL in the event that you are using the VM
payment form.
if($ssl_show_form == 'true')
{
    echo "<html><head><base href='" . $url .
        "'></base></head>";
}
//Dynamically builds POST request based on the information being
passed into the script.
$queryString = "";
foreach($_REQUEST as $key => $value)
{
    if($queryString != "")
    {
        $queryString .= "&";
    }
    $queryString .= $key . "=" . urlencode($value);
}
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $queryString .
    "&ssl_merchant_id=$ssl_merchant_id".
    "&ssl_user_id=$ssl_user_id".
    "&ssl_pin=$ssl_pin".

    "&ssl_transaction_type=$ssl_transaction_type".

    "&ssl_cvv2cvc2_indicator=$ssl_cvv2cvc2_indicator".
    "&ssl_show_form=$ssl_show_form".
    "&ssl_result_format=$ssl_result_format".
    "&ssl_test_mode=$ssl_test_mode".
    "&ssl_receipt_link_method=$ssl_receipt_link_method".

    "&ssl_receipt_link_url=$ssl_receipt_link_url");
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_VERBOSE, true);
$result = curl_exec($ch);
curl_close($ch);
?>