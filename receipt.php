<?php

function receipt($atts)
{
    //TODO: Update the Flamingo post with the auth code

    $queryString = '';

    foreach ($_REQUEST as $key => $value) {
        if ($queryString !== '') {
            $queryString .= '&';
        }

        $queryString .= $key . ': ' . $value . '<br />';
    }

    print_r($queryString);
}

add_shortcode('receipt', 'receipt');
