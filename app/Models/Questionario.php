<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
        $user_id = Auth::user()->id;

        return Questionario::WhereDoesntHave('respostas', function($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->where('ativo','Sim')->get();
    }

    public static function pegarQuestionariosSemRespostasCategoria($categoria_id)
    {
        $user_id = Auth::user()->id;
        
        return Questionario::WhereDoesntHave('respostas', function($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->where([['ativo','Sim'], ['categoria_id', $categoria_id]])->get();
    }

    public static function pegarQuestionarios()
    {
        return Questionario::all();
    }

    public static function pegarQuestionario($questionario_id)
    {
        return Questionario::findOrFail($questionario_id);
    }

    public static function pegarQuestionarioPerguntas($questionario_id)
    {
        return Questionario::with(['perguntas'])->where('id', $questionario_id)->first();
    }

    public static function pegarQuestionarioPerguntasRespostas($questionario_id)
    {
        return Questionario::with(['perguntas', 'perguntas.respostas'])->where('id', $questionario_id)->first();
    }
    
    public function perguntas()
    {
        return $this->hasMany(Pergunta::class, 'questionario_id');
    }

    public function respostas()
    {
        return $this->hasManyThrough(Resposta::class, Pergunta::class, 'questionario_id', 'pergunta_id');
    }
}
