<?php

namespace App\Models\Products;

use App\Models\IRepository;

class ProductRepository implements IRepository
{
    protected $product_data;

    public function __construct()
    {
        $this->product_data = new ProductData();
    }

    public function find(string $q)
    {
        $results = [];

        foreach ($this->product_data as $item) {
            if (str_contains(strtolower($item->name), strtolower($q))) {
                $results[] = $item;
            }
        }

        return $results;
    }
}