<?php

abstract class Product
{

    public $name;
    public $sku;
    public $price;
    public $productType;


    public function __construct($data)
    {
        $this->name = $data['name'];
        $this->sku = $data['sku'];
        $this->price = $data['price'];
        $this->productType = $data['productType'];
    }

    abstract function addProduct();
}

// Dvd Logic

class Dvd extends Product
{
    public $size;
    private $db;

    public function __construct($data)
    {
        $this->db = new Database;
        Parent::__construct($data);
        $this->size = $data['size'];
    }

    public function addProduct()
    {
        $this->db->query("INSERT INTO products (sku, name, price, productType, specification) 
        VALUES ('" . $this->sku . "',
             '" . $this->name . "',
             '" . $this->price . "',
             '" . $this->productType . "',
             'Size (MB): " . $this->size . "')");

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

// Book Logic

class Book extends Product
{
    public $weight;
    private $db;

    public function __construct($data)
    {
        $this->db = new Database;
        Parent::__construct($data);
        $this->weight = $data['weight'];
    }

    public function addProduct()
    {
        $this->db->query("INSERT INTO products (sku, name, price, productType, specification) 
        VALUES ('" . $this->sku . "',
             '" . $this->name . "',
             '" . $this->price . "',
             '" . $this->productType . "',
             'Weight (KG): " . $this->weight . "')");

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

// Furniture Logic

class Furniture extends Product
{
    public $height;
    public $width;
    public $length;
    private $db;

    public function __construct($data)
    {
        $this->db = new Database;
        Parent::__construct($data);
        $this->height = $data['height'];
        $this->width = $data['width'];
        $this->length = $data['length'];
    }

    public function addProduct()
    {
        $this->db->query("INSERT INTO products (sku, name, price, productType, specification) 
        VALUES ('" . $this->sku . "',
             '" . $this->name . "',
             '" . $this->price . "',
             '" . $this->productType . "',
             'Dimension: " . $this->height . "x" . $this->width . "x" . $this->length . "')");

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

