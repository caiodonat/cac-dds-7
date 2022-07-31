<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceDesk extends Model
{
    use HasFactory;
    protected $table = 'tb_service_desks';
    protected $primaryKey = 'id_service_desk';
    public $timestamps = false;
}
