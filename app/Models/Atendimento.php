<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Atendimento extends Model
{
    use HasFactory;
    protected $table = 'tb_atendimentos';
    protected $primaryKey = 'id_atendimento';
    public $timestamps = false;
}
