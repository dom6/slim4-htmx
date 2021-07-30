<?php

namespace App\Models\Products;

class ProductData implements \IteratorAggregate
{
    private $_array = [];

    public function __construct()
    {
        $this->_array[] = new Product('iPhone 12 Pro', 'The biggest iPhone yet', 999.00);
        $this->_array[] = new Product('iPhone 12', 'Bigger than the original', 699.00);
        $this->_array[] = new Product('iPhone SE', 'Smaller than the 12, but still bigger than the original iPhone', 399.00);
        $this->_array[] = new Product('iPhone 11', 'Last year\'s model', 599.00);
        $this->_array[] = new Product('Samsung Galaxy Z Fold', 'The screen bends. That\'s just crazy', 1449.99);
        $this->_array[] = new Product('Samsung Galaxy Note', 'It\'s big and comes with a stylus', 1299.99);
        $this->_array[] = new Product('Google Pixel 5', 'Google\'s most powerful phone', 699.00);
        $this->_array[] = new Product('Windows Phone', 'It\'ll probably make a comeback attempt', 899.99);
        $this->_array[] = new Product('Motorola Razr', 'It\'s flippy', 1199.99);
        $this->_array[] = new Product('Danger Hiptop', 'It has a built in keyboard and 128MB of memory', 299.00);
    }
    /**
     * @inheritDoc
     */
    public function getIterator() : \ArrayIterator
    {
        return new \ArrayIterator($this->_array);
    }
}