<?php

function checkPromocode()
{
    if(!isset($_SESSION['promo']))
    {
        $promo = (isset($_GET['promocode']))? (int)$_GET['promocode']: 0;
        $_SESSION['promo'] = $promo;
        echo 'promo code is : '.$promo;

    }
}


//do_actions('before_ordering');
add_actions('before_ordering','checkPromocode');


function usePromoCode()
{
   if(isset($_SESSION['promo']))
   {
       $promoValue = $_SESSION['promo'];

       //update order


       echo'promo'.$promoValue.'code used successfully';
   }
}


//do_actions('after_ordering');
add_actions('after_ordering','usePromoCode');


function makeProductCapital($product)
{
    $product['title'] = strtoupper($product['title']);

    return $product;
}

add_filter('product_details','makeProductCapital');


function printTitle()
{
    echo'<h1>Product Details<h1/>';
}

add_actions('before_product_details','printTitle');



