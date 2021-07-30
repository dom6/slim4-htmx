<?php


namespace App\Validations;


class IsEmpty implements IValidator
{
    private $_val;

    public function __construct(string $value)
    {
        $this->_val = $value;
    }

    public function validate()
    {
        return isset($this->_val) && strlen(trim($this->_val)) <= 0;
    }
}