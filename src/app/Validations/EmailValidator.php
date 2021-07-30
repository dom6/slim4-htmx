<?php

namespace App\Validations;

class EmailValidator implements IValidator
{
    private $_email;

    public function __construct(string $email)
    {
        $this->_email = $email;
    }

    public function validate()
    {
        return filter_var($this->_email, FILTER_VALIDATE_EMAIL);
    }
}
