<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productCarbon extends Model
{

    /**
     * @var array
     */
    //use HasFactory;

        protected $dates = [
            'created_at',
            'updated_at',
            'deleted_at',
        ];
}

