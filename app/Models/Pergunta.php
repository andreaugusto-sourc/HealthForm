<?php

namespace App\Models;

use app\Enums\TiposPergunta;
use app\Models\Pergunta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pergunta extends Model
{
    use HasFactory;

    protected $fillable = ['texto','tipo','placeholder']; 

}
