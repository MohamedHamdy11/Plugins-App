<?php

class homePage
{
    public function home()
    {
        do_actions('before_home');

        $productsObject =new products();
        $products  = $productsObject->getProducts("ORDER BY `id` DESC");

        $products =do_filter('filter_products',$products);
        do_actions('after_home');
        return $products;
    }


    public function product()
    {
        do_actions('before_product_details');
        $id = (isset($_GET['id']))? (int)$_GET['id']:0;

        $productsObject = new products();
        $product = $productsObject->getProduct($id);

        if(count($product)>0)
        {
            $product =do_filter('product_details',$product);

        }

        do_actions('after_product_details');
        return $product;
    }

    public function order($name,$address,$phone,$productId,$quantity)
    {
        do_actions('before_ordering');

        if(isset($_POST['submit']))
        {
        $ordersOject = new orders();

        if($ordersOject->addOrder($name,$address,$phone,$productId,$quantity))
            echo 'order is done';
        }

        do_actions('after_ordering');

    }









}