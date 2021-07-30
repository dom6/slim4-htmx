<?php

namespace App\Models;

interface IRepository
{
    public function find(string $q);
}
