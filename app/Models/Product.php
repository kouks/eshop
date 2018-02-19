<?php

namespace App\Models;

use Lib\Database\Model;

class Product extends Model
{
    /**
     * The primary key to be used.
     *
     * @var string
     */
    public static $key = 'slug';
}
