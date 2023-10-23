<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pergunta extends Model
{
    use HasFactory;

    protected $fillable = ['texto','tipo','placeholder']; 

    public static function salvandoPergunta($pergunta, $questionario_id)
    {
        $pergunta->questionario_id = $questionario_id;
        $pergunta->save();
    }

    public static function atualizandoPergunta($pergunta_id, $data)
    {
        Pergunta::findOrFail($pergunta_id)->update($data);
    }

    public static function removendoPergunta($pergunta_id) 
    {
        // apaga as respostas atreladas a pergunta
        Resposta::where(['pergunta_id' => $pergunta_id])->delete();
        // apaga a pergunta
        Pergunta::findOrFail($pergunta_id)->delete();
    }

    public static function pegarPerguntasQuestionario($questionario_id)
    {
        return Pergunta::where(['questionario_id' => $questionario_id])->get();
    }

    public static function pegarPergunta($pergunta_id)
    {
        return Pergunta::findOrFail($pergunta_id);
    }

    public function questionario()
    {
        return $this->belongsTo(Questionario::class, 'questionario_id');
    }

    public function respostas()
    {
        return $this->hasMany(Resposta::class, 'pergunta_id');
    }

}
