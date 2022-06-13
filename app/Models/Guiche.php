<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guiche extends Model
{
    use HasFactory;
    protected $table = 'tb_guiches';
    protected $fillable = ['id_login_guiches', 'nome_funcionario'];
    protected $primaryKey = ['id_guiches', 'id_login_guiches', 'nome_funcionario'];
    protected $foreignKey = ['id_login_guiches', 'nome_funcionario'];
}
