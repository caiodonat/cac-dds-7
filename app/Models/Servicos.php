<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicos extends Model
{
    use HasFactory;
    protected $table = 'tb_servicos';
    protected $primaryKey = 'id_servicos';
    public $timestamps = false;
}
