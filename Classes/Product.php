<?php

include_once 'Service.php';
include_once 'Dvd.php';
include_once 'Book.php';
include_once 'Furniture.php';

class Product 
{

    public $name;
    public $sku;
    public $price;
    public $productType;
    public $attribute;
    public $db;


    public function __construct($data)
    {
        $this->db = new Database;
        $this->name = $data['name'];
        $this->sku = $data['sku'];
        $this->price = $data['price'];
        $this->productType = $data['productType']; 
        
        $request = $data['productType'];
        $attr = $this->setAttribute(new $request, $data);
        $this->attribute = $attr; 
                  
        
    }

    function addProduct() {
        $this->db->query("INSERT INTO products (sku, name, price, productType, attribute) 
        VALUES ('" . $this->sku . "',
             '" . $this->name . "',
             '" . $this->price . "',
             '" . $this->productType . "',
             '" . $this->attribute . "')");   
                         

         if ($this->db->execute()) {
             return true;
         } else {
             return false;
         }
     }

         
    public function setAttribute(Type $type, $data)
        {   
            return $type->setAttribute($data);
        }
};

