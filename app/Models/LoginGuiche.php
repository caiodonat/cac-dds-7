<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginGuiche extends Model
{
    use HasFactory;
    protected $table = 'tb_login_guiches';
    protected $fillable = ['login', 'senha', 'nome_funcionario', 'contrato_ativo'];
    protected $primaryKey = ['login', 'senha', 'nome_funcionario', 'contrato_ativo'];
}
