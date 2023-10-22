<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionario extends Model
{
    use HasFactory;

    protected $table = 'questionarios';

    protected $fillable = ['titulo','descricao','ativo','categoria_id'];

    public static function salvandoQuestionario($questionario)
    {
        return $questionario->save();
    }

    public static function atualizandoQuestionario($questionario_id, $data) 
    {
        return Questionario::pegarQuestionario($questionario_id)->update($data);
    }

    public static function removendoQuestionario($questionario_id)
    {
        // apaga as respostas atreladas ao questionario
        Resposta::where(['questionario_id' => $questionario_id])->delete();
        // apaga as perguntas atreladas ao questionario
        Pergunta::where(['questionario_id' => $questionario_id])->delete();
        // apaga o questionario
        Questionario::findOrFail($questionario_id)->delete();
    }

    public static function pegarQuestionariosSemRespostas()
    {
        return Questionario::doesntHave('respostas')->where('ativo','Sim')->get();
    }

    public static function pegarQuestionariosSemRespostasCategoria($categoria_id)
    {
        return Questionario::doesntHave('respostas')->where([['ativo','Sim'], ['categoria_id', $categoria_id]])->get();
    }

    public static function pegarQuestionarios()
    {
        return Questionario::all();
    }

    public static function pegarQuestionario($questionario_id)
    {
        return Questionario::findOrFail($questionario_id);
    }

    public function respostas()
    {
        return $this->hasMany(Resposta::class);
    }
}
