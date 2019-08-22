<?php
require('includes/config.php');
require('includes/pluginsSystem.php');
require('includes/products.php');
require('includes/homePage.php');

$home = new homePage();
$products = $home->home();


?>

<table border="1">
    <tr>
        <td>Product Title </td>
        <td>Product Price </td>
        <td>Product Availability</td>
        <td>Details</td>
        <td>Order Now</td>
    </tr>
    <?php
    foreach($products as $product)
    {
        echo '<tr>';
        echo '<td>' . $product['title'] . '</td>';
        echo '<td>' . $product['price'] . '</td>';
        echo ($product['available'] == 0) ? '<td>Not available</td>' : '<td>available</td>';
        echo '<td><a href="product.php?id=' . $product['id'] . '">Details</a> </td>';
        echo '<td><a href="order.php?id=' . $product['id'] . '">order Now</a> </td>';
        echo '</tr>';
    }

    ?>
</table>
