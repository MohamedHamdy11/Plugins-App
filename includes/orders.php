<?php

class orders
{

    public $connection;

    public function __construct()
    {
        $this->connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    }

    /**
     * add new order
     * @param $name
     * @param $address
     * @param $phone
     * @param $productId
     * @param $quantity
     * @return bool
     */
    public function addOrder($name,$address,$phone,$productId,$quantity)
    {
        $productsObject = new products();
        $product        = $productsObject->getProduct($productId);
        $price          = $product['price']*$quantity;

        $this->connection->query("INSERT INTO `orders`(`name`, `address`, `phone`, `product_id`, `quantity`, `price`) VALUES ('$name','$address','$phone',$productId,$quantity,$price)");

        if($this->connection->affected_rows>0)
            return true;

        return false;
    }


    /**
     * get all orders
     * @param string $extra
     * @return array
     */
    public function getOrders($extra='')
    {
        $result = $this->connection->query("SELECT * FROM `orders` $extra");
        $orders = array();
        if($result->num_rows>0)
        {
            while($row = $result->fetch_assoc())
            {
                $orders[] = $row;
            }
        }

        return $orders;
    }





    public function __destruct()
    {
        $this->connection->close();
    }


}