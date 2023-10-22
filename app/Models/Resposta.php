<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{
    use HasFactory;

    protected $table = 'respostas';

    protected $fillable = ['questionario_id','pergunta_id','user_id','texto'];

    public static function salvandoResposta($questionario_id, $user_id, $pergunta_id, $texto)
    {
        Resposta::create([
            'questionario_id' => $questionario_id,
            'pergunta_id' => $pergunta_id,
            'user_id' => $user_id,
            'texto' => $texto
        ]);
    }
    
    public static function pegarRespostas()
    {
        return Resposta::all();
    }

    public function questionario()
    {
        return $this->belongsTo(Questionario::class);
    }
}
