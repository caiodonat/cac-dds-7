<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guiches extends Model
{
    use HasFactory;

    protected $table = 'tb_guiches';
    protected $fillable = ['id_login_guiches', 'nomes_funcionarios'];
    protected $primaryKey = ['id_guiches', 'id_login_guiches', 'nomes_funcionarios'];
    protected $foreignKey = ['id_login_guiches', 'nomes_funcionarios'];
}
