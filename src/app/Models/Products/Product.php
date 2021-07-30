<?php

namespace App\Models\Products;

class Product
{
    public $name;
    public $description;
    public $price;

    public function __construct(string $name, string $description, float $price)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }
}