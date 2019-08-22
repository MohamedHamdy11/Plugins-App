<?php
require('includes/config.php');
require('includes/pluginsSystem.php');
require('includes/products.php');
require('includes/homePage.php');
//require('plugins/checkPromocodePlugin.php');


$home = new homePage();

$product = $home->product();

echo '<h1>'.$product['title'].'</h1>';
echo '<p>'.$product['description'].'</p>';
echo '<h6> price is : '.$product['price'].'</h6>';
echo ($product['available'] == 1)? '<h6>Available</h6>':'<h6>Not Available</h6>';
