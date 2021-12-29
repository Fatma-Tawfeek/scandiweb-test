<?php

class Service
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    //Get all the products from the database
    public function getProducts()
    {
        $this->db->query("SELECT * FROM products");
        $result = $this->db->resultSet();
        return $result;
    }

    //Delete products. Takes an array with all id's that should be removed
    public function deleteProducts($arr)
    {
        foreach ($arr as $id) {
            $this->db->query("DELETE FROM products WHERE id=" . $id);
            $this->db->execute();
        }
    }
}
