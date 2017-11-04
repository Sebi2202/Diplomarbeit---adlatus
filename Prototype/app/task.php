<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    // Set the boolean to false in default
    protected $attributes = [
        'confirmed' => 0
     ];
}
