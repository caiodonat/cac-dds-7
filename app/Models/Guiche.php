<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guiche extends Model
{
    use HasFactory;
    protected $table = 'tb_guiches';
    protected $fillable = ['login', 'senha'];
    protected $primaryKey = ['login', 'senha'];
    protected $foreignKey = ['login', 'senha'];
}
