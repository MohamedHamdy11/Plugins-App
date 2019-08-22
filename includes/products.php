<?php

class products
{
    public $connection;

    public function __construct()
    {
        $this->connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    }

    /**
     * return all products
     * @param string $extra
     * @return array
     */
    public function getProducts($extra='')
    {
        $result = $this->connection->query("SELECT * FROM `products` $extra");
        $products = array();
        if($result->num_rows>0)
        {
            while($row = $result->fetch_assoc())
            {
                $products[] = $row;
            }
        }
        return $products;

    }

    /**
     * get product by id
     * @param $id
     * @return array|mixed
     */
    public function getProduct($id)
    {
        $products = $this->getProducts("WHERE `id`=$id");
        if(count($products) >0)
            return $products[0];

        return [];
    }


    public function __destruct()
    {
        $this->connection->close();
    }


}





