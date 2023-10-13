<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionario extends Model
{
    use HasFactory;

    protected $table = 'questionarios';

    protected $fillable = ['titulo','descricao','ativo'];

    public function respostas()
    {
        return $this->hasMany(Resposta::class);
    }
}
