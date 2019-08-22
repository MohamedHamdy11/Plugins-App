<?php
session_start();
require('includes/config.php');
require('includes/pluginsSystem.php');
require('includes/products.php');
require('includes/homePage.php');
require('includes/orders.php');
//require('plugins/checkPromocodePlugin.php');

$home = new homePage();


$producId = (isset($_GET['id']))? (int)$_GET['id'] : 0;

if(!$_SESSION['promo'])
    $_SESSION['promo'] = (isset($_GET['promocode']))? (int)$_GET['promocode'] : 0;

if(isset($_POST['submit']))
{
                  // $name,$address,$phone,$productId,$quantity

    $home->order($_POST['name'],$_POST['address'],$_POST['phone'],$_POST['product_id'],$_POST['quantity']);
}
else
{


?>
<form action="order.php" method="post">
    name     : <input type="text" name="name"><br/>
    address  : <input type="text" name="address"><br/>
    phone    : <input type="text" name="phone"><br/>
    quantity : <input type="text" name="quantity"><br/>
    <input type="hidden" name="product_id" value="<?php echo $producId; ?>"><br/>
    <input type="submit" name="submit" value="add order">

</form>


<?php } ?>
