<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipes extends Model
{
    protected $casts = [
        'nutrition_values' => 'json'
    ];

}
